<?php
// for composer ---
//require "../../autoload.php"; ##from root vendors/autoload.php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

// define service endpoints
$app->get('/', function() use($app) {
    $app->response->setStatus(200);
    echo "This is the service root";
});
$app->get('/artists', 'getArtists');
$app->get('/artist/:id', 'getArtist');
$app->post('/add/artist', 'addArtist');
$app->put('/update/artist/:id', 'updateArtist');
$app->delete('/delete/artist/:id', 'deleteArtist');




// connect to db
function getDB() {
    return new PDO("mysql:host=localhost;dbname=bachovich;charset=utf8",'root','');
}
 
// *********** service functions ****************

// return artist names
function getArtists() {
 
    $app = \Slim\Slim::getInstance();
    $sql = "SELECT fname, lname 
            FROM artists";
 
    try {
        $db = getDB();

        $stmt = $db->prepare($sql);
 
        $stmt->execute();
 
        $artists = array();
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        // fetch data into $artists array
        $i = 0;
        while($row = $stmt->fetch()) {
            $artists[$i] = $row;
            $i++;
        }
        
        // return data
        if($artists) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($artists);
            $db = null;
        } else {
            throw new PDOException('No artists found.');
        }
 
    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo errorHandle($e);
    }
}

// return selected artist
function getArtist($id) {
 
    $app = \Slim\Slim::getInstance();
    $sql = "SELECT * 
            FROM artists
            WHERE artist_id = :id";
 
    try {
        $db = getDB();

        $stmt = $db->prepare($sql);
 
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
 
        $artist = $stmt->fetch(PDO::FETCH_OBJ);
 
        if($artist) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($artist);
            $db = null;
        } else {
            throw new PDOException('Artist not found.');
        }
 
    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

// add artists
function addArtist() {

    $app = \Slim\Slim::getInstance()->request();
    $artist = json_decode($app->getBody());
    $sql = "INSERT INTO artists (fname, lname, bio, img) 
            VALUES (:fname, :lname, :bio, :img)";

    try {
        $db = getDB();
 
        $stmt = $db->prepare($sql);
        
        // bind artist data to be inserted
        $stmt->bindParam(':fname', $artist->fname);
        $stmt->bindParam(':lname', $artist->lname);
        $stmt->bindParam(':bio', $artist->bio);
        $stmt->bindParam(':img', $artist->img);
 
        $stmt->execute();
 
        # message to confirm successful data entry?
        $app->response->setStatus(200);
        echo "<p>Data submitted successfully</p>";
        $db = null;

        // for trial test in command line
        //curl -i -X POST -H 'Content-Type: application/json' -d '{"fname": "x", "lname": "y", "bio": "amigo", "img": null}' http://localhost:3000/vendor/slim/api/add/artist

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

// update artist
function updateArtist($id) {

    $app = \Slim\Slim::getInstance()->request();
    $update = json_decode($app->getBody());
    $sql = "UPDATE artists 
        SET fname=:fname, lname=:lname, bio=:bio, img=:img 
        WHERE artist_id=:id"; 

    try {
        $db = getDB();
 
        $stmt = $db->prepare($sql);
        
        // bind data to be updated
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':fname', $update->fname);
        $stmt->bindParam(':lname', $update->lname);
        $stmt->bindParam(':bio', $update->bio);
        $stmt->bindParam(':img', $update->img);
 
        $stmt->execute();
 
        # message to confirm successful update?
        $app->response->setStatus(200);
        echo "<p>Update submitted successfully</p>";
        $db = null;

        // for trial test in command line
        //curl -i -X PUT -H 'Content-Type: application/json' -d '{"fname": "new", "lname": "name", "bio": "chicas", "img": null}' http://localhost:3000/vendor/slim/api/update/artist/12

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

// delete artist
function deleteArtist($id) {

    $app = \Slim\Slim::getInstance();
    $sql = "DELETE FROM artists 
        WHERE artist_id=:id";

    try {
        $db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        $stmt->execute();

        # message to confirm successful delete?
        $app->response->setStatus(200);
        echo "<p>Artist deleted</p>";
        $db = null;

        // for trial test in command line
        //curl -i -X DELETE http://localhost:3000/vendor/slim/api/delete/artist/12

    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

$app->run();
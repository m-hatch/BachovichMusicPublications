<?php

// *********** artists service functions ****************

// return artist names
function getArtists() {
 
    $sql = "SELECT artist_id, fname, lname 
            FROM artists";
    getDataRows($sql);
}

// return selected artist
function getArtist($id) {

    $sql = "SELECT * 
            FROM artists
            WHERE artist_id = " . $id;
    getRow($sql);
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
        //curl -i -X POST -H 'Content-Type: application/json' -d '{"fname": "x", "lname": "y", "bio": "amigo", "img": null}' http://localhost:3000/api/add/artist

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
        //curl -i -X PUT -H 'Content-Type: application/json' -d '{"fname": "new", "lname": "name", "bio": "chicas", "img": null}' http://localhost:3000/api/update/artist/1

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
        //curl -i -X DELETE http://localhost:3000/api/delete/artist/1

    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
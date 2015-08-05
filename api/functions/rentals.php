<?php

// *********** rentals service functions ****************

// return rentals
function getRentals() {
 
    $sql = "SELECT r.rental_id, r.composer, a.lname, a.fname, r.title, r.duration, r.contents
            FROM rentals r INNER JOIN artists a 
            ON r.artist_id = a.artist_id";
    getDataRows($sql);
}

// add rental
function addRental() {

    $app = \Slim\Slim::getInstance()->request();

    $rental = json_decode($app->getBody());
    $sql = "INSERT INTO rentals (rental_id, artist_id, composer, title, duration, contents) 
            VALUES (:rental_id, :artist_id, :composer, :title, :duration, :contents)";

    try {
        $db = getDB();
 
        $stmt = $db->prepare($sql);
        
        // bind artist data to be inserted
        $stmt->bindParam(':rental_id', $rental->rental_id);
        $stmt->bindParam(':artist_id', $rental->artist_id);
        $stmt->bindParam(':composer', $rental->composer);
        $stmt->bindParam(':title', $rental->title);
        $stmt->bindParam(':duration', $rental->duration);
        $stmt->bindParam(':contents', $rental->contents);
 
        $stmt->execute();
 
        # message to confirm successful data entry?
        $app->response->setStatus(200);
        echo "<p>Data submitted successfully</p>";
        $db = null;

        // for trial test in command line
        //curl -i -X POST -H 'Content-Type: application/json' -d '{"rental_id": "1111", "artist_id": 7, "composer": null, "title": "A Pretty Song", "duration": "3 min.", "contents": "includes score and parts"}' http://localhost:3000/api/add/rental

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

// update rental
function updateRental($id) {

    $app = \Slim\Slim::getInstance()->request();
    $update = json_decode($app->getBody());
    $sql = "UPDATE rentals 
        SET artist_id=:artist_id, composer=:composer, title=:title, duration=:duration, contents=:contents  
        WHERE rental_id=:id"; 

    try {
        $db = getDB();
 
        $stmt = $db->prepare($sql);
        
        // bind data to be updated
        $stmt->bindParam(':id', $id, PDO::PARAM_STR, 4);
        $stmt->bindParam(':artist_id', $update->artist_id);
        $stmt->bindParam(':composer', $update->composer);
        $stmt->bindParam(':title', $update->title);
        $stmt->bindParam(':duration', $update->duration);
        $stmt->bindParam(':contents', $update->contents);
 
        $stmt->execute();
 
        # message to confirm successful update?
        $app->response->setStatus(200);
        echo "<p>Update submitted successfully</p>";
        $db = null;

        // for trial test in command line
        //curl -i -X PUT -H 'Content-Type: application/json' -d '{"artist_id": 7, "composer": null, "title": "new title", "duration": "3:30 min", "contents": "everything"}' http://localhost:3000/api/update/rental/1111

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

// delete rental
function deleteRental($id) {

    $app = \Slim\Slim::getInstance();
    $sql = "DELETE FROM rentals 
        WHERE rental_id=:id";

    try {
        $db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("id", $id, PDO::PARAM_STR, 4);
        $stmt->execute();

        # message to confirm successful delete?
        $app->response->setStatus(200);
        echo "<p>Artist deleted</p>";
        $db = null;

        // for trial test in command line
        //curl -i -X DELETE http://localhost:3000/api/delete/rental/1111

    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
<?php

// *********** rentals service functions ****************

// return rentals
function getRentals() {
 
    $app = \Slim\Slim::getInstance();
    $sql = "SELECT r.rental_id, r.composer, a.lname, a.fname, r.title, r.duration, r.contents
            FROM rentals r INNER JOIN artists a 
            ON r.artist_id = a.artist_id";
 
    try {
        $db = getDB();

        $stmt = $db->prepare($sql);
 
        $stmt->execute();
 
        $rentals = array();
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        // fetch data into $artists array
        $i = 0;
        while($row = $stmt->fetch()) {
            $rentals[$i] = $row;
            $i++;
        }
        
        // return data
        if($rentals) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($rentals);
            $db = null;
        } else {
            throw new PDOException('No rentals found.');
        }
 
    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo errorHandle($e);
    }
}
<?php

// *********** audio/video service functions ****************

// return audio/video list
function getMedias() {
 
    $app = \Slim\Slim::getInstance();
    $sql = "SELECT m.media_id, m.type, a.lname, a.fname, m.title, m.description, m.price, m.img, m.shipping
            FROM medias m INNER JOIN artists a 
            ON m.artist_id = a.artist_id";
 
    try {
        $db = getDB();

        $stmt = $db->prepare($sql);
 
        $stmt->execute();
 
        $medias = array();
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        // fetch data into $artists array
        $i = 0;
        while($row = $stmt->fetch()) {
            $medias[$i] = $row;
            $i++;
        }
        
        // return data
        if($medias) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($medias);
            $db = null;
        } else {
            throw new PDOException('No audio/video found.');
        }
 
    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo errorHandle($e);
    }
}
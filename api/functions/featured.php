<?php

// return featured items
function getFeatures() {
 
    $app = \Slim\Slim::getInstance();
 
    try {
        $db = getDB();
        $data = array();
        $result = array();
        $error = array('error' => 'No match found');

        // get feature ids
        $sql = "SELECT * FROM features WHERE feat_id = 1";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $featureIds = $stmt->fetch(PDO::FETCH_OBJ);
        
        // get composition data
        $sql = sheetMusicById($featureIds->composition);
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result['composition'] = $stmt->fetch();

        // get book data
        $sql = sheetMusicById($featureIds->book);
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result['book'] = $stmt->fetch();

        // get media data
        $sql = mediaById($featureIds->media);
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result['media'] = $stmt->fetch();

        // get artist data
        $sql = artistById($featureIds->artist);
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result['artist'] = $stmt->fetch();

        // get artist works
        $sql = "SELECT title 
                FROM sheetmusics 
                WHERE artist_id = " . $featureIds->artist;
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        // fetch data into array
        $i = 0;
        while($row = $stmt->fetch()) {
            $data[$i] = $row;
            $i++;
        }
        $result['works'] = $data;
 
        // return data
        if($result) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($result, JSON_PRETTY_PRINT);
        } else {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($error);
        }
        $db = null;
 
    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo $e;
    }
}
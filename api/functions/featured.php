<?php

// return featured items
function getFeatures() {
 
    $app = \Slim\Slim::getInstance();
 
    try {
        $db = getDB();
        $result = array();
        $error = array('error' => 'No match found');

        // get feature ids
        $sql = "SELECT * FROM features WHERE feat_id = 1";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $featureIds = $stmt->fetch(PDO::FETCH_OBJ);
        $compId = $featureIds->composition;
        $bookId = $featureIds->book;
        $mediaId = $featureIds->media;
        $artistId = $featureIds->artist;
        
        // get composition data
        $sql = sheetMusicById($featureIds->composition);
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result[0] = array('composition' => $stmt->fetch());

        // get book data
        $sql = sheetMusicById($featureIds->book);
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result[1] = array('book' => $stmt->fetch());

        // get media data
        $sql = mediaById($featureIds->media);
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result[2] = array('media' => $stmt->fetch());

        // get artist data
        $sql = artistById($featureIds->artist);
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result[3] = array('artist' => $stmt->fetch());
 
        // return data
        if($result) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($result);
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
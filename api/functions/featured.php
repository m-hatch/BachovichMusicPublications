<?php

// return featured items
function getFeatures() {
 
    $app = \Slim\Slim::getInstance();
 
    try {
        $db = getDB();
        $result = array();
        $error = array('error' => 'No match found');

        // get feature ids
        $sql = "SELECT * FROM Features WHERE feat_id = 1";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $featureIds = $stmt->fetch(PDO::FETCH_OBJ);
        
        // get composition data
        $sql = sheetMusicById($featureIds->composition);
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result['composition'] = $stmt->fetch();
            // get audio/video if exists
            $av = array();
            $sql2 = "SELECT * 
                    FROM AudiosVideos 
                    WHERE product_id = '" . $featureIds->composition . "'";
            $stmt2 = $db->prepare($sql2);
            $stmt2->execute();
            $stmt2->setFetchMode(PDO::FETCH_OBJ);
            // fetch sub data into array
            $i = 0;
            while($sub = $stmt2->fetch()) {
                $av[$i] = $sub;
                $i++;
            }
            // add to data to object
            if ($av) {
                $result['composition']->audio_video = $av;
            } else {
                $result['composition']->audio_video = null;
            }

        // get book data
        $sql = sheetMusicById($featureIds->book);
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result['book'] = $stmt->fetch();
            // get audio/video if exists
            $av = array();
            $sql2 = "SELECT * 
                    FROM AudiosVideos 
                    WHERE product_id = '" . $featureIds->book . "'";
            $stmt2 = $db->prepare($sql2);
            $stmt2->execute();
            $stmt2->setFetchMode(PDO::FETCH_OBJ);
            // fetch sub data into array
            $i = 0;
            while($sub = $stmt2->fetch()) {
                $av[$i] = $sub;
                $i++;
            }
            // add to data to object
            if ($av) {
                $result['book']->audio_video = $av;
            } else {
                $result['book']->audio_video = null;
            }

        // get video data
        $sql = videoById($featureIds->video);
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result['video'] = $stmt->fetch();
            // get product info
            $sql2 = "SELECT s.music_id, s.title, s.price, s.shipping, a.lname, a.fname 
                    FROM SheetMusics s INNER JOIN Artists a 
                    ON s.artist_id = a.artist_id
                    WHERE music_id = " . $result['video']->product_id;
            $stmt2 = $db->prepare($sql2);
            $stmt2->execute();
            $stmt2->setFetchMode(PDO::FETCH_OBJ);
            $product = $stmt2->fetch();
            
            // add data to object
            if ($product) {
                $result['video']->product = $product;
            } else {
                $result['video']->product = null;
            }

        // get artist data
        $sql = artistById($featureIds->artist);
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result['artist'] = $stmt->fetch();
            // get artist works
            $works = array();
            $sql2 = "SELECT music_id, title 
                    FROM SheetMusics 
                    WHERE artist_id = " . $featureIds->artist;
            $stmt2 = $db->prepare($sql2);
            $stmt2->execute();
            $stmt2->setFetchMode(PDO::FETCH_OBJ);
            // fetch data into array
            $i = 0;
            while($row = $stmt2->fetch()) {
                $works[$i] = $row;
                $i++;
            }
            // add data to object
            if ($works) {
                $result['artist']->works = $works;
            } else {
                $result['artist']->works = null;
            }
 
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
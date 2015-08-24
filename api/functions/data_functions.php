<?php
/* --------------------------------------------------------------- *
*                                                                  *
*                          basic CRUD operations                   * 
*                                                                  *                                                                *
* -----------------------------------------------------------------*/
// return data rows
function getDataRows($sql) {
 
    $app = \Slim\Slim::getInstance();
 
    try {
        $db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = array();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $error = array('error' => 'No match found');

        // fetch data into array
        $i = 0;
        while($row = $stmt->fetch()) {
            $data[$i] = $row;
            $i++;
        }
        
        // return data
        if($data) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($data, JSON_PRETTY_PRINT);
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

// return selected row
function getRow($sql) {
 
    $app = \Slim\Slim::getInstance();
 
    try {
        $db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $error = array('error' => 'No match found');
 
        // return data
        if($row) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($row, JSON_PRETTY_PRINT);
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

// add or update row
function addUpdateRow($sql) {

    $app = \Slim\Slim::getInstance();

    try {
        $db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->execute();
 
        // confirm successful data entry
        $app->response->setStatus(200);
        $db = null;

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

// delete row
function deleteRow($sql) {

    $app = \Slim\Slim::getInstance();
    
    try {
        $db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->execute();

        # message to confirm successful delete?
        $app->response->setStatus(200);
        echo "<p>Item deleted</p>";
        $db = null;

    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/* --------------------------------------------------------------- *
*                                                                  *
*                          for audio/video data                    * 
*                                                                  *                                                                 *
* -----------------------------------------------------------------*/
// return sheet music rows
function getSheetMusicRows($sql) {
 
    $app = \Slim\Slim::getInstance();
 
    try {
        $db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = array();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $error = array('error' => 'No match found');

        // fetch data into array
        $i = 0;
        while($row = $stmt->fetch()) {
            $data[$i] = $row;
            $av = array();

            // get audio/video if exists
            $sql2 = "SELECT * 
                    FROM AudiosVideos 
                    WHERE product_id = '" . $row->music_id . "'";
            $stmt2 = $db->prepare($sql2);
            $stmt2->execute();
            $stmt2->setFetchMode(PDO::FETCH_OBJ);
            // fetch sub data into array
            $j = 0;
            while($sub = $stmt2->fetch()) {
                $av[$j] = $sub;
                $j++;
            }
            // add to data
            if ($av) {
                $data[$i]->audio_video = $av;
            } else {
                $data[$i]->audio_video = null;
            }
            $i++;
        }
        
        // return data
        if($data) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($data, JSON_PRETTY_PRINT);
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

// return selected sheet music row
function getMusicRow($sql) {
 
    $app = \Slim\Slim::getInstance();
 
    try {
        $db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $error = array('error' => 'No match found');
        
            // get audio/video if exists
            $av = array();
            $sql2 = "SELECT * 
                    FROM AudiosVideos 
                    WHERE product_id = '" . $row->music_id . "'";
            $stmt2 = $db->prepare($sql2);
            $stmt2->execute();
            $stmt2->setFetchMode(PDO::FETCH_OBJ);
            // fetch sub data into array
            $i = 0;
            while($sub = $stmt2->fetch()) {
                $sub->track = (int)$sub->track;
                $av[$i] = $sub;
                $i++;
            }
            // add to data
            if ($av) {
                $row->audio_video = $av;
            } else {
                $row->audio_video = null;
            }
 
        // return data
        if($row) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($row, JSON_PRETTY_PRINT);
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

// return media rows
function getMediaRows($sql) {
 
    $app = \Slim\Slim::getInstance();
 
    try {
        $db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = array();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $error = array('error' => 'No match found');

        // fetch data into array
        $i = 0;
        while($row = $stmt->fetch()) {
            $data[$i] = $row;
            $av = array();

            // get audio/video if exists
            $sql2 = "SELECT * 
                    FROM AudiosVideos 
                    WHERE product_id = '" . $row->media_id . "'";
            $stmt2 = $db->prepare($sql2);
            $stmt2->execute();
            $stmt2->setFetchMode(PDO::FETCH_OBJ);
            // fetch sub data into array
            $j = 0;
            while($sub = $stmt2->fetch()) {
                $av[$j] = $sub;
                $j++;
            }
            // add to data
            if ($av) {
                $data[$i]->audio_video = $av;
            } else {
                $data[$i]->audio_video = null;
            }
            $i++;
        }
        
        // return data
        if($data) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($data, JSON_PRETTY_PRINT);
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

// return selected media row
function getMediaRow($sql) {
 
    $app = \Slim\Slim::getInstance();
 
    try {
        $db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $error = array('error' => 'No match found');
        
            // get audio/video if exists
            $av = array();
            $sql2 = "SELECT * 
                    FROM AudiosVideos 
                    WHERE product_id = '" . $row->media_id . "'";
            $stmt2 = $db->prepare($sql2);
            $stmt2->execute();
            $stmt2->setFetchMode(PDO::FETCH_OBJ);
            // fetch sub data into array
            $i = 0;
            while($sub = $stmt2->fetch()) {
                $sub->track = (int)$sub->track;
                $av[$i] = $sub;
                $i++;
            }
            // add to data
            if ($av) {
                $row->audio_video = $av;
            } else {
                $row->audio_video = null;
            }
 
        // return data
        if($row) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($row, JSON_PRETTY_PRINT);
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
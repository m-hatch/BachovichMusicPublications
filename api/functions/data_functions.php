<?php

// return data rows
function getDataRows($sql) {
 
    $app = \Slim\Slim::getInstance();
 
    try {
        $db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = array();
        $stmt->setFetchMode(PDO::FETCH_OBJ);

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
            echo json_encode($data);
            $db = null;
        } else {
            throw new PDOException('No match found.');
        }
 
    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo $e;
    }
}

// return selected row
function getRow($appObj, $sql) {
 
    $app = $appObj;
 
    try {
        $db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
 
        // return data
        if($row) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($row);
            $db = null;
        } else {
            throw new PDOException('Match not found.');
        }
 
    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo $e;
    }
}

// add data row
function addRow($sql) {

    try {
        $db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->execute();
 
        # message to confirm successful data entry?
        $app->response->setStatus(200);
        echo "<p>Data submitted successfully</p>";
        $db = null;

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
<?php

// *********** solos service functions ****************

// get sheet music by sub_type1
function sheetMusicsSubType1($type, $sub){
    $sql = "SELECT s.music_id, a.lname, a.fname, s.composer, s.type, s.sub_type1, 
    s.title, s.duration, s.contents, s.description, s.price, s.img, s.shipping
    FROM sheetmusics s INNER JOIN artists a 
    ON s.artist_id = a.artist_id
    WHERE s.type = '" . $type . "' AND s.sub_type1 = '" . $sub . "'";

    return $sql;
}

// return data rows abstract
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
            throw new PDOException('No works found.');
        }
 
    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo $e->getTrace();
    }
}

// return solo/marimba list
function getMarimbaSolos() {

    $sql = sheetMusicsSubType1('solo', 'marimba');
    getDataRows($sql);

}

// return solo/marimba-vibes list
function getMarimbaVibesSolos() {

    $sql = sheetMusicsSubType1('solo', 'marimba/vibes');
    getDataRows($sql);

}

// return solo/xylophone list
function getXyloSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'xylophone');
    getDataRows($sql);

}

// return solo/gyil list
function getGyilSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'gyil');
    getDataRows($sql);

}

// return solo/hand-drum list
function getHandDrSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'hand drum');
    getDataRows($sql);

}

// return solo/vibes list
function getVibeSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'vibes');
    getDataRows($sql);

}

// return solo/timpani list
function getTimpSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'timpani');
    getDataRows($sql);

}

// return solo/drumset list
function getDrumsetSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'drumset');
    getDataRows($sql);

}

// return solo/multi list
function getMultiSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'multi');
    getDataRows($sql);

}

// return solo/snare list
function getSnareSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'snare');
    getDataRows($sql);

}

// return solo/pan list
function getPanSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'pan');
    getDataRows($sql);

}
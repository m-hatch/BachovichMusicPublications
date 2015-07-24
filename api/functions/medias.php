<?php

// *********** audio/video service functions ****************

// return audio/video list
function getMedias() {
 
    $sql = "SELECT m.media_id, m.type, a.lname, a.fname, m.title, m.description, m.price, m.img, m.shipping
            FROM medias m INNER JOIN artists a 
            ON m.artist_id = a.artist_id";
    getDataRows($sql);
}

// return media detail
function getMediaDetail($id) {

    $sql = "SELECT m.media_id, m.type, a.lname, a.fname, m.title, m.description, m.price, m.img, m.shipping
            FROM medias m INNER JOIN artists a 
            ON m.artist_id = a.artist_id
            WHERE media_id = '" . $id . "'";
    getRow($sql);
}
<?php

// ************** media service functions ****************

// return audio/video list
function getMedias() {
 
    $sql = "SELECT m.media_id, m.type, a.lname, a.fname, m.title, m.description, m.price, m.img, m.shipping
            FROM Medias m INNER JOIN Artists a 
            ON m.artist_id = a.artist_id";
    getMediaRows($sql);
}

// return media detail
function getMediaDetail($id) {

    $sql = mediaById($id);
    getMediaRow($sql);
}
<?php

// get all sheet music
function sheetMusicAll(){
    $sql = "SELECT s.music_id, a.lname, a.fname, s.composer, s.type, s.sub_type1, 
            s.title, s.duration, s.contents, s.description, s.price, s.img, s.shipping
            FROM sheetmusics s INNER JOIN artists a 
            ON s.artist_id = a.artist_id";
            
    return $sql;
}

// get sheet music by type
function sheetMusicsType($type){
    $sql = "SELECT s.music_id, a.lname, a.fname, s.composer, s.type, s.sub_type1, 
            s.title, s.duration, s.contents, s.description, s.price, s.img, s.shipping
            FROM sheetmusics s INNER JOIN artists a 
            ON s.artist_id = a.artist_id
            WHERE s.type = '" . $type . "'";

    return $sql;
}

// get sheet music by sub_type1
function sheetMusicsSubType1($type, $sub){
    $sql = "SELECT s.music_id, a.lname, a.fname, s.composer, s.type, s.sub_type1, 
            s.title, s.duration, s.contents, s.description, s.price, s.img, s.shipping
            FROM sheetmusics s INNER JOIN artists a 
            ON s.artist_id = a.artist_id
            WHERE s.type = '" . $type . "' AND s.sub_type1 = '" . $sub . "'";

    return $sql;
}

// get sheet music by sub_type2
function sheetMusicsSubType2($type, $sub1, $sub2){
    $sql = "SELECT s.music_id, a.lname, a.fname, s.composer, s.type, s.sub_type1, 
            s.title, s.duration, s.contents, s.description, s.price, s.img, s.shipping
            FROM sheetmusics s INNER JOIN artists a 
            ON s.artist_id = a.artist_id
            WHERE s.type = '" . $type . "' AND s.sub_type1 = '" . $sub1 . 
            "' AND s.sub_type2 = '" . $sub2 . "'";

    return $sql;
}

// get sheet music by id
function sheetMusicById($id){
    $sql = "SELECT s.music_id, a.lname, a.fname, s.composer, s.type, s.sub_type1, 
            s.title, s.duration, s.contents, s.description, s.price, s.img, s.shipping
            FROM sheetmusics s INNER JOIN artists a 
            ON s.artist_id = a.artist_id
            WHERE s.music_id = '" . $id . "'";

    return $sql;
}

// get media by id
function mediaById($id){
    $sql = "SELECT m.media_id, m.type, a.lname, a.fname, m.title, m.description, 
            m.price, m.img, m.shipping 
            FROM medias m INNER JOIN artists a 
            ON m.artist_id = a.artist_id 
            WHERE media_id = '" . $id . "'";

            return $sql;
}

// get artist by id
function artistById($id){
    $sql = "SELECT * 
            FROM artists
            WHERE artist_id = " . $id;

    return $sql;
}
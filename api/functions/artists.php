<?php

// ************** artists service functions ****************

// return artist names
function getArtists() {
 
    $sql = "SELECT artist_id, fname, lname 
            FROM artists";
    getDataRows($sql);
}

// return selected artist
function getArtist($id) {

    $sql = artistById($id);
    getRow($sql);
}
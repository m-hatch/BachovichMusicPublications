<?php

// ************** artists service functions ****************

// return artists
function getArtists() {
 
    $sql = "SELECT * 
            FROM artists";
    getDataRows($sql);
}

// return selected artist
function getArtist($id) {

    $sql = artistById($id);
    getRow($sql);
}
<?php

// *********** artists service functions ****************

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

// add artists
function addArtist() {

    $appObj = \Slim\Slim::getInstance()->request();
    $artist = json_decode($appObj->getBody());

    $sql = "INSERT INTO artists (fname, lname, bio, img) 
            VALUES ('" . $artist->fname . "', '" . $artist->lname . 
                "', '" . $artist->bio . "', '" . $artist->img . "')";

    addUpdateRow($appObj, $sql);

    // for trial test in command line
    //curl -i -X POST -H 'Content-Type: application/json' -d '{"fname": "x", "lname": "y", "bio": "amigo", "img": "no-img.jpg"}' http://localhost:3000/api/add/artist
}

// update artist
function updateArtist($id) {

    $appObj = \Slim\Slim::getInstance()->request();
    $update = json_decode($appObj->getBody());

    $sql = "UPDATE artists 
        SET fname= '" . $update->fname . "', lname= '" . $update->lname . 
        "', bio= '" . $update->bio . "', img= '" . $update->img . "' 
        WHERE artist_id = " . $id; 

    addUpdateRow($appObj, $sql);

    // for trial test in command line
    //curl -i -X PUT -H 'Content-Type: application/json' -d '{"fname": "new", "lname": "name", "bio": "chicas", "img": null}' http://localhost:3000/api/update/artist/105
}

// delete artist
function deleteArtist($id) {

    $sql = "DELETE FROM artists 
        WHERE artist_id=" . $id;

    deleteRow($sql);
    
    // for trial test in command line
    //curl -i -X DELETE http://localhost:3000/api/delete/artist/105
}
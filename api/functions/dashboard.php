<?php

/* --------------------------------------------------------------- *
*                             artists                              *
* ---------------------------------------------------------------- */

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

/* --------------------------------------------------------------- *
*                             rentals                              *
* ---------------------------------------------------------------- */

// add rental
function addRental() {

    $appObj = \Slim\Slim::getInstance()->request();
    $rental = json_decode($appObj->getBody());

    $sql = "INSERT INTO rentals (rental_id, artist_id, composer, title, duration, contents) 
            VALUES ('" . $rental->rental_id . "', " . $rental->artist_id . ", '" . 
              $rental->composer . "', '" . $rental->title . "', '" . $rental->duration . 
              "', '" . $rental->contents . "')";

    addUpdateRow($appObj, $sql);

    // for trial test in command line
    //curl -i -X POST -H 'Content-Type: application/json' -d '{"rental_id": "1111", "artist_id": 7, "composer": null, "title": "A Pretty Song", "duration": "3 min.", "contents": "includes score and parts"}' http://localhost:3000/api/add/rental
}

// update rental
function updateRental($id) {

    $appObj = \Slim\Slim::getInstance()->request();
    $update = json_decode($appObj->getBody());

    $sql = "UPDATE rentals 
        SET artist_id= " . $update->artist_id . ", composer= '" . $update->composer . 
        "', title= '" . $update->title . "', duration= '" . $update->duration . 
        "', contents= '" . $update->contents . "'  
        WHERE rental_id = '" . $id . "'"; 

    addUpdateRow($appObj, $sql);
    
    // for trial test in command line
    //curl -i -X PUT -H 'Content-Type: application/json' -d '{"artist_id": 7, "composer": null, "title": "new title", "duration": "3:30 min", "contents": "everything"}' http://localhost:3000/api/update/rental/1111
}

// delete rental
function deleteRental($id) {

    $sql = "DELETE FROM rentals 
        WHERE rental_id = '" . $id . "'";

    deleteRow($sql);

    // for trial test in command line
    //curl -i -X DELETE http://localhost:3000/api/delete/rental/1111
}

/* --------------------------------------------------------------- *
*                             medias                              *
* ---------------------------------------------------------------- */

// add media
function addMedia() {

    $appObj = \Slim\Slim::getInstance()->request();
    $media = json_decode($appObj->getBody());

    $sql = "INSERT INTO medias (media_id, artist_id, type, title, description, price, img, shipping) 
            VALUES ('" . $media->media_id . "', " . $media->artist_id . ", '" . 
              $media->type . "', '" . $media->title . "', '" . $media->description ."', " . 
              $media->price . ", '" . $media->img . "', " . $media->shipping . ")";

    addUpdateRow($appObj, $sql);

    // for trial test in command line
    //curl -i -X POST -H 'Content-Type: application/json' -d '{"media_id": "1111", "artist_id": 11, "type": "CD", "title": "A Pretty CD", "description": "foobar", "price": 9.99, "img": "no-img.jpg", "shipping": 3.00}' http://localhost:3000/api/add/media
}

// update media
function updateMedia($id) {

    $appObj = \Slim\Slim::getInstance()->request();
    $update = json_decode($appObj->getBody());

    $sql = "UPDATE medias 
        SET artist_id= " . $update->artist_id . ", type= '" . $update->type . 
        "', title= '" . $update->title . "', description= '" . $update->description . 
        "', price= " . $update->price . ", img= '" . $update->img . 
        "', shipping= " . $update->shipping . 
        " WHERE media_id = '" . $id . "'"; 

    addUpdateRow($appObj, $sql);
    
    // for trial test in command line
    //curl -i -X PUT -H 'Content-Type: application/json' -d '{"artist_id": 2, "type": "DVD", "title": "new title", "description": "another description", "price": 9.99, "img": "no-img.jpg", "shipping": 3.00}' http://localhost:3000/api/update/media/1111
}

// delete media
function deleteMedia($id) {

    $sql = "DELETE FROM medias 
        WHERE media_id = '" . $id . "'";

    deleteRow($sql);

    // for trial test in command line
    //curl -i -X DELETE http://localhost:3000/api/delete/media/1111
}
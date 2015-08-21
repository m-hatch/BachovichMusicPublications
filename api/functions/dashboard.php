<?php

/* --------------------------------------------------------------- *
*                             artists                              *
* ---------------------------------------------------------------- */

// add artists
function addArtist() {

    $appObj = \Slim\Slim::getInstance()->request();
    $artist = json_decode($appObj->getBody());

    $sql = "INSERT INTO Artists (fname, lname, bio, img) 
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

    $sql = "UPDATE Artists 
        SET fname= '" . $update->fname . "', lname= '" . $update->lname . 
        "', bio= '" . $update->bio . "', img= '" . $update->img . "' 
        WHERE artist_id = " . $id; 

    addUpdateRow($appObj, $sql);

    // for trial test in command line
    //curl -i -X PUT -H 'Content-Type: application/json' -d '{"fname": "new", "lname": "name", "bio": "chicas", "img": null}' http://localhost:3000/api/update/artist/105
}

// delete artist
function deleteArtist($id) {

    $sql = "DELETE FROM Artists 
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

    $sql = "INSERT INTO Rentals (rental_id, artist_id, composer, title, duration, contents) 
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

    $sql = "UPDATE Rentals 
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

    $sql = "DELETE FROM Rentals 
        WHERE rental_id = '" . $id . "'";

    deleteRow($sql);

    // for trial test in command line
    //curl -i -X DELETE http://localhost:3000/api/delete/rental/1111
}

/* --------------------------------------------------------------- *
*                             medias                               *
* ---------------------------------------------------------------- */

// add media
function addMedia() {

    $appObj = \Slim\Slim::getInstance()->request();
    $media = json_decode($appObj->getBody());

    $sql = "INSERT INTO Medias (media_id, artist_id, type, title, description, price, img, shipping) 
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

    $sql = "UPDATE Medias 
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

    $sql = "DELETE FROM Medias 
        WHERE media_id = '" . $id . "'";

    deleteRow($sql);

    // for trial test in command line
    //curl -i -X DELETE http://localhost:3000/api/delete/media/1111
}

/* --------------------------------------------------------------- *
*                             sheet music                          *
* ---------------------------------------------------------------- */

// add sheet music
function addMusic() {

    $appObj = \Slim\Slim::getInstance()->request();
    $music = json_decode($appObj->getBody());

    $sql = "INSERT INTO SheetMusics (music_id, artist_id, composer, type, sub_type1, sub_type2, 
              title, duration, contents, description, price, img, shipping) 
            VALUES ('" . $music->music_id . "', " . $music->artist_id . ", '" . $music->composer . 
              "', '" . $music->type . "', '" . $music->sub_type1 . "', '" . $music->sub_type2 . 
              "', '" . $music->title . "', '" . $music->duration . "', '" . $music->contents . 
              "', '" . $music->description ."', " . $music->price . ", '" . $music->img . "', " . 
              $music->shipping . ")";

    addUpdateRow($appObj, $sql);

    // for trial test in command line
    //curl -i -X POST -H 'Content-Type: application/json' -d '{"music_id": "1111", "artist_id": 11, "composer": null, "type": "trio", "sub_type1": null, "sub_type2": null, "title": "A Pretty Trio", "duration": "4 min.", "contents": null, "description": "foobar", "price": 8.99, "img": "no-img.jpg", "shipping": "null"}' http://localhost:3000/api/add/music
}

// update sheet music
function updateMusic($id) {

    $appObj = \Slim\Slim::getInstance()->request();
    $update = json_decode($appObj->getBody());

    $sql = "UPDATE SheetMusics 
        SET artist_id= " . $update->artist_id . ", composer= '" . $update->composer . "', type= '" . 
        $update->type . "', sub_type1= '" . $update->sub_type1 . "', sub_type2= '" . 
        $update->sub_type2 . "', title= '" . $update->title . "', duration= '" . $update->duration 
        . "', contents= '" . $update->contents . "', description= '" . $update->description . 
        "', price= " . $update->price . ", img= '" . $update->img . 
        "', shipping= " . $update->shipping . 
        " WHERE music_id = '" . $id . "'"; 

    addUpdateRow($appObj, $sql);
    
    // for trial test in command line
    //curl -i -X PUT -H 'Content-Type: application/json' -d '{"music_id": "1111", "artist_id": 2, "composer": null, "type": "quartet", "sub_type1": null, "sub_type2": null, "title": "A New Title", "duration": "7 min.", "contents": null, "description": "something new", "price": 15.99, "img": "no-img.jpg", "shipping": "null"}' http://localhost:3000/api/update/music/1111
}

// delete sheet music
function deleteMusic($id) {

    $sql = "DELETE FROM SheetMusics 
        WHERE music_id = '" . $id . "'";

    deleteRow($sql);

    // for trial test in command line
    //curl -i -X DELETE http://localhost:3000/api/delete/music/1111
}

/* --------------------------------------------------------------- *
*                            audio/video                           *
* ---------------------------------------------------------------- */

// return audio/video
function getAVs() {
 
    $sql = "SELECT * FROM AudiosVideos";
    getDataRows($sql);
}

// return selected audio/video
function getAV($id) {

    $sql = "SELECT * 
            FROM AudiosVideos 
            WHERE av_id = " . $id;
    getRow($sql);
}

// add audio/video
function addAV() {

    $appObj = \Slim\Slim::getInstance()->request();
    $av = json_decode($appObj->getBody());

    $sql = "INSERT INTO AudiosVideos (product_id, type, track, audio_description, 
              audio_title, audio_file, video_description, video_embed) 
            VALUES ('" . $av->product_id . "', '" . $av->type . "', " . 
              $av->track . ", '" . $av->audio_description . "', '" . $av->audio_title . 
              "', '" . $av->audio_file . "', '" . $av->video_description . "', '" . 
              $av->video_embed . "')";

    addUpdateRow($appObj, $sql);
//echo json_encode($av);
    // for trial test in command line
    //curl -i -X POST -H 'Content-Type: application/json' -d '{"product_id": "0622", "type": "video", "track": 1, "audio_description": null, "audio_title": null, "audio_file": null, "video_description": null, "video_embed": "some_embed_url"}' http://localhost:3000/api/add/av
}

// update audio/video
function updateAV($id) {

    $appObj = \Slim\Slim::getInstance()->request();
    $update = json_decode($appObj->getBody());

    $sql = "UPDATE AudiosVideos 
        SET product_id= '" . $update->product_id . "', type= '" . $update->type . "', track= " . 
        $update->track . ", audio_description= '" . $update->audio_description . "', audio_title= '" . 
        $update->audio_title . "', audio_file= '" . $update->audio_file . "', video_description= '" . 
        $update->video_description . "', video_embed= '" . $update->video_embed . "' 
        WHERE av_id = '" . $id . "'"; 

    addUpdateRow($appObj, $sql);
    
    // for trial test in command line
    //curl -i -X PUT -H 'Content-Type: application/json' -d '{"product_id": "0622", "type": "video", "track": 2, "audio_description": null, "audio_title": null, "audio_file": null, "video_description": "This is new", "video_embed": "new_url"}' http://localhost:3000/api/update/av/105
}

// delete audio/video
function deleteAV($id) {

    $sql = "DELETE FROM AudiosVideos 
        WHERE av_id = '" . $id . "'";

    deleteRow($sql);

    // for trial test in command line
    //curl -i -X DELETE http://localhost:3000/api/delete/av/105
}

/* --------------------------------------------------------------- *
*                              features                            *
* ---------------------------------------------------------------- */

// update features
function updateFeatures() {

    $appObj = \Slim\Slim::getInstance()->request();
    $update = json_decode($appObj->getBody());

    $sql = "UPDATE Features 
        SET composition= '" . $update->composition . "', book= '" . $update->book . 
        "', media= '" . $update->media . "', artist= " . $update->artist . 
        " WHERE feat_id = 1";

    addUpdateRow($appObj, $sql);

    // for trial test in command line
    //curl -i -X PUT -H 'Content-Type: application/json' -d '{"composition": "0990", "book": "0976", "media": "0748", "artist": 4}' http://localhost:3000/api/update/features
    //curl -i -X PUT -H 'Content-Type: application/json' -d '{"composition": "0942", "book": "0891", "media": "0829", "artist": 57}' http://localhost:3000/api/update/features
}
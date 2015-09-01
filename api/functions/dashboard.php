<?php

/* --------------------------------------------------------------- *
*                             artists                              *
* ---------------------------------------------------------------- */

// add artists
function addArtist() {

    $app = \Slim\Slim::getInstance()->request();
    $artist = json_decode($app->getBody());
    $sql = "INSERT INTO Artists (fname, lname, bio, img) 
            VALUES (:fname, :lname, :bio, :img)";
    try {
        $db = getDB();
 
        $stmt = $db->prepare($sql);
        
        // bind data to be inserted
        $stmt->bindParam(':fname', $artist->fname);
        $stmt->bindParam(':lname', $artist->lname);
        $stmt->bindParam(':bio', $artist->bio);
        $stmt->bindParam(':img', $artist->img);
 
        $stmt->execute();
 
        // confirm successful data entry
        $app->response->setStatus(200);
        $db = null;

        // for trial test in command line
        //curl -i -X POST -H 'Content-Type: application/json' -d '{"fname": "x", "lname": "y", "bio": "amigo", "img": "no-img.jpg"}' http://localhost:3000/api/add/artist

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

// update artist
function updateArtist($id) {

    $app = \Slim\Slim::getInstance()->request();
    $update = json_decode($app->getBody());
    $sql = "UPDATE Artists 
        SET fname=:fname, lname=:lname, bio=:bio, img=:img 
        WHERE artist_id=:id"; 
    try {
        $db = getDB();
 
        $stmt = $db->prepare($sql);
        
        // bind data to be updated
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':fname', $update->fname);
        $stmt->bindParam(':lname', $update->lname);
        $stmt->bindParam(':bio', $update->bio);
        $stmt->bindParam(':img', $update->img);
 
        $stmt->execute();
 
        // confirm successful data entry
        $app->response->setStatus(200);
        $db = null;

        // for trial test in command line
        //curl -i -X PUT -H 'Content-Type: application/json' -d '{"fname": "new", "lname": "name", "bio": "chicas", "img": null}' http://localhost:3000/api/update/artist/105

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
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

    $app = \Slim\Slim::getInstance()->request();
    $rental = json_decode($app->getBody());

    $sql = "INSERT INTO Rentals (rental_id, artist_id, composer, title, duration, contents) 
            VALUES (:rental_id, :artist_id, :composer, :title, :duration, :contents)";

    try {
        $db = getDB();
 
        $stmt = $db->prepare($sql);
        
        // bind data to be inserted
        $stmt->bindParam(':rental_id', $rental->rental_id);
        $stmt->bindParam(':artist_id', $rental->artist_id, PDO::PARAM_INT);
        $stmt->bindParam(':composer', $rental->composer);
        $stmt->bindParam(':title', $rental->title);
        $stmt->bindParam(':duration', $rental->duration);
        $stmt->bindParam(':contents', $rental->contents);
 
        $stmt->execute();
 
        // confirm successful data entry
        $app->response->setStatus(200);
        $db = null;

        // for trial test in command line
        //curl -i -X POST -H 'Content-Type: application/json' -d '{"rental_id": "1111", "artist_id": 7, "composer": null, "title": "A Pretty Song", "duration": "3 min.", "contents": "includes score and parts"}' http://localhost:3000/api/add/rental

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

// update rental
function updateRental($id) {

    $app = \Slim\Slim::getInstance()->request();
    $update = json_decode($app->getBody());

    $sql = "UPDATE Rentals 
        SET artist_id= :artist_id, composer= :composer, title= :title,
        duration= :duration, contents= :contents 
        WHERE rental_id = :id"; 

    try {
        $db = getDB();
 
        $stmt = $db->prepare($sql);
        
        // bind data to be updated
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':artist_id', $update->artist_id, PDO::PARAM_INT);
        $stmt->bindParam(':composer', $update->composer);
        $stmt->bindParam(':title', $update->title);
        $stmt->bindParam(':duration', $update->duration);
        $stmt->bindParam(':contents', $update->contents);
 
        $stmt->execute();
 
        // confirm successful data entry
        $app->response->setStatus(200);
        $db = null;
    
        // for trial test in command line
        //curl -i -X PUT -H 'Content-Type: application/json' -d '{"artist_id": 7, "composer": null, "title": "new title", "duration": "3:30 min", "contents": "everything"}' http://localhost:3000/api/update/rental/1111

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
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

    $app = \Slim\Slim::getInstance()->request();
    $media = json_decode($app->getBody());

    $sql = "INSERT INTO Medias (media_id, artist_id, type, title, description, price, img, shipping) 
            VALUES (:media_id, :artist_id, :type, :title, :description, :price, :img, :shipping)";

    try {
        $db = getDB();
 
        $stmt = $db->prepare($sql);
        
        // bind data to be inserted
        $stmt->bindParam(':media_id', $media->media_id);
        $stmt->bindParam(':artist_id', $media->artist_id, PDO::PARAM_INT);
        $stmt->bindParam(':type', $media->type);
        $stmt->bindParam(':title', $media->title);
        $stmt->bindParam(':description', $media->description);
        $stmt->bindParam(':price', $media->price);
        $stmt->bindParam(':img', $media->img);
        $stmt->bindParam(':shipping', $media->shipping);
 
        $stmt->execute();
 
        // confirm successful data entry
        $app->response->setStatus(200);
        $db = null;

        // for trial test in command line
        //curl -i -X POST -H 'Content-Type: application/json' -d '{"media_id": "1111", "artist_id": 11, "type": "CD", "title": "A Pretty CD", "description": "foobar", "price": 9.99, "img": "no-img.jpg", "shipping": 3.00}' http://localhost:3000/api/add/media

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

// update media
function updateMedia($id) {

    $app = \Slim\Slim::getInstance()->request();
    $update = json_decode($app->getBody());
    
    $sql = "UPDATE Medias 
        SET artist_id= :artist_id, type= :type, title= :title, description= :description,  
        price= :price, img= :img, shipping= :shipping 
        WHERE media_id = :id"; 

    try {
        $db = getDB();
 
        $stmt = $db->prepare($sql);
        
        // bind data to be updated
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':artist_id', $update->artist_id, PDO::PARAM_INT);
        $stmt->bindParam(':type', $update->type);
        $stmt->bindParam(':title', $update->title);
        $stmt->bindParam(':description', $update->description);
        $stmt->bindParam(':price', $update->price);
        $stmt->bindParam(':img', $update->img);
        $stmt->bindParam(':shipping', $update->shipping);
 
        $stmt->execute();
 
        // confirm successful data entry
        $app->response->setStatus(200);
        $db = null;
    
        // for trial test in command line
        //curl -i -X PUT -H 'Content-Type: application/json' -d '{"artist_id": 2, "type": "DVD", "title": "new title", "description": "another description", "price": 9.99, "img": "no-img.jpg", "shipping": 3.00}' http://localhost:3000/api/update/media/1111

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
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

    $app = \Slim\Slim::getInstance()->request();
    $music = json_decode($app->getBody());
    
    $sql = "INSERT INTO SheetMusics (music_id, artist_id, composer, type, sub_type1, sub_type2, 
                title, duration, contents, description, price, img, shipping) 
            VALUES (:music_id, :artist_id, :composer, :type, :sub_type1, :sub_type2, 
                :title, :duration, :contents, :description, :price, :img, :shipping)";

    try {
        $db = getDB();
 
        $stmt = $db->prepare($sql);
        
        // bind data to be inserted
        $stmt->bindParam(':music_id', $music->music_id);
        $stmt->bindParam(':artist_id', $music->artist_id, PDO::PARAM_INT);
        $stmt->bindParam(':composer', $music->composer);
        $stmt->bindParam(':type', $music->type);
        $stmt->bindParam(':sub_type1', $music->sub_type1);
        $stmt->bindParam(':sub_type2', $music->sub_type2);
        $stmt->bindParam(':title', $music->title);
        $stmt->bindParam(':duration', $music->duration);
        $stmt->bindParam(':contents', $music->contents);
        $stmt->bindParam(':description', $music->description);
        $stmt->bindParam(':price', $music->price);
        $stmt->bindParam(':img', $music->img);
        $stmt->bindParam(':shipping', $music->shipping);
 
        $stmt->execute();
 
        // confirm successful data entry
        $app->response->setStatus(200);
        $db = null;

        // for trial test in command line
        //curl -i -X POST -H 'Content-Type: application/json' -d '{"music_id": "1111", "artist_id": 11, "composer": null, "type": "trio", "sub_type1": null, "sub_type2": null, "title": "A Pretty Trio", "duration": "4 min.", "contents": null, "description": "foobar", "price": 8.99, "img": "no-img.jpg", "shipping": "null"}' http://localhost:3000/api/add/music

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

// update sheet music
function updateMusic($id) {

    $app = \Slim\Slim::getInstance()->request();
    $update = json_decode($app->getBody());
    
    $sql = "UPDATE SheetMusics 
        SET artist_id= :artist_id, composer= :composer, type= :type, sub_type1= :sub_type1, 
        sub_type2= :sub_type2, title= :title, duration= :duration, contents= :contents, 
        description= :description, price= :price, img= :img, shipping= :shipping 
        WHERE music_id = :id"; 

    try {
        $db = getDB();
 
        $stmt = $db->prepare($sql);
        
        // bind data to be updated
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':artist_id', $update->artist_id, PDO::PARAM_INT);
        $stmt->bindParam(':composer', $update->composer);
        $stmt->bindParam(':type', $update->type);
        $stmt->bindParam(':sub_type1', $update->sub_type1);
        $stmt->bindParam(':sub_type2', $update->sub_type2);
        $stmt->bindParam(':title', $update->title);
        $stmt->bindParam(':duration', $update->duration);
        $stmt->bindParam(':contents', $update->contents);
        $stmt->bindParam(':description', $update->description);
        $stmt->bindParam(':price', $update->price);
        $stmt->bindParam(':img', $update->img);
        $stmt->bindParam(':shipping', $update->shipping);
 
        $stmt->execute();
 
        // confirm successful data entry
        $app->response->setStatus(200);
        $db = null;
    
        // for trial test in command line
        //curl -i -X PUT -H 'Content-Type: application/json' -d '{"music_id": "1111", "artist_id": 2, "composer": null, "type": "quartet", "sub_type1": null, "sub_type2": null, "title": "A New Title", "duration": "7 min.", "contents": null, "description": "something new", "price": 15.99, "img": "no-img.jpg", "shipping": "null"}' http://localhost:3000/api/update/music/1111

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
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

    $app = \Slim\Slim::getInstance()->request();
    $av = json_decode($app->getBody());
    
    $sql = "INSERT INTO AudiosVideos (product_id, type, track, audio_description, 
                audio_title, audio_file, video_description, video_embed) 
            VALUES (:product_id, :type, :track, :audio_description, :audio_title, 
                :audio_file, :video_description, :video_embed)";

    try {
        $db = getDB();
 
        $stmt = $db->prepare($sql);
        
        // bind data to be inserted
        $stmt->bindParam(':product_id', $av->product_id);
        $stmt->bindParam(':type', $av->type);
        $stmt->bindParam(':track', $av->track, PDO::PARAM_INT);
        $stmt->bindParam(':audio_description', $av->audio_description);
        $stmt->bindParam(':audio_title', $av->audio_title);
        $stmt->bindParam(':audio_file', $av->audio_file);
        $stmt->bindParam(':video_description', $av->video_description);
        $stmt->bindParam(':video_embed', $av->video_embed);
 
        $stmt->execute();
 
        // confirm successful data entry
        $app->response->setStatus(200);
        $db = null;

        // for trial test in command line
        //curl -i -X POST -H 'Content-Type: application/json' -d '{"product_id": "9999", "type": "video", "track": null, "audio_description": null, "audio_title": null, "audio_file": null, "video_description": null, "video_embed": "some_embed_url"}' http://localhost:3000/api/add/av

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

// update audio/video
function updateAV($id) {

    $app = \Slim\Slim::getInstance()->request();
    $update = json_decode($app->getBody());
    
    $sql = "UPDATE AudiosVideos 
        SET product_id= :product_id, type= :type, track= :track, 
        audio_description= :audio_description, audio_title= :audio_title, 
        audio_file= :audio_file, video_description= :video_description, 
        video_embed= :video_embed 
        WHERE av_id = :id"; 

    try {
        $db = getDB();
 
        $stmt = $db->prepare($sql);
        
        // bind data to be updated
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':product_id', $update->product_id);
        $stmt->bindParam(':type', $update->type);
        $stmt->bindParam(':track', $update->track, PDO::PARAM_INT);
        $stmt->bindParam(':audio_description', $update->audio_description);
        $stmt->bindParam(':audio_title', $update->audio_title);
        $stmt->bindParam(':audio_file', $update->audio_file);
        $stmt->bindParam(':video_description', $update->video_description);
        $stmt->bindParam(':video_embed', $update->video_embed);
 
        $stmt->execute();
 
        // confirm successful data entry
        $app->response->setStatus(200);
        $db = null;
    
        // for trial test in command line
        //curl -i -X PUT -H 'Content-Type: application/json' -d '{"product_id": "9999", "type": "video", "track": 2, "audio_description": null, "audio_title": null, "audio_file": null, "video_description": "This is new", "video_embed": "new_url"}' http://localhost:3000/api/update/av/105

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
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

    addUpdateRow($sql);

    // for trial test in command line
    //curl -i -X PUT -H 'Content-Type: application/json' -d '{"composition": "0990", "book": "0976", "media": "0748", "artist": 4}' http://localhost:3000/api/update/features
    //curl -i -X PUT -H 'Content-Type: application/json' -d '{"composition": "0942", "book": "0891", "media": "0829", "artist": 57}' http://localhost:3000/api/update/features
}
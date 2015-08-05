<?php

// ************** rentals service functions ****************

// return rentals
function getRentals() {
 
    $sql = "SELECT r.rental_id, r.composer, a.lname, a.fname, r.title, r.duration, r.contents
            FROM rentals r INNER JOIN artists a 
            ON r.artist_id = a.artist_id";
    getDataRows($sql);
}

// add rental
function addRental() {

    $appObj = \Slim\Slim::getInstance()->request();
    $rental = json_decode($appObj->getBody());

    $sql = "INSERT INTO rentals (rental_id, artist_id, composer, title, duration, contents) 
            VALUES ('" . $rental->rental_id . "', '" . $rental->artist_id . "', '" . 
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
        SET artist_id= '" . $update->artist_id . "', composer= '" . $update->composer . 
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
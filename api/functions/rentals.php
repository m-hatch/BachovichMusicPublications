<?php

// ************** rentals service functions ****************

// return rentals
function getRentals() {
 
    $sql = "SELECT r.rental_id, r.composer, a.lname, a.fname, r.title, r.duration, r.contents
            FROM rentals r INNER JOIN artists a 
            ON r.artist_id = a.artist_id";
    getDataRows($sql);
}
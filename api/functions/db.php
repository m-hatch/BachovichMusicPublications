<?php

// connect to db
function getDB() {
    return new PDO("mysql:host=localhost;dbname=bachovich;charset=utf8",'root','');
}
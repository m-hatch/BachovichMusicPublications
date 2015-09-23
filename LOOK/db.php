<?php

// connect to db
function getDB() {
    return new PDO("mysql:host=bmpusr.db.7499661.hostedresource.com;dbname=bmpusr;charset=utf8",'bmpusr','Unogino14!');
}
<?php

// connect to db
function getDB() {
    return new PDO("mysql:host=pdb18.awardspace.net;dbname=1637917_bmp;charset=utf8",'1637917_bmp','rebop123');
}
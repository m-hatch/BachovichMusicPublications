<?php

// ********* sheet music service functions (no sub-menu) **********

// sheet music search (return all)
function getAllMusic() {

    $sql = sheetMusicAll();
    getSheetMusicRows($sql);
}

// return sheet music detail
function getMusicDetail($id) {

    $sql = sheetMusicById($id);
    getMusicRow($sql);
}

// return trios list
function getTrios() {

    $sql = sheetMusicsType('trio');
    getSheetMusicRows($sql);
}

// return quartets list
function getQuartets() {

    $sql = sheetMusicsType('quartet');
    getSheetMusicRows($sql);
}

// return ensemble list
function getEns() {

    $sql = sheetMusicsType('ensemble');
    getSheetMusicRows($sql);
}

// return steelband list
function getSteel() {

    $sql = sheetMusicsType('steelband');
    getSheetMusicRows($sql);
}

// return orchestra list
function getOrch() {

    $sql = sheetMusicsType('orchestra');
    getSheetMusicRows($sql);
}

// return band list
function getBand() {

    $sql = sheetMusicsType('band');
    getSheetMusicRows($sql);
}

// return mixed list
function getMixed() {

    $sql = sheetMusicsType('mixed');
    getSheetMusicRows($sql);
}

// return strings list
function getStrings() {

    $sql = sheetMusicsType('strings');
    getSheetMusicRows($sql);
}

// return choral list
function getChoral() {

    $sql = sheetMusicsType('choral');
    getSheetMusicRows($sql);
}
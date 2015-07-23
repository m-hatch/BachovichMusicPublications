<?php

// ********* sheet music service functions (no sub-menu) **********

// return trios list
function getTrios() {

    $sql = sheetMusicsType('trio');
    getDataRows($sql);

}

// return quartets list
function getQuartets() {

    $sql = sheetMusicsType('quartet');
    getDataRows($sql);

}

// return ensemble list
function getEns() {

    $sql = sheetMusicsType('ensemble');
    getDataRows($sql);

}

// return steelband list
function getSteel() {

    $sql = sheetMusicsType('steelband');
    getDataRows($sql);

}

// return tape list
function getTape() {

    $sql = sheetMusicsType('tape');
    getDataRows($sql);

}

// return orchestra list
function getOrch() {

    $sql = sheetMusicsType('orchestra');
    getDataRows($sql);

}

// return band list
function getBand() {

    $sql = sheetMusicsType('band');
    getDataRows($sql);

}

// return mixed list
function getMixed() {

    $sql = sheetMusicsType('mixed');
    getDataRows($sql);

}
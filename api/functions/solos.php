<?php

// *********** solos service functions ****************

// return solo/marimba list
function getMarimbaSolos() {

    $sql = sheetMusicsSubType1('solo', 'marimba');
    getDataRows($sql);

}

// return solo/marimba-vibes list
function getMarimbaVibesSolos() {

    $sql = sheetMusicsSubType1('solo', 'marimba/vibes');
    getDataRows($sql);

}

// return solo/xylophone list
function getXyloSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'xylophone');
    getDataRows($sql);

}

// return solo/gyil list
function getGyilSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'gyil');
    getDataRows($sql);

}

// return solo/hand-drum list
function getHandDrSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'hand drum');
    getDataRows($sql);

}

// return solo/vibes list
function getVibeSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'vibes');
    getDataRows($sql);

}

// return solo/timpani list
function getTimpSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'timpani');
    getDataRows($sql);

}

// return solo/drumset list
function getDrumsetSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'drumset');
    getDataRows($sql);

}

// return solo/multi list
function getMultiSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'multi');
    getDataRows($sql);

}

// return solo/snare list
function getSnareSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'snare');
    getDataRows($sql);

}

// return solo/pan list
function getPanSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'pan');
    getDataRows($sql);

}
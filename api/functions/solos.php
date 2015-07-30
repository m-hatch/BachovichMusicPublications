<?php

// *********** solos service functions ****************

// return solo/marimba list
function getMarimbaSolos() {

    $sql = sheetMusicsSubType1('solo', 'marimba');
    getSheetMusicRows($sql);

}

// return solo/marimba-vibes list
function getMarimbaVibesSolos() {

    $sql = sheetMusicsSubType1('solo', 'marimba/vibes');
    getSheetMusicRows($sql);

}

// return solo/xylophone list
function getXyloSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'xylophone');
    getSheetMusicRows($sql);

}

// return solo/gyil list
function getGyilSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'gyil');
    getSheetMusicRows($sql);

}

// return solo/hand-drum list
function getHandDrSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'hand drum');
    getSheetMusicRows($sql);

}

// return solo/vibes list
function getVibeSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'vibes');
    getSheetMusicRows($sql);

}

// return solo/timpani list
function getTimpSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'timpani');
    getSheetMusicRows($sql);

}

// return solo/drumset list
function getDrumsetSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'drumset');
    getSheetMusicRows($sql);

}

// return solo/multi list
function getMultiSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'multi');
    getSheetMusicRows($sql);

}

// return solo/snare list
function getSnareSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'snare');
    getSheetMusicRows($sql);

}

// return solo/pan list
function getPanSolos() {
 
    $sql = sheetMusicsSubType1('solo', 'pan');
    getSheetMusicRows($sql);

}
<?php

// *********** duets service functions ****************

// return duets/snare list
function getSnareDuos() {

    $sql = sheetMusicsSubType1('duet', 'snare');
    getDataRows($sql);

}

// return duets/marimba-harp list
function getMarimbaHarp() {

    $sql = sheetMusicsSubType2('duet', 'marimba', 'harp');
    getDataRows($sql);

}

// return duets/marimba list
function getMarimbaDuos() {
 
    $sql = sheetMusicsSubType2('duet', 'marimba', 'marimba');
    getDataRows($sql);

}

// return duets/marimba-vibes list
function getMarimbaVibes() {
 
    $sql = sheetMusicsSubType2('duet', 'marimba', 'vibes');
    getDataRows($sql);

}

// return duets/marimba-strings list
function getMarimbaStr() {
 
    $sql = sheetMusicsSubType2('duet', 'marimba', 'strings');
    getDataRows($sql);

}

// return duets/marimba-guitar list
function getMarimbaGuitar() {
 
    $sql = sheetMusicsSubType2('duet', 'marimba', 'guitar');
    getDataRows($sql);

}

// return duets/marimba-voice list
function getMarimbaVoice() {
 
    $sql = sheetMusicsSubType2('duet', 'marimba', 'voice');
    getDataRows($sql);

}

// return duets/marimba-timpani list
function getMarimbaTimp() {
 
    $sql = sheetMusicsSubType2('duet', 'marimba', 'timpani');
    getDataRows($sql);

}

// return duets/marimba-perc list
function getMarimbaPerc() {
 
    $sql = sheetMusicsSubType2('duet', 'marimba', 'perc');
    getDataRows($sql);

}

// return duets/marimba-woodwinds
function getMarimbaWw() {
 
    $sql = sheetMusicsSubType2('duet', 'marimba', 'woodwinds');
    getDataRows($sql);

}

// return solo/pan list
function getTimp() {
 
    $sql = sheetMusicsSubType1('solo', 'pan');
    getDataRows($sql);

}
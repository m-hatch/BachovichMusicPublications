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

// return duets/timpani list
function getTimpDuos() {
 
    $sql = sheetMusicsSubType2('duet', 'timpani', 'timpani');
    getDataRows($sql);

}

// return duets/timpani-piano list
function getTimpPno() {
 
    $sql = sheetMusicsSubType2('duet', 'timpani', 'piano');
    getDataRows($sql);

}

// return duets/timpani-woodwinds list
function getTimpWw() {
 
    $sql = sheetMusicsSubType2('duet', 'timpani', 'woodwinds');
    getDataRows($sql);

}

// return duets/timpani-perc list
function getTimpPerc() {
 
    $sql = sheetMusicsSubType2('duet', 'timpani', 'perc');
    getDataRows($sql);

}

// return duets/vibes-piano list
function getVibePno() {
 
    $sql = sheetMusicsSubType2('duet', 'vibes', 'piano');
    getDataRows($sql);

}

// return duets/vibes-strings list
function getVibeStr() {
 
    $sql = sheetMusicsSubType2('duet', 'vibes', 'strings');
    getDataRows($sql);

}

// return duets/multi list
function getMultiDuos() {
 
    $sql = sheetMusicsSubType2('duet', 'multi', 'perc');
    getDataRows($sql);

}

// return duets/multi-voice list
function getMultiVox() {
 
    $sql = sheetMusicsSubType2('duet', 'multi', 'voice');
    getDataRows($sql);

}

// return duets/multi-woodwinds list
function getMultiWw() {
 
    $sql = sheetMusicsSubType2('duet', 'multi', 'woodwinds');
    getDataRows($sql);

}
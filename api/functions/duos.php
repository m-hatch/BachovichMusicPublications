<?php

// *********** duets service functions ****************

// return duets/snare list
function getSnareDuos() {

    $sql = sheetMusicsSubType1('duet', 'snare');
    getSheetMusicRows($sql);

}

// return duets/marimba-harp list
function getMarimbaHarp() {

    $sql = sheetMusicsSubType2('duet', 'marimba', 'harp');
    getSheetMusicRows($sql);

}

// return duets/marimba list
function getMarimbaDuos() {
 
    $sql = sheetMusicsSubType2('duet', 'marimba', 'marimba');
    getSheetMusicRows($sql);

}

// return duets/marimba-vibes list
function getMarimbaVibes() {
 
    $sql = sheetMusicsSubType2('duet', 'marimba', 'vibes');
    getSheetMusicRows($sql);

}

// return duets/marimba-strings list
function getMarimbaStr() {
 
    $sql = sheetMusicsSubType2('duet', 'marimba', 'strings');
    getSheetMusicRows($sql);

}

// return duets/marimba-guitar list
function getMarimbaGuitar() {
 
    $sql = sheetMusicsSubType2('duet', 'marimba', 'guitar');
    getSheetMusicRows($sql);

}

// return duets/marimba-voice list
function getMarimbaVoice() {
 
    $sql = sheetMusicsSubType2('duet', 'marimba', 'voice');
    getSheetMusicRows($sql);

}

// return duets/marimba-timpani list
function getMarimbaTimp() {
 
    $sql = sheetMusicsSubType2('duet', 'marimba', 'timpani');
    getSheetMusicRows($sql);

}

// return duets/marimba-perc list
function getMarimbaPerc() {
 
    $sql = sheetMusicsSubType2('duet', 'marimba', 'perc');
    getSheetMusicRows($sql);

}

// return duets/marimba-woodwinds
function getMarimbaWw() {
 
    $sql = sheetMusicsSubType2('duet', 'marimba', 'woodwinds');
    getSheetMusicRows($sql);

}

// return duets/timpani list
function getTimpDuos() {
 
    $sql = sheetMusicsSubType2('duet', 'timpani', 'timpani');
    getSheetMusicRows($sql);

}

// return duets/timpani-piano list
function getTimpPno() {
 
    $sql = sheetMusicsSubType2('duet', 'timpani', 'piano');
    getSheetMusicRows($sql);

}

// return duets/timpani-woodwinds list
function getTimpWw() {
 
    $sql = sheetMusicsSubType2('duet', 'timpani', 'woodwinds');
    getSheetMusicRows($sql);

}

// return duets/timpani-perc list
function getTimpPerc() {
 
    $sql = sheetMusicsSubType2('duet', 'timpani', 'perc');
    getSheetMusicRows($sql);

}

// return duets/vibes-piano list
function getVibePno() {
 
    $sql = sheetMusicsSubType2('duet', 'vibes', 'piano');
    getSheetMusicRows($sql);

}

// return duets/vibes-strings list
function getVibeStr() {
 
    $sql = sheetMusicsSubType2('duet', 'vibes', 'strings');
    getSheetMusicRows($sql);

}

// return duets/multi list
function getMultiDuos() {
 
    $sql = sheetMusicsSubType2('duet', 'multi', 'perc');
    getSheetMusicRows($sql);

}

// return duets/multi-strings list
function getMultiStr() {
 
    $sql = sheetMusicsSubType2('duet', 'multi', 'strings');
    getSheetMusicRows($sql);

}

// return duets/multi-voice list
function getMultiVox() {
 
    $sql = sheetMusicsSubType2('duet', 'multi', 'voice');
    getSheetMusicRows($sql);

}

// return duets/multi-woodwinds list
function getMultiWw() {
 
    $sql = sheetMusicsSubType2('duet', 'multi', 'woodwinds');
    getSheetMusicRows($sql);

}

// return duets/drumset-brass list
function getDsBrass() {
 
    $sql = sheetMusicsSubType2('duet', 'drumset', 'brass');
    getSheetMusicRows($sql);

}

// return duets/drumset-voice list
function getDsVoice() {
 
    $sql = sheetMusicsSubType2('duet', 'drumset', 'voice');
    getSheetMusicRows($sql);

}

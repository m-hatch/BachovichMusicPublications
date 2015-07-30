<?php

// *********** books service functions ****************

// return books/mallets list
function getMalletBooks() {

    $sql = sheetMusicsSubType1('book', 'mallets');
    getSheetMusicRows($sql);

}

// return books/snare list
function getSnareBooks() {

    $sql = sheetMusicsSubType1('book', 'snare');
    getSheetMusicRows($sql);

}

// return books/timpani list
function getTimpBooks() {

    $sql = sheetMusicsSubType1('book', 'timpani');
    getSheetMusicRows($sql);

}

// return books/world list
function getWorldBooks() {

    $sql = sheetMusicsSubType1('book', 'world');
    getSheetMusicRows($sql);

}

// return books/general list
function getGeneralBooks() {

    $sql = sheetMusicsSubType1('book', 'general');
    getSheetMusicRows($sql);

}
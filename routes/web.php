<?php

Route::get('/client/{id}', function( $id){
    echo 'oi' . $id;
});
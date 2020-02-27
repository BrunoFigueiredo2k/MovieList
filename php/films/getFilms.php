<?php
    // Script that gets the newest file from IMDB

    // Function that unzips it

    // Function that reads the text file and parses it

    // Function that puts all films in a json file or in a database

    
    $searchTerm = $_GET['search'];
    $request = "http://www.omdbapi.com/?apikey=d9ea300e&s=" + $searchTerm;
    $data = $_GET($request);

    // Decode the json file to an array
    $moviesArray = json_decode($data);
    var_dump($moviesArray);
?>
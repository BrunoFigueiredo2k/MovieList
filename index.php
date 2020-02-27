<?php
    // HOW IT WORKS:
    // - A session is started
    // - The page calls a script that checks if the session id is present in the database
    // - If the session id is present the user is allowed to enter the site
    // - If the session id is not present the user is redirected to the login page

    // Include the file that contains the script
    include_once 'php/authentification/checkSessionID.php';

    // Start a session
    session_start();

    // If the session id is not present direct the user to the login page
    if (!checkIfSessionIDisPresent(session_id())) {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" href="stylesheet.css">

<html>
    <head>
        <title>Log in page</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            // Function that gets the username to display
            function getUsername() {
                $.post('php/authentification/getUsername.php', {}, function(username){
                    // Write the response message in the value
                    document.getElementById("displayname").innerHTML = username;
                });
            }

            // Function that logs the user out
            function logOut() {
                $.post('php/authentification/logOut.php', {}, function(){
                    window.location.href = "login.php";
                });
            }

            // Function that gets the movies from Omdb
            function getMovies() {
                //var search = $('#searchterm').val();
                
                $.getJSON('http://www.omdbapi.com/?apikey=d9ea300e&s="christmas', function(data) {
                    console.log(data.Search[0].title);
                });
            }
        </script>
    </head>

    <body>
        <div class="welcome message">
            <td><p id="displayname">NULL</p><td>
        </div>

        <td>Searchterm: <input type="textbox" class="textbox" id="searchterm" name="searchterm" size="16" autocomplete="off"></td><br>

        <button onclick="logOut()">Log out</button>
        <button onclick="getMovies()">Get movies</button>
    </body>

    <script>
        window.onload = getUsername();
    </script>
</html>
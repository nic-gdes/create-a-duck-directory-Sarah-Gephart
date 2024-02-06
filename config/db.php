<?php

/******** CONNECT TO A DATABASE *********/
// use mysqli_connect to connect to database. There are four arguments: host, username, password, and database name, in that order.

$conn = mysqli_connect("db:3306", "db", "db", "db");

// check if there's no connection and give an error if so

if (mysqli_connect_errno()) {
    echo "Connection error: " . mysqli_connect_error();
    exit();
}

/******** EXECUTE QUERIES ON THE DATABASE TO RETRIEVE DATA *********/
// write query for all ducks ( SELECT name, favorite_foods, imgsrc FROM ducks )

$sql = "SELECT name,favorite_foods,img_source FROM ducks";

// make query and get result

$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array

$ducks = mysqli_fetch_all($result, MYSQLI_ASSOC);

/******** WRAP UP DATABASE CONNECTION *********/
// free the result from memory

mysqli_free_result($result);

// close the connection to the database

mysqli_close($conn);

// print_r($ducks);

// foreach($ducks as $duck) {
//     echo $duck['favorite_foods'];
// }

?>
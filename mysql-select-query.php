<?php
require_once('strings.php');
$link = mysqli_connect(DB_HOST, DB_USER,
    DB_PASSWORD, DB_BASE);

// Check connection
if($link === false){
    die(ERROR . mysqli_connect_error());
}

// Attempt select query execution
$sql = "SELECT * FROM persons";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table border='1'>";
            echo "<tr>";
                echo "<th>person_id</th>";
                echo "<th>first_name</th>";
                echo "<th>last_name</th>";
                echo "<th>email_address</th>";
            echo "</tr>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<td>" . $row['person_id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['email_address'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo MATCHING;
    }
} else{
    echo ERROR.$sql.mysqli_error($link);
}
 // open git
 //coment1
 //coment2
// Close connection
mysqli_close($link);
?>
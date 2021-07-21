<!--Coded by Shan He-->

<?php

// Username is root
$user = 'root';
$password = ''; 
  
// Database name is gfg
$database = 'capstone'; 
  
// Server is localhost with
// port number 3306
$servername='localhost:3306';

$connection = new mysqli($servername,$user, 
$password, $database);

// Checking for connections

if ($connection->connect_error) {
    die('Connect Error (' . 
    $connection->connect_errno . ') '. 
    $connection->connect_error);
}
// else {
//     echo "Success" . $connection->error;
// }
  
// SQL query to select data from database
$sql = "SELECT * FROM full_cycle_2020";
$result = $connection->query($sql);
$connection->close(); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        table {
            margin: 0 auto;
            font-size: large;
        }
  
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            background-color: #E4F5D4;
        }
  
        th,
        td {
            font-weight: bold;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
    </style>
</head>

<body>
    <section id="page">
        <header>
            <hgroup>
                <h1>Product Details</h1>
            </hgroup>
        </header>
        <table>

        </table>    

        <footer>
            <!-- Marking the footer section -->

            <div class="line"></div>

            <p>Copyright &copy; 2021 - </p>

        </footer>
    </section>
</body>

</html>

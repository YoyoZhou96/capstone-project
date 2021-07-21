<!--Coded by Shan He, Yao Zhou-->

<?php

//Line 6-22 coded by Shan
$user = 'root';
$password = ''; 
$database = 'capstone'; 
  
$servername='localhost:3306';

$connection = new mysqli($servername,$user, 
$password, $database);


// Checking for connections

if ($connection->connect_error) {
    die('Connect Error (' . 
    $connection->connect_errno . ') '. 
    $connection->connect_error);
}
  
// SQL query to select data from database
//Line 26-69 coded by Yao
$year = "";
$type = "";
$sub_type = "";
$front_suspension = "";
$rear_suspension = "";
$electric = "";
$frame = "";
$size = "";
//$sizeInInches = "";
$price = "";

if (isset($_GET["year"])) {
    $year = $_GET["year"];
}
if (isset($_GET["type"])) {
    $type = $_GET["type"];
}
if (isset($_GET["subtype"])) {
    $sub_type = implode(" ", $_GET["subtype"]);
}
if (isset($_GET["electric"])){
    $electric = $_GET["electric"];
}
if (isset($_GET["frame"])) {
    $frame = $_GET["frame"];
}
if (isset($_GET["size"])) {
    $size = $_GET["size"];
}
//if (isset($_GET["sizeInInches"])) {
 //   $sizeInInches = $_GET["sizeInInches"];
//}
if (isset($_GET["front_suspension"])){
    $front_suspension = $_GET["front_suspension"];
}
if (isset($_GET["rear_suspension"])){
    $rear_suspension = $_GET["rear_suspension"];
}
if (isset($_GET["price"])) {
    $price = $_GET["price"];
}

$sql = "SELECT year, type, sub_type, electric, frame_rear_shock, sizes, front_suspension, rear_suspension, price FROM full_cycle_2020 
WHERE year = $year AND type = '$type' AND sub_type = '$sub_type' AND electric = '$electric' AND frame_rear_shock like '%$frame%' AND sizes like '%$size%' AND front_suspension = '$front_suspension' AND rear_suspension = '$rear_suspension' HAVING price <= '$price'";

//echo $sql;

$result = $connection->query($sql);
$connection->close(); 
?>

<!-- Line 77-203 Coded by Shan, Modified by Yao -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
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

        #error {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
        #compare {
            border:none;
            font-size: 25px;
            font-weight: bold;
            background-color: #E4F5D4;
            text-align: center;
        }
        #compare:hover {
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <section id="page">
        <header>
            <hgroup>
                <h1>Search Results</h1>
            </hgroup>
        </header>
        <table>
            <tr>
                <th>Type</th>
                <th>Year</th>
                <th>Subtype</th>
                <th>Electric</th>
                <th>Frame</th>
                <th>Size</th>
                <th>Front Suspension</th>
                <th>Rear Suspension</th>
                <th>Price</th>
                <th>More Details</th>
                <th><?php echo 
                "<form action='compare.php' method='POST'>
                <input type='submit' id='compare' value='Compare Results'/> 
                </form>";?></th>
            </tr>
            <?php
                if ($result->num_rows != 0) {
                    while($rows=$result->fetch_assoc()) {
            ?>
            <tr >
                <td><?php echo $rows['type'];?></td>
                <td><?php echo $rows['year'];?></td>
                <td><?php echo $rows['sub_type'];?></td>
                <td><?php echo $rows['electric'];?></td>
                <td><?php echo $rows['frame_rear_shock'];?></td>
                <td><?php echo $rows['sizes'];?></td>
                <td><?php echo $rows['front_suspension'];?></td>
                <td><?php echo $rows['rear_suspension'];?></td>
                <td><?php echo $rows['price'];?></td>
                <td><?php echo 
                "<form action='showDetails.php' method='POST'>
                <input type='submit' id='showDetails' value='showDetails'/> 
                </form>";?></td>
                <td><input type="checkbox" name="compare" id="compare"></td>
            </tr>
            <?php
                    }
                }
             ?>
        </table> 

        <!-- Line 148-155 Coded by Yao-->
        <div id="error">
        <?php
        // No results found in data
        if ($result->num_rows === 0) {
            echo "Sorry! No records found.";            
        }
        ?>
        </div>

        <footer>

            <div class="line"></div>
            <p>Copyright &copy; 2021 - </p>

        </footer>
    </section>
</body>

</html>

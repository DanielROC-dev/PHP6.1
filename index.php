<?php
$host = 'localhost';
$username = 'root';
$password ='';
$db = 'school';
$port = '3306';
$message = "";

try {
    $database = new PDO('mysql:host='.$host.';dbname='.$db.';port='.$port, $username, $password);
    $result =$database->prepare('SELECT * from cursist');
    $result->execute();
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html> 
<head>
    <title>PHP 6.1</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-spacing: 0;
        }
    </style>
</head>
<body>
    <table>
    <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            foreach($row as $cell){ echo '<td>'.$cell.'</td>'; }
            echo '</tr>';
        }
    ?>
    </table>
</body>
</html>

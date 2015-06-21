<?php include('header.php');
error_reporting(E_ERROR | E_PARSE);
require('connect.php');


$file = $_POST['file'];
$instrument = $_POST['instrument'];
$comments = $_POST['comments'];
$genre1 = $_POST['genre1'];
$genre2 = $_POST['genre2'];
$tags = $_POST['tags'];


?>

<?php
//create new entry
$sql= "INSERT INTO hum (file, instrument, comments, genre1, genre2, tags)
VALUES ('$file', '$instrument', '$comments', '$genre1', '$genre2', '$tags')";



mysql_query($sql) or die(mysql_error()); 

header('Location: post_complete.php');

?>

</body>

</html>
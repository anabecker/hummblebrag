<?php include('header.php');
error_reporting(E_ERROR | E_PARSE);
require('connect.php');


$hum_id = $_POST['file'];
$artist = $_POST['artist'];
$song = $_POST['song'];


?>

<?php
//create new entry
$sql= "INSERT INTO guesses (hum_id, artist, song)
VALUES ('$hum_id', '$artist', '$song')";



mysql_query($sql) or die(mysql_error()); 

header('Location: game.php');

?>

</body>

</html>
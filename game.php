<?php include('header.php');
error_reporting(E_ERROR | E_PARSE);
require('connect.php');



?>

<?php
//create new entry
$sql= "SELECT * FROM hum ORDER BY RAND() LIMIT 1";


$query = mysql_query($sql);

$file;

while($result = mysql_fetch_array($query)){
$file = $result['file'];
}

?>

Play the game!

Listen to the recording below to guess what the song is. Earn cred for correct guesses.
<br>
<audio controls>
  <source src="uploads/<?php echo $file ?>.wav" type="audio/wav">
Your browser does not support the audio element.
</audio>

<br>

<form id="post_song" action="game_process.php" method="POST">

Artist
<input type="text" name="artist">
<br>
Song
<input type="text" name="song">

<input type="hidden" name="file" value="<?php echo $file; ?>">
<br>
<input type="submit" value="Do it!">  <div id="next" class="btn btn-large btn-success">Next</div>

<script>
var next = document.getElementById('next');
next.onclick = function() {
            window.location = 'game.php';

        }
</script>
<br>
<br>

<?php
//create new entry
$sql= "SELECT * FROM guesses WHERE hum_id='$file'";


$query = mysql_query($sql);

$guess = 0;

while($result = mysql_fetch_array($query)){
$guess += 1;

echo '<h3>Guess #' . $guess . '</h3>';
echo 'Artist: ' . $result['artist'];
echo '<br>';
echo 'Result: ' . $result['song'];
}

?>


</body>

</html>


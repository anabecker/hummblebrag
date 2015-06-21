<div class="shadowbox">
	<div class="whitepart">
    <h2>You were right!</h2>
    <h3>you get CRED!</h3>
    <div class="cred">+5 CRED</div>

   <div id="close">close</div>
   </div>
</div>
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



<h3>Play the game!

Listen to the recording below to guess what the song is. Earn cred for correct guesses.</h3>
<div class="col-xs-12 col-sm-6">
<br>
<audio controls>
  <source src="uploads/<?php echo $file ?>.wav" type="audio/wav">
Your browser does not support the audio element.
</audio>
<br>
<br>

<form id="post_song" action="game_process.php" method="POST">

Artist
<input type="text" name="artist">
<br>
Song
<input type="text" name="song">
<br>
<input type="hidden" name="file" value="<?php echo $file; ?>">
<br>
<input type="submit" class="btn btn-primary btn-white" value="Do it!">  <div id="next" class="btn btn-large btn-success ">  Next clip <span class="glyphicon glyphicon-chevron-right"></span></div>

<script>
$('.shadowbox').hide();
var next = document.getElementById('next');
$('#close').click(function(){
	$('.shadowbox').hide();
})
next.onclick = function() {
            window.location = 'game.php';

        }

        var correct = location.hash;
        console.log(correct);
        if(correct == "#correct=yes"){
        	$('.shadowbox').show();
        }

</script>
<br>
<br>
</div>
<div class="col-xs-12 col-sm-6">
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
</div>

</body>

</html>


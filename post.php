<?php include('header.php');

error_reporting(E_ERROR | E_PARSE);

?>


<?php $file = $_GET['file']; ?>

<form id="post_song" action="post_process.php" method="POST">

Instrument
<input type="text" name="instrument">
<br>
Comments
<input type="text" name="comments">
<br>
Genre
<input type="text" name="genre1">&nbsp;<input type="text" name="genre2">
<br>
Tags
<input type="text" name="tags">

<input type="hidden" name="file" value="<?php echo $file; ?>">
<br>
<input type="submit" value="Do it!">

</form></a>
</body>

</html>
<?php include('header.php') ?>

      <div class="jumbotron">
        <h1>HUMMBLEBRAG</h1>
        <p class="lead">Let the internet help you find any song ever, or show the world that you are John Cusack in High Fidelity. Such cred. Much expert. Wow.</p>
        <div class="btn btn-large btn-success" id=""><a href="recorder.php">Record a Hum</a></div>
        <div class="btn btn-large btn-success" id="go"><a href="game.php">Play the Game</a></div>
      </div>

      <hr>

      <!-- <div class="row marketing">
        <div class="col-xs-6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Subheading</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>

        <div class="col-xs-6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Subheading</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>
      </div> -->

      <hr>

      <div class="footer">
        <p>© Ana and Shaw 2015</p>
      </div>

    </div>

		
	</body>
<!--		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/script.js"></script> ->
</html> -->


    <?php  
      $artist = 'Starlight Girls';
      $name = 'Gossip';
    ?>

<script>

  var artist = <?php echo json_encode($artist); ?>;
  var name = <?php echo json_encode($name); ?>;

  var href = "https://api.spotify.com/v1/search?query=artist:"+artist+"&name="+name+"&type=track"

  // $(document).ready(function(){

  // });
</script>


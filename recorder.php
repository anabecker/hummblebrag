<?php include('header.php') ?>

            <div class="container" id="experiment">

                        <h2>When you’re ready to hum / sing / doobedoo, hit <span>RECORD</span></h2>
                        
                                                        <br>
                                                        <div id="container2"></div>
                                    <div id="record" class="btn btn-large btn-success recorder"><span class="glyphicon glyphicon-play"></span> Record</div>
                                    <div id="stop" disabled class="btn btn-large btn-warning hiding"><span class="glyphicon glyphicon-stop"></span> Stop</div>
                                    <div id="delete" class="btn btn-large btn-warning btn-brown hiding"><span class="glyphicon glyphicon-repeat"></span> Do-over</div>
                                     <div id="next" class="btn btn-large btn-success hiding">Next Step <span class="glyphicon glyphicon-arrow-right"></span></div>
                                                                    <audio id="preview" controls></audio>
                        
                                    <div id="container"></div>
            </div>




        <script>
        // PostBlob method uses XHR2 and FormData to submit 
        // recorded blob to the PHP server
       
        </script>

</body>

</html>
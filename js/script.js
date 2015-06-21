
var App_obj = {
	chart : "",
	options : {
		colors : ['#569d59','#555'],
        chart: {
            renderTo: 'container2',
            type: 'pie',
            backgroundColor : '#f0f0f0'
        },
        title: {
            text: ''
        },
          credits: {
			        enabled: false
			    },

        plotOptions: {
            pie: {
                size: 300,
                style : {
                	color:['#569d59','#555']
                },
                dataLabels: {
            enabled: false
		      },
		      series: {
                states: {
                    hover: {
                        enabled: false
                    }
                }
            }
          }
            
        },
		              tooltip: {
            enabled: false
        },
        series: [{
            data: [0,30]
        }]
    },
  piecounter : 30,
  thirtysec : "",
	init : function(){
		App_obj.drawChart();
		App_obj.bind_events()		  
	},
	bind_events : function(){
		$('.hiding').hide();
		$('#go').on('click', function(){
			get_spotify_url();
		});
		$('#record').on('click',function(){
			console.log('you clicked me');
			$(this).fadeOut(500);
			$('#stop').fadeIn(500);
		});
		$('#stop').click(function(){
			$(this).hide();
			$('#delete').fadeIn(500);
			$('#next').fadeIn(500);
		})
	},
	get_spotify_url : function(){

      $.getJSON(href, function(data){

        console.log(data);

        var url = data.tracks.items[0].external_urls.spotify;

        console.log( url );

      });
	},
	drawChart : function(){	    
    App_obj.chart = new Highcharts.Chart(App_obj.options);
	},
	chartcountdown : function(){    
		App_obj.thirtysec = window.setInterval(App_obj.pieCountdown, 1000);
		},        
  pieCountdown : function(count){
        
       console.log(App_obj.piecounter);
        var piecounter = App_obj.piecounter
       	var other = 30-piecounter;

        App_obj.chart.series[0].setData( [other, piecounter]);
    
      if(piecounter === 0){
        App_obj.stopinterval();
    	}
      App_obj.piecounter--;
    },
    
    stopinterval: function(){
        window.clearInterval(App_obj.thirtysec);

		}
	}

$(document).ready(function(){
	App_obj.init();

 function PostBlob(blob, fileType, fileName) {
            // FormData
            var formData = new FormData();
            formData.append(fileType + '-filename', fileName);
            formData.append(fileType + '-blob', blob);

            // progress-bar
            var strong = document.createElement('strong');
            strong.id = 'percentage';
            strong.innerHTML = fileType + ' upload progress: ';
            container.appendChild(strong);
            var progress = document.createElement('progress');
            container.appendChild(progress);

            // POST the Blob using XHR2
            xhr('save.php', formData, progress, percentage, function(fileURL) {
                var mediaElement = document.createElement(fileType);

                var source = document.createElement('source');
                var href = location.href.substr(0, location.href.lastIndexOf('/') + 1);
                source.src = href + fileURL;

              source.type = !!navigator.mozGetUserMedia ? 'audio/ogg' : 'audio/wav';

                mediaElement.appendChild(source);

                mediaElement.controls = true;
                container.appendChild(mediaElement);
                mediaElement.play();

                progress.parentNode.removeChild(progress);
                strong.parentNode.removeChild(strong);
            });
        }

        var record = document.getElementById('record');
        var stop = document.getElementById('stop');
        var deleteFiles = document.getElementById('delete');
        var next = document.getElementById('next');

        var audio = document.querySelector('audio');

        var recordVideo = document.getElementById('record-video');
        var preview = document.getElementById('preview');

        var container = document.getElementById('container');

        // if you want to record only audio on chrome
        // then simply set "isFirefox=true"
        var isFirefox = false;

        var recordAudio, recordVideo;
        record.onclick = function() {
            record.disabled = true;
            navigator.getUserMedia({
                audio: true,
                video: true
            }, function(stream) {
                preview.src = window.URL.createObjectURL(stream);
                preview.play();

                // var legalBufferValues = [256, 512, 1024, 2048, 4096, 8192, 16384];
                // sample-rates in at least the range 22050 to 96000.
                recordAudio = RecordRTC(stream, {
                    //bufferSize: 16384,
                    //sampleRate: 45000,
                    onAudioProcessStarted: function() {
                        if (!isFirefox) {
                            recordVideo.startRecording();
                            			console.log('you clicked me');
											App_obj.chartcountdown();
                        }
                    }
                });

                if (isFirefox) {
                    recordAudio.startRecording();
                }

                if (!isFirefox) {
                    recordVideo = RecordRTC(stream, {
                        type: 'video'
                    });
                    recordAudio.startRecording();
                }

                stop.disabled = false;
            }, function(error) {
                alert(JSON.stringify(error, null, '\t'));
            });
        };

        var fileName;
        stop.onclick = function() {
            record.disabled = false;
            stop.disabled = true;

            preview.src = '';

            fileName = Math.round(Math.random() * 99999999) + 99999999;


                recordAudio.stopRecording(function() {
                	App_obj.stopinterval();
                    PostBlob(recordAudio.getBlob(), 'audio', fileName + '.wav');
                });

            deleteFiles.disabled = false;
        };

        next.onclick = function() {
            var nextStepURL = ('post.php?file=' + fileName)
            window.location = nextStepURL;

        }

        deleteFiles.onclick = function() {
            deleteAudioVideoFiles();
        };

        function deleteAudioVideoFiles() {
            deleteFiles.disabled = true;
            if (!fileName) return;
            var formData = new FormData();
            formData.append('delete-file', fileName);
            xhr('delete.php', formData, null, null, function(response) {
                console.log(response);
            });
            fileName = null;
            container.innerHTML = '';
        }

        function xhr(url, data, progress, percentage, callback) {
            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    callback(request.responseText);
                }
            };

            if (url.indexOf('delete.php') == -1) {
                request.upload.onloadstart = function() {
                    percentage.innerHTML = 'Upload started...';
                };

                request.upload.onprogress = function(event) {
                    progress.max = event.total;
                    progress.value = event.loaded;
                    percentage.innerHTML = 'Upload Progress ' + Math.round(event.loaded / event.total * 100) + "%";
                };

                request.upload.onload = function() {
                    percentage.innerHTML = 'Saved!';
                };
            }

            request.open('POST', url);
            request.send(data);
        }

        window.onbeforeunload = function() {
            if (!!fileName) {
                // deleteAudioVideoFiles();
                // return 'It seems that you\'ve not deleted audio/video files from the server.';
            }
        };


});


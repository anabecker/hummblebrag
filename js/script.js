
var App_obj = {
	options : {
        chart: {
            renderTo: 'container',
            type: 'pie'
        },
        title: {
            text: 'counter'
        },
        plotOptions: {
            pie: {
                size: 300
            }
        },

        series: [{
            data: [0,30]
        }]
    },
  piecounter : 30,
	init : function(){
		  
	},
	bind_events : function(){
		$('#go').on('click', function(){
			get_spotify_url();
		});
	},
	get_spotify_url : function(){

      $.getJSON(href, function(data){

        console.log(data);

        var url = data.tracks.items[0].external_urls.spotify;

        console.log( url );

      });
	},
	chartcountdown : function(){    
		var thirtysec = window.setInterval(App_obj.pieCountdown, 1000);
		},        
    pieCountdown : function(count){
        
       console.log(App_obj.piecounter);
        var piecounter = App_obj.piecounter
       	var other = 30-piecounter;

        chart.series[0].setData( [other, piecounter]);
    
      if(piecounter === 0){
        App_obj.stopinterval();
    	}
      App_obj.piecounter--;
    },
    
    stopinterval: function(){
        window.clearInterval(thirtysec);
    }
    
    var chart = new Highcharts.Chart(App_obj.options);
		});

	}
}

$(document).ready(function(){
	App_obj.init();



})


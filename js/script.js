
var App_obj = {
	thing : 'thing',
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
	}
}

$(document).ready(function(){
	App_obj.init();
})
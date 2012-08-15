$(function(){

  $("button").not(".command").click(function(){
    $("button").not(".command").removeClass("sel");
    $(this).addClass("sel");
  });

  //debug functions
  $(document).bind("YTPStart", function(){
    $("#song_quality").html($('#bgndVideo').get(0).getPlaybackQuality());
    $("#song_title").html($('#bgndVideo').get(0).getVideoUrl());
     /*$("#eventListener").html("YTPStart")*/
   });
  $(document).bind("YTPEnd", function(){ /*$("#eventListener").html("YTPStop")*/});
  $(document).bind("YTPPause", function(){ /*$("#eventListener").html("YTPPause")*/});
  $(document).bind("YTPBuffering", function(){ /*$("#eventListener").html("YTPBuffering")*/});

  $("#bgndVideo").mb_YTPlayer();

  $("#cmd_search_yt").click(function(event) {
    event.preventDefault();
    var searchstring = $('#txt_search_yt').val();
    $.getJSON('https://gdata.youtube.com/feeds/api/videos?q='+searchstring+'&orderby=relevance&max-results=10&v=2&alt=jsonc&callback=?', function(data) {
      console.log(data);
      $('#box_search_yt').html("");
      $.each(data.data.items, function(i, item) {
        
        var title = item['title'];
        var videoid = item['id'];
        var a = "<button  onclick=\"$('#bgndVideo').changeMovie('http://www.youtube.com/watch?v="+videoid+"')\"> "+title+"</button>";
        $('#box_search_yt').append(a);
      });
 });
    alert("Handler for .click() called.");
  });

});


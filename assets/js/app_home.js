
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

    });

<div id="content" class="container">
  <h1>I Love These Songs: here your videos :)</h1>
  <div class="console">

    <!--
    <button class="command" onclick="$('#bgndVideo').get(0).playVideo()"><img src='assets/images/play.png'></button>    
    <button class="command" onclick="$('#bgndVideo').get(0).pauseVideo()"><img src='assets/images/pause.png'></button>
    <button class="command" onclick="$('#bgndVideo').setYTPVolume(100)"><img src='assets/images/unmute.png'></button>
    <button class="command" onclick="$('#bgndVideo').setYTPVolume(0)"><img src='assets/images/mute.png'></button>
  -->
    <!--
    <button class="command" onclick="alert($('#bgndVideo').get(0).getPlaybackQuality())"> quality </button>

    <br>
    <br>
    <span style="font-size: 18px;">events: </span><span id="eventListener" style="font-size: 18px;">(trace player events)</span>
    <br>
    <br>
  -->

    <?php 
    $i= 0;
    $videoid_default = "8CtjhWhw2I8";
    $title_default = "The Outer Limits Intro";
    $class_default = "";
    foreach ($videos->result() as $row):
      $i++;
      if ($i ==1) {
        $videoid_default = $row->videoid;
        $title_default = $row->title;
        $class_default = 'class="sel" ';
      } else {
        $class_default = '';
      }
      ?>
      <button <?php echo $class_default ?> onclick="$('#bgndVideo').changeMovie('http://www.youtube.com/watch?v=<?php echo $row->videoid?>')"> <?php echo $row->title?></button>
    <?php endforeach; ?>
  </div>
  
  <a id="bgndVideo" href="http://www.youtube.com/watch?v=<?php echo $videoid_default?>" class="movie {opacity:.8, isBgndMovie:{width:'window',mute:false}, optimizeDisplay:true, showControls:true, ratio:'4/3', loop: true, quality:'large',addRaster:true, lightCrop:true}"><?php echo $title_default?></a>

  
</div>

<div class="dida"></div>
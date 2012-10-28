<div class="row">
  <div class="four columns offset-by-eight">
    <a id="close_dashboard" href="#">Click to hide me too</a>
    <script>
    $("#close_dashboard").click(function ( event ) {
      console.log("close_dashboard");
      event.preventDefault();
      hide_dashboard();
    });
    </script>
  </div>
</div>
<div class="row" >  
  <div class="twelve columns">
<dl class="tabs">
  <dd class="active"><a href="#tabVideos">Videos</a></dd>
  <dd><a href="#tabSearch">Founded on youtube</a></dd>
  <dd class="hide-for-small"><a href="#simple3">Simple Tab 3</a></dd>
</dl>
<ul class="tabs-content">
  <li class="active" id="tabVideosTab">
    <div class="console">
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
      <button <?php echo $class_default ?> onclick="loadVideo('<?php echo $row->videoid?>')"> <?php echo $row->title?></button>
      
      <?php
      $array= json_decode($row->json_hashtag);
      foreach ($array as $key => $value):
        echo "<span class='badge'>$value</span>";
      endforeach;
      ?>
      
    <?php endforeach; ?>
    </div>
  </li>
  <li  id="tabSearchTab">
    <div id="box_search_yt"></div>
  </li>

    
  </div>
  

  
  
</div>
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

  <div id="box_search_yt"></div>
  <div id="video_root" data-value="<?php echo $videoid_default?>"></div> 

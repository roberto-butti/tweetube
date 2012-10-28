<body>

  <!-- Navbar ================================================== -->
  <nav class="top-bar fixed">
    <ul>
      <li class="name"><h1><a href="#">ILTS</a></h1></li>
      <li class="toggle-topbar"><a href="#"></a></li>
    </ul>
    <section>

      <ul class="left">
        <li class="has-dropdown">
          <a href="#">Hashtag</a>

          <ul class="dropdown">
            <?php foreach ($hashtags->result() as $row): ?>
            <li><a href="<?php echo base_url("hashtag/".$row->hashtag);?>"><?php echo $row->hashtag; ?> (<?php echo $row->quanti; ?>)</a></li>
            <?php endforeach; ?>
          </ul>
        </li>
      </ul>

      <ul class="right">
        
        <li class="search">
            <form id="form_search_yt">  
            <input id="txt_search_yt" type="search"  placeholder="Search video">

            </form>
        </li>
        <li class="has-button">
          <button id="cmd_search_yt" type="button" class="radius small button">Search</button>
          
          
        </li>
        
        <li>
          <button class="command" onclick="playVideo()"> <img src='<?php echo base_url("assets/images/play.png");?>'>
          </button>    
          <button class="command" onclick="pauseVideo()">
            <img src='<?php echo base_url("assets/images/pause.png");?>'>
          </button>
          <button class="command" onclick="unmutevideo()">
            <img src='<?php echo base_url("assets/images/unmute.png");?>'>
          </button>
          <button class="command" onclick="muteVideo()">
            <img src='<?php echo base_url("assets/images/mute.png");?>'>
          </button>
        </li>
      </ul>
    </section>
  </nav><br><br>


<body data-spy="scroll" data-target=".subnav" data-offset="50">
  <!-- Navbar ================================================== -->
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container-fluid">
        <button type="button"class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="brand" href="/">ILTS</a>
        <div class="btn-group pull-right">
          <button class="command" onclick="$('#bgndVideo').get(0).playVideo()"> <img src='<?php echo base_url("assets/images/play.png");?>'>
          </button>    
          <button class="command" onclick="$('#bgndVideo').get(0).pauseVideo()">
            <img src='<?php echo base_url("assets/images/pause.png");?>'>
          </button>
          <button class="command" onclick="$('#bgndVideo').setYTPVolume(100)">
            <img src='<?php echo base_url("assets/images/unmute.png");?>'>
          </button>
          <button class="command" onclick="$('#bgndVideo').setYTPVolume(0)">
            <img src='<?php echo base_url("assets/images/mute.png");?>'>
          </button>
        </div>

        <div class="btn-group pull-right">
          <form class=" form-search">
            <input id="txt_search_yt" type="text" class="input-medium search-query">
            <button id="cmd_search_yt" type="submit" class="btn">Search</button>
        </form>
        </div>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li class="active">
              <a href="<?php echo base_url("");?>">Home</a>
            </li>
            <li class="">
              <a href="<?php echo base_url("about");?>">About</a>
            </li>
            <li class="divider-vertical"></li>
            <li class="dropdown">
            <a href="#"
            class="dropdown-toggle"
            data-toggle="dropdown">
            Channels
            <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
            <?php foreach ($hashtags->result() as $row): ?>
            
              <li>
                <a href="<?php echo base_url("hashtag/".$row->hashtag);?>"><?php echo $row->hashtag; ?> (<?php echo $row->quanti; ?>)</a>

              </li>
            <?php endforeach; ?>
            </ul>
            </li>
            <li class="">
              <p class="navbar-text"  id="song_title"></p>
            </li>
            <li class="">
              <p class="navbar-text"  id="song_quality"></p>
              
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

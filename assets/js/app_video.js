// 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');
tag.src = "//www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
function onYouTubeIframeAPIReady() {
  player = new YT.Player('player', {
    height: '390',
    width: '640',
    autoplay: 0,
    loop:0,
    controls:0,
    autohide:0,
    modestbranding:0,
    showinfo:0,
    rel:0,  


    videoId: $("#video_root").attr("data-value"),
    events: {
      'onReady': onPlayerReady,
      'onStateChange': onPlayerStateChange
    }
  });
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
  //event.target.playVideo();
  console.log("player ready!");
}

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.
//var done = false;
function onPlayerStateChange(event) {
  console.log("onPlayerStateChange:"+event.data);
  //if (event.data == YT.PlayerState.PLAYING && !done) {
    //setTimeout(stopVideo, 6000);
    //done = true;
  //}
}
function stopVideo() {
  player.stopVideo();
}
function playVideo() {
  player.playVideo();
}
function pauseVideo() {
  player.pauseVideo();
}
function muteVideo() {
  player.muteVideo();
}
function unmuteVideo() {
  player.unmuteVideo();
}

function loadVideo(video_id) {
  player.loadVideoById(video_id);
}

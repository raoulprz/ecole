var playerDivs = document.querySelectorAll(".js-video");
var players = {};

if (playerDivs.length > 0) {
  // Load youtube iframe api
  var tag = document.createElement("script");
  tag.src = "https://www.youtube.com/iframe_api";

  var firstScriptTag = document.getElementsByTagName("script")[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
}

function onYouTubeIframeAPIReady() {
  for (var i = 0; i < playerDivs.length; i++) {
    players[playerDivs[i].id] = new YT.Player(playerDivs[i].id, {
      videoId: playerDivs[i].dataset.videoid,
      playerVars: {
        modestbranding: true,
        rel: 0,
        showinfo: 0,
      },
    });
  }
}

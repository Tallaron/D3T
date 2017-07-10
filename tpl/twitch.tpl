<div class="container-fluid">


<div id="twitch-main-player"></div>
<script type="text/javascript">
	var options = {
		width: 640,
		height: 360,
		channel: "{$channel}",
	};
	var player = new Twitch.Player("twitch-main-player", options);
	player.setVolume(0);
</script>

</div>

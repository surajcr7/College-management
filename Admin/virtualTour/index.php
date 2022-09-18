<!-- (c)
	Julius Peinelt
	Anna Neovesky - Digitale Akademie, Akademie der Wissenschaften und der Literatur | Mainz - Anna.Neovesky@adwmainz.de -->

<!-- Container for panorama viewer; loads Libraries & code -->
<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_type'])) {

 ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Virtual Tour</title>
	<meta charset="utf-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<script src="extLib/three.js"></script>
	<!-- Application code-->
	<script src="src/panorama.js"></script>
	<script src="src/location.js"></script>
	<script src="src/hotspot.js"></script>
	<script src="src/transition.js"></script>
	<!-- Libraries -->
	<script src="src/lib/threex_fullscreen.js"></script>
	<script src="src/lib/detector.js"></script>
	<script src="src/lib/location_loader.js"></script>
	<script src="src/lib/copy_shader.js"></script>
	<script src="src/lib/effect_composer.js"></script>
	<script src="src/lib/render_pass.js"></script>
	<script src="src/lib/shader_pass.js"></script>
	<script src="src/lib/mask_pass.js"></script>
	<script src="src/lib/blur_shader.js"></script>

	<!-- Initializes panoramic viewer-->
	<script type="text/javascript">
		window.onload = function () {

			var isMobile = {
				Android: function () {
					return navigator.userAgent.match(/Android/i);
				},
				BlackBerry: function () {
					return navigator.userAgent.match(/BlackBerry/i);
				},
				iOS: function () {
					return navigator.userAgent.match(/iPhone|iPad|iPod/i);
				},
				Opera: function () {
					return navigator.userAgent.match(/Opera Mini/i);
				},
				Windows: function () {
					return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
				},
				any: function () {
					return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
				}
			};

			<!-- Uses HQ images in desktop versions and lower quality if mobile -->
			if (isMobile.any()) {
				startPanorama('resources/json/sample.json', "mobile");
			} else {
				startPanorama('resources/json/sample.json', "hq");
			}
		}
	</script>

</head>

<body>

<!-- Container for panorama-->
<div id="panorama">

	<!-- Map image -->
	<figure id="map">
		<img id="mapImage" src="" alt="Map"/>
	</figure>

	<!-- Full screen -->
	<figure id="fullscreen">
		<img src="resources/icons/gui_fullscreen_icon.png" alt="Enter / Leave Fullscreen Mode"/>
	</figure>

	<!-- Scene switch: enables to create a tour with two connected spaces; remove comments to enable scene switch -->
	<!--
	<p id="sceneSwitch">
		Switch Scene
	</p> -->


	<!-- Tool Tip; loaded from JSON -->
	<p id="toolTip"></p>

	<!-- Information pop-up -->
	<article id="infoView">
		<figure id="infoCloseButton">
			<img src="resources/icons/close.png" alt="Close information pop-up"
				 title="Close information pop-up">
		</figure>

		<!-- Title; loaded from JSON-->
		<h1 id="infoTitle">
		</h1>

		<!-- Image and image caption; loaded from JSON -->
		<figure id="infoImageBox">
			<img src="" alt="Image" id="infoImage"/>
			<figcaption id="infoCaption">
			</figcaption>
		</figure>

		<!-- Audio file; loaded from JSON -->
		<div id="audioPlayer">
			<audio id="audioControls" controls>
				<source src="" type="audio/ogg" preload="auto" id="audioSourceOgg">
				<source src="" type="audio/mpeg" preload="auto" id="audiosourceMp3">
			</audio>
		</div>

		<!-- Textual information; loaded from JSON -->
		<p id="infoContent">
		</p>
	</article>

</div>


<!-- Navigation bar and buttons -->
<div id="navigationButtonsContainer">
	<figure id="nav">
		<img src="resources/icons/navigation.png"/>
	</figure>
	<figure class="panoNavButton" id="upNavButton" src="resources/icons/navigation.png" alt="Navigation element">
		<img src="resources/icons/gui_panup_icon.png" alt="Up"/>
	</figure>
	<figure class="panoNavButton" id="downNavButton">
		<img src="resources/icons/gui_pandown_icon.png" alt="Down"/>
	</figure>
	<figure class="panoNavButton" id="leftNavButton">
		<img src="resources/icons/gui_panleft_icon.png" alt="Left"/>
	</figure>
	<figure class="panoNavButton" id="rightNavButton">
		<img src="resources/icons/gui_panright_icon.png" alt="Right"/>
	</figure>
	<figure class="panoNavButton" id="zoomInButton">
		<img src="resources/icons/gui_zoomin_icon.png" alt="Zoom in"/>
	</figure>
	<figure class="panoNavButton" id="zoomOutButton">
		<img src="resources/icons/gui_zoomout_icon.png" alt="Zoom out"/>
	</figure>
</div>


</body>
</html>

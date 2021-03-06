<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	
	<meta property="og:image" content="http://playchap.com/spotmania/images/spotscreen4s.jpg"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
	<!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]-->
	
	<!--link rel="stylesheet" type="text/css" href="style.css" /-->
	<!--link href='http://fonts.googleapis.com/css?family=Anonymous+Pro' rel='stylesheet' type='text/css'-->
	<link href='http://fonts.googleapis.com/css?family=Gudea:700|Anonymous+Pro' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />
	
	<style type="text/css">
		body {
		
			/*background: transparent url('images/stripebg.png') no-repeat scroll top right;*/
			/*background: transparent url('images/stripebg.png') repeat top left;*/
			background-image:url('images/stripebg.png');
			font-family:Arial,Helvetica,sans-serif;
			color:white;
			height:770px;
			-webkit-touch-callout: none;
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			-o-user-select: none;
			user-select: none;
			cursor:default;
		}
		.clear {
			clear:both;
		}
		.startTxt {
			padding:10px;
		
		}
		button {
			/*background-color:#4C7DF7;*/
			background-color:white;
			padding:5px;
			margin:10px;
			border:5px solid white;
			-moz-border-radius: 15px;
			-webkit-border-radius: 15px;
			-khtml-border-radius: 15px;
			border-radius: 15px;
			color:#4C7DF7;
			min-width:100px;
			cursor:pointer;
			font-size:12px;
			font-weight:bold;
		}
		#loadingImg {
			background: transparent url('images/ajaxloader.gif') no-repeat scroll top right;
			width:128px;
			height:15px;
		}
		#canvasDiv {	
			border:2px solid black;
			width:588px;
			height:390px;
			background-color:black;
		}
		.canvas {
			width:288px;
			height:384px;		
			border:3px solid black;
			cursor:pointer;
		}
		
		#timeBar {
			
			background: transparent url('images/timebar1.png') no-repeat scroll top right;
			width:588px;
			height:25px;
			position:relative;
			top:0px;
		}

		
		#timeBarGrid {
			background: transparent url('images/timebar1grid.png') no-repeat scroll top right;
			width:588px;
			height:25px;
			position:relative;
			top:-25px;
		}
		
		#timeBarBg {
			background-color:#4C4646;
			width:588px;
			height:25px;
			position:absolute;
			top:0px;
			right:0px;
			
		}
		
		#timeBarDiv {
			margin-top:10px;
			width:588px;
			height:25px;
			border:2px solid black;
			position:relative;
		}
		
		#logo {
			background: transparent url('images/logo.png') no-repeat scroll top left;
			width:142px;
			height:40px;
			border:0px solid white;
			top:100px;
			left:0px;
			position:absolute;
			display:block;
			padding:10px;
			margin:10px;
			
			
		}
		
		.menu0 {
			width:142px;
			height:540px;
			border:8px solid white;
			background-color:#4C7DF7;
			top:170px;
			left:-30px;
			position:absolute;
			display:block;
			padding:10px;
			margin:10px;
			-moz-border-radius: 20px;
			-webkit-border-radius: 20px;
			-khtml-border-radius: 20px;
			border-radius: 20px;
			
		}
		.menu1 {
			width:142px;
			height:610px;
			border:8px solid white;
			background-color:#4C7DF7;
			top:100px;
			left:-30px;
			position:absolute;
			display:block;
			padding:10px;
			margin:10px;
			-moz-border-radius: 20px;
			-webkit-border-radius: 20px;
			-khtml-border-radius: 20px;
			border-radius: 20px;
			
		}
		.menuItem {
			margin:12px;
			padding:7px;
			border:0px solid #6790F8;		
			/*height:45px;
			width:100px;
			overflow:hidden;*/
			background-color:#6790F8;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			-khtml-border-radius: 5px;
			border-radius: 5px;
			cursor:pointer;
			
			/*background-color:white;
			opacity: 0.1;*/
			
			
		}
		
		#menuItemLike {
			margin:12px;
			padding:7px;
			border:0px solid #6790F8;		
			height:300px;
			/*
			width:100px;
			overflow:hidden;
			background-color:#6790F8;*/
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			-khtml-border-radius: 5px;
			border-radius: 5px;
			cursor:pointer;
			
			/*background-color:white;
			opacity: 0.1;*/
			
			
		}
		
		#hiscoreUpDiv {
			padding:3px; margin-bottom:10px;overflow:hidden;border:0px solid white;
			background: transparent url('images/arrowup.png') no-repeat scroll center center;
			height:15px;
			background-color:#6790F8;
			cursor:pointer;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			-khtml-border-radius: 5px;
			border-radius: 5px;
			margin-left:auto;
			margin-right:auto;
		}
		
		#hiscoreDownDiv {
			padding:3px; margin-bottom:5px;overflow:hidden;border:0px solid white;
			background: transparent url('images/arrowdown.png') no-repeat scroll center center;
			height:15px;
			background-color:#6790F8;
			cursor:pointer;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			-khtml-border-radius: 5px;
			border-radius: 5px;
			margin-left:auto;
			margin-right:auto;
		}
		#gameScreen {
			width:594px;
			height:610px;
			border:8px solid white;
			background-color:#4C7DF7;
			top:100px;
			left:160px;
			position:absolute;
			display:block;
			padding:10px;
			margin:10px;
			-moz-border-radius: 20px;
			-webkit-border-radius: 20px;
			-khtml-border-radius: 20px;
			border-radius: 20px;
			
		}
		#overlay {
			background: transparent url('images/overlay.png') repeat top left;
			width:594px;
			height:610px;
			top:-10px;
			left:-10px;
			position:absolute;
			display:none;
			padding:10px;
			margin:10px;
			-moz-border-radius: 12px;
			-webkit-border-radius: 12px;
			-khtml-border-radius: 12px;
			border-radius: 12px;
		}
		#overlayText {
			
			position:absolute;
			top:150px;
			left:120px;
			color:#4C7DF7;
			font-size:62px;
			-webkit-text-stroke-width: 1px;
			-webkit-text-stroke-color: white;
			/*text-shadow:0px 1px 0px white;*/
		}
		
		.screen {
			width:594px;
			height:610px;
			border:8px solid white;
			background-color:#4C7DF7;
			top:100px;
			left:160px;
			position:absolute;
			display:none;
			padding:10px;
			margin:10px;
			-moz-border-radius: 20px;
			-webkit-border-radius: 20px;
			-khtml-border-radius: 20px;
			border-radius: 20px;
			
		}
		#hiscore{
			width:220px;
			height:710px;
			border:8px solid white;
			background-color:#4C7DF7;
			top:0px;
			left:804px;
			position:absolute;
			display:block;
			padding:10px;
			margin:10px;
			-moz-border-radius: 20px;
			-webkit-border-radius: 20px;
			-khtml-border-radius: 20px;
			border-radius: 20px;
			
		}
		
		#hiscoreHead {
			margin-top:10px;padding:3px;padding-right:0px; overflow:hidden;border:0px solid white;
		}
		#hiscoreTitle {
			padding:3px;border:0px solid white;float:left;
		}
		.hiscoreOn {
			margin-left:5px;padding:3px;padding-left:5px;padding-right:5px; border:1px solid white;float:left;
			color:#4C7DF7;
			background-color:white;
		}
		.hiscoreOff {
			margin-left:5px;padding:3px;padding-left:5px;padding-right:5px;border:1px solid white;float:left;
			cursor:pointer;
		}
		#hiscoreDiv {
			padding:3px; overflow:hidden;border:0px solid white;margin-top:10px;
		}
		.hiscoreItem {
			width:220px; height:50px;
		}
		.hiscoreRank {
			padding-top:10px;text-align: center;margin-right:5px; width:40px;height:30px;float:left;overflow:hidden;border:1px solid white;
			color:#4C7DF7;
			background-color:white;
		}
		.hiscoreImg {
			background: transparent url('images/silhouette3.png') no-repeat scroll top left;
			margin-right:5px; width:40px;height:40px; float:left;border:1px solid white;
		}
		.hiscoreImg img {			
			width:40px;height:40px;border:0px solid green;
		}
		.hiscoreText {
			padding-top:5px;font-size:12px;float:left;width:110px;height:40px;
		}
		.hiscoreName {
			width:120px;overflow:hidden; height:16px;
		}
		.hiscoreScore {
			width:120px;overflow:hidden; height:18px;
		}			
			
		#startBtn {
			display:none;
		}
		#nextBtn {
			display:block;
		}
		#continueBtn {
			display:none;
			position:relative;
			top:120px;
			left:230px;
		}
		#gameoverBtn {
			display:block;
		}
		
				
		#gameDiv {
			width:550px;
			padding:10px;
		}
		
		#clueCtl {
			background: transparent url('images/clueCtl.png') no-repeat scroll top left;
			margin-right:15px; width:100px;height:100px; float:left;
			cursor:pointer;
		}
		#clues {
			/*margin:40px;*/
			padding:30px;
			width:30px;
			height:30px;
			margin-left:auto;
			margin-right:auto;
			margin-top:10px;
			text-align: center;
			vertical-align: middle;
			
		}
		#gameStats {
			padding:10px;width:400px;float:left;
		}
		#gameScoreText {
			font-size:34px;padding:3px;border-bottom:1px solid white;
		}
		#gamePhotosText {
			padding:3px;border:0px solid white;
		}
		#continueScoreText {
			font-size:34px;padding:3px;border-bottom:1px solid white;
		}
		#continuePhotosText {
			padding:3px;border:0px solid white;
		}
		#gameoverScoreText {
			font-size:34px;padding:3px;border-bottom:1px solid white;
		}
		#gameoverPhotosText {
			padding:3px;border:0px solid white;
		}
		#restoreScoreText {
			font-size:28px;padding:5px;padding-bottom:3px;margin:12px;margin-bottom:5px;border-bottom:1px solid white;
		}
		#restorePhotosText {
			margin:12px;margin-top:0px;padding:5px;padding-top:3px;border:0px solid white;
		}
		#bannerhead {
			background: transparent url('images/logo2.png') no-repeat scroll top left;
			width:764px;
			height:70px;
			
			margin-left:10px;
			border:8px solid white;
			background-color:#4C7DF7;
			
			-moz-border-radius: 20px;
			-webkit-border-radius: 20px;
			-khtml-border-radius: 20px;
			border-radius: 20px;
		}
		#bannerad1 {
			width:728px;
			height:90px;
			border:1px solid black;
			background-color:blue;
			margin-left:20px;
		}
		#adDiv {
			position:relative;
			top:100px;
			left:140px;
		}
		#continueLoadingDiv {
			position:relative;
			top:120px;
			left:230px;
		}
		.inviteCtl {
			cursor:pointer;
		}		
		#playerImage{
			float:left;
			width:40px;
			height:40px;
			/*margin-right:10px;
			margin-bottom:5px;*/
			background: transparent url('images/silhouette3.png') no-repeat scroll top left;
			border:1px solid white;
		}
		#playerImage img {
			width:40px;
			height:40px;
		}
		#playerName{
			float:left;
			width:150px;
			height:20px;
			border-bottom:1px solid white;
			margin-left:10px;
			overflow:hidden;
		}
		#playerHiscoreDiv{
			float:left;
			width:150px;
			height:16px;
			font-size:12px;
			margin-left:10px;
			overflow:hidden;
		}
		#playerWorldRankDiv{
			font-size:12px;
			width:210px;
			height:16px;
			padding-top:10px;
			overflow:hidden;
		}
		#playerFriendRankDiv{
			font-size:12px;
			width:210px;
			height:16px;
			overflow:hidden;
		}
			
			
	</style>
	
	<script type="text/javascript">

	function getInternetExplorerVersion()
	// Returns the version of Windows Internet Explorer or a -1
	// (indicating the use of another browser).
	{
	   var rv = -1; // Return value assumes failure.
	   if (navigator.appName == 'Microsoft Internet Explorer')
	   {
		  /*var ua = navigator.userAgent;
		  var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
		  if (re.exec(ua) != null)
			 rv = parseFloat( RegExp.$1 );
			 */
			 rv=1;
	   }
	   return rv;
	}
	var ieTest = getInternetExplorerVersion();
	
	if (ieTest==-1) {
	
		window.fbAsyncInit = function() {

			//FB.Canvas.setSize({ width: 810, height: 480 });
			FB.Canvas.setSize();			
			
			// Do things that will sometimes call sizeChangeCallback()
			
			function sizeChangeCallback() {
			
				//FB.Canvas.setSize({ width: 810, height: 480 });
				FB.Canvas.setSize();
			
			}
		}
	}

</script>
<meta name="google-site-verification" content="lM5gN41nb59iXZ8Ri6q9bimHxL2ICx7qfRjuqS77z_0" />
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30412567-6']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<div id="fb-ui-return-data" style="display:none"></div>
<div id='fb-root'></div>
	<script>


	

	</script>
	
	<div id="bannerhead"></div>
	<div id="bannerad1" style="display:none">
	</div>
	<div id="logo" style="display:none"></div>
	<div id="menu" class="menu1">
		
		<div class="menuItem" id="inviteMenu">Invite friends</div>		
		<div class="menuItem" id="removeadsMenu" style="display:none">Remove ads</div>
		<div class="menuItem" id="shareMenu">Share</div>		
		<div class="menuItem" id="pageMenu">Our page</div>
		
		<div id="menuItemLike"></div>		

	</div>
	<div id="gameScreen">
		<div id="canvasDiv">
			<canvas id="canvas1" class="canvas"></canvas><canvas id="canvas2" class="canvas"></canvas>
		</div>
		<div id="timeBarDiv">			
			<div id="timeBar"></div>	
			<div id="timeBarBg"></div>
			<div id="timeBarGrid"></div>
		</div>
		<div id="gameDiv">
			<div id="clueCtl"><div id="clues">3</div></div>
			<div id="gameStats">
				<div id="gameScoreText">Score: <span id="gameScore">0</span></div>
				<div id="gamePhotosText">Photos completed: <span id="gamePhotos">0</span></div>
			</div>
		</div>
		<div class="clear"></div>
		<div id="result" style="display:none">test</div>
		<div id="overlay"><div id="overlayText">GAME OVER</div></div>
	</div>	
	<div class="screen" id="gameoverScreen">
		<div class="startTxt">GAME OVER!</div>
		<div id="gameoverScoreText">Score: <span id="gameoverScore">0</span></div>
		<div id="gameoverPhotosText">Photos completed: <span id="gameoverPhotos">0</span></div>
		<button id="gameoverBtn">NEW GAME</button>
	</div>	
	<div class="screen" id="continueScreen">
		<div class="startTxt">STAGE CLEARED!</div>
		<div id="continueScoreText">Score: <span id="continueScore">0</span></div>
		<div id="continuePhotosText">Photos completed: <span id="continuePhotos">0</span></div>		
		<div class="startTxt" id="continueScreenLoadingDiv">
			<div id="loadingImg"></div>
			<div>Loading game...</div>
		</div>
		<button id="nextBtn" style="display:none">NEXT</button>
	</div>	
	<div class="screen" id="startScreen" style="display:block">
		<div class="startTxt">SPOTMANIA is back and it is now free!</div>
		<div class="startTxt">Find all 5 differences in the 2 pictures within the time limit. If you click on a wrong spot, you will lose some time.  Use a clue when you get stuck but do note that these are limited!</div>
	
			
				<div class="startTxt">Tip: LIKE Spotmania to get an extra clue every time you start a new game (please refresh the game after you LIKE for the extra clue to take effect)</div>
		

		
		<div class="startTxt" id="startLoadingDiv">
			<div id="loadingImg"></div>
			<div>Loading game...</div>
		</div>
		<div class="startTxt" id="restoreDiv" style="display:none">
			<div class="startTxt">Saved game found:</div>
			<div id="restoreScoreText">Score: <span id="restoreScore">0</span></div>
			<div id="restorePhotosText">Photos completed: <span id="restorePhotos">0</span></div>
			<button id="restoreBtn">CONTINUE</button> OR <button id="restoreStartBtn">START A NEW GAME</button>		
			<div class="startTxt">Please note that if you click START A NEW GAME, your previous game data will be erased</div>
		</div>
		<button id="startBtn">START</button>
	</div>

	<div id="hiscore">
	<div id="playerImage"><img src='http://graph.facebook.com/<?php echo $id ?>/picture'/></div>
	<div id="playerName"><?php echo $user_profile[name]; ?></div>
	<div id="playerHiscoreDiv">High score: <span id="playerHiscore">0</span></div>
	<div class="clear"></div>
	<div id="playerWorldRankDiv">World Rank: <span id="playerWorldRank">0</span></div>
	<div id="playerFriendRankDiv">Friend Rank: <span id="playerFriendRank">0</span></div>
	<!--div id="hiscoreTitle">High Score</div-->
		<div id="hiscoreHead">
			
			<div class="hiscoreOff" id="hiscoreFriendsCtl">Friends</div>
			<div class="hiscoreOn" id="hiscoreWorldCtl">World</div>
		</div>
	
		<div id="hiscoreDiv">
		
		<div id="hiscoreUpDiv">	
			<!--img src="images/arrowup.png"/>
			<div id="hiscoreUpCtl" style="float:left">Up</div>		 
			<div id="hiscoreUpTenCtl" style="float:left">Up</div>
			<div id="hiscoreUpMaxCtl" style="float:left">Up</div-->
		</div>
		
		<?php for ($i=0; $i<10; $i++) { ?>
		
			<div class="hiscoreItem">
				<div class="hiscoreRank" id="hiscoreRank<?php echo $i+1; ?>"><?php echo $i+1; ?></div>
				<div class="hiscoreImg" id="hiscoreImg<?php echo $i+1; ?>"></div>
				<div class="hiscoreText">
					<div class="hiscoreName" id="hiscoreName<?php echo $i+1; ?>"><div class="inviteCtl">Add friend</div></div>
					<div class="hiscoreScore" id="hiscoreScore<?php echo $i+1; ?>"></div>	
				</div>
			</div>
			
			<?php 
				//id, name, score
				//http://graph.facebook.com/playchap/picture 
				//playchap:1669294166
				//calvin(game):709494213
				//calvin(main):614230408
				//zhiheng:752378646
				//francis:1619670573
	  
			?>
			
			
		 <?php } ?>
		 

		 
		 <div id="hiscoreDownDiv">
			<!--div id="hiscoreDownCtl" style="float:left">Down</div>
			<div id="hiscoreDownTenCtl" style="float:left">Down</div>
			<div id="hiscoreDownMaxCtl" style="float:left">Down</div-->
		</div>
		
		</div>
	</div>
	<?php //echo $_SERVER['HTTP_USER_AGENT']; ?>
	


	<script>		
		
		$(document).ready(function(){
		

		

		
			var spotsData="";
			
			var spotsData2;
			
			var removeads = 1;
			
			//3 minutes per game
			var intervalTime = 300;
			var progressIntervalId = 0;
			
			var progressMax=588;
			var progress=progressMax;
			
			var gameState = 0;
			
			var gameScore = 0;
			var gamePhotos = 0;
			var gameClues = 0;
			var gameTime = 0;
			
			var hiScores = new Array();
			var hiScoresPage = 1;
			
			var spotsFound = new Array(0,0,0,0,0);
			
			var imgLoaded = new Array(0,0);			
				
			var can1 = document.getElementById('canvas1');
			var can2 = document.getElementById('canvas2');
			
			if ($.browser.msie) {
				G_vmlCanvasManager.initElement(can1);
				G_vmlCanvasManager.initElement(can2);
			}
			var ctx1 = can1.getContext('2d');
			var ctx2 = can2.getContext('2d');
			
			var canvasLeft = parseInt($("#canvas1").offset().left) + 5;
			var canvasTop = parseInt($("#canvas1").offset().top) + 5;
			
			var signedRequest = "";
			
			var img1 = new Image();
			img1.onload = function(){
				can1.width = img1.width;
				can1.height = img1.height;
				ctx1.drawImage(img1, 0, 0, img1.width, img1.height);				
				imgLoaded[0] = 1;				
				checkLoaded();
			}

			var img2 = new Image();
			img2.onload = function(){
				can2.width = img2.width;
				can2.height = img2.height;
				ctx2.drawImage(img2, 0, 0, img2.width, img2.height);			
				imgLoaded[1] = 1;				
				checkLoaded();
			}
			
			//img1.src = "showImg.php?"+spotsData[1][0];
			//var encoded = encodeURI("type=" + "easy" + "&end="+ "7");
			
			/*$.ajax({
					type: "POST",
					url: "http://playchap.com/spotmania/getspots2.php",
					data: "type=easy&stage=002",
					dataType: 'json'
				}).done(function(data) {
				
					//alert(data);	
					spotsData = data;
					
					//alert(spotsData[0][1][0]);
					//alert(parseInt(unescape(spotsData[0][1][0])));
					
					img1.src = "http://playchap.com/spotmania/showImg.php?"+spotsData[1][0];
					img2.src = "http://playchap.com/spotmania/showImg.php?"+spotsData[1][1];	
					
				});	*/
			
			/*
			$.ajax({
					type: "POST",
					url: "scores.php",
					data: "signed_request="+signedRequest,
					dataType: 'json'
				}).done(function(data) {
					//alert(data[0]['score']);
					
					//alert(data[6].length);
					
					//0:fid
					//1:name
					//2:highscore
					//3:worldrank
					//4:friendrank
					//5:worldscore
					//6:fbscore
					
				
					check();
					
					hiScores = data;
					hiScoresPage = 1;	
					
					//populate user game stats
					//$("#playerImage").html("<img src='http://graph.facebook.com/"+hiScores[0]+"/picture'/>");
					//$("#playerName").html(hiScores[1]);
					$("#playerHiscore").html(number_format(hiScores[2]));
					$("#playerWorldRank").html(number_format(hiScores[3]));
					$("#playerFriendRank").html(number_format(hiScores[4]));
					
					
					if (hiScores.length>0) {					
						populateHiScores(0);	
					}						
					
				});	
				*/
			
			
		
			//$("#result").html(canvasLeft+","+canvasTop);	
			//getHiScores();
			
			function getHiScores() {				
			
				clearHiScores();
				
				/*$.ajax({
					type: "POST",
					url: "scores.php",
					data: "apple=1"+signedRequest,
					dataType: 'json'
				}).done(function(data) {
					//alert(data[0]['score']);
					
					//alert(data[6].length);
					
					//0:fid
					//1:name
					//2:highscore
					//3:worldrank
					//4:friendrank
					//5:worldscore
					//6:fbscore
					
					hiScores = data;
					hiScoresPage = 1;	
					
					//populate user game stats
					//$("#playerImage").html("<img src='http://graph.facebook.com/"+hiScores[0]+"/picture'/>");
					//$("#playerName").html(hiScores[1]);
					$("#playerHiscore").html(number_format(hiScores[2]));
					$("#playerWorldRank").html(number_format(hiScores[3]));
					$("#playerFriendRank").html(number_format(hiScores[4]));
					
					
					if (hiScores.length>0) {					
						populateHiScores(0);	
					}						
					
				});	*/
			
			}
			
			//check();
			
			function check() {
				/*$.ajax({
					type: "POST",
					url: "process.php",
					data: "type=" + "check" + "&end="+ "7"+signedRequest,
					//dataType: 'json'
				}).done(function(data) {
					//alert(data);
					if (data=="error") {
						check();
					} else {
						resultSplit = data.split(",");
						
						if (resultSplit.length==3) {
							$("#restoreScore").html(number_format(resultSplit[0]));
							$("#restorePhotos").html(number_format(resultSplit[1]));
							$("#restoreDiv").show();
							$("#startLoadingDiv").hide();	
							
							if (parseInt(resultSplit[2])<1) {
								removeads = 0;
								//show remove ads btn
								$("#removeadsMenu").show();
								//remove banner head
								$("#bannerhead").remove();
								//add banner ad
								$("#bannerad1").show();
								//change menu css to menu0
								$("#menu").removeClass('menu1');
								$("#menu").addClass('menu0');
								//show logo
								$("#logo").show();
							}
						} else if (resultSplit.length==2) {
						
							if (resultSplit[0]=="new") {
								startGame();
							}
							
							//alert(resultSplit[1]);
							
							if (parseInt(resultSplit[1])<1) {
								removeads = 0;
								//show remove ads btn
								$("#removeadsMenu").show();
								//remove banner head
								$("#bannerhead").remove();
								//add banner ad
								$("#bannerad1").show();
								//change menu css to menu0
								$("#menu").removeClass('menu1');
								$("#menu").addClass('menu0');
								//show logo
								$("#logo").show();
							}
						
						}
					}
				});	*/
			
			}
						
			function clearHiScores() {
			
				for (i=0;i<10;i++) {					
						
					$("#hiscoreRank"+(i+1)).html(i+1);
					$("#hiscoreImg"+(i+1)).html("");
					$("#hiscoreName"+(i+1)).html("Loading...");
					$("#hiscoreScore"+(i+1)).html("");						
					
				}			
			
			}
			
			function populateHiScores(start) {
			
				clearHiScores();
				
				/*var hiscoreType = 6;
				//check fb or world, if worldhiscore is on, change to using worldscore
				if ($("#hiscoreWorldCtl").hasClass("hiscoreOn")) {
					hiscoreType = 5;
				}
			
				for (i=0;i<10;i++) {	
					
					if ((i+start)<(hiScores[hiscoreType].length)) {
					
						//<div class="hiscoreRank" id="hiscoreRank<?php echo $i+1; ?>"><?php echo $i+1; ?></div>
						//<div class="hiscoreImg" id="hiscoreImg<?php echo $i+1; ?>"><img src='http://graph.facebook.com/752378646/picture'/></div>				
						//<div class="hiscoreName" id="hiscoreName<?php echo $i+1; ?>">Player 1</div>
						//<div class="hiscoreScore" id="hiscoreScore<?php echo $i+1; ?>">12,412,657,654</div>	
						
						//alert(hiScores[i]['score']);
						
						$("#hiscoreRank"+(i+1)).html(start+i+1);
						$("#hiscoreImg"+(i+1)).html("<img src='http://graph.facebook.com/"+hiScores[hiscoreType][start+i]['user']['id']+"/picture'/>");
						$("#hiscoreName"+(i+1)).html(hiScores[hiscoreType][start+i]['user']['name']);
						$("#hiscoreScore"+(i+1)).html(number_format(hiScores[hiscoreType][start+i]['score']));
						
					} else {
						$("#hiscoreRank"+(i+1)).html(start+i+1);
						$("#hiscoreName"+(i+1)).html('<div class="inviteCtl">Add friend</div>');
					}
				}	*/		
			
			}

			function startGame() {
			
				imgLoaded[0] = 0;	
				imgLoaded[1] = 0;	
				
				var encoded = encodeURI("type=" + "startGame" + "&end="+ "7");
			
				/*$.ajax({
					type: "POST",
					url: "process.php",
					data: encoded,
					dataType: 'json'
				}).done(function(data) {
				
					spotsData = data;
					
					gameScore = parseInt(spotsData[2]);
					gamePhotos = parseInt(spotsData[3]);
					gameClues = parseInt(spotsData[4]);
					
					$("#gameScore").html(number_format(gameScore));
					$("#gamePhotos").html(number_format(gamePhotos));
					$("#clues").html(gameClues);					
					
					if ( $.browser.msie ) {						
						img1.src = "showImg.php?"+spotsData[1][0];
						img2.src = "showImg.php?"+spotsData[1][1];						
					} else {
						img1.src = "showImg.php?"+spotsData[1][0];
						img2.src = "showImg.php?"+spotsData[1][1];
					}							
					
				});	*/
			}
			
			function drawEllipse(ctx, x, y, w, h, cr, st) {
				var kappa = .5522848; // 4 * ((v(2) - 1) / 3)
				ox = (w / 2) * kappa, // control point offset horizontal
				oy = (h / 2) * kappa, // control point offset vertical
				xe = x + w,           // x-end
				ye = y + h,           // y-end
				xm = x + w / 2,       // x-middle
				ym = y + h / 2;       // y-middle
				
				ctx.lineWidth = st;
				ctx.strokeStyle = cr;

				ctx.beginPath();
				ctx.moveTo(x, ym);
				//ctx.strokeStyle = 'red';
				ctx.bezierCurveTo(x, ym - oy, xm - ox, y, xm, y);
				// ctx.strokeStyle = 'blue';
				ctx.bezierCurveTo(xm + ox, y, xe, ym - oy, xe, ym);
				//ctx.strokeStyle = 'green';
				ctx.bezierCurveTo(xe, ym + oy, xm + ox, ye, xm, ye);
				//ctx.strokeStyle = 'yellow';
				ctx.bezierCurveTo(xm - ox, ye, x, ym + oy, x, ym);
				ctx.closePath();
				ctx.stroke();
			}
		
			function timerProgress()
			{
				progress--;
				//$("#timeBar").style.width = progress + "px";
				$("#timeBarBg").css('width' , progress + "px");

				if (progress<=0) {
					timeOut();
				}
			}
			
			function timeOut() {
				clearInterval ( progressIntervalId );
				gameState = 0;
				
				//$('body').append(adStr);
				
				$("#overlayText").html("GAME OVER!");
				$("#overlay").show();
				
				$("#gameoverScore").html(number_format(gameScore));
				$("#gameoverPhotos").html(number_format(gamePhotos));
				
				
				$("#startLoadingDiv").show();
				$("#startBtn").hide();
					
				setTimeout(function() {endGame();},2000);
				
				for (i=0;i<6;i++) {		

					
					if ((spotsData[0][i])&&(spotsFound[i]==0)) {
				
						drawEllipse(ctx1, parseInt(unescape(spotsData[0][i][0])), parseInt(unescape(spotsData[0][i][1])), parseInt(unescape(spotsData[0][i][2])), parseInt(unescape(spotsData[0][i][3])),"#FF0000", 3);	
						
						drawEllipse(ctx1, parseInt(unescape(spotsData[0][i][0])), parseInt(unescape(spotsData[0][i][1])), parseInt(unescape(spotsData[0][i][2])), parseInt(unescape(spotsData[0][i][3])),"#FFFFFF", 1);	
						
						drawEllipse(ctx2, parseInt(unescape(spotsData[0][i][0])), parseInt(unescape(spotsData[0][i][1])), parseInt(unescape(spotsData[0][i][2])), parseInt(unescape(spotsData[0][i][3])),"#FF0000", 3);	

						drawEllipse(ctx2, parseInt(unescape(spotsData[0][i][0])), parseInt(unescape(spotsData[0][i][1])), parseInt(unescape(spotsData[0][i][2])), parseInt(unescape(spotsData[0][i][3])),"#FFFFFF", 1);							
					}				
				}	
			}
			
			function endGame()
			{
				
				$("#gameScreen").hide();
				$("#gameoverScreen").show();
				
				progress = progressMax;				
				$("#timeBarBg").css('width' , progress + "px");
				spotsFound = new Array(0,0,0,0,0);
			
				//required:
				//finalScore
				//finalPhoto
				
				
				/*$.ajax({
					type: "POST",
					url: "process.php",
					data: "type=" + "gameOver" + "&finalScore="+ gameScore + "&finalPhoto="+ gamePhotos + signedRequest,
					//dataType: 'json'
				}).done(function(data) {
				
					if (removeads<1) {
						$("#continueLoadingDiv").hide();
						$("#continueBtn").show();
					} else {
						$("#continueScreenLoadingDiv").hide();
						$("#nextBtn").show();					
					}
					getHiScores();
					
					if (data=="highscore") {*/
					
					
						// calling the API ...
						/*var obj = {
							method: 'feed',
							link: 'http://apps.facebook.com/spotmania/',
							picture: 'http://playchap.com/spotmania/images/spotscreen4s.jpg',
							name: 'Spotmania',
							caption: 'New High Score!',
							description: "Woo hoo! <?php echo $user_profile[first_name]; ?> has achieved a new high score of " + number_format(gameScore) + "! Spotmania is a challenging spot the difference game where you must find the differences between a set of two similar looking photos."
						};

						function callback(response) {
						  //document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
						}

						FB.ui(obj, callback);*/
					
					/*}
					
				});	*/
			}
					
			function checkLoaded() {					
			
				if ((imgLoaded[0] == 1) && (imgLoaded[1] == 1)) {
				
					//setTimeout(function() {$("#startBtn").show();},3250);					
					
					$("#overlay").hide();
					
					setTimeout(function() {enableContinue();},3250);
					
					/*
					for (i=0;i<6;i++) {	
					
						if ((spotsData[0][i])&&(spotsFound[i]==0)) {
					
							drawEllipse(ctx1, parseInt(unescape(spotsData[0][i][0])), parseInt(unescape(spotsData[0][i][1])), parseInt(unescape(spotsData[0][i][2])), parseInt(unescape(spotsData[0][i][3])),"#4C7DF7", 3);	
							
							drawEllipse(ctx1, parseInt(unescape(spotsData[0][i][0])), parseInt(unescape(spotsData[0][i][1])), parseInt(unescape(spotsData[0][i][2])), parseInt(unescape(spotsData[0][i][3])),"#FFFFFF", 1);	
							
							drawEllipse(ctx2, parseInt(unescape(spotsData[0][i][0])), parseInt(unescape(spotsData[0][i][1])), parseInt(unescape(spotsData[0][i][2])), parseInt(unescape(spotsData[0][i][3])),"#4C7DF7", 3);	

							drawEllipse(ctx2, parseInt(unescape(spotsData[0][i][0])), parseInt(unescape(spotsData[0][i][1])), parseInt(unescape(spotsData[0][i][2])), parseInt(unescape(spotsData[0][i][3])),"#FFFFFF", 1);	
						}				
					}	
					*/
					
					//$("#startBtn").show();
					//alert("start");
					
				}

			}
			//img1.src = 'easy/001_a.jpg';
			
			function enableContinue() {		
				
				$("#startLoadingDiv").hide();
				$("#startBtn").show();
				if (removeads<1) {
					$("#continueLoadingDiv").hide();
					$("#continueBtn").show();
				} else {
					//continueBtnClick ();
					$("#continueScreenLoadingDiv").hide();
					$("#nextBtn").show();
				}
			}
			
			$("#shareMenu").click(function() {

				// calling the API ...
				/*var obj = {
					method: 'feed',
					link: 'http://apps.facebook.com/spotmania/',
					picture: 'http://playchap.com/spotmania/images/spotscreen4s.jpg',
					name: 'Spotmania',
					caption: 'Spot the difference!',
					description: "Spotmania is a challenging spot the difference game where you must find the differences between a set of two similar looking photos. Start playing now!"
				};

				function callback(response) {
				  //document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
				}

				FB.ui(obj, callback);*/
			
			});
			
			$("#pageMenu").click(function() {
				window.open('http://www.facebook.com/spotmania');
			});
			$("#removeadsMenu").click(function() {
				//alert("Coming soon!");
				buy();
			});
			
			
			$("#restoreBtn").click(function() {
				$("#restoreDiv").hide();
				$("#startLoadingDiv").show();	
				
				//restoreGame();	
				/*$.ajax({
					type: "POST",
					url: "process.php",
					data: "type=" + "getSpots" + "&end="+ "7" + signedRequest,
					dataType: 'json'
				}).done(function(data) {
				
					spotsData = data;
					
					gameScore = parseInt(spotsData[2]);
					gamePhotos = parseInt(spotsData[3]);
					gameClues = parseInt(spotsData[4]);
					
					$("#gameScore").html(number_format(gameScore));
					$("#gamePhotos").html(number_format(gamePhotos));
					$("#clues").html(gameClues);					
					
					if ( $.browser.msie ) {						
						img1.src = "showImg.php?"+spotsData[1][0];
						img2.src = "showImg.php?"+spotsData[1][1];						
					} else {
						img1.src = "showImg.php?"+spotsData[1][0];
						img2.src = "showImg.php?"+spotsData[1][1];
					}							
					
				});*/
			});
			
			$("#restoreStartBtn").click(function() {				
				$("#restoreDiv").hide();
				$("#startLoadingDiv").show();	
				startGame();
			});
			
			$(document).on("click", ".inviteCtl", function(){
				  FB.ui({method: 'apprequests',
					message: 'Invite friends to play Spotmania',
					//filters: "['app_users']",
					filters: "['app_non_users']",
				  }, requestCallback);
			});
			
			$("#inviteMenu").click(function() {
				  FB.ui({method: 'apprequests',
					message: 'Play Spotmania',
					//filters: "['app_users']",
					filters: "['app_non_users']",
				  }, requestCallback);
			});
			
			function requestCallback(response) {
				// Handle callback here
			}
			
			$("#hiscoreUpDiv").click(function() {
				
				if (hiScoresPage> 1) {
					hiScoresPage--;
					clearHiScores();
					populateHiScores((hiScoresPage-1)*10);
				}
			});
			$("#hiscoreDownDiv").click(function() {
			
				//find out actual length of hiscore
				var hiscoreType = 6;
				//check fb or world, if worldhiscore is on, change to using worldscore
				if ($("#hiscoreWorldCtl").hasClass("hiscoreOn")) {
					hiscoreType = 5;
				}
				
				if ((hiScoresPage<3)&&(hiScores[hiscoreType].length>(hiScoresPage*10))) {
					hiScoresPage++;
					clearHiScores();
					populateHiScores((hiScoresPage-1)*10);
				}
			});
			
			$("#hiscoreFriendsCtl").click(function() {
				//alert("yo");	
				if ($(this).hasClass("hiscoreOff")) {
					//clearHiScores();
					$(this).removeClass('hiscoreOff');
					$(this).addClass('hiscoreOn');
					$("#hiscoreWorldCtl").removeClass('hiscoreOn');
					$("#hiscoreWorldCtl").addClass('hiscoreOff');
					//set page as 1
					hiScoresPage = 1;
					//getHiScores("fbscores");
					populateHiScores((hiScoresPage-1)*10);
				}				
			});
			$("#hiscoreWorldCtl").click(function() {
				if ($(this).hasClass("hiscoreOff")) {
					//clearHiScores();
					$(this).removeClass('hiscoreOff');
					$(this).addClass('hiscoreOn');
					$("#hiscoreFriendsCtl").removeClass('hiscoreOn');
					$("#hiscoreFriendsCtl").addClass('hiscoreOff');
					//set page as 1
					hiScoresPage = 1;
					//getHiScores("scores");
					populateHiScores((hiScoresPage-1)*10);
				}			
			});
			
			$("#startBtn").click(function() {
				$("#gameScreen").show();
				$("#startScreen").hide();
				clearInterval ( progressIntervalId );
				progressIntervalId = setInterval ( timerProgress, intervalTime);
				gameState = 1;
			});
			
			$("#nextBtn").click(function() {				
				
				if (removeads<1) {
					$("#startScreen").hide();
					$("#continueScreen").hide();
					$('#adScreen').show();	
				} else {
					$("#startScreen").hide();
					$("#continueScreen").hide();
					continueBtnClick ();	
				}
				
			});
			
			$("#gameoverBtn").click(function() {				
				if (removeads<1) {
					$("#startScreen").hide();
					$("#gameoverScreen").hide();
					$('#adScreen').show();	
				} else {
					$("#startScreen").hide();
					$("#gameoverScreen").hide();
					continueBtnClick ();
				}
				
			});
			$("#clueCtl").click(function() {
			
				if (gameClues > 0) {
					//detect spot
					spotFlag=0;
					
					for (i=0;i<5;i++) {	
					
						if ((spotFlag==0)&&(spotsFound[i]==0)) {
						
														
							spotFlag = 1;
							spotsFound[i]=1;							
						
							//alert("click");
							
							drawEllipse(ctx1, parseInt(unescape(spotsData[0][i][0])), parseInt(unescape(spotsData[0][i][1])), parseInt(unescape(spotsData[0][i][2])), parseInt(unescape(spotsData[0][i][3])), "#00FFFF", 3);	
							
							drawEllipse(ctx1, parseInt(unescape(spotsData[0][i][0])), parseInt(unescape(spotsData[0][i][1])), parseInt(unescape(spotsData[0][i][2])), parseInt(unescape(spotsData[0][i][3])), "#FFFFFF", 1);

							drawEllipse(ctx2, parseInt(unescape(spotsData[0][i][0])), parseInt(unescape(spotsData[0][i][1])), parseInt(unescape(spotsData[0][i][2])), parseInt(unescape(spotsData[0][i][3])),"#00FFFF", 3);	
							
							drawEllipse(ctx2, parseInt(unescape(spotsData[0][i][0])), parseInt(unescape(spotsData[0][i][1])), parseInt(unescape(spotsData[0][i][2])), parseInt(unescape(spotsData[0][i][3])),"#FFFFFF", 1);
							
							gameClues--; 
							$("#clues").html(gameClues);	

							if ((spotsFound[0]==1)&&(spotsFound[1]==1)&&(spotsFound[2]==1)&&(spotsFound[3]==1)&&(spotsFound[4]==1)) {
								completed();											
							}							
						}
					}
				
				}
			});
			
			//event will be added to all new elements with this class
			$(document).on("click", "#continueBtn", function(){
				continueBtnClick ();				
			});
			
			function continueBtnClick () {
			
				if (gameState==2) {
				
					$("#gameScreen").show();
					$('#adScreen').remove();
					
					clearInterval ( progressIntervalId );
					progressIntervalId = setInterval ( timerProgress, intervalTime);
					gameState = 1;
				} else {
					$("#startScreen").show();
					$('#adScreen').remove();					
					clearInterval ( progressIntervalId );
					startGame();
				}
			
			}
			
	
		
			$("#canvas1").mouseup(function(e) {
			
				//$("#result").html(e.pageX+", "+e.pageY);
				$("#result").html(String(parseInt(e.pageX)-canvasLeft)+", "+String
				(parseInt(e.pageY)-canvasTop));
				
				//alert(parseInt(e.pageX));
				//alert(parseInt(e.pageY));
				
				 if (gameState==1) {
					checkSpots(parseInt(e.pageX)-canvasLeft, parseInt(e.pageY)-canvasTop);
				} 
			});
		
			$("#canvas2").mouseup(function(e) {
			
				$("#result").html(String(parseInt(e.pageX)-canvasLeft-293)+", "+String
				(parseInt(e.pageY)-canvasTop));
				
				if (gameState==1) {
					//checkSpots(parseInt(e.pageX) - 288, parseInt(e.pageY));
					checkSpots(parseInt(e.pageX)-canvasLeft-293, parseInt(e.pageY)-canvasTop);
					//alert(parseInt(e.pageX) - 288);
					//alert(parseInt(e.pageY));
				}
			});
		
			function checkSpots(xp, yp) {
				//alert(e.pageX +', '+ e.pageY); 
				
				spotFlag = 0;
				
				//detect spot
				for (i=0;i<5;i++) {	
				
					if ((spotFlag==0)&&(spotsFound[i]==0)) {
					
						//find x1 and x2
						x1 = parseInt(unescape(spotsData[0][i][0]));
						x2 = x1 + parseInt(unescape(spotsData[0][i][2]));
						
						//find y1 and y2
						y1 = parseInt(unescape(spotsData[0][i][1]));
						y2 = y1 + parseInt(unescape(spotsData[0][i][3]));
						
						if ((xp>x1)&&(xp<x2)&&(yp>y1)&&(yp<y2)) {
						
							spotFlag = 1;
							spotsFound[i]=1;							
						
							//alert("click");
							
							drawEllipse(ctx1, parseInt(unescape(spotsData[0][i][0])), parseInt(unescape(spotsData[0][i][1])), parseInt(unescape(spotsData[0][i][2])), parseInt(unescape(spotsData[0][i][3])), "#00FF00", 3);	
							
							drawEllipse(ctx1, parseInt(unescape(spotsData[0][i][0])), parseInt(unescape(spotsData[0][i][1])), parseInt(unescape(spotsData[0][i][2])), parseInt(unescape(spotsData[0][i][3])), "#FFFFFF", 1);

							drawEllipse(ctx2, parseInt(unescape(spotsData[0][i][0])), parseInt(unescape(spotsData[0][i][1])), parseInt(unescape(spotsData[0][i][2])), parseInt(unescape(spotsData[0][i][3])),"#00FF00", 3);	
							
							drawEllipse(ctx2, parseInt(unescape(spotsData[0][i][0])), parseInt(unescape(spotsData[0][i][1])), parseInt(unescape(spotsData[0][i][2])), parseInt(unescape(spotsData[0][i][3])),"#FFFFFF", 1);
							
							progress = Math.min(progress + 45, progressMax);
							$("#timeBarBg").css('width' , progress + "px");
							
						}
					}
				}
				
				if (spotFlag==0) {
					progress = Math.max(progress - 100, 0);
					$("#timeBarBg").css('width' , progress + "px");
					//alert("wrong");
				
				}
				else if ((spotsFound[0]==1)&&(spotsFound[1]==1)&&(spotsFound[2]==1)&&(spotsFound[3]==1)&&(spotsFound[4]==1)) {
				//else {	

					completed();
				
				}
			};
			
			function completed() {
				
					
				//calculate score
				gameScore = progress+gameScore;
				gamePhotos++;
				
				//$('body').append(adStr);
				
				gameTime = progressMax-progress;
				
				//gameClues = spotsData[4];
				
				clearInterval ( progressIntervalId );
				
				$("#overlayText").html("COMPLETED!");
				$("#overlay").show();
				
				$("#gameScore").html(number_format(gameScore));
				$("#gamePhotos").html(number_format(gamePhotos));
				//$("#clues").html(gameClues);
				
				$("#continueScore").html(number_format(gameScore));
				$("#continuePhotos").html(number_format(gamePhotos));
				
				//$("#nextBtn").hide();
				
				/*
				if (isset($_POST["stageScore"])) {
					$stageScore = $_POST["stageScore"];
				}
				if (isset($_POST["stageTime"])) {
					$stageTime = $_POST["stageTime"];
				}	
				if (isset($_POST["clue"])) {
					$clue = $_POST["clue"];
				}
				*/					
				
				setTimeout(function() {saveGame();},2000);
				//alert("all found!");
				gameState = 2;
			
			}
			
			function number_format(x) {
				if (x) {
					return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				} else {
					return 0;
				}
			}
			
			function saveGame()
			{
				
				$("#gameScreen").hide();
				
				if (removeads<1) {
					$("#continueScreenLoadingDiv").hide();
					$("#nextBtn").show();
				} else {
					$("#continueScreenLoadingDiv").show();
					$("#nextBtn").hide();
				}
				$("#continueScreen").show();
				
				progress = progressMax;				
				$("#timeBarBg").css('width' , progress + "px");
				spotsFound = new Array(0,0,0,0,0);
			
				/*$.ajax({
					type: "POST",
					url: "process.php",
					data: "type=" + "saveGame" + "&stageScore="+ gameScore + "&stageTime="+ gameTime + "&clue="+ gameClues + signedRequest,
					dataType: 'json'
				}).done(function(data) {
				
					spotsData = data;
					
					
					gameScore = parseInt(spotsData[2]);
					gamePhotos = parseInt(spotsData[3]);
					gameClues = parseInt(spotsData[4]);
					
					$("#gameScore").html(number_format(gameScore));
					$("#gamePhotos").html(number_format(gamePhotos));
					$("#clues").html(gameClues);					
					
					if ( $.browser.msie ) {						
						img1.src = "showImg.php?"+spotsData[1][0];
						img2.src = "showImg.php?"+spotsData[1][1];						
					} else {
						img1.src = "showImg.php?"+spotsData[1][0];
						img2.src = "showImg.php?"+spotsData[1][1];
					}							
					
				});	*/
			}
			
			function drawOval(context, x, y, rw, rh)
			{
			  //var canvas = document.getElementById("canvas4"); 
			  //var context = canvas.getContext("2d");
			  context.save();
			  context.scale(1,  rh/rw);
			  context.beginPath();
			  context.arc(x, y, 10, 0, 2 * Math.PI);
			  context.restore();
			  context.lineWidth=4;
			  context.strokeStyle="orange";
			  context.stroke();  
			}		
		
		});

	</script>
	

	
</body>
</html>
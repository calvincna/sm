    //https://calvincna.github.io/sm/new2/index.html?fs=1&en1=0&trace=0&area=0
    
    // variables used to detect and manage swipes
     var startswX;
     var startswY;
     var endswX;
     var endswY;
    
    var updateDelay = 0;

	var mainTop = 0;
	
	var canvasWidth = 400;
	var canvasHeight = 640;

	var mainOffsetX = 20;
	var mainOffsetY = 20;
	
	var gStep = 0;
	var gDir = "left";
	
	var mainWidth = canvasWidth - (mainOffsetX);
	var mainHeight = canvasHeight - (mainOffsetY);
	
	var gPoly;
	var graphics;
	var graphicsLine;
	var graphics2;
	var line1;
	var line2;
	
	var en1prevx;
	var en1prevy;
	var en1SpdX = 26;
	var en1SpdY = 26;
	var en1Size = 50;
	
	var traceArr = [];
	
	var gArr = [
	  [mainOffsetX, mainOffsetY],
	  [mainWidth, mainOffsetY],
	  [mainWidth, mainHeight],
	  [mainOffsetX, mainHeight]
	];
	
	var traceOpt = false;
	var en1Opt = false;
	var fsOpt = false;
	var areaOpt = false;
	
	if	(getParameterByName('trace')) {
		if (getParameterByName('trace')!="0") {
			traceOpt = getParameterByName('trace');
		}
	}
	if	(getParameterByName('en1')) {
		if (getParameterByName('en1')!="0") {
			en1Opt = getParameterByName('en1');
		}
	}
	if	(getParameterByName('fs')) {
		if (getParameterByName('fs')!="0") {
			fsOpt = getParameterByName('fs');
		}
	}
	if	(getParameterByName('area')) {
		if (getParameterByName('area')!="0") {
			areaOpt = getParameterByName('area');
		}
	}

var Game = {

	init: function () {

		this.game.renderer.renderSession.roundPixels = true;
		this.physics.startSystem(Phaser.Physics.ARCADE);

	},

    preload : function() {
    
    	if (!fsOpt) {
			this.game.scale.scaleMode = Phaser.ScaleManager.SHOW_ALL;
			this.game.scale.pageAlignHorizontally = true;
			this.game.scale.pageAlignVertically = true;
		}
        // Here we load all the needed resources for the level.
        this.load.image('background', 'assets/images/back.png');
		//this.load.image('foreground', 'assets/images/fore.png');
		this.load.image('player', 'assets/images/cr.png');
		this.load.spritesheet('en1', 'assets/images/en1.png');
		//this.load.bitmapFont('shmupfont', 'assets/images/shmupfont.png', 'assets/images/shmupfont.xml');
		this.load.bitmapFont('carrier_command', 'assets/images/carrier_command.png', 'assets/images/carrier_command.xml');
		this.load.image('wall', 'assets/images/bullet11.png');
		this.load.image('trace', 'assets/images/bullet11.png');
    },

    create : function() {

        // By setting up global variables in the create function, we initialise them on game start.
        // We need them to be globally available so that the update function can alter them.
        
		background = null;
		foreground = null;
		player = null;
		mode = 0;
		turn = "down";

        game.stage.backgroundColor = '#061f27';
    },

    update: function() {
        // The update function is called constantly at a high rate (somewhere around 60fps)
        
    },

    
    traceOverlap: function () {
		//alert("Game over");
		//location.reload();
		//en1.destroy();
				
	}

};

function getParameterByName(name, url) {
	if (!url) url = window.location.href;
	name = name.replace(/[\[\]]/g, '\\$&');
	var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
		results = regex.exec(url);
	if (!results) return null;
	if (!results[2]) return '';
	return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
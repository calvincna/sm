<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />

<style>

#image1 {
	width:396px;
	height:480px;
	border:0px solid black;
	background-color:yellow;
	float:left;
}
#image2 {
	width:396px;
	height:480px;
	border:0px solid black;
	background-color:blue;
	float:left;
}
.draggable {
	width:100px;
	height:100px;
	position:absolute;
	z-index:999;
}
.draggableno {
	width:100px;
	height:100px;
	position:absolute;
	z-index:999;
}
.info {
	padding:20px;
	float:left;
	width:400px;
}
.clear {
	clear:both;
}
.ui-resizable-n { cursor: n-resize; height: 3px; width: 3px; top: -3px; left: 100px; border: 1px solid #000000; background:#E8E8E8 none;}
.ui-resizable-s { cursor: s-resize; height: 3px; width: 3px; bottom: -3px; left: 100px; border: 1px solid #000000; background:#E8E8E8 none;}
.ui-resizable-e { cursor: e-resize; width: 3px; right: -3px; top: 20px; height: 3px; border: 1px solid #000000; background:#E8E8E8 none;}
.ui-resizable-w { cursor: w-resize; width: 3px; left: -3px; top: 20px; height: 3px; border: 1px solid #000000; background:#E8E8E8 none; }
.ui-resizable-se { cursor: se-resize; width: 3px; height: 3px; right: -3px; bottom: -3px; border: 1px solid #000000; background:#E8E8E8 none; }
.ui-resizable-sw { cursor: sw-resize; width: 3px; height: 3px; left: -3px; bottom: -3px; border: 1px solid #000000; background:#E8E8E8 none; }
.ui-resizable-nw { cursor: nw-resize; width: 3px; height: 3px; left: -3px; top: -3px; border: 1px solid #000000; background:#E8E8E8 none; }
.ui-resizable-ne { cursor: ne-resize; width: 3px; height: 3px; right: -3px; top: -3px; border: 1px solid #000000; background:#E8E8E8 none; }

</style>
<?php
if (!is_finite($_GET["item"])) {
	$_GET["item"]="1";	
}
if (!isset($_GET["item"])) {
	$_GET["item"]="1";
}
$myXML = "data.xml";
//var_dump(itemGet($myXML,$_GET["item"]));
$currentData = itemGet($myXML,$_GET["item"]);
//var_dump($currentData);
//echo $currentData[0]->spot1->posx;

?>
<script>
$(document).ready(function() {

    function xtractNums(str){
        return str.match(/\d+/g);
    }

	var selected=$("#spot1");
	itemId = <?php echo $_GET["item"]; ?>;

	$("#navBtn").live('mousedown', function(event) {
		//alert($("#navId").val());
		event.returnValue=false;
		window.location.href = "?item=" + $("#navId").val();
		
		//window.location.href = "http://www.test.com";
		//return false;
		
	});

		$( ".draggable" ).draggable({
  			 drag: function(event, ui) {
				//alert(ui.offset.left);
				$("#"+selected.attr("id")+"b").css("left", (ui.offset.left+396)+"px");
				$("#"+selected.attr("id")+"b").css("top", (ui.offset.top)+"px");
  			 }
		});

		$(".draggable").live('mousedown', function(event) {

			//$( ".draggable" ).resizable( "destroy" );
			//$(".draggable").resizable( "option", "disabled", true );
			//$('.selector').resizable({ alsoResize: '.other,.another,.andmanymore' });
			selected = $(this);
			$(this).resizable({
				alsoResize : '#img' + selected.attr("id") + ",#" + selected.attr("id") +"b,#img" + selected.attr("id") +"b",
				handles: 'se,sw,nw,ne'
				//minHeight: 50,
				//minWidth: 50,
			});
		});

		$("#save").live('mousedown', function(event) {

			//spots="";
			for (x=1;x<6;x++) {
				//eval("var temp_" + data + "=123;");
				//eval("spot" + x + " = " + xtractNums($("#spot" + x ).css("width")) + "," + xtractNums($("#spot" + x ).css("height")) + "," + xtractNums($("#spot" + x ).css("left")) + "," + xtractNums($("#spot" + x ).css("top")));
				spottext = xtractNums($("#spot" + x ).css("width")) + "," + xtractNums($("#spot" + x ).css("height")) + "," + xtractNums($("#spot" + x ).css("left")) + "," + xtractNums($("#spot" + x ).css("top"));
				eval("spot" + x + " = '" + spottext + "'");
			}

			//alert(spottext);
			spotData = "spot1=" + spot1 + "&spot2=" + spot2 + "&spot3=" + spot3 + "&spot4=" + spot4 + "&spot5=" + spot5;
			//alert(spotData);
			$.ajax({
				url: 'save.php',
				data: 'item=' + itemId + "&" + spotData,
				type: 'POST',
				success: function(msg) {
					alert("saved");
				}
			});
		});
	});
</script>

<div class="draggable" id="spot1" style="width:<?php echo $currentData[0]->spot1->sizex; ?>px;height:<?php echo $currentData[0]->spot1->sizey; ?>px;left:<?php echo $currentData[0]->spot1->posx; ?>px;top:<?php echo $currentData[0]->spot1->posy; ?>px">
	<img id="imgspot1" src="http://dl.dropbox.com/u/13024782/data/ring1.png"  style="width:<?php echo $currentData[0]->spot1->sizex; ?>px;height:<?php echo $currentData[0]->spot1->sizey; ?>">
</div>
<div class="draggable" id="spot2" style="width:<?php echo $currentData[0]->spot2->sizex; ?>px;height:<?php echo $currentData[0]->spot2->sizey; ?>px;left:<?php echo $currentData[0]->spot2->posx; ?>px;top:<?php echo $currentData[0]->spot2->posy; ?>px">
	<img id="imgspot2" src="http://dl.dropbox.com/u/13024782/data/ring2.png"  style="width:<?php echo $currentData[0]->spot2->sizex; ?>px;height:<?php echo $currentData[0]->spot2->sizey; ?>">
</div>
<div class="draggable" id="spot3" style="width:<?php echo $currentData[0]->spot3->sizex; ?>px;height:<?php echo $currentData[0]->spot3->sizey; ?>px;left:<?php echo $currentData[0]->spot3->posx; ?>px;top:<?php echo $currentData[0]->spot3->posy; ?>px">
	<img id="imgspot3" src="http://dl.dropbox.com/u/13024782/data/ring3.png"  style="width:<?php echo $currentData[0]->spot3->sizex; ?>px;height:<?php echo $currentData[0]->spot3->sizey; ?>">
</div>
<div class="draggable" id="spot4" style="width:<?php echo $currentData[0]->spot4->sizex; ?>px;height:<?php echo $currentData[0]->spot4->sizey; ?>px;left:<?php echo $currentData[0]->spot4->posx; ?>px;top:<?php echo $currentData[0]->spot4->posy; ?>px">
	<img id="imgspot4" src="http://dl.dropbox.com/u/13024782/data/ring4.png" style="width:<?php echo $currentData[0]->spot4->sizex; ?>px;height:<?php echo $currentData[0]->spot4->sizey; ?>">
</div>
<div class="draggable" id="spot5" style="width:<?php echo $currentData[0]->spot5->sizex; ?>px;height:<?php echo $currentData[0]->spot5->sizey; ?>px;left:<?php echo $currentData[0]->spot5->posx; ?>px;top:<?php echo $currentData[0]->spot5->posy; ?>px">
	<img id="imgspot5" src="http://dl.dropbox.com/u/13024782/data/ring5.png"  style="width:<?php echo $currentData[0]->spot5->sizex; ?>px;height:<?php echo $currentData[0]->spot5->sizey; ?>">
</div>

<div class="draggableno" id="spot1b" style="width:<?php echo $currentData[0]->spot1->sizex; ?>px;height:<?php echo $currentData[0]->spot1->sizey; ?>px;left:<?php echo $currentData[0]->spot1->posx+396; ?>px;top:<?php echo $currentData[0]->spot1->posy; ?>px">
	<img id="imgspot1b" src="http://dl.dropbox.com/u/13024782/data/ring1.png"  style="width:<?php echo $currentData[0]->spot1->sizex; ?>px;height:<?php echo $currentData[0]->spot1->sizey; ?>">
</div>
<div class="draggableno" id="spot2b" style="width:<?php echo $currentData[0]->spot2->sizex; ?>px;height:<?php echo $currentData[0]->spot2->sizey; ?>px;left:<?php echo $currentData[0]->spot2->posx+396; ?>px;top:<?php echo $currentData[0]->spot2->posy; ?>px">
	<img id="imgspot2b" src="http://dl.dropbox.com/u/13024782/data/ring2.png"  style="width:<?php echo $currentData[0]->spot2->sizex; ?>px;height:<?php echo $currentData[0]->spot2->sizey; ?>">
</div>
<div class="draggableno" id="spot3b" style="width:<?php echo $currentData[0]->spot3->sizex; ?>px;height:<?php echo $currentData[0]->spot3->sizey; ?>px;left:<?php echo $currentData[0]->spot3->posx+396; ?>px;top:<?php echo $currentData[0]->spot3->posy; ?>px">
	<img id="imgspot3b" src="http://dl.dropbox.com/u/13024782/data/ring3.png"  style="width:<?php echo $currentData[0]->spot3->sizex; ?>px;height:<?php echo $currentData[0]->spot3->sizey; ?>">
</div>
<div class="draggableno" id="spot4b" style="width:<?php echo $currentData[0]->spot4->sizex; ?>px;height:<?php echo $currentData[0]->spot4->sizey; ?>px;left:<?php echo $currentData[0]->spot4->posx+396; ?>px;top:<?php echo $currentData[0]->spot4->posy; ?>px">
	<img id="imgspot4b" src="http://dl.dropbox.com/u/13024782/data/ring4.png" style="width:<?php echo $currentData[0]->spot4->sizex; ?>px;height:<?php echo $currentData[0]->spot4->sizey; ?>">
</div>
<div class="draggableno" id="spot5b" style="width:<?php echo $currentData[0]->spot5->sizex; ?>px;height:<?php echo $currentData[0]->spot5->sizey; ?>px;left:<?php echo $currentData[0]->spot5->posx+396; ?>px;top:<?php echo $currentData[0]->spot5->posy; ?>px">
	<img id="imgspot5b" src="http://dl.dropbox.com/u/13024782/data/ring5.png"  style="width:<?php echo $currentData[0]->spot5->sizex; ?>px;height:<?php echo $currentData[0]->spot5->sizey; ?>">
</div>

<?php
	$itemId = $_GET["item"];
	//if (strlen($str)<2) {
	//	$itemId = "00".$itemId;
	//} else if (strlen($str)<3) {
	//	$itemId = "0".$itemId;
	//}
?>

<div class="imageMain" id="image1">
	<img src="http://dl.dropbox.com/u/13442762/images/florence/<?php echo $itemId; ?>_a.jpg" class="left">
	<div class="clear"></div>
</div>
<div class="imageMain" id="image2">
	<img src="http://dl.dropbox.com/u/13442762/images/florence/<?php echo $itemId; ?>_b.jpg" class="right">
	<div class="clear"></div>
</div>

<div class="info">
	<div>
		<button id="save">Save</button>
	</div>
	
	<br></br>
	

		 Load image: <input type="text" id="navId" /><button id="navBtn">Go</button>

	
	<br></br>
	
	<div>
		1. Save your images to dropbox folder public/images
	</div>
	<div>
		2. Use firefox and go to http://playchap.com/spotmaker/make.php?item=4 where item is the image number you wish to edit.
	</div>
	<div>
		3. Move the spots on the left and resize them as required. (Spots on the right cannot be moved or resized but they will follow the left side ones)
	</div>
	<div>
		4. Click on save when you are done. You can always come back to change anything later.
	</div>


</div>

<?php

//$itemArr = array();
//$spotArr = array("posx" => 11, "posy" => 11, "sizex" => 11, "sizey" => 11);
//$itemArr["spot1"] = $spotArr;
//$spotArr = array("posx" => 22, "posy" => 22, "sizex" => 22, "sizey" => 22);
//$itemArr["spot2"] = $spotArr;
//$spotArr = array("posx" => 33, "posy" => 33, "sizex" => 33, "sizey" => 33);
//$itemArr["spot3"] = $spotArr;
//$spotArr = array("posx" => 44, "posy" => 44, "sizex" => 44, "sizey" => 44);
//$itemArr["spot4"] = $spotArr;
//$spotArr = array("posx" => 55, "posy" => 55, "sizex" => 55, "sizey" => 55);
//$itemArr["spot5"] = $spotArr;

//itemAdd($myXML, "1", $itemArr);
//itemRemove("data.xml","1");
//test($itemArr);
//echo count(itemGet($myXML,"1"));

//to get a node by id
function itemGet($myXML, $id) {
	$xmlStr = file_get_contents($myXML);
	$xml = new SimpleXMLElement($xmlStr);
	$res = $xml->xpath('//item[@id="'.(int)$id.'"]');
	return $res;
}

//to remove a node by id
function itemRemove($myXML, $id) {
    $xmlDoc = new DOMDocument();
    $xmlDoc->load($myXML);
    $xpath = new DOMXpath($xmlDoc);
    $nodeList = $xpath->query('//item[@id="'.(int)$id.'"]');
    if ($nodeList->length) {
        $node = $nodeList->item(0);
        $node->parentNode->removeChild($node);
    }
    $xmlDoc->save($myXML);
}

//to write new node
function itemAdd($myXML, $id, $data) {

	$doc = new DOMDocument();
	$doc->load($myXML);

	$doc->formatOutput = true;
	$parentNode = $doc->getElementsByTagName("items")->item(0);

	$itemNode = $doc->createElement("item");

	// create attribute node
	$idNode = $doc->createAttribute("id");
	$itemNode->appendChild($idNode);

	// create attribute value node
	$idVal = $doc->createTextNode($id);
	$idNode->appendChild($idVal);

	for ($x=1; $x<6; $x++) {

		$spot = $doc->createElement("spot".$x);
		$itemNode ->appendChild( $spot );

		foreach ($data["spot".$x] as $key => $value) {

			$newNode = $doc->createElement($key);
			$newNode->appendChild(
			    $doc->createTextNode($value)
			);
			$spot ->appendChild($newNode);
		}
	}

	$parentNode ->appendChild($itemNode);
	$doc->save($myXML);
}
?>
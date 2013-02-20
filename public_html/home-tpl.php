<div id="main">

<div class="row">
<div class="twelvecol">
<h1><img class="left-ribbon" src="//<?=$host;?>/images/TitleRibbonLeft.png" />THE PHP UK CONFERENCE<img class="right-ribbon" src="//<?=$host;?>/images/TitleRibbonRight.png"/></h1>
<p>PHP London are pleased to announce our 8th Annual PHP UK
conference. It will be two days crammed with great talks and amazing
socials. </p>
</div>
</div>
<div class="row">
<div class="fourcol">
<h1><img class="left-ribbon" src="//<?=$host;?>/images/TitleRibbonLeft.png" />CONFERENCE<img class="right-ribbon" src="//<?=$host;?>/images/TitleRibbonRight.png"/></h1>
<p>This year's conference is the most exciting PHP UK ever! We have a fantastic schedule with great speakers from all around the world. Our keynotes are the
brilliant <a href="aralbalkan.com" target="_blank">Aral Balkan</a> who will open Friday's sessions and the Diabolical Devloper, who after many years tormenting the Java community,
 has turned his attention to PHP. Be afraid! 
</div>
<div class="fourcol">
<h1><img class="left-ribbon" src="//<?=$host;?>/images/TitleRibbonLeft.png" />VENUE<img class="right-ribbon" src="//<?=$host;?>/images/TitleRibbonRight.png"/></h1>
If you are joining us you should plan to be at the <a href="http://www.thebrewery.co.uk/" target="_blank">Brewery</a>, <a href="http://goo.gl/maps/0y6mz" target="_blank">52 Chiswell Street</a> by 09:00 at the very latest. 
The closest tube stations are equally Barbican or Moorgate (Metropolitan, Hammersmith & City, or Circle lines).  
Old Street (Northern line) or Liverpool Street (Metropolitan, Hammersmith & City,  Circle and Central lines) are also within a few minutes walk.
</div>
<div class="fourcol last">
<h1><img class="left-ribbon" src="//<?=$host;?>/images/TitleRibbonLeft.png" />EVENING<img class="right-ribbon" src="//<?=$host;?>/images/TitleRibbonRight.png"/></h1>
Great conferences are not just about what you do in the day - they are about networking and the friends you will make in the evening. We think this is especially important - 
so we have plans for you! Thusday night is at <a href="http://www.cafekick.co.uk/bar-kick/">Bar Kick</a> on <a href="http://goo.gl/maps/hwmJT" target="_blank">127 Shoreditch high Street</a> - there will be food, drinks and <a href="https://twitter.com/marcgear">Marc Gear</a>'s talk Node.js vs PHP Smackdown. Look 
at the <a href="http://phpconference.co.uk/socials" target="_blank"> socials </a> page to see what else we have lined up!
</div>
</div>
<br>
<br>

<div id="sponsor-logos-bar">
</div>
<?php 
require_once('functions.php');
$logos = array ("AUTOMA" => array("http://www.automattic.com" , "GOLD TRACK", "gold"),
				"INVIQA" => array("http://inviqa.com", "GOLD TRACK", "gold"), 
                "SENSIO" => array("http://sensiolabs.co.uk", "GOLD TRACK", "gold"),
                "WEBANDPHP" => array("http://www.webandphp.com" , "MEDIA PARTNER", "blue"),
                "ZT" => array("http://zeroturnaround.com" , "LOCAL", "blue"),
                "ENGINE" => array("http://www.engineyard.com" , "SOCIAL", "blue"),
                "PUSHER" => array("http://www.pusher.com" , "HACKATHON", "blue"),
                "TWILIO" => array("http://www.twilio.com" , "HACKATHON", "blue"),
                "OREILLY" => array("http://www.oreilly.com" , "BRONZE", "blue"),
                "GITHUB" => array("http://www.github.com" , "SOCIAL", "blue"),
                "TENGEN" => array("http://www.10gen.com" , "BRONZE", "blue"),
                "IMAKR" => array("http://www.imakr.vc" , "LOCAL", "blue"),
                "JETB" => array("http://www.jetbrains.com" , "BRONZE", "blue")               
                );
display_logos($logos);
?>


</div><!-- main-->
<div class="push"></div>
</div><!-- page -->

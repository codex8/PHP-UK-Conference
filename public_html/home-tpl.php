<div id="main">

<div class="row">
<div class="twelvecol">
<h1><img class="left-ribbon" src="//<?=$host;?>/images/TitleRibbonLeft.png" />THE CONFERENCE<img class="right-ribbon" src="//<?=$host;?>/images/TitleRibbonRight.png"/></h1>
<p>PHP London are pleased to announce our 8th Annual PHP UK
conference. It will be two days crammed with great talks and amazing
socials. This year the conference will be in the Brewery in the heart of
the City of London.</p>
<p>Check out our fantastic <a href="/speakers">speakers</a> and <a href="/schedule">schedule!</a></p>
<p>Click on the ticket image above to buy now and beat the crowd!</p>
</div>
</div>
<div id="sponsor-logos-bar">
</div>
<?php 
require_once('functions.php');
$logos = array ("AUTOMA" => array("http://www.automattic.com" , "GOLD TRACK", "gold"),
				"INVIQA" => array("http://inviqa.com", "GOLD TRACK", "gold"), 
                "SENSIO" => array("http://sensiolabs.co.uk", "GOLD TRACK", "gold"),
                "WEBANDPHP" => array("http://www.webandphp.com" , "MEDIA PARTNER", "blue"),
                "ZT" => array("http://zeroturnaround.com" , "LOCAL", "blue")
                );
display_logos($logos);
?>


</div><!-- main-->
<div class="push"></div>
</div><!-- page -->
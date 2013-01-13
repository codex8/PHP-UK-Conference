<div id="main">

<div class="row">
<div class="sixcol">
<h1><img class="left-ribbon" src="//<?=$host;?>/images/TitleRibbonLeft.png" alt=""/>SAVE
THE DATE<img class="right-ribbon" src="//<?=$host;?>/images/TitleRibbonRight.png" /></h1>
<p>PHP London are pleased to announce our 8th Annual PHP UK
conference. It will be two days crammed with great talks and amazing
socials. This year the conference will be in the Brewery in the heart of
the City of London.</p>
</div>
<div class="sixcol last">
<h1><img class="left-ribbon" src="//<?=$host;?>/images/TitleRibbonLeft.png" />BUY
YOUR TICKETS<img class="right-ribbon" src="//<?=$host;?>/images/TitleRibbonRight.png" /></h1>
<p>Early bird tickets are on sale from 6th December.
Check out our fantastic <a href="/speakers">speakers</a> and <a href="/schedule">schedule!</a>
Click on the ticket image above to buy now and beat the crowd!</p>
</div>
</div>
<div id="sponsor-logos-bar">
</div> 
<?php 
require_once('functions.php');
$logos = array ("INVIQA" => "http://inviqa.com", 
                "SENSIO" => "http://sensiolabs.co.uk" ,
                "WEBANDPHP" => "www.webandphp.com");
display_logos($logos);
?>


</div><!-- main-->
<div class="push"></div>
</div><!-- page -->
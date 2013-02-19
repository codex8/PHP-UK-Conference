<div id="main">
    <h1><img class="left-ribbon" src="//<?=$host;?>/images/TitleRibbonLeft.png" />SPONSORS<img class="right-ribbon" src="//<?=$host;?>/images/TitleRibbonRight.png"/></h1>
    <p>The PHP UK Conference is a not-for-profit event and relies heavily on sponsorship to run the event at rates affordable to the whole community. If you're interested in sponsoring our event, please <a href="mailto:contact@phpconference.co.uk">contact us</a>.</p>
<div id="sponsor-container">

<?php 
require_once('functions.php');
?>
<div id="gold-partners" class="sponsor-type">GOLD TRACK SPONSORS</div>
<div class="row">
<div class="twelvecol">
<?php display_sponsor("AUTOMA"); ?>
</div>
</div>
</div>
<div class="row">
<div class="sixcol">
<?php display_sponsor("INVIQA"); ?>
</div>
<div class="sixcol last">
<?php display_sponsor("SENSIO"); ?>
</div>
</div>

<div class="sponsor-type">MEDIA PARTNERSHIP</div>
<div class="row">
<div class="twelvecol">
<?php display_sponsor("WEBANDPHP"); ?>
</div>
</div>

<div class="sponsor-type">LOCAL PARTNER</div>
<div class="row">
<div class="twelvecol">
<?php display_sponsor("ZT"); ?>
</div>
</div>

<div class="sponsor-type">SOCIAL</div>
<div class="row">
<div class="fourcol">
<?php display_sponsor("ENGINE"); ?>
</div>

<div class="fourcol">
<?php display_sponsor("GITHUB"); ?>
</div>

<div class="fourcol last">
<?php display_sponsor("IMAKR"); ?>
</div>
</div>

<div class="sponsor-type">HACKATHON</div>
<div class="row">
<div class="sixcol">
<?php display_sponsor("TWILIO"); ?>
</div>
<div class="sixcol last">
<?php display_sponsor("PUSHER"); ?>
</div>
</div>

<div class="sponsor-type">BRONZE</div>
<div class="row">
<div class="fourcol">
<?php display_sponsor("OREILLY"); ?>
</div>
<div class="fourcol">
<?php display_sponsor("TENGEN"); ?>
</div>
<div class="fourcol last">
<?php display_sponsor("JETB"); ?>
</div>
</div>

</div><!-- sponsor-container -->
</div><!-- main -->
<div class="push"></div>
</div><!-- page -->

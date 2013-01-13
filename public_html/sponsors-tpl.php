<div id="main">
    <h1><img class="left-ribbon" src="//<?=$host;?>/images/TitleRibbonLeft.png" />SPONSORS<img class="right-ribbon" src="//<?=$host;?>/images/TitleRibbonRight.png"/></h1>
    <p>The PHP UK Conference is a not-for-profit event and relies heavily on sponsorship to run the event at rates affordable to the whole community. If you're interested in sponsoring our event, please <a href="mailto:contact@phpconference.co.uk">contact us</a>.</p>
<div id="sponsor-container">

<?php 
require_once('functions.php');
?>
<div id="gold-partners" class="sponsor-type">GOLD PARTNERSHIP</div>
<div class="row">
<div class="sixcol">
<?php display_sponsor("INVIQA"); ?>
</div>
<div class="sixcol last">
<?php display_sponsor("SENSIO"); ?>
</div>
</div>

<div id="media-partners" class="sponsor-type">MEDIA PARTNERSHIP</div>
<div class="row">
<div class="twelvecol">
<?php display_sponsor("WEBANDPHP"); ?>
</div>

</div>

</div><!-- sponsor-container -->
</div><!-- main -->
<div class="push"></div>
</div><!-- page -->

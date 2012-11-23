<div id="main">
    <h1><img class="left-ribbon" src="//<?=$host;?>/images/TitleRibbonLeft.png" />SCHEDULE<img class="right-ribbon" src="//<?=$host;?>/images/TitleRibbonRight.png"/></h1>
    <p>The schedule will be published on <strong>December 6th 2012</strong>. Until then, why not <a href="/speakers.php">submit a paper</a> and you might be listed here in a couple weeks!</p>
    <div id="submit-abstract"><a href="http://bit.ly/phpukcfp2013" target="_blank" class="standard-button">SUBMIT</a></div>
    <div id="schedule-container">
    <?php 
    
    require_once('functions.php');
	
	$data = getAuthData();
 
   // Gmail email address and password for google spreadsheet

    $user = $data['user'];
    $pass = $data['pass'];
    $scheduleID=$data['schedID'];
    $detailsID=$data['detailsID'];
    
    //Get the data from the Google schedule
    $service = getGoogleSpreadSheetService($user, $pass);
    
    $fridaySchedule = getShedule($service, $scheduleID, 1);
    
    //echo var_export($fridaySchedule, true);
    
    displayDay($fridaySchedule);
    
   
    ?>
   
    </div><!-- schedule-container -->
</div><!-- main-->
<div class="push"></div>
</div><!-- page -->

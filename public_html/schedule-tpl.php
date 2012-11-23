<div id="main">
    <h1><img class="left-ribbon" src="//<?=$host;?>/images/TitleRibbonLeft.png" />SCHEDULE<img class="right-ribbon" src="//<?=$host;?>/images/TitleRibbonRight.png"/></h1>
    <p>The schedule will be published on <strong>December 6th 2012</strong>. Until then, why not <a href="/speakers.php">submit a paper</a> and you might be listed here in a couple weeks!</p>
    <div id="submit-abstract"><a href="http://bit.ly/phpukcfp2013" target="_blank" class="standard-button">SUBMIT</a></div>
    <div id="schedule-container">
    <?php 
    
    
    $input = file('/Users/zoe/authdata.txt');
	foreach($input as $line) {
		list($key, $value) = explode(':',trim($line));
		$data[$key] = $value;
	}
 
   // Gmail email address and password for google spreadsheet

    $user = $data['user'];
    $pass = $data['pass'];
    $scheduleID=$data['schedID'];
    $detailsID=$data['detailsID'];
    
    //Get the data from the Google schedule
    $service = getGoogleSpreadSheetService($user, $pass);
    
    $fridaySchedule = getShedule($spreadSheetService, 1);
    
    echo var_export($fridaySchedule, true);
    
    //Next - need to extract the data
    
    
    
    //One sample row.
    $rowData=array(
             'start' => '09:00', 
             'end' => '10:00', 
             'session-one' => array('title'=>"Title 1", 'name'=>"Fred", 'abstract'=>"Abstract 1"),
             'session-main' => array('title'=>"Title M", 'name'=>"Joe", 'abstract'=>"Abstract 1"),
             'session-two'=> array('title'=>"Title 2", 'name'=>"Mable", 'abstract'=>"Abstract 1"),
             );
    
    
    buildScheduleRow($rowData)
    ?>
   
    </div><!-- schedule-container -->
</div><!-- main-->
<div class="push"></div>
</div><!-- page -->

<?php 
function buildScheduleRow ($rowData) {
?>
		 <div class="schedule-row">
    
    <div class="time-slot">
     
      <div class="start-time ">
      <?php echo $rowData['start']?>
      </div>
     
      <div class="end-time ">
       <?php echo $rowData['end']?>    
      </div>
      
    </div>
    
    <div class="sessions">
       <div class= "row">
       <div class="fourcol session-one">
       <?php buildCell($rowData['session-one'])?>
       </div>
       <div class="fourcol session-main">
         <?php buildCell($rowData['session-main'])?>
       </div>
       <div class="fourcol last session-two">
        <?php buildCell($rowData['session-two'])?>
       </div> 
       </div> 
    </div>
    
    </div>
    <?php 	
}
function buildCell($sessionData) {
	?>
	    <div class="session-title">
        <?php echo $sessionData['title'] ?>
        </div>
        <div class="session-presenter">
        <?php echo $sessionData['name'] ?>      
        </div>
        <div class="session-abstract">
        <?php echo $sessionData['abstract'] ?>      
        </div>
<?php 
}


function getGoogleSpreadsheetService($user, $pass) {
	
	set_include_path("libs/ZendGdata/library");
 
    // Include the loader and Google API classes for spreadsheets
    require_once('Zend/Loader.php');
    Zend_Loader::loadClass('Zend_Gdata');
    Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
    Zend_Loader::loadClass('Zend_Gdata_Spreadsheets');
    Zend_Loader::loadClass('Zend_Http_Client');

    $service = Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME;
    $client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
    $spreadSheetService = new Zend_Gdata_Spreadsheets($client);

    return $spreadSheetService;
}

function getShedule($spreadSheetService, $worksheetID) {
    $query = new Zend_Gdata_Spreadsheets_DocumentQuery();
    $query->setSpreadsheetKey($scheduleID);
    $feed = $spreadSheetService->getWorksheetFeed($query);
    $entries = $feed->entries[$worksheetID]->getContentsAsRows();
    return $entries;
}


?>

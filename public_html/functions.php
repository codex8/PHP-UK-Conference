<?php
/*
 * Build a shedule row where there are three seperate track sessions
 */
function buildTrackRow ($rowData) {
?>
    <div class="schedule-row row">   
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
     <div class="row-divider row"></div>
    <?php 	
}
/*
 * Build a schedule row where the sessions goes across all tracks
 */
function buildCrossTrackRow ($rowData) {
?>
    <div class="schedule-row row">    
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
                <?php 
                $content = $rowData['session-one']['title'];
       
                //colour code the rows
                if (substr($content, 0, 3) == "Roo") {
                    echo '<div class="twelvecol session-rc">';
                } else if(substr($content, 0, 3) == "Key") {
       	            echo '<div class="twelvecol session-key">';
                } else if(substr($content, -3) == "eak") {
       	           echo '<div class="twelvecol session-break">';
                }else {
       	           echo '<div class="twelvecol session-all">';
                }        
                buildCrossCell($rowData['session-one'])?>
                </div>
            </div> 
        </div>
    </div>
     <div class="row-divider row"></div>
    <?php 	
}
/*
 * A single cell entry, no name or abstract
 */
function buildCrossCell($sessionData) {
	?>
	<div class="session-title">
        <?php echo $sessionData['title'] ?>  
    </div>
    <?php 
}
/*
 * A single entry with name and abstract
 */
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

/*
 * Initialise google spreadsheet service
 */
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
/*
 * Get a single days schedule from the spreadsheet
 */
function getSchedule($day) {
	$fileName = $day."Schedule";
    return file_get_contents($fileName);
}
/*
 * Display a single days schedule
 */
function displayDay($schedule, $mastersheet) {
for($i=0; $i<count($schedule); $i++) {
    	$rowData['start'] = substr($schedule[$i]['start'], 0, strlen($schedule[$i]['start']) - 3); // Remove the seconds
    	$rowData['end'] = substr($schedule[$i]['end'], 0, strlen($schedule[$i]['end']) - 3); // Remove the seconds
    	
    	$side2 = $schedule[$i]['sidetrack2'];
    	//var_dump($side2);
    	$main = $schedule[$i]['maintrack'];
    	$side3 = $schedule[$i]['sidetrack3'];
    	
    	//If the first col has something in it but the other two don't this must be
    	//a long row (keynote, break etc)
    	if($side2 !== '') {
    		if ($main == '' && $side3 == '') {
    			$rowData['session-one'] = array('title'=>$side2, 'name'=>"Name", 'abstract'=>"Abstract");
    			buildCrossTrackRow($rowData);
    		} else {
    			$titlekey = substr($side2, 0, 7);
    			$details1 = getFromMaster($mastersheet, $titlekey);
    			if(count($details1) < 1) {$details1 = array($side2, "", "");}	
    		    $rowData['session-one'] = array('title'=>$details1[0], 'name'=>$details1[1], 'abstract'=>$details1[2]);
    		    
    		    $titlekey = substr($main, 0, 7);
    		    $detailsm = getFromMaster($mastersheet, $titlekey);
    		    if(count($detailsm) < 1) {$detailsm = array($main, "", "");}		
    		    $rowData['session-main'] = array('title'=>$detailsm[0], 'name'=>$detailsm[1], 'abstract'=>$detailsm[2]);
    		    
    		    $titlekey = substr($side3, 0, 7);
    		    $details2 = getFromMaster($mastersheet, $titlekey);
    		    if(count($details2) < 1) {$details2 = array($side3, "", "");}		
    		    $rowData['session-two'] = array('title'=>$details2[0], 'name'=>$details2[1], 'abstract'=>$details2[2]);
    		    
    	        buildTrackRow($rowData);  
    	    }
    	}
    }
	
}
/*
 * Get Google authorisation data
 */
function getAuthData() {
	$pathinput = (file('authfilepath.txt'));
	foreach($pathinput as $line) {
		if(substr($line, 0, 1) != '#') {
		    list($id, $path) = explode(':',trim($line));		    
	    }
	}
	
    $input = file($path . '/authdata.txt');
	foreach($input as $line) {
		if(substr($line, 0, 1) != '#') {
		    list($key, $value) = explode(':',trim($line));
		    $data[$key] = $value;
	    }
	}
	return $data;
}
function getFromMaster($master, $key) {
	$a=array();
	
	for($i=0; $i < count($master); $i++) {
		if( substr($master[$i]['title'], 0, 7) == $key) {
			$a[0] = $master[$i]['title'];
			$a[1] = $master[$i]['name'];
			$a[2] = $master[$i]['abstract'];
			return $a;			
		}
	}
	//var_dump($key);
	return $a;
}

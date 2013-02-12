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
                    buildCrossCell($rowData['session-one']);
                } else if((substr($content, 0, 3) == "Key") || (substr($content, 0, 3) == "KEY")) {
       	            echo '<div class="session-key twelvecol">';
       	            echo '<div class="session-key-container">';
       	            buildCrossCell($rowData['session-one']);
       	            echo "</div>";
                } else if(substr($content, -3) == "eak" || substr($content, -3) == "nch") {
       	           echo '<div class="twelvecol session-break">';
       	           buildCrossCell($rowData['session-one']);
                }else {
       	           echo '<div class="twelvecol session-all">';
       	           buildCrossCell($rowData['session-one']);
                } 
                ?>       
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
        <a href="/speakers#<?php echo strtolower(str_replace(' ', '', $sessionData['name'])) ?>"><?php echo $sessionData['name'] ?></a>
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
	$abstracts = array();
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
    			$abstractkey = preg_replace('/\s+/', '', $titlekey);
    			$abstractkey = preg_replace('/\"/', '', $abstractkey);
    			$abstractkey = preg_replace('/,/', '', $abstractkey);
    			$abstracts[$abstractkey]	= $details1[2];
    			$abstract_link = get_abstract_link($abstractkey);
    		    $rowData['session-one'] = array('title'=>$details1[0], 'name'=>$details1[1], 'abstract'=>$abstract_link);
    		    
    		    
    		    $titlekey = substr($main, 0, 7);
    		    $detailsm = getFromMaster($mastersheet, $titlekey);
    		    if(count($detailsm) < 1) {$detailsm = array($main, "", "");}
    		    $abstractkey = preg_replace('/\s+/', '', $titlekey);
    		    $abstractkey = preg_replace('/\"/', '', $abstractkey);
    		    $abstractkey = preg_replace('/,/', '', $abstractkey);
    		    $abstract_link = get_abstract_link($abstractkey);
    		    $abstracts[$abstractkey]	= $detailsm[2];		
    		    $rowData['session-main'] = array('title'=>$detailsm[0], 'name'=>$detailsm[1], 'abstract'=>$abstract_link);
    		    
    		    $titlekey = substr($side3, 0, 7);
    		    $details2 = getFromMaster($mastersheet, $titlekey);
    		    if(count($details2) < 1) {$details2 = array($side3, "", "");}
    		    $abstractkey = preg_replace('/\s+/', '', $titlekey);
    		    $abstractkey = preg_replace('/\"/', '', $abstractkey);
    		    $abstractkey = preg_replace('/,/', '', $abstractkey);
    		    $abstract_link = get_abstract_link($abstractkey);
    		    $abstracts[$abstractkey]	= $details2[2];		
    		    $rowData['session-two'] = array('title'=>$details2[0], 'name'=>$details2[1], 'abstract'=>$abstract_link);
    		    
    	        buildTrackRow($rowData);  
    	    }
    	}
    }
    
    foreach($abstracts as $key=>$abstract) {
    	
    	buildAbstract($key, $abstract);
    	
    
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
function buildAbstract($key, $abstract ) {
	
	?>

<div id="<?php echo $key?>overlay"
	    class="web_dialog_overlay"></div>

<div id="<?php echo $key?>dialog" class="web_dialog abstract">

    <div class="btnClose"><a href="#" onclick="HideAbstract('<?php echo $key?>', event)">Close</a></div>
    <div class="web_dialog_container">
        <div class="row">
            <div class="twelvecol">
                <div class="web_dialog_title">Abstract</div>
            </div>
        </div>
 
       <div class="row">
           <div class="twelvecol">
               <div class="web_dialog_blurb">
                   <p><?php echo $abstract ?></p>
               </div>
           </div>
       </div>

    </div><!-- web_dialog_abstract -->
</div>
<?php
}
function get_abstract_link($key) {
	$key = "'".$key."'";
	$abstract_link = '<a href="" onclick="popUpAbstract(' .  $key . ' , event)">Abstract</a>';
	return $abstract_link;

}
function display_sponsor($sponsor_name) {
    $host =  $_SERVER['HTTP_HOST'];
    $logo =  "/images/sponsors/". $sponsor_name . "_logo.png";   
    $text_file = "texts/sponsors/" . $sponsor_name . ".txt";
?>
    <div id="<?php echo $sponsor_name?>" class="sponsor-heading">
    <div class="sponsor-logo-container">
		<img class="sponsor-logo" src="//<?=$host;?><?php echo $logo ?>" />
	</div>
	</div>
	<div class="sponsor-text">
	<?php echo file_get_contents($text_file) ?>
	
    </div>
    
    <?php 
}

function display_logos($logos) {
    $host =  $_SERVER['HTTP_HOST'];
    foreach($logos as $sponsor_name => $sponsor_data) {
        $logo =  "/images/sponsors/". $sponsor_name . "_logo.png";  
        $col =  $sponsor_data[2]
        ?> 
        <div class="sponsor-home">
        <h3 class="sponsor-logo-heading <?php echo $col?>"><img class="left-ribbon-small" src="//<?=$host;?>/images/TitleRibbonLeft.png" /><?php echo $sponsor_data[1]?><img class="right-ribbon-small" src="//<?=$host;?>/images/TitleRibbonRight.png"/></h3>
        <a href="<?php echo $sponsor_data[0]?>" target="_blank">
        <img class="sponsor-logo-home" src="//<?=$host;?><?php echo $logo ?>"/>
        </a>
        </div>
        <?php
    }
}
?>

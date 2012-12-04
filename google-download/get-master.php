 <?php
 
    $googleDataFile = "/etc/authdata2.txt";
    
    
    $data = getAuthData($googleDataFile);
 
    // Gmail email address and password for google spreadsheet

    $user = $data['user'];
    $pass = $data['pass'];
    $scheduleID=$data['schedID'];
    $detailsID=$data['detailsID'];
    
    //Get the data from the Google schedule
    $service = getGoogleSpreadSheetService($user, $pass);
    
    $mastersheet = getSchedule($service, $scheduleID, 3);    
    $serialisedMaster = serialize($mastersheet);
    
    $config = file("schedule-path.txt");
    foreach($config as $line) {
    		
        if(substr($line, 0, 1) != '#') {
            list($id, $path) = explode(':',trim($line));	
        }   	
    }
    
    file_put_contents($path . '/mastersheet',  $serialisedMaster);
 
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
function getSchedule($spreadSheetService, $scheduleID, $worksheetID) {
    $query = new Zend_Gdata_Spreadsheets_DocumentQuery();
    $query->setSpreadsheetKey($scheduleID);
    $feed = $spreadSheetService->getWorksheetFeed($query);
    $entries = $feed->entries[$worksheetID]->getContentsAsRows();
    return $entries;
}
/*
 * Get Google authorisation data
 */
function getAuthData($authdata) {	
    $input = file($authdata);
	foreach($input as $line) {
		if(substr($line, 0, 1) != '#') {
		    list($key, $value) = explode(':',trim($line));
		    $data[$key] = $value;
	    }
	}
	return $data;
}

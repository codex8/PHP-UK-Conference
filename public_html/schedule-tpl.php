<div id="main">
    
    <div id="schedule-container">
    <?php 
    
    require_once('functions.php');
	
    $mastersheet = unserialize(file_get_contents('mastersheet'));
    
    $fridaySchedule = unserialize(getSchedule('friday'));
    
    //echo var_export($fridaySchedule, true);
    ?>
    <h1 class="schedule">FRIDAY</h1>
    <?php 
    displayDay($fridaySchedule, $mastersheet);
    
    ?>
    <h1 class="schedule">SATURDAY</h1>
    
    <?php
    
    $saturdaySchedule = unserialize(getSchedule('saturday'));
    
    displayDay($saturdaySchedule, $mastersheet);
    
   
    ?>
   
    </div><!-- schedule-container -->
</div><!-- main-->
<div class="push"></div>
</div><!-- page -->

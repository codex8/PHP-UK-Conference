<div id="main">
    <h1><img class="left-ribbon" src="//<?=$host;?>/images/TitleRibbonLeft.png" />SCHEDULE<img class="right-ribbon" src="//<?=$host;?>/images/TitleRibbonRight.png"/></h1>
    <div id="otherthings" class="row">
    	<div class="sixcol">
    		<div id="unconlink">
    		     <h2>Looking for something off the beaten track?</h2>
    		     We will be running the 
    			<a href="/unconference"> Unconference </a> again this year.
    		</div>
    	</div>
    	<div class="sixcol last">
    		<div id="hackathon">
    		<h2>Feeling creative?</h2>
    			We have a brand new <a href="https://www.hackerleague.org/hackathons/php-uk-conference-hackathon/" target="_blank">Hackathon</a> this year!
    		</div>  
    	</div>
    </div>
  
    <div id="schedule-container">
    <?php 
    
    require_once('functions.php');
    
    //Thursday
    ?>
    <div class="row thursday">
       <div class="twocol">		
           <h1 class="thursday-schedule">THURSDAY</h1>
       </div>
       <div class="tencol last">
       <div class="thursday-text">
    		     Start the conference in style! Join us at an exciting new venue for food, drink and a great talk! Details will   
    			be  <a href="/socials"> here </a> very soon!.
   		</div>
    	</div>
    </div>
    <?php 
    
	
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
    
    //Manual add of MVs abstract
     
    ?>
    <div id="Usabilioverlay"
	    class="web_dialog_overlay"></div>

<div id="Diabolidialog" class="web_dialog abstract">

    <div class="btnClose"><a href="#" onclick="HideAbstract('Diaboli', event)">Close</a></div>
    <div class="web_dialog_container">
        <div class="row">
            <div class="twelvecol">
                <div class="web_dialog_title">Abstract</div>
            </div>
        </div>
 
       <div class="row">
           <div class="twelvecol">
               <div class="web_dialog_blurb">
                   <p>The Diabolical Developer has spent the last few years utilising best practices in various languages, 
                   following lean/agile techniques, practising software craftsmanship and listening to the likes of Martin Fowler, 
                   Derick Rethans and Rasmus Lerdorf.</p>

<p>He's discovered that it's all just one giant hoax and he wants to expose the lies that you've been told your entire careers! 
This talk is going to change your life - you'll learn practical steps on how to free yourself from the oppressive chains 
of the industry (and your so called betters) and actually get back to loving development again.</p>
               </div>
           </div>
       </div>

    </div><!-- web_dialog_abstract -->
</div>

    
   
    </div><!-- schedule-container -->
</div><!-- main-->
<div class="push"></div>
</div><!-- page -->

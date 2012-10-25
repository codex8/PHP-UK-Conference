<?php 

include 'header.php';

$menu = strtolower(filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING));
$menu = str_replace("/", "", $menu);
if(empty($menu)) { $menu = "home"; }

switch ($menu) {
    case "home":
        include 'home.php';
        break;
    case "about":
        include 'about.php';
        break;
    case "speakers":
        include 'speakers.php';
        break;
    case "schedule":
        include 'schedule.php';
        break;
    case "sponsors":
        include 'sponsors.php';
        break;
    case "socials":
        include 'socials.php';
        break;
    case "venue":
        include 'venue.php';
        break;
	default:
		include 'home.php';
	break;
}
 include 'footer.php';
 ?>

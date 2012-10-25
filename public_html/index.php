<?php 

include 'header-tpl.php';

$host = $_SERVER['HTTP_HOST'];
$menu = strtolower(filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING));
$menu = str_replace("/", "", $menu);
if(empty($menu)) { $menu = "home"; }

switch ($menu) {
    case "home":
        include 'home-tpl.php';
        break;
    case "about":
        include 'about-tpl.php';
        break;
    case "speakers":
        include 'speakers-tpl.php';
        break;
    case "schedule":
        include 'schedule-tpl.php';
        break;
    case "sponsors":
        include 'sponsors-tpl.php';
        break;
    case "socials":
        include 'socials-tpl.php';
        break;
    case "venue":
        include 'venue-tpl.php';
        break;
	default:
		include 'home-tpl.php';
	break;
}
 include 'footer-tpl.php';
 ?>

<?php require("config.php");?>
<?php include("header.php");?>
<?php 
if ( isset($_GET['view']) ):
    switch ($_GET['view']) :
        case "contact" :
            include("contact.php");
            break;
        case "a-propos" :
            include("about.php");
            break;
            case "editnews" :
                include("news.php");
                break;
        case "secure" :
            include("secure.php");
            break;
        default :
            include("home.php");
    endswitch;
else :
    include("home.php");
endif;
?>
<?php include("footer.php");?>
<?php include "debug.php";?>
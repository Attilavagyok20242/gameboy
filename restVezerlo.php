<?php
require_once("FishingRodrestKezelo.php");
$view="";
if(isset($_GET["view"]))
    $view=$_GET["view"];

    switch($view)
    {
        case "all":
            $games= new GamesRestKezelo();
            $games->getAllGames();
            break;
        
        case "single":
            $games= new GamesRestKezelo();
            $games->getAllGamesBYID($_GET["id"]);
            break;
        
        case "tipus":
            $games= new GamesRestKezelo();
            $games->GetGamesByType($_GET["tid"]);
            break;
        
        default:
            $games= new GamesRestKezelo();
            $games->getFault();
    }

?>
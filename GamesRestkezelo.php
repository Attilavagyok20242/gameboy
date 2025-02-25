<?php
require_once("restKezelo.php");
require_once("Games.php");

class GamesRestKezelo extends Restkezelo
{
    function getAllGames()
    {
        $games= new Games();
        $soradat=$games->getAllGames();
        if(empty($soradat))
        {
            $statusCode=404;
            $soradat=array('error'=>'Semmilyen Game-et nem találtunk!');
        }
        else
        {
            $statusCode=200;
        }
        $this->sethttpFejlec($statusCode);
        $result["games"]=$soradat;

        //Válasz küldée json-ben
        $response=$this->encodeJson($result);
        echo $response;
    }

    function getAllGamesBYID($id)
    {
        $games=new Games();
        $soradat=$games->getGamesById($id);
        if(empty($soradat))
        {
            $statusCode=404;
            $soradat=array('error'=>'Semmilyen Jatekot nem találtunk erre az id-ra!');
        }
        else
        {
            $statusCode=200;
        }
        $this->sethttpFejlec($statusCode);
        $result["getGamesById"]=$soradat;

        //Válasz küldése json-ben
        $response=$this->encodeJson($result);
        echo $response;
    }

    function GetGamesByType($tid)
    {
        $games=new Games();
        $soradat=$games->getGamesById($tid);
        if(empty($soradat))
        {
            $statusCode=404;
            $soradat=array('error'=>"Semmilyen ilyen típusú jatek ne található!");
        }
        else
        {
            $statusCode=200;
        }
        $this->sethttpFejlec($statusCode);
        $result["fishingRodByManufacturer"]=$soradat;

        //Válasz json formátumban
        $response=$this->encodeJson($result);
        echo $response;
    }

    function getFault()
    {
        $statusCode=400;
        $this->sethttpFejlec($statusCode);
        $soradat=array('error'=>'Rossz kérés');
        $result["hiba"]=$soradat;
        $response=$this->encodeJson($result);
        echo $response;
    }


    function encodeJson($responseData)
    {
        $jsonResponse= json_encode($responseData);
        return $jsonResponse;
    }
}

?>
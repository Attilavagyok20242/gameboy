<?php
require_once 'dbvezerlo.php';
class Games{
    private $games=[];
    public function __construct()
    {
        $query="SELECT `g_ID`, name, pic FROM Games";
        $dbvez=new DBVezerlo();
        $this->games=$dbvez->executeSelectQuery($query);
        $dbvez->closeDB();
    }
    public function getAllGames()
    {
        return $this->games;
    }

    public function getGamesById($GameId)
    {
       $query ="SELECT g_ID, name,pic From Games Where g_ID=".$GameId;
       $dbvez= new DBVezerlo();
       $this->games=$dbvez->executeSelectQuery($query); 
   $    $dbvez->closeDB();
   return $this->games;    
    }
    public function getGAmesByType($TypeName){
        $query="SELECT g_ID,name,pic FROM Games inner join type on Games.type_ID=type.t_id where type.t_name='".$TypeName."'";
        $dbvez=new DBVezerlo();
        $this->games=$dbvez->executeSelectQuery($query);
        $dbvez->closeDB();
        return $this->games;
    }
}

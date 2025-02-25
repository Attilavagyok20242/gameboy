<?php
require_once 'dbvezerlo.php';
class DBVezerloManualTest{
    public function runTest(){
        echo "Teszt inditása....\n";
        $db=new DBVezerlo();
        if($this->testconnection($db)){
            echo "Sikeres kapcsolódás.";
        }
        else{
            echo "Sikertelen kapcsolódás.";
        }
    }
    private function testconnection($db){
        $reflection= new ReflectionClass($db);
        $property=$reflection->getProperty('conn');
        $property->setAccessible(true);
        return !is_null($property->getValue($db));
    }
    
}
$test=new DBVezerloManualTest();
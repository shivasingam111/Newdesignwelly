<?php
class Breed
{

    // function to get all the categories
    public function getAllBreeds($dbcon){
        $sql = "SELECT * FROM breeds";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $breeds = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $breeds;
    }
}
?>
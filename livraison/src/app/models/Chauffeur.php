<?php 
namespace app\models;
class Chauffeur {
    public function __construct() {

    }
    public function findAll($db) {
        return $db->fetchAll("select * from Chauffeur");
    }
}
?>
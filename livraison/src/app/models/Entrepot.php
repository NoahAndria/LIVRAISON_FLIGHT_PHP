<?php 
namespace app\models;
use flight\Engine;
class Entrepot {

    private int $id;
    private string $adr_entrepot;

    public function __construct() {

    }
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getAdr_entrepot(): string {
        return $this->adr_entrepot;
    }

    public function setAdr_entrepot(string $adr_entrepot): void {
        $this->adr_entrepot = $adr_entrepot;
    }

    public function findAll($db) {
        return $db->fetchAll("select * from Entrepot");
    }
}
?>
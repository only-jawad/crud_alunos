<?php
//DAO para Curso

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Categoria.php");

class CategoriaDAO {

    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function list() {
        $sql = "SELECT * FROM categorias";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    private function mapBancoParaObjeto($result) {
        $categorias = array();
        foreach($result as $reg) {
            $c = new Categoria();
            $c->setId($reg['id'])
                ->setNome($reg['nome'])
                ->setPeso($reg['peso']);
            array_push($categorias, $c);
        }

        return $categorias;
    }

}
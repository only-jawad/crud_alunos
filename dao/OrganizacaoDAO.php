<?php
//DAO para Curso

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Organizacoes.php");

class organizacaoDAO {

    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function list() {
        $sql = "SELECT * FROM Organizacao";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    private function mapBancoParaObjeto($result) {
        $Organizacao = array();
        foreach($result as $reg) {
            $c = new Organizacao();
            $c->setId($reg['id'])
                ->setNome($reg['nome'])
                ->setSiglas($reg['sigla']);
            array_push($Organizacao, $c);
        }

        return $Organizacao;
    }





}
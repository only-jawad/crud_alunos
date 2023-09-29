<?php 
//DAO para Lutador
require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Lutadores.php");
require_once(__DIR__ . "/../model/Categoria.php");
require_once(__DIR__ . "/../model/Organizacoes.php");


class LutadorDAO {

    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function insert(Lutador $lutador) {
        $sql = "INSERT INTO lutadores" . 
                " (nome, altura, id_organizacao, id_categoria)" .
                " VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$lutador->getNome(),
                        $lutador->getAltura(),
                        $lutador->getorganizacao()->getId(), 
                        $lutador->getcategoria()->getId()]);
    }

    public function update(Lutador $lutador) {
        $conn = Connection::getConnection();

        $sql = "UPDATE lutadores SET nome = ?, altura = ?,". " id_organizacao = ?". " id_categoria = ?".
            " WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$lutador->getNome(), $lutador->getAltura(), 
                        $lutador->getOrganizacao()->getId(),
                        $lutador->getcategoria()->getId(),
                        $lutador->getId()]);
    }

    public function deleteById(int $id) {
        $conn = Connection::getConnection();

        $sql = "DELETE FROM lutadores WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }

    public function list() {
        $sql = "SELECT a.*," . 
                 " c.organizacao AS organizacao_categoria, c.experiencia AS experiencia_categoria" . 
                 " FROM lutadores a" .
                 " JOIN categorias c ON (c.id = a.id_categoria)" . 
                 " ORDER BY c.organizacao";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapBancoParaObjeto($result);
    }

    public function findById(int $id) {
        $conn = Connection::getConnection();

        $sql = "SELECT a.*," . 
                " c.organizacao AS organizacao_categoria, c.experiencis AS experiencia_categoria" . 
                " FROM lutadores a" .
                " JOIN categorias c ON (c.id = a.id_categoria)" .
                " WHERE a.id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        //Criar o objeto Lutador
        $lutadores = $this->mapBancoParaObjeto($result);

        if(count($lutadores) == 1)
            return $lutadores[0];
        elseif(count($lutadores) == 0)
            return null;

        die("LutadorDAO.findById - Erro: mais de um lu$lutadores".
                " encontrado para o ID " . $id);
    }


    
    //Converte do formato Banco (array associativo) para Objeto
    private function mapBancoParaObjeto($result) {
        $lutadores = array();

        foreach($result as $reg) {
            $lutador = new Lutador();
            $lutador->setId($reg['id'])
                ->setNome($reg['nome'])
                ->setAltura($reg['altura'])  ;              


                $organizacao = new Organizacao ();
                $organizacao->setId($reg['id_organizacoes'])
                ->setNome($reg['organizacao_nome'])
                ->setSigla($reg['organizacao_sigla']);

            
            $categoria = new Categoria ();
            $categoria->setId($reg['id_categorias'])
            ->setNome($reg['categoria_nome'])
            ->setPeso($reg['categoria_peso']) ;

            $lutador->setOrganizacao($organizacao);
            $lutador->setCategoria($categoria);
            array_push($lutadores, $lutador);
        }

        return $lutadores;
    }

}
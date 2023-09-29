<?php 
//Controller para Aluno

require_once(__DIR__ . "/../dao/LutadorDAO.php");
require_once(__DIR__ . "/../model/Lutadores.php");
require_once(__DIR__ . "/../service/LutadorService.php");

class LutadorController {

    private $lutadorDAO;
    private $lutadorService;

    public function __construct() {
        $this->lutadorDAO = new LutadorDAO();        
        $this->lutadorService = new LutadorService();
    }

    public function listar() {
        return $this->lutadorDAO->list();        
    }

    public function buscarPorId(int $id) {
        return $this->lutadorDAO->findById($id);
    }

    public function inserir(Lutador $lutador) {
        //Valida e retorna os erros caso existam
        $erros = $this->lutadorService->validarDados($lutador);
        if($erros) 
            return $erros;

        //Persiste o objeto e retorna um array vazio
        $this->lutadorDAO->insert($lutador);
        return array();
    }

    public function atualizar(Lutador $lutador) {
        $erros = $this->lutadorService->validarDados($lutador);
        if($erros) 
            return $erros;
        
        //Persiste o objeto e retorna um array vazio
        $this->lutadorDAO->update($lutador);
        return array();
    }

    public function excluirPorId(int $id) {
        $this->lutadorDAO->deleteById($id);
    }

}
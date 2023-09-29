<?php
//Controller para Curso

require_once(__DIR__ . "/../dao/categoriaDAO.php");

class CategoriasController {

    private CategoriaDAO $categoriaDAO;

    public function __construct() {
        $this->categoriaDAO = new CategoriaDAO();
    }

    public function listar() {
        return $this->categoriaDAO->list();
    }

}
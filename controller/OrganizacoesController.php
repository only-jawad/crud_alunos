<?php

require_once(__DIR__ . "/../dao/organizacaoDAO.php");

class CategoriasController {

    private CategoriaDAO $categoriaDAO;

    public function __construct() {
        $this->categoriaDAO = new CategoriaDAO();
    }

    public function listar() {
        return $this->categoriaDAO->list();
    }

}
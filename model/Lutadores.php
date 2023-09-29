<?php
//Modelo para Aluno
require_once(__DIR__ . "/categoria.php");

class Lutador {

    private ?int $id;
    private ?string $nome;
    private ?int $altura;
    private ?Organizacao $organizacao;
    private ?Categoria $categoria;

    public function __construct() {
        $this->id = 0;
        $this->categoria = null;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }


    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * Set the value of altura
     *
     * @return  self
     */ 
    public function setAltura($altura)
    {
        $this->altura = $altura;

        return $this;
    }


    public function getOrganizacao()
    {
        return $this->organizacao;
    }

    /**
     * Set the value of categoria
     *
     * @return  self
     */ 
    public function setOrganizacao($organizacao)
    {
        $this->organizacao = $organizacao;

        return $this;
    }

    /**
     * Get the value of categoria
     */ 
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     *
     * @return  self
     */ 
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

}

<?php
//View para excluir um aluno

require_once(__DIR__ . '/../../controller/LutadorController.php');

//Receber o parâmetro
$idLutador = 0;
if(isset($_GET['idLutador']))
    $idLutador = $_GET['idLutador'];

//Carregar o aluno 
$lutadorCont = new LutadorController();   
$lutador = $lutadorCont->buscarPorId($idLutador);

//Verificar se o aluno existe
if(! $lutador) {
    echo "Lutador não encontrado!<br>";
    echo "<a href='listar.php'>Voltar</a>";
    exit;
}

//Excluir o aluno
$lutadorCont->excluirPorId($lutador->getId());

//Redirecionar para a listar
header("location: listar.php");
<?php
$conn = new mysqli("localhost","root","senaisp","livraria");

if ($conn->connect_error){
    die("Erro de conexão". $conn->connect_error);
}

$id = $_GET['id'];

//Preparar a declaração
$stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?"); 
$stmt-> bind_param("i",$id);

// Executar e verificar
if($stmt->execute()){
    echo "Usuário deletado com sucesso";
} else {
    echo "Erro ao deletar:". $stmr->error;
}
echo "<br><a href='index.php'>Voltar para a Página incial</a>";

$stmt -> close();
$conn -> close();
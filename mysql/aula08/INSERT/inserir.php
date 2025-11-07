<?php
$nome = $_POST['nome'];
$email = $_POST['email'];

$conn = new mysqli("localhost","root","senaisp","livraria");

if ($conn->connect_error){
    die("Erro de conexão". $conn->connect_error);
}

$sql = "INSERT INTO usuarios (nome,email) values ('$nome','$email')";
if($conn->query($sql) === TRUE){
    echo "Dados salvos com sucesso";
} else {
    echo "Erro:". $conn->error;
}

// header("Location: index.html"); ou index.php, dependendo do seu arquivo principal
//exit;
$conn ->close();
?>
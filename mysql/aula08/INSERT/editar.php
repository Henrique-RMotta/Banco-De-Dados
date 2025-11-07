<?php
$conn = new mysqli("localhost","root","senaisp","livraria");

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM usuarios WHERE id=$id");
$row = $result->fetch_assoc();

?>
<?php
    include_once 'header.php';
?>
<body>



<form action="atualizar.php" method="POST">
    <h1>Editar</h1>
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
    Nome: <input type="text" name="nome" value="<?php echo $row['nome'];?>"><br>
    Email: <input type="email" name="email" value="<?php echo $row['email'];?>"><br>
    <button type="submit" value="Atualizar">Atualizar</button>

</form>
</body>
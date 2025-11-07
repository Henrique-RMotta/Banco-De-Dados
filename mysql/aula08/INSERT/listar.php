<?php
$conn = new mysqli("localhost","root","senaisp","livraria");
$result = $conn->query("SELECT * FROM usuarios");

echo "<h2>Tabela de Usuarios Cadastrados</h2>";
echo "<table>";
echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Ações</th></tr>";

while ($row = $result->fetch_assoc()){
    echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['nome']}</td>
    <td>{$row['email']}</td>
    <td><a href='editar.php?id={$row['id']}'>Editar</a>
    <a href='apagar.php?id={$row['id']}'>Apagar</a></td>
    
    </tr>
    ";
}

echo "</table>";
$conn->close();
?>
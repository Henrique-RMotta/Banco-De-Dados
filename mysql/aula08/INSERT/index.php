
<?php
include_once 'header.php'
?>
<main>
<form action="inserir.php" method="POST" >
    <h1>Criar</h1>
    <label >Nome:</label>
    <input type="text" name="nome" required><br>
    <label >Email:</label>
    <input type="email" name="email" required><br>
    <button type="submit">Enviar</button>
</form>
<?php
include_once 'listar.php';
?>
</main>
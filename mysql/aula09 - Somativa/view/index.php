<?php
require_once __DIR__ ."\\..\\controller\\clienteController.php";
$controller = new ClienteController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    if ($acao === 'criar') {
        $controller->criar(
          $_POST['nome'],
          $_POST['celular'],
          $_POST['CPF'],
          $_POST['CEP'],
          $_POST['DATA_NASC']
        );
    } elseif ($acao === 'deletar') {
        $controller->deletar($_POST['id']);
    }
}
?>
<main>
    <h1>Cadastrar Clientes</h1>
    <form method="POST">
        <input type="hidden" value="criar" name="acao">
        nome: <input type="text" name='nome' placeholder="Digite o nome" required>
        celular: <input type="number" name='celular' placeholder="Digite número de celular sem traços" required>
        CPF:  <input type="number" name='CPF' placeholder="Digite o CPF sem pontos e traços" required>
        CEP:  <input type="number" name='CEP' placeholder="Digite o CEP sem pontos e traços" required>
        DATA NASCIMENTO: <input type="text" name='DATA_NASC' placeholder="Digite a data de nascimento com traços" required>
        <button type='submit'>criar</button>
    </form>
    <?php 
        $controller ->listar();
    ?>
</main>
<?php
require_once __DIR__ ."\\..\\controller\\pecasController.php";
$controller = new PecasController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    if ($acao === 'criar') {
        $controller->criar(
          $_POST['nome'],
          $_POST['estado'],
          $_POST['descricao'],
          $_POST['veiculoscompativel'],
          $_POST['qtde'],
          $_POST['valor']
        );
    } elseif ($acao === 'deletar') {
        $controller->deletar($_POST['id']);
    }
}
?>
<?php
    include_once 'header.php';
?>
<main>
    <h1>Cadastrar Peças</h1>
    <form method="POST">
        <input type="hidden" value="criar" name="acao">
        nome: <input type="text" name='nome' placeholder="Digite o nome da peça" required>
        estado: <input type="text" name='estado' placeholder="Ex: Novo, Usado, Refurbado" required>
        descrição: <input type="text" name='descricao' placeholder="Digite a descrição" required>
        veículos compatíveis: <input type="text" name='veiculoscompativel' placeholder="Ex: Fiat Uno, Ford Fiesta" required>
        quantidade: <input type="number" name='qtde' placeholder="Digite a quantidade" required>
        valor: <input type="number" step="0.01" name='valor' placeholder="Digite o valor" required>
        <button type='submit'>Criar</button>
    </form>
    <?php 
        $controller ->listar();
    ?>
</main>
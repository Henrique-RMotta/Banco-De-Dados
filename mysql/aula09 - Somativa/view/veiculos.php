<?php 
require_once __DIR__ ."\\..\\controller\\veiculoController.php";
$controller = new VeiculoController();
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $acao = $_POST['acao'] ?? ''; 
    if ($acao == 'criar') {
        $controller->criar(
            $_POST['vei_modelo'],
            $_POST['vei_marca'],
            $_POST['vei_placa'],
            $_POST['vei_cor'],
            $_POST['cli_id']
        );
    }else if ($acao == 'deletar'){
        $controller->deletar($_POST['id']);
    }
}
?>
<?php 
    include_once "header.php";
?>
<main>
    <h1>Cadastrar Veiculos</h1>
    <form method="POST">
        <input type="hidden" value="criar" name="acao">
        modelo: <input type="text" name="vei_modelo" maxlength="60" placeholder="Digite o modelo do veículo" required>
        marca: <input type="text" name="vei_marca" maxlength="60" placeholder="Digite a marca do veículo" required>
        placa: <input type="text" name="vei_placa" maxlength="60" placeholder="Digite a placa do veículo" required>
        cor: <input type="text" name="vei_cor" maxlength="60" placeholder="Digite a cor do veículo" required>
        <select name="cli_id" required>
            <option value="">Selecione um cliente</option>
            <?php 
                $controller->buscarClientesID();
            ?>
        </select>
        <button type="submit">Criar</button>
    </form>
    <?php 
        $controller->listar();
    ?>
</main>

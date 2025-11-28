<?php 
require_once __DIR__ ."\\..\\controller\\veiculoController.php";

$vei_id = $_GET['vei_id'];
$vei_modelo = $_GET['vei_modelo'];
$vei_marca = $_GET['vei_marca'];
$vei_placa = $_GET['vei_placa'];
$vei_cor = $_GET['vei_cor'];
$cli_id = $_GET['cli_id'];

$controller = new VeiculoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    if ($acao == 'atualizar'){
        $controller->atualizar(
            $vei_id,
            $_POST['modelo_novo'],
            $_POST['marca_nova'],
            $_POST['placa_nova'],
            $_POST['cor_nova'],
            $_POST['cli_id_novo']
            
        );
        header("Location: veiculos.php");
        exit();
    }
}
?>

<?php include_once "header.php"; ?>

<main>
    <h1>Atualizar Veículo</h1>
    <form method="POST">
        <input type="hidden" value="atualizar" name="acao">
        
        Modelo: <input type="text" name="modelo_novo" maxlength="60" placeholder="Digite o modelo do veículo" value="<?php echo $vei_modelo; ?>" required>
        
        Marca: <input type="text" name="marca_nova" maxlength="60" placeholder="Digite a marca do veículo" value="<?php echo $vei_marca; ?>" required>
        
        Placa: <input type="text" name="placa_nova" maxlength="60" placeholder="Digite a placa do veículo" value="<?php echo $vei_placa; ?>" required>
        
        Cor: <input type="text" name="cor_nova" maxlength="60" placeholder="Digite a cor do veículo" value="<?php echo $vei_cor; ?>" required>
        
        Cliente:
        <select name="cli_id_novo" required>
            <option value="">Selecione um cliente</option>
            <?php $controller->buscarClientesID(); ?>
        </select>
        
        <button type="submit">Atualizar</button>
        <a href="veiculos.php"><button type="button">Voltar</button></a>
    </form>
</main>
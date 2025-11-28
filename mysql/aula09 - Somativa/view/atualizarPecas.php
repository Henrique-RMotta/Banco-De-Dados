<?php

    require_once __DIR__ . "\\..\\controller\\pecasController.php";

    $id = $_GET['pe_id'];
    $nome = $_GET['pe_nome'];
    $estado = $_GET['pe_estado'];
    $descricao = $_GET['pe_descricao'];
    $veiculoscompativel = $_GET['pe_veiculoscompativel'];
    $qtde = $_GET['pe_qtde'];
    $valor = $_GET['pe_valor'];

    $controller = new PecasController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $acao = $_POST['acao'] ?? '';
        if ($acao == 'atualizar'){
            $controller->atualizar($id,$_POST['nomenovo'],$_POST['estadonovo'],$_POST['descricaonova'],$_POST['veiculocompativel'],$_POST['qtdenova'],$_POST['valornovo']);
            header("Location: pecas.php");
            exit();
        }
    }
?>
    

<h1>Atualizar Peças</h1>
<form method="POST">
    <input type="hidden" value="atualizar" name="acao">
    nome: <input type="text" name='nomenovo' placeholder="Digite o nome" value="<?php echo $nome ?>" required>
    estado: <input type="text" name='estadonovo' placeholder="Ex: Novo, Usado, Refurbado" value="<?php echo $estado ?>" required>
    descrição: <input type="text" name='descricaonova' placeholder="Digite a descrição" value="<?php echo $descricao ?>" required>
    veículos compatíveis: <input type="text" name='veiculocompativel' placeholder="Ex: Fiat Uno, Ford Fiesta" value="<?php echo $veiculoscompativel ?>" required>
    quantidade: <input type="number" name='qtdenova' placeholder="Digite a quantidade" value="<?php echo $qtde ?>" required>
    valor: <input type="number" step="0.01" name='valornovo' placeholder="Digite o valor" value="<?php echo $valor ?>" required>
    <button type="submit">Atualizar</button>
    <a href="pecas.php"><button type="button">Voltar</button></a>
</form>
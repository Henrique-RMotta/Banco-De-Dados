
<main>
    <form action="cliente.php?selecionador=criar" method="POST">
        nome: <input type="text" name='nome' placeholder="Digite o nome" value=<?php echo $_POST['nome']?>>
        celular: <input type="number" name='celular' placeholder="Digite número de celular sem traços" value=<?php echo $_POST['celular']?>>
        CPF:  <input type="number" name='CPF' placeholder="Digite o CPF sem pontos e traços" value=<?php echo $_POST['CPF']?>>
        CEP:  <input type="number" name='CEP' placeholder="Digite o CEP sem pontos e traços" value=<?php echo $_POST['CEP']?>>
        DATA NASCIMENTO: <input type="text" name='DATA_NASC' placeholder="Digite a data de nascimento com traços" value=<?php echo $_POST['DATA_NASC']?>>
        <button type='submit'>criar</button>
    </form>
    <form action="cliente.php?selecionador=listar" method="POST">
        <button type="submit">listar</button>
    </form>
</main>
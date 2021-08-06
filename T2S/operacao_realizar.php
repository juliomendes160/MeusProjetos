<?php
    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "operacoes";

    $del = $_GET['del'];

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM conteiner WHERE numero_conteiner='$del'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <header>
        <div class="cabecalho">
            <img src="logo.jpeg" alt="logo" class="logo">
            <nav class="navegacao">
                <ul>
                    <li><a href="index.php">Cadastro</a></li>
                    <li><a href="movimentacao.php">Movimentação</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="formulario">
            <form action="operacao_incluir.php" method="post">

                <section>
                    <h1>Realização Operação</h1>

                    <label for="numero_conteiner">Número do contêiner:</label>
                    <input value='<?php echo $row['numero_conteiner']; ?>' disabled>
                    <input type="hidden" name="numero_conteiner" placeholder="Ex: 4 letras e 7 números. Ex: TEST1234567" maxlength="11" maxlength="11" value='<?php echo $row['numero_conteiner']; ?>'>
                    
                    <label for="movimentacao"> Selecione o Tipo de Movimentação:</label>
                    <select name="movimentacao" >
                        <option Value="Nenhuma">Nenhuma</option>
                        <option value="Embarque">Embarque</option>
                        <option value="Descarga">Descarga</option>
                        <option value="Gate In">Gate In</option>
                        <option value="Gate out">Gate out</option>
                        <option value="Posicionamento">Posicionamento</option>
                        <option value="Pilha">Pilha</option>
                        <option value="Pesagem">Pesagem</option>
                        <option value="Scanner">Scanner</option>
                    </select>

                    <label for="data_inicio">Data e Hora do Início:</label>
			        <input type="datetime-local" name="data_inicio" placeholder="" >
                    
                    <label for="data_fim">Data e Hora do Fim:</label>
			        <input type="datetime-local" name="data_fim" placeholder="" >
                </section>

                <div class="botoes">
                    <input type="submit" value="Enviar">
                    <input type="reset" value="Limpar">
                </div>
            </form>
        </div>
    </main>
</body>
</html>
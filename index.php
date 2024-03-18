<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/4530442e9b.js" crossorigin="anonymous"></script>
</head>

<body>
    <form method="post">
        <h3>Dados pessoais</h3>
        <input id="campo1" type="text" name="nome" placeholder="Nome" required>
        <input id="campo1" type="number" name="cpf" placeholder="CPF" required><br>
        <input id="campo1" type="text" name="email" placeholder="Email" required>
        <input id="campo1" type="number" name="numero" placeholder="Numero" required><br>
        <input id="campo1" type="password" name="senha" placeholder="Senha" required><br><br>
        <hr>
        <label id="idade" >Sua idade?</label>
        <br>
        <label id="camp3">
            <input id="campo2" type="radio" name="idade" value="25-29">25-29 <br>
        </label>
        <label  id="camp3">
            <input id="campo2" type="radio" name="idade" value="30-35">30-35<br>
        </label>
        <label  id="camp3">
            <input id="campo2" type="radio" name="idade" value="36-40">36-40<br>
        </label>
        <label  id="camp3">
            <input id="campo2" type="radio" name="idade" value="40-45">40-45
        </label>
        <br><br>
        <label id="camp8">Sua sexualidade?</label>
        <br>
        <label>
            <input  type="radio" id="campo2"  name="sexo" value="Masculino">Masculino <br>
        </label>
        <label>
            <input type="radio" id="campo2"  name="sexo" value="Feminino">Feminino
        </label>
        <hr>
        <br>
        <label for="" id="camp8">Estado:</label>
        <select name="estado" id="estadoSelect" placeholder=''>
            <option value="Escolha o estado" aria-placeholder="escolha"></option>
        </select>
        <br><br>
        <label for="porte" id="camp8">Seu porte de arma:</label>
        <select id="porte" name="porte" required>
            <option value="inicial">Inicial</option>
            <option value="casual">Casual</option>
            <option value="avançado">Avançado</option>
            <option value="profissional">Profissional</option>
            <option value="expert">Expert</option>
            <option value="mestre">Mestre</option>
        </select>
        <br>
        <p id="atencion">Atenção campo obrigátorio!!</p>
        <textarea rows="7"  id="experiencia"  required name="experiencia" placeholder="Olá, Estou aqui para ajudá-lo(a) com sua decisão de compra de uma arma. Gostaria de entender suas razões e necessidades para garantir que você receba o suporte adequado. Estou à disposição para qualquer dúvida ou esclarecimento."></textarea><br><br>
        <label for="" id="camp8">Valor do produto:</label> <p id="precoDoProduto">R$ 9.310,00</p> 
        <label for="" id="camp8">Forma de pagamento:</label>
        <select name="pagamento" id="">
            <option value=""></option>
            <option value="pix">Pix</option>
            <option value="boleto">Boleto</option>
        </select>
        <hr>
        <label for="termos" id="camp8">Termos:</label>
        <input type="checkbox" name="termos" id="termos" value="termos" required>
        <label for="termos">Termos de serviço</label>
        <input type="checkbox" name="termos" id="termos" value="termos" required>
        <label for="termos" >Termos de privacidade</label>
        <br><br>
        <button type="submit" name="enviar"> <i class="fa-solid fa-cart-shopping" id="carComp"></i>Comprar</button>

        <script defer src="script.js"></script>
    </form>

    <?php
    $servidor = "localhost";
    $usuario = "root";
    $chave = "";
    $bd = "servidortest";

    $coneccion = mysqli_connect($servidor, $usuario, $chave, $bd);

    if (!$coneccion) {
        die ("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }

    if (isset ($_POST['enviar'])) {

        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $numero = $_POST['numero'];
        $senha = $_POST['senha'];
        $sexo = $_POST['sexo'];
        $porte = $_POST['porte'];
        $estado = $_POST['estado'];
        $pagamento = $_POST['pagamento'];

        $nome = mysqli_real_escape_string($coneccion, $nome);
        $cpf = mysqli_real_escape_string($coneccion, $cpf);
        $email = mysqli_real_escape_string($coneccion, $email);
        $numero = mysqli_real_escape_string($coneccion, $numero);
        $senha = mysqli_real_escape_string($coneccion, $senha);
        $sexo = mysqli_real_escape_string($coneccion, $sexo);
        $porte = mysqli_real_escape_string($coneccion, $porte);
        $estado = mysqli_real_escape_string($coneccion, $estado);
        $pagamento = mysqli_real_escape_string($coneccion, $pagamento);

        $insertar = "INSERT INTO dados (nome, idade, cpf, email, numero, senha, sexo, porte, estado, pagamento) VALUES ('$nome', '$idade', '$cpf', '$email', '$numero', '$senha', '$sexo', '$porte', '$estado', '$pagamento')";

        if (mysqli_query($coneccion, $insertar)) {
            echo "Registro inserido com sucesso!";
        } else {
            echo "Erro ao inserir registro: " . mysqli_error($coneccion);
        }
        mysqli_close($coneccion);
    }
    ?>


</body>
</html>
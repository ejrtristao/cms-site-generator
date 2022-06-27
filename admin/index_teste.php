<?php
//include 'copyCMSDirectory.php';


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <h1>CMS - Gerador de Site</h1>
    </header>
<div class="content">
<section>
    <h2>Gerador de Site</h2>
    <nav class="col-4">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="sites.php">Gerador</a></li>
    </ul>
</nav>

    <div class="container">
        <div class="row">
            <div class="col-8">

            </div>
        </div>
    </div>
</section>
</div>    
<footer>
    <p>&copy; 2022 - KME Cursos e Treinamentos</p>
</footer>
<?php
$json_data = json_decode(file_get_contents('arquivo.json'));
echo 'Hello World!';
// $dir = new copyCMSDirectory();
// $dir->recurseCopy('c:\laragon\www\cms\teste', 'c:\laragon\www\cms\copy');


// foreach ($json_data->ConsultarNfseResposta->ListaNfse->CompNfse as $data) {

//     echo '<br>Número da nota: ' .$data->Nfse->InfNfse->Numero;
//     echo '<br>Valor da nota: ' .$data->Nfse->InfNfse->Servico->Valores->ValorServicos;
//     echo '<br>CNPJ do cliente: ' .$data->Nfse->InfNfse->TomadorServico->IdentificacaoTomador->CpfCnpj->Cnpj;
//     echo '<br>Discriminação do serviço: ' .$data->Nfse->InfNfse->Servico->Discriminacao;
//     echo '<br>';

//     $stringSuporte = 'SUPORTE';
//     $stringManutencao = 'MANUTENÇÃO';
//     $stringDesenvolvimento = 'DESENVOLVIMENTO';


//     $posSuporte = strpos($data->Nfse->InfNfse->Servico->Discriminacao, $stringSuporte);
//     $posManutencao = strpos($data->Nfse->InfNfse->Servico->Discriminacao, $stringManutencao);
//     $posDesenvolvimento = strpos($data->Nfse->InfNfse->Servico->Discriminacao, $stringDesenvolvimento);

//     if ($posSuporte == true) {
//         $servSuporte = $data->Nfse->InfNfse->Servico->Discriminacao;
//         echo '<b>String encontrada: </b>' .$servSuporte;
//         echo '<br>';
//     } 

//     if ($posManutencao == true) {
//         $servManutencao = $data->Nfse->InfNfse->Servico->Discriminacao;
//         echo '<b>String encontrada: </b>' .$servManutencao;
//         echo '<br>';
//     } 

//     if ($posDesenvolvimento == true) {
//         $servDesenvolvimento = $data->Nfse->InfNfse->Servico->Discriminacao;
//         echo '<b>String encontrada: </b>' .$servDesenvolvimento;
//         echo '<br>';
//     }
// }
//

// $db = new SQLite3('test.db');

// $db->exec("INSERT INTO cars(name, price) VALUES('Audi', 52642)");
// $db->exec("INSERT INTO cars(name, price) VALUES('Mercedes', 57127)");
// $db->exec("INSERT INTO cars(name, price) VALUES('Skoda', 9000)");
// $db->exec("INSERT INTO cars(name, price) VALUES('Volvo', 29000)");
// $db->exec("INSERT INTO cars(name, price) VALUES('Bentley', 350000)");
// $db->exec("INSERT INTO cars(name, price) VALUES('Citroen', 21000)");
// $db->exec("INSERT INTO cars(name, price) VALUES('Hummer', 41400)");
// $db->exec("INSERT INTO cars(name, price) VALUES('Volkswagen', 21600)");


// $res = $db->query('SELECT * FROM cars');

// while ($row = $res->fetchArray()) {
//     echo "<br />" . "{$row['id']} {$row['name']} {$row['price']} \n";
// }
?>    


</body>
</html>



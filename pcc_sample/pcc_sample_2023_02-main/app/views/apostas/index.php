<?php
    $id = $_GET['id'];
    $apostou = $_GET['aposta'] ?? 0;

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['aposta'])) {
        $apostou = $_GET['aposta'] ?? 0;
     
        #chamar dao para gravar a aposta
        
    
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>aposta</h1>
    <p>Vencedor do encontro</p>
    
    <a href="index.php?aposta=casa&id=<?=$id?>" class="btn" name="aposta">Casa</a>
    <a href="index.php?aposta=empate&id=<?=$id?>" class="btn" name="aposta">Empate</a>
    <a href="index.php?aposta=fora&id=<?=$id?>" class="btn" name="aposta">Fora</a>
</body>
</html>
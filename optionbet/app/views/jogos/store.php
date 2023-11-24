<?php
require_once __DIR__ . "/../../src/dao/jogodao.php";
// require_once __DIR__ . "/../../src/models/usuario.php";
// require_once __DIR__ . "/../../src/models/categoria.php";
// require_once __DIR__ . "/../../src/models/artigo.php";

session_start();

const UPLOAD_DIR = __DIR__ ."/../assets/img/jogos/";

// $usuario = $_SESSION['usuario'];
// if (!$usuario) {
//     header('location: ../auth/login.php', 301);
//     exit;
// }
// $usuarioId = $usuario['id'];


$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT) ?? 0;
$timeCasa = trim(filter_input(INPUT_POST, "timedacasa", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$timeVisitante = trim(filter_input(INPUT_POST, "timevisitante", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$dataJogo = trim(filter_input(INPUT_POST, "datajogo", FILTER_SANITIZE_FULL_SPECIAL_CHARS));

$imagem = getImagem();
// var_dump($imagem); exit;


$dao = new JogoDAO();
if ($id === 0) {
    if ($dao->save($dataJogo, $timeCasa, $timeVisitante, $imagem)) {
        header("location: index.php?msg=Jogo criado com sucesso!", 201);
    } else {
        header("location: index.php?error=Erro ao criar jogo!", 301);
    }
} else {
    if ($dao->update($dados)) {
        header("location: index.php?msg=Jogo atualizado com sucesso!", 204);
    } else {
        header("location: index.php?error=Erro ao alterar jogo!", 301);
    }
}


function getImagem() 
{
    if ($_FILES['file']["tmp_name"] == "") {
        return null;
    }
    $tmp = $_FILES['file']['tmp_name'];
    $type = explode('.', $_FILES['file']['name'])[1];
    $filename = uniqid("", true) . '.'. $type;
    $filenamewithpath = UPLOAD_DIR . $filename;
    $success = move_uploaded_file($tmp, $filenamewithpath);
    if ($success) {
        return $filename;
    } else {
        return null;
    }
    
}
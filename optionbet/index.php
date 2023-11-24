<?php
    require_once __DIR__ . "/app/src/dao/jogodao.php";

    $dao = new JogoDAO();

    $jogos = $dao->getAll();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="app/views/assets/css/boot.css" rel="stylesheet">
    <link href="app/views/assets/css/style.css" rel="stylesheet">
    <link href="app/views/assets/css/fonticon.css" rel="stylesheet">
    <link rel="stylesheet" href="app/views/assets/css/modal.css">
    <link rel="stylesheet" href="app/views/assets/css/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

    
    <title>Option Bet</title>
</head>

<body>
    <!--DOBRA CABEÇALHO-->

    <header class="main_header">
        <div class="main_header_content">
            <a href="#" class="logo">
                <img src="app/views/assets/img/bet.png" alt="Bem vindo ao projeto prático Html5 e Css3 Essentials"
                    title="Bem vindo ao projeto prático Html5 e Css3 Essentials"></a>

            <nav class="main_header_content_menu">
                <ul>
                    <li><a href="#">Saldo</a></li>
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#" class="modal-link">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!--FIM DOBRA CABEÇALHO-->

    <!-- POP LOGIN -->
    <div class="overlay"></div>
    <div class="modal">
        <div class="div_login">
            <form action="opcao.html" method="get">
                <h1>Login</h1>
                <br>
                <input type="text" name="name" placeholder="Nome" class="input">
                <br><br>
                <input type="password" name="password" placeholder="Senha" class="input">
                <br><br>
                <button class="button">Enviar</button>
            </form>
        </div>
    </div>

    <!-- FIM POP LOGIN -->



    <!--DOBRA PALCO PRINCIPAL-->

    <!--1ª DOBRA-->
    <main>
        <div class="main_cta">
            <article class="main_cta_content">
                <div class="main_cta_content_spacer">
                    <div class="main_cta_apresentation">
                    <header>
                        <h1>Option Bet a melhor casa de apostas<br>
                        </h1>
                    </header>
                    <p>Descubra a emoção de ganhar no Option Bet! <br> Aposte agora e mude o jogo.</p>
                    <p><a href="#Proximos"><button  class="btn">Apostar</button></p></a>
                </div>
            </article>
        </div>
    </div>
        <!--FIM 1ª DOBRA-->

        <!--INICIO SESSÃO SESSÃO DE ARTIGOS-->
        <section class="main_blog">
            <header class="main_blog_header">
                <h1 class="">Proximos jogos</h1>
            </header>
            <?php foreach($jogos as $jogo): ?>
            <article>
                <?= $jogo['DataJogo']?>
                <a href="#">
                    <img src="<?='app/views/assets/img/jogos/'.$jogo['imagem']?>" width="200" alt="Imagem post" title="Imagem Post">
                </a>
                <p><a href="" class="category"><?=$jogo['TimeCasa'] . ' X ' . $jogo['TimeVisitante']?></a></p>
                <!-- <h2><a href="" class="title"> -->
                
                <!-- <h2><a href="" class="title"></a></h2> -->
                <button class="multiplier">2.95</button>
                <button class="multiplier">4.00</button>
                <button class="multiplier">5.00</button>
            </article>
            <?php endforeach ?>
            
        </section>

    
    <section class="main_footer">
        <header>
            <h1>Quer saber mais?</h1>
        </header>

        <article class="main_footer_our_pages">
            <header>
                <h2>Ajuda</h2>
            </header>
            <ul>
                <li><a href="#">Suporte</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </article>

        <article class="main_footer_links">
            <header>
                <h2>Links Úteis</h2>
            </header>
            <ul>
                <li><a href="#">Política de Privacidade</a></li>
                <li><a href="#">Aviso Legal</a></li>
                <li><a href="#">Termos de Uso</a></li>
            </ul>
        </article>

        <article class="main_footer_about">
            <header>
                <h2>Avisos</h2>
            </header>
            <p>Apostas esportivas envolvem riscos financeiros. Aposte com responsabilidade, conhecimento e apenas o que pode perder. Respeite as leis locais, proteja sua privacidade e busque ajuda se necessário. Apostas devem ser um entretenimento, não uma fonte de renda.</p>
        </article>
    </section>
    <!-- FIM DOBRA RODAPÉ -->
</body>
<script>
    // Seleciona o link e a janela modal
    var link = document.querySelector('.modal-link');
    var modal = document.querySelector('.modal');
    var overlay = document.querySelector('.overlay');

    // Adiciona um listener de evento para o link
    link.addEventListener('click', function (event) {
        event.preventDefault(); // previne o comportamento padrão do link (navegar para outra página)

        overlay.style.display = 'block'; // exibe a camada escura
        modal.style.display = 'block'; // exibe a janela modal
    });

    // Adiciona um listener de evento para a camada escura
    overlay.addEventListener('click', function () {
        overlay.style.display = 'none'; // oculta a camada escura
        modal.style.display = 'none'; // oculta a janela modal
    });
</script>

</html>

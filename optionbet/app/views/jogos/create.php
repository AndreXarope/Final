<?php
// require_once __DIR__ . "/../layouts/admin/header.php";
// require_once __DIR__ . "/../../src/dao/categoriadao.php";
// require_once __DIR__ . "/../auth/seguranca.php";

// if (Seguranca::isUsuario()) {
//     header("location: ../index.php?error=Usuário não tem permissão para acessar esse recurso.", 301);
//     exit;
// }

?>
<main>
    <div class="main_opc">

        <section class="main_course" id="escola">
            <header class="novo__form__titulo">
                <h2>Artigos</h2>
            </header>

            <div class="novo__form__section">
                <form method="post" action="store.php" enctype="multipart/form-data" class="novo__form">
                    <div class="novo__form__section">
                        <label>Data da Jogo</label>
                        <input type="date" name="datajogo" required>
                    </div>

                    <div class="novo__form__section">
                        <label>Time da Casa</label>
                        <input type="text" name="timedacasa" placeholder="Informe o título" required autofocus>
                    </div>

                    <div class="novo__form__section">
                        <label>Time Visitante</label>
                        <input type="text" name="timevisitante" placeholder="Informe o título" required autofocus>
                    </div>

                    
                    <div class="novo__form__section">
                        <label>Imagem</label>
                        <input type="file" name="file" placeholder="Informe o imagem" accept="image/png, image/jpeg" required>
                    </div>


                    <div class="novo__form__section">
                        <button type="submit" class="btn">Save</button>
                        <a href="index.php" class="btn">Voltar</a>
                    </div>
                </form>

            </div>
        </section>
    </div>
</main>

</body>

</html>
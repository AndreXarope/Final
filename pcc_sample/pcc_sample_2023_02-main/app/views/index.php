<?php
# para trabalhar com sessões sempre iniciamos com session_start.
session_start();

# inclui os arquivos header, menu e login.
require_once __DIR__ . "/layouts/site/header.php";
require_once __DIR__ . '/layouts/site/menu.php';
require_once __DIR__ . '/auth/login.php';
require_once __DIR__ . "/../src/dao/artigodao.php";
require_once __DIR__ . "/../src/dao/categoriadao.php";

// require_once __DIR__ . '/apostas/index.php';

const UPLOAD_DIR = "assets/img/artigos/";


$categoriaDAO = new CategoriaDAO();
$categorias = $categoriaDAO->getAll();

$categoriaId = isset($_GET['categoria']) ? $_GET['categoria'] : "0";
$filtroTitulo = isset($_GET['filtro']) ? trim($_GET['filtro']) : "";
$dao = new ArtigoDAO();
if ($categoriaId == "0" && $filtroTitulo == "") {
    $rows = $dao->getAll();
} else {
    $rows = $dao->getByCategoriaIdOrTitulo($categoriaId, $filtroTitulo);
}

?>

<!--DOBRA PALCO PRINCIPAL-->

<!--1ª DOBRA-->

<main>
    <?php if (isset($_GET['error'])  || isset($_GET['msg'])) : ?>
        <script>
            Swal.fire({
                icon: '<?= isset($_GET['error']) ? 'error' : 'success' ?>',
                title: 'PccSample',
                text: '<?= $_GET['error'] ?? $_GET['msg'] ?>',
            })
        </script>
    <?php endif ?>


    <!--INICIO SESSÃO SESSÃO DE ARTIGOS-->
    <section class="main_blog">
        <header class="main_blog_header">
            <h1 class="icon-blog">Proximos Jogos</h1>
            <p>Aqui você os melhores jogos para apostar.</p>
            <div style="display: flex; justify-content: space-between;">
                
                
                </div>
        </header>


        <?php foreach ($rows as $row) : ?>
            <?php $imagem = ($row['imagem'] == "" || is_null($row['imagem'])) ? "semimagem.jpg" : $row['imagem'];
            $imagem = UPLOAD_DIR . $imagem; ?>
            <article>
                <a href="artigos/show.php?id=<?= $row['id'] ?>">
                    <img src="<?= $imagem ?>" width="200px" height="200px" alt="<?= $row['titulo'] ?>" title="<?= $row['titulo'] ?>">
                </a>
                <p><a href="index.php?categoria=<?=$row['categoria_id']?>" class="category"><?= $row['categoria'] ?></a></p>
                <p class="title"><?= $row['titulo'] ?></p>
                <h2>
                    <p class="title" title="<?= $row['texto'] ?>">
                        <?= (strlen($row['texto']) > 100) ? substr($row['texto'], 0, 100) . "(...)" : substr($row['texto'], 0, strlen($row['texto'])) ?>
                    </p>
                </h2>
                
            </article>
        <?php endforeach ?>


    </section>

    <!--FIM SESSÃO SESSÃO DE ARTIGOS-->

   
    <!--FIM DOBRA TUTOR-->
    <script>
        function filtroPorCategoria(valorId) {
            window.location.href = "index.php?categoria=" + valorId;
        }
    </script>
</main>

<!-- inclui o arquivo de rodape do site -->
<?php require_once 'layouts/site/footer.php'; ?>
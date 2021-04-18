<?php
include_once "tartalom.php";
include_once "reg_session.php";

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8"/>
    <meta name="author" content="Fityó András és Körmöczi Róbert"/>
    <meta name="description" content="Ez az oldal egy bevásárló listát valósít meg."/>
    <title>Bevásárló lista főoldal</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/fooldal.css"/>
    <link rel="icon" href="img/favicon.ico"/>
    <link rel="stylesheet" media="print" href="css/print.css" />
</head>
<body>
<?php get_header("index");?>
<main>
    <section id="home-intro-section">
        <div class="background-image-box">
            <img src="img/food_store.jpg" alt="Intro kép">
        </div>
        <div class="content-wrap">
            <h1>Bevásárló lista</h1>
            <p>Érdemes észben tartani, de ha nem megy, itt a megoldás!</p>
        </div>
    </section>
    <section id="home-article-section">
        <div class="content-wrap">
            <h2>Cikk a vásárlási szokásokról</h2>
            <article>
                <div class="article-wrap">
                    <div class="image-box">
                        <img src="img/people_in_store.jpg" alt="Újságcikk kép">
                    </div>
                    <div class="article-info-wrap">
                        <h3>Vásárlási szokások a koronavírus járvány idején</h3>
                        <time datetime="2021-03-07T14:36">2021.03.07.</time>
                        <strong>
                            A járvány elején a vásárlási szokások radikálisan megváltoztak. Ezek a szokások azóta
                            normalizálódtak, azonban vannak olyanok, amelyek feltehetően tartósan megmaradnak. Ezekről
                            szeretnénk kicsit részletesebben beszélni.
                        </strong>
                        <div class="button_box">
                            <a href="bevasarlas_cikk.php" class="cta-button">Tovább a teljes cikkhez</a>
                        </div>
                    </div>
                </div>

            </article>
        </div>
    </section>
    <section id="table-section">
        <div class="content-wrap">
            <h2>A bevásárlólista megjelenése:</h2>
            <iframe src="bevasarlo_lista.php"></iframe>
        </div>
    </section>
</main>
<?php get_footer(); ?>
</body>
</html>

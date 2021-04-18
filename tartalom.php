<?php
function get_header($current_page)
{
    ob_start(); ?>
    <header>
        <div class="header-container">
            <div class="logo-container">
                <a href="index.php">
                    <img src="img/shopping_bag.png" alt="Logó">
                </a>
            </div>
            <nav>
                <ul id="main-navigation">
                    <li class="nav-item">
                        <a href="terkep.php" <?php echo $current_page === "terkep" ? 'class="current-page"' : '' ?>>Szegedi
                            áruházak</a>
                    </li>
                    <li class="nav-item">
                        <a href="bevasarlo_lista.php" <?php echo $current_page === "bevasarlo_lista" ? 'class="current-page"' : '' ?>>Bevásárló lista</a>
                    </li>
                    <li class="nav-item">
                        <a href="uj_hozzaadasa.php" <?php echo $current_page === "uj_hozzaadasa" ? 'class="current-page"' : '' ?>>Új listaelem</a>
                    </li>
                    <li class="nav-item">
                        <a href="bevasarlas_cikk.php" <?php echo $current_page === "bevasarlas_cikk" ? 'class="current-page"' : '' ?>>Bevásárlási szokások</a>
                    </li>
                    <li class="nav-item">
                        <a href="regisztracio.php" <?php echo $current_page === "regisztracio.php" ? 'class="current-page"' : '' ?>>Regisztráció</a>
                    </li>
                    <li class="nav-item">
                        <a href="bejelentkezes.php" <?php echo $current_page === "bejelentkezes.php" ? 'class="current-page"' : '' ?>>Bejelentkezés</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <?php ob_get_contents();
}

function get_footer()
{
    ob_start(); ?>
    <footer>
        <div class="footer-container">
            <div class="content-wrap">
                <div class="footer-wrapper">
                    <p>
                        Készítette:
                        <span class="name-span" title="CC6A87">Fityó András</span> és
                        <span class="name-span" title="WT8AYY">Körmöczi Róbert</span>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <?php ob_get_contents();
}
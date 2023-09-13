<?php
    require_once __DIR__.'/../main.php';
?>
<!---------------------HEADER--------------------->
<header class="header"> <!-- Cabecera -->

<div class="header__beforenav"> <!-- Antes del Nav -->

    <div class="header__logosimgs">

        <a href="index.php">
            <img src="assets/beautics__logoOffical__White.png" alt="logo_beautics" class="logo"> 
        </a><!-- Logo 1/3 -->

        <div class="header__apartado__ubic">
            <img src="assets/signo__ubicacion.png" alt="simbol__ubicacion" class="header__apartado__ubic__img">
            <div class="header__apartado__ubic__latters">
                <p>Ubicado</p>
                <Span class="header__apartado__ubic__latters__place">Nuevo Leon</Span>
            </div>
        </div>

    </div>


        <form class="search__structure" id="searchForm" action="<?=URL?>/market.php"> <!-- Estructura del buscador 2/3-->

            <input type="text" name="search" class="input" placeholder="¿Que estas buscando?"> <!-- Input del buscador -->

            <div onclick="document.getElementById('searchForm').submit()" class="search__structure__boxlupa"> <!-- Box que contiene la lupa -->

                <img src="assets/search__lupa.png" alt="search__lupa" class="search__structure__lupa"> <!-- Img lupa -->

            </div>

        </form>


        <img src="assets/img__oferta.png" alt="prueba" class="logoferta"><!-- Estructura  3/3-->

</div>




<nav class="header__nav"> <!-- Nav -->

    <div class="header__nav__sections">

        <a href="market.php" class="header__nav__links"> 
            <p>Categorias</p> 
            <img src="assets/signo__categoria.png" alt="signo__categoria" class="header__nav__links__img">
        </a>

        <a href="ofertas.php" class="header__nav__links">
            <p>Ofertas</p>
            <img src="assets/signo__ofertas.png" alt="signo__ofertas" class="header__nav__links__img">
        </a>
        <?php
            if($user == null){ ?>
        <a href="Informacion.php" class="header__nav__links">
            <p>Información</p>
            <img src="assets/signo__info.png" alt="signo__info" class="header__nav__links__img">
        </a>
        <a href="Ayuda.php" class="header__nav__links">
            <p>Ayuda</p>
            <img src="assets/signo__help.png" alt="signo__help" class="header__nav__links__img">
        </a>
        <?php } else { ?>
        
            <?php
            if($user->tipo_usuario == TipoUsuario::Admin){ ?>
            <a href="admin.php" class="header__nav__links">
                    <p>Admin</p>
                    <img src="assets/signo__info.png" alt="signo__info" class="header__nav__links__img">
                </a>
            
            <?php } ?>

        <a href="history.php" class="header__nav__links">
            <p>Mis compras</p>
            <img src="assets/signo__help.png" alt="signo__help" class="header__nav__links__img">
        </a>
        <?php } ?>
    </div>


    <div class="section__nav__usershop"> 

        <?php
            if($user == null){ ?>
        
            <a class="user__box" href="login.php">

                <p>Log In</p>
                <img src="assets/login__user.png" alt="user" class="couplelogos">

            </a>

            <?php } else { ?>
            <a class="user__box" href="logout.php">

                <p><?=$user->nombre_usuario?> [Salir]</p>
                <img src="assets/login__user.png" alt="user" class="couplelogos">

            </a>
           <?php } ?>

        <div class="shopping__box shopping__box__col">

            <button onclick="location.href='<?=URL?>/shopping.php'" class="shopping__box__fil">

                <p>Shopping</p>
                <img src="assets/shopping__cart.png" alt="buy" class="couplelogos couplelogos--size">

            </button>

            <div class="shopping__box__bottomcont">

            <?php if($user!=null){ ?>
                <span><?=$carrito->totalProducts()?></span>
            <?php } else { ?>
                <span>0</span>
            <?php } ?>
            </div>

        </div>

    </div> 

</nav>

</header>

<!------------------------------------------>
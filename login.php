<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="styles.css">
    <title>Log In</title>
</head>

<body>
    
<?php

    require_once './app/templates/header.php';
    
?>
<!---------------------MAIN--------------------->
<main class="mainsecundarios">

    <div class="container__directflex__login">
        
        <section class="container__box__login">

            <header class="container__box__login__header">

                <h2 class="container__box__login__header__title">Inicio de sesión</h2>

                <p class="container__box__login__header__p">

                    <?php if(isset($_GET['errormsg'])){
                        echo $_GET['errormsg'];        
                    } ?>

                </p>

            </header>

            <form class="container__box__login__form" method="POST" action="./app/actions/users/login.php">

                <div class="container__box__login__form__containerdiv">
            
                    <div class="container__box__login__form__boxdiv">

                        <label for="inputemail">Email:</label>

                        <div class="container__box__login__form__containerimginput">

                            <div class="container__box__login__form__input__containerimg">
                                <img src="assets/login__user.png" alt="img__user__login" class="container__box__login__form__input__img container__box__login__form__input__img--user">
                            </div>

                            <input type="email" id="inputemail" name="email" class="container__box__login__form__input" >

                        </div>

                    </div>

                    <div class="container__box__login__form__containerdiv">
            
                        <div class="container__box__login__form__boxdiv">
    
                            <label for="inputpassword">Contraseña:</label>
    
                            <div class="container__box__login__form__containerimginput">
    
                                <div class="container__box__login__form__input__containerimg">
                                    <img src="assets/signo__password.png" alt="img__password" class="container__box__login__form__input__img">
                                </div>
    
                                <input type="password" id="inputpassword" name="passw" class="container__box__login__form__input" >
    
                            </div>
    
                        </div>

                    <!-- <div class="container__box__login__form__boxdiv">
                        <label for="inputpassword">Password:</label>
                        <input type="password" id="inputpassword" class="container__box__login__form__input">
                    </div> -->

                </div>

                <div class="container__box__login__form__containerdiv container__box__login__form__containerdiv--button">

                    <a href="register.php" class="container__box__login__form__containerdiv__a">No estás Registrado?</a>

                    <button class="container__box__login__form__button">Iniciar sesión</button>

                </div>


            </form>

            <footer>
                <p class="container__box__login__footer__p">Beautics.com - 2022</p>
            </footer>

        </section>

    </div>


</main>
<!------------------------------------------>
   
<!---------------------FOOTER--------------------->


<footer class="footer__container">

    <div class="footer__sec__first">
        <img src="assets/img__broch.png" alt=".footer__sec__first__img" class="footer__sec__first__img">
    </div>

    <div class="footer__sec">
        <section>
            <h3 class="footer__sec__title">Conócenos</h3>
                <ul class="footer__sec__containerlist">

                    <li class="footer__sec__itemslist">
                        <a href="#" class="footer__sec__itemslist__links">Trabaja en Beautics</a>
                    </li>
                    <li class="footer__sec__itemslist">
                        <a href="#" class="footer__sec__itemslist__links">Blog</a>
                    </li>
                    <li class="footer__sec__itemslist">
                        <a href="#" class="footer__sec__itemslist__links">Acerca de Beautics</a>
                    </li>
                    <li class="footer__sec__itemslist">
                        <a href="#" class="footer__sec__itemslist__links">Relaciones con inversionistas</a>
                    </li>


                    <li class="footer__sec__itemslist">
                        <a href="#" class="footer__sec__itemslist__links">Trabaja en Beautics</a>
                    </li>
                    <li class="footer__sec__itemslist">
                        <a href="#" class="footer__sec__itemslist__links">Blog</a>
                    </li>
                    <li class="footer__sec__itemslist">
                        <a href="#" class="footer__sec__itemslist__links">Acerca de Beautics</a>
                    </li>
                    <li class="footer__sec__itemslist">
                        <a href="#" class="footer__sec__itemslist__links">Relaciones con inversionistas</a>
                    </li>
                    
                </ul>
        </section>
        <section>

            <h3 class="footer__sec__title">Productos de Pago de Beautics</h3>

            <ul class="footer__sec__containerlist">

                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Compra con Puntos</a>
                </li>
                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Recarga tu Saldo</a>
                </li>
                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Conversor de divisas de Beautics</a>
                </li>


                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Compra con Puntos</a>
                </li>
                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Recarga tu Saldo</a>
                </li>
                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Conversor de divisas de Beautics</a>
                </li>

                
            </ul>

        </section>
        <section>

            <h3 class="footer__sec__title">Podemos Ayudarte</h3>

            <ul class="footer__sec__containerlist">

                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Beautics y la Ayuda al Medio Ambiente</a>
                </li>
                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Tu Cuenta</a>
                </li>
                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Tus Pedidos</a>
                </li>
                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Tarifas de Envío y Políticas</a>
                </li>
                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Devoluciones y Reemplazos</a>
                </li>
                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Ayuda</a>
                </li>


                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Beautics y la Ayuda al Medio Ambiente</a>
                </li>
                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Tu Cuenta</a>
                </li>
                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Tus Pedidos</a>
                </li>
                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Tarifas de Envío y Políticas</a>
                </li>
                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Devoluciones y Reemplazos</a>
                </li>
                <li class="footer__sec__itemslist">
                    <a href="#" class="footer__sec__itemslist__links">Ayuda</a>
                </li>
                
            </ul>

        </section>

    </div>
    <div class="footer__sec">
        <img src="assets/beautics__logoOffical__BlueDark.png" alt="logo__footer" class="logo__footer">


    </div>
</footer>
<!------------------------------------------>
    <script src="styles.css"></script>

</body>

</html>


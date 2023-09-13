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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="styles.css">
    <title>Shopping</title>
</head>

<body>
    
<?php

require_once './app/templates/header.php';

if($user != null){
    
?>
<!---------------------MAIN--------------------->
<main class="mainsecundarios mainsecundarios--history">

    <a href="market.php" class="container__inv__interface__title">
        <h2 class="container__admin__title"><i class="fa-solid fa-caret-left"></i> MARKET <i class="fa-solid fa-cart-shopping"></i></i>
        </h2>
        
   </a>

    
   <div class="container__history">

    

        <div class="container__history__boxtitle">
            <h2 class="container__history__title">Shopping</h2>
        </div>



        <div class="container__history__containerdate">

            <div class="container__history__boxtitle">
                <h3 class="container__history__title container__history__boxtitle--padding">Products</h3>
            </div>
    
            <?php
                $products = $carrito->getProducts();
                foreach($products as $product){
            ?>
            <div class="container__history__sectionboxdate">

                <div class="container__history__boxdate container__history__boxdate--shopping">
                    <div class="container__history__boxdate__boximg">
                        <img src="<?=$product->imagen?>" alt="img__product" class="container__history__boxdate__img container__history__boxdate__img--shopping">
                    </div>
                    <div class="container__history__boxdate__title container__history__boxdate__title--shopping">
                        <h3><?=$product->nombre_producto?></h3>
                    </div>
                    <div class="container__history__boxdate__precio"><?=$product->cantidad?>x$<?=$product->precio_producto?></div>


                    <div class="container__history__boxdate__buttons">
                        <button onclick="location.href = '<?=URL?>/app/actions/users/removeToCart.php?idproducto=<?=$product->id_producto?>'" class="button__addcart">Remove <i class="fa-solid fa-trash"></i></button>
                        <button onclick="location.href = '<?=URL.'/product.php?id='.$product->id_producto?>'" class="button__addcart">View <i class="fa-solid fa-eye"></i></button>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="container__shopping__buy">
                <button onclick="location.href = '<?=URL?>/app/actions/users/checkOut.php'" class="button__addcart container__shopping__buy__button">Realizar pedido</button>
                <p class="container__history__boxdate__precio container__history__boxdate__precio--shopping">Total: $<?=$carrito->getTotal()?></p>
            </div>
               

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

<?php } else {
    header("Location: ".URL."/login.php");
} ?>
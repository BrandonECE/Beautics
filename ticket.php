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
    <title>Ticket</title>
</head>

<body>
    
<?php

require_once './app/templates/header.php';

if($user != null && isset($_GET['id_venta']) && isset($_GET['id_producto'])){
    
    $ventas = Venta::getAll("WHERE id_venta = ".intval($_GET['id_venta']));
    if(count($ventas) > 0){

        $venta = $ventas[0];
        $carrito = $venta->getCarrito();
        if($carrito->id_usuario == $user->getId() || $user->tipo_usuario == TipoUsuario::Admin){

            $products = $carrito->getProducts();
            $product = null;
            foreach($products as $possibleProduct){
                if($possibleProduct->id_producto == intval($_GET['id_producto'])){
                    $product = $possibleProduct;
                }
            }

            if($product != null){ ?>

<!---------------------MAIN--------------------->
<main class="mainsecundarios">

    
    <div class="container__product">

        <div class="container__product__boximg">
            <img src="<?=$product->imagen?>" alt="product__img" class="container__product__img">
        </div>

        <div class="container__product__info">
            <h2><?=$product->nombre_producto?></h2>

            <p class="container__product__info__precio"><?=$product->cantidad?>x$<?=$product->precio_producto?></p>
            <h3>Total: $<?=$product->cantidad*$product->precio_producto?></h3>

            <div class="box__market__product__mininfo">
                    
                <p class="box__market__product__info__minititles">Comprado el</p>
                <p class="font__date"><?=$venta->fecha_venta?></p>
                <?php
                    if(count($products) > 1){ ?>
                    <p class="box__market__product__info__minititles">Otros productos de esta compra <i class="fa-solid fa-chevron-down"></i></p>
                    <div class="container__products__other">
                        <?php
                            foreach($products as $otherProduct){
                                if($otherProduct->id_producto != $product->id_producto){
                        ?>
                        <p> <a class="products__other" href="<?=URL?>/ticket.php?id_venta=<?=$_GET['id_venta']?>&id_producto=<?=$otherProduct->id_producto?>"><?=$otherProduct->cantidad?>x<?=$otherProduct->nombre_producto?> <i class="fa-solid fa-caret-right"></i></a></p>
                        <?php }  } ?>
                    </div>
                <?php  } ?>
                
                

            </div>



        </div> 

        <div class="container__product__buttons container__product__buttons--column">
            <img src="assets/beautics__logoOffical__BlueDark.png" alt="productbeautics" class="container__product__buttons__img">
            <p class="container__product__buttons__QR">QR</p>
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='<?=URL?>/ticket.php?id_venta=<?php echo urlencode($_GET['id_venta']."&id_producto=".$product->id_producto)?>" alt="ticket" class="ticket__img">
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

<?php            } else {
                header("Location: ".URL."/history.php"); 
            }

        } else {
            header("Location: ".URL."/history.php"); 
        }

    } else {
        header("Location: ".URL);
    }
} else {
    header("Location: ".URL."/login.php");
} ?>
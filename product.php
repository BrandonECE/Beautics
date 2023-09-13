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
    <title>Producto</title>
</head>

<body>
    
<?php
    require_once './app/templates/header.php';
    if(isset($_GET['id'])){

        $products = Producto::getAll("*", "WHERE id_producto = ".intval($_GET['id']));
        if(count($products) > 0){

            $product = $products[0];
?>


<!---------------------MAIN--------------------->
<main class="mainsecundarios">

    
    <div class="container__product">

        <div class="container__product__boximg">
            <img src="<?=$product->imagen?>" alt="product__img" class="container__product__img">
        </div>

        <div class="container__product__info">
            <h2><?=$product->nombre_producto?></h2>
            
            <p class="box__market__product__info__marca">Marca: <span><?=$product->marca_producto?></span></p>

            <?php
                if($product->precio_producto >= 200){ ?>
            <div class="box__market__product__info__envio">
                <p>Envio Gratis</p>
                <img src="assets/signo__ofertas.png" alt="envioimg" class="box__market__product__info__envio__img">
            </div>
            <?php } else { ?>
            <div class="box__market__product__info__envio box__market__product__info__envio--nogratis">
                <p>Envio: $50</p>
                <img src="assets/signo__ofertas.png" alt="envioimg" class="box__market__product__info__envio__img box__market__product__info__envio__img--nogratis">
            </div>
            <?php } ?>

            <p class="container__product__info__precio">$<?=$product->precio_producto?></p>

            <div class="box__market__product__mininfo">
                    
                <p class="box__market__product__info__minititles">Descripcion</p>
                <p><?=$product->descripcion_producto?></p>

                <p class="box__market__product__info__minititles">Categorias</p>
                
                <?php
                    $cat_name = "";
                    $categorias = Categoria::getAll("*", "WHERE id_categoria = ". $product->id_categoria);
                    if(count($categorias) > 0){
                        $cat_name = $categorias[0]->nombre_categoria;
                    }
                ?>
                <div class="box__market__product__info__cat">
                    <p class="box__market__product__info__categoria"><i class="fa-solid fa-certificate"></i> <?=$cat_name?></p>
                </div>

            </div>



        </div> 

        <div class="container__product__buttons">
            <img src="assets/beautics__logoOffical__BlueDark.png" alt="productbeautics" class="container__product__buttons__img">
            <button class="button__addcart" onclick="location.href = '<?=URL?>/app/actions/users/addToCart.php?idproducto=<?=$product->getId()?>'">Add to Cart  <i class="fa-solid fa-cart-shopping"></i></button>
            <?php 
                if($user != null){
                    if($user -> tipo_usuario == TipoUsuario::Admin){ ?>
            <button class="button__addcart" onclick="location.href = '<?=URL?>/inventoryedit.php?idproducto=<?=$product->getId()?>'" >Edit <i class="fa-solid fa-pen-to-square"></i></button>
                <?php } } ?>
            
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

<?php        } else {
            header("Location: ".URL);
        }

    } else {
        header("Location: ".URL);
    }

?>
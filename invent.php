<?php
    require_once './app/main.php';
    if($user != null){
        if($user->tipo_usuario == TipoUsuario::Admin){ ?>
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
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="styles.css">
    <title>Inventario</title>
</head>

<body>
    
<!---------------------HEADER--------------------->
    <header class="header__admin"> <!-- Cabecera -->
        <nav class="header__nav__admin"> <!-- Nav -->

            <div class="header__nav__sections__admin">
                <a href="admin.php">
                    <img src="assets/beautics__logoOffical__Black.png" alt="logo_beautics" class="logo"> 
                </a>
            </div>

            <div class="section__called__admin">
                <i class="fa-solid fa-warehouse section__called__admin__inv"></i>
                <!-- <p class="section__called__admin__letters">Interface</p> -->
            </div>

            
            <div class="section__nav__admin"> 

                <a class="user__box" href="#">

                    <p>Admin</p>
                    <img src="assets/admin/logo__admin.png" alt="user" class="couplelogos__admin">

                </a>
        
           
                <a class="user__box" href="index.html">

                    <p>Exit</p>
                    <img src="assets/admin/exit__admin.png" alt="user" class="couplelogos__admin">

                </a>

            </div> 

        </nav>
    </header>

<!------------------------------------------>
<!---------------------MAIN--------------------->
<main class="mainsecundarios__admin">

    <!-- <div class="container__div">

        <a href="admin.php" class="container__inv__interface__title">
            <h2 class="container__admin__title"><i class="fa-solid fa-caret-left"></i> INTERFACE
                <img src="assets/admin/header__admin__img.png" alt="letterinterfaceimg" class="container__admin__title__img">
            </h2>
            
       </a>

    </div> -->
    

   
   <div class="container__admin__interface__settings">


        <div>


        <div class="aling__buttons__admins__interface">

            <div class="container__div">

                <a href="admin.php" class="container__inv__interface__title">
                    <h2 class="container__admin__title"><i class="fa-solid fa-caret-left"></i> INTERFACE
                        <img src="assets/admin/header__admin__img.png" alt="letterinterfaceimg" class="container__admin__title__img">
                    </h2>
                    
                 </a>

            </div>


            <div class="container__inv__interface__settings__title">

                <h2 class="container__inv__interface__settings__title__h2">INVENTORY <i class="fa-solid fa-box-open"></i></h2> 
            
                <span class="container__admin__interface__settings__title__span">Available categories...</span>
               
            </div>

        </div>


            <section class="box__admin__interface__settings">

                <header class="box__admin__interface__settings__header">
                    <h2>ALL PRODUCTS / <i class="fa-solid fa-box"></i> ...</h2>
                    <img src="assets/beautics__logoOffical__BlueDark.png" alt="img__inv" class="box__inv__interface__settings__header__img">
                </header>

                <div class="box__admin__interface__settings__content">
                    <p class="box__admin__interface__settings__content__stats"><span><?=Estadisticas::getTotalProducts()?></span><i class="fa-brands fa-product-hunt"></i></p>
                </div>

                <div class="box__admin__interface__settings__content">
                <?php
                        $categories = Estadisticas::getTopCategories();
                        foreach($categories as $cat){
                    ?>
                    <p class="box__inv__interface__settings__content__ministats"><?=$cat->nombre_categoria?>: <span><?=$cat->total_productos?></span></p>
                    <?php } ?>

                </div>

                <div class="box__inv__interface__content__products">

                    <div class="container__invent__edit">
                        <button class="button__addcart" onclick="location.href='inventoryedit.php'">Añadir producto <i class="fa-solid fa-pen-to-square"></i></button>
                    </div>
                    
                    <div class="container__market__products">


                <?php
                    $conditions = "";
                    if(isset($_GET['categoria']) || isset($_GET['precio']) || isset($_GET['free_ship']) || isset($_GET['search'])){
                        $conditions = "WHERE ";

                        if(isset($_GET['categoria'])){
                            $conditions .= "id_categoria=".intval($_GET['categoria'])." ";
                        }

                        if(isset($_GET['precio'])){
                            
                            if($conditions != "WHERE "){
                                $conditions .= "AND ";
                            }

                            switch(intval($_GET['precio'])){
                                default:
                                    $conditions .= "precio_producto <= 100 ";
                                    break;
                                case 2:
                                    $conditions .= "precio_producto BETWEEN 101 AND 500 ";
                                    break;
                                case 3:
                                    $conditions .= "precio_producto BETWEEN 501 AND 1000 ";
                                    break;
                                case 4:
                                    $conditions .= "precio_producto > 1000 ";
                                    break;
                            }

                        }

                        if(isset($_GET['free_ship'])){
                            
                            if($conditions != "WHERE "){
                                $conditions .= "AND ";
                            }

                            switch(intval($_GET['free_ship'])){
                                case 1:
                                    $conditions .= "precio_producto >= 200 ";
                                    break;
                                default:
                                    $conditions .= "precio_producto < 200 ";
                                    break;
                            }

                        }

                        if(isset($_GET['search'])){

                            if($conditions != "WHERE "){
                                $conditions .= "AND ";
                            }

                            $conditions .= "(nombre_producto LIKE '%".$_GET['search']."%' OR descripcion_producto LIKE '".$_GET['search']."') ";

                        }

                    }
                    $products = Producto::getAll("*", $conditions." ORDER BY id_producto DESC");
                    if(count($products) > 0){
                        foreach($products as $product){
                ?>
                    <div class="box__market__product" onclick="location.href='./product.php?id=<?=$product->getId()?>'">
                        
                        <img src="<?=$product->imagen?>" alt="product1" class="box__market__product__img">
                        
                        <div class="box__market__product__info">

                            <h3 class="box__market__product__info__title"><?=$product->nombre_producto?></h3>

                            <p class="box__market__product__info__marca">Marca: <span><?=$product->marca_producto?></span></p>

                            <p class="box__market__product__info__precio">$<?=$product->precio_producto?></p>
                            
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
                            <img src="assets/beautics__logoOffical__BlueDark.png" alt="productbeautics" class="box__market__product__img__bottom">
                            
                        </div>

                    </div>

                    <?php } } ?>

                </div>
                    
                </div>
                
                <footer class="box__admin__interface__settings__footer">
                    <i class="fa-solid fa-gears"></i> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti, rem ipsam! Eius, amet perferendis ut consequatur velit ex alias, laborum sed cupiditate quos sint quasi quam, totam cum quibusdam dolorem.
                </footer>
                
                
            </section>



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
        <img src="assets/beautics__logoOffical__BlueDark.png" alt="logo__footer" class="logo__footer">
    </div>
</footer>
<!------------------------------------------>
    <script src="styles.css"></script>

</body>

</html>

<?php
        } else {
            header("Location: ".URL);
        }
    } else {
        header("Location: ".URL);
    }
?>
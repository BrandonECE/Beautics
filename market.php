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
    <title>Market</title>
</head>

<body>
    
<?php

    require_once './app/templates/header.php';

?>
<!---------------------MAIN--------------------->
<main class="mainsecundarios__market">

    <aside class="container__market__categorias">

        <div class="container__market__categorias__divisiones">
            <h3  class="container__market__categorias__titles">Categorias</h3>
            <ul class="container__market__categorias__ul">
        <?php
            $categorias = Categoria::getAll();
            if(count($categorias) > 0){
                foreach($categorias as $categoria){ ?>

                <li class="container__market__categorias__li">
                    <a href="?<?=http_build_query(array_merge($_GET, array("categoria"=>$categoria->getId())))?>" class="container__market__categorias__links"><?=$categoria->nombre_categoria?></a>
                </li>

            <?php  }
            } ?>
            </ul>
        </div>

        <div class="container__market__categorias__divisiones">
            <h3  class="container__market__categorias__titles">Precio</h3>
            <ul class="container__market__categorias__ul">
                <li class="container__market__categorias__li">
                    <a href="?<?=http_build_query(array_merge($_GET, array("precio"=>"1")))?>" class="container__market__categorias__links">$1 - $100</a>
                </li>
                <li class="container__market__categorias__li">
                    <a href="?<?=http_build_query(array_merge($_GET, array("precio"=>"2")))?>" class="container__market__categorias__links">$101 - $500</a>
                </li>
                <li>
                    <a href="?<?=http_build_query(array_merge($_GET, array("precio"=>"3")))?>" class="container__market__categorias__links">$501 - $1000</a>
                </li class="container__market__categorias__li">
                <li>
                    <a href="?<?=http_build_query(array_merge($_GET, array("precio"=>"4")))?>" class="container__market__categorias__links">> $1000</a>
                </li>
            </ul>
        </div>

        <div class="container__market__categorias__divisiones">
            <h3  class="container__market__categorias__titles">Costo de envío</h3>
            <ul class="container__market__categorias__ul">
                <li class="container__market__categorias__li">
                    <a href="?<?=http_build_query(array_merge($_GET, array("free_ship"=>1)))?>" class="container__market__categorias__links">Gratis</a>
                </li>
                <li class="container__market__categorias__li">
                    <a href="?<?=http_build_query(array_merge($_GET, array("free_ship"=>0)))?>" class="container__market__categorias__links">Costo Adicional</a>
                </li>

            </ul>
        </div>

        
    </aside>

   <section class="container__market">

        <h2 class="container__market__title">RESULTADOS</h2>

            <div class="container__market__structureallproducts">

                <!-- ----------------------------------------------------------------------- -->

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
                    $products = Producto::getAll("*", $conditions." ORDER BY id_producto DESC LIMIT 20");
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
        
             <!-- ----------------------------------------------------------------------- -->
                <!-- ----------------------------------------------------------------------- -->
<!-- 
                <div class="container__market__products">
                

                    <div class="box__market__product">
                            
                        <img src="assets/products/p2.jpg" alt="product1" class="box__market__product__img">
                            
                        <div class="box__market__product__info">
    
                             <h3 class="box__market__product__info__title">Paleta de sombras de ojos 86 colores sombra Colección Vivo Brillante Kit de Maquillaje Caja Profesional para Maquillaje Accesorio cosmético de Belleza</h3>
    
                            <p class="box__market__product__info__marca">Marca: <span>Salandens</span></p>
    
                            <p class="box__market__product__info__precio">$350</p>
    
                            <div class="box__market__product__info__envio box__market__product__info__envio--nogratis">
                                <p>Sin Envio Gratis</p>
                                <img src="assets/signo__ofertas.png" alt="envioimg" class="box__market__product__info__envio__img box__market__product__info__envio__img--nogratis">
                            </div>
    
                            <img src="assets/beautics__logoOffical__BlueDark.png" alt="productbeautics" class="box__market__product__img__bottom">
                                
                        </div>
    
                    </div>


                    <div class="box__market__product">
                                
                        <img src="assets/products/p3.jpg" alt="product1" class="box__market__product__img">
                                
                        <div class="box__market__product__info">
        
                            <h3 class="box__market__product__info__title">Paleta de sombras de ojos, 120 Colores Paleta Maquillaje Matte Smoky Shimmer Glitter Eyeshadow Primer 120 colores Maquillaje impermeable Paleta Cosméticos</h3>
        
                            <p class="box__market__product__info__marca">Marca: <span>Skyera</span></p>
        
                            <p class="box__market__product__info__precio">$400</p>
        
                            <div class="box__market__product__info__envio box__market__product__info__envio--nogratis">
                                <p>Envio: $90</p>
                                <img src="assets/signo__ofertas.png" alt="envioimg" class="box__market__product__info__envio__img box__market__product__info__envio__img--nogratis">
                            </div>
        
                            <img src="assets/beautics__logoOffical__BlueDark.png" alt="productbeautics" class="box__market__product__img__bottom">
                                    
                        </div>
        
                     </div>

                     <div class="box__market__product">
                        
                        <img src="assets/products/p1.jpg" alt="product1" class="box__market__product__img">
                        
                        <div class="box__market__product__info">

                            <h3 class="box__market__product__info__title">Allphv 2 Sellos de Delineador de Ojos Delineador Negro Delineador Líquido Larga Duración, Lápiz de Ojos de Maquillaje con Alas, Cat Eye Delineador Plumón - 2 PAQUETES</h3>

                            <p class="box__market__product__info__marca">Marca: <span>AllPhy</span></p>

                            <p class="box__market__product__info__precio">$150</p>

                            <div class="box__market__product__info__envio">
                                <p>Envio Gratis</p>
                                <img src="assets/signo__ofertas.png" alt="envioimg" class="box__market__product__info__envio__img">
                            </div>

                            <img src="assets/beautics__logoOffical__BlueDark.png" alt="productbeautics" class="box__market__product__img__bottom">
                            
                        </div>

                    </div>
        
                </div>

             

            
            </div> -->

   </section>


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


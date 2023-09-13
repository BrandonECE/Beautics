<?php
    require_once './app/main.php';
    if($user != null){
        if($user->tipo_usuario == TipoUsuario::Admin){
            $product = null;
            if(isset($_GET['idproducto'])){
                $products = Producto::getAll("*", "WHERE id_producto = ". intval($_GET['idproducto']));
                if(count($products) > 0){
                    $product = $products[0];
                }
            }
            ?>
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
    <script>
        function updateImg(event){
            if(event.srcElement.value == ""){
                document.getElementById("ref_img").src = "https://img.freepik.com/vector-gratis/fondo-abstracto-blanco_23-2148833155.jpg?w=2000"
            } else {
                document.getElementById("ref_img").src = event.srcElement.value
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="styles.css">
    <title>Edit-Inventory</title>
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
                <i class="fa-solid fa-pen-to-square section__called__update"></i>
                <!-- <p class="section__called__admin__letters">Interface</p> -->
            </div>

            
            <div class="section__nav__admin"> 

                <a class="user__box" href="admin.php">

                    <p>Admin</p>
                    <img src="assets/admin/logo__admin.png" alt="user" class="couplelogos__admin">

                </a>
        
           
                <a class="user__box" href="index.php">

                    <p>Exit</p>
                    <img src="assets/admin/exit__admin.png" alt="user" class="couplelogos__admin">

                </a>

            </div> 

        </nav>
    </header>

<!------------------------------------------>
<!---------------------MAIN--------------------->
<main class="mainsecundarios__admin mainsecundarios__admin">

          
    <div class="container__inv__interface__title__start">
        <a href="invent.php" class="container__inv__interface__title">
            <h2 class="container__admin__title"><i class="fa-solid fa-caret-left"></i> INVENTORY
                <i class="fa-solid fa-warehouse"></i>
            </h2>
         </a>
    </div>


    <form class="container__product container__produc--update" method="POST" action="./app/actions/admin/updateProduct.php">


        <div class="container__product__boximg container__product__boximg--update">

            <h2 class="container__product__boximg__title__ofimage">Image <i class="fa-regular fa-image"></i></h2>

            <div class="container__product___updtate">
                <label for="#" class="container__product__update__label ">Link-Image <i class="fa-solid fa-pen-to-square"></i></label>
                <p>Add a link or URL of an image for your product. </p>
                <input type="text" name="imagen" <?php
                    if($product != null)
                        echo "value=\"".$product->imagen."\"";
                ?> class="container__product__update__input" onkeyup="updateImg(event)">
            </div>

            <img <?php
            if($product != null){
                echo "src=\"". $product->imagen ."\"";
            } else {
                echo "src=\"https://img.freepik.com/vector-gratis/fondo-abstracto-blanco_23-2148833155.jpg?w=2000\"";
             }?> alt="product__img" class="container__product__img container__product__img__marco" id="ref_img">

        </div>

        <div class="container__product__info container__product__info--update">

            <h2>Edit Product <i class="fa-solid fa-pen-to-square"></i></h2>

            <div class="container__product___updtate">
                <label for="#" class="container__product__update__label">Title  <i class="fa-solid fa-pen-to-square"></i></label>
                <input type="text" name="nombre" <?php
                    if($product != null)
                        echo "value=\"".$product->nombre_producto."\"";
                ?> class="container__product__update__input">
            </div>

            <div class="container__product___updtate">
                <label for="#" class="container__product__update__label">Marca  <i class="fa-solid fa-pen-to-square"></i></label>
                <input name="marca" type="text"  <?php
                    if($product != null)
                        echo "value=\"".$product->marca_producto."\"";
                ?> class="container__product__update__input">
            </div>

            <div class="container__product___updtate">
                <div class="container__product___updtate__preciodescripcion">
                    <label for="#" class="container__product__update__label">Precio <i class="fa-solid fa-pen-to-square"></i></label>
                    <p>When the amount of $250 is exceeded, the shipping of the product will be free.</p>
                </div>
                <input type="number" name="precio"  <?php
                    if($product != null)
                        echo "value=\"".$product->precio_producto."\"";
                ?> class="container__product__update__input">
            </div>
            
            <div class="container__product___updtate">
                <div class="container__product___updtate__preciodescripcion">
                    <label for="#" class="container__product__update__label">Stock <i class="fa-solid fa-pen-to-square"></i></label>
                </div>
                <input type="number" name="stock"  <?php
                    if($product != null)
                        echo "value=\"".$product->stock_producto."\"";
                ?> class="container__product__update__input">
            </div>

            <div class="box__market__product__mininfo box__market__product__mininfo--update">
                    
                <div class="container__product___updtate">
                    <label for="#" class="container__product__update__label">Description <i class="fa-solid fa-pen-to-square"></i></label>
                    <input type="text" name="descripcion" <?php
                    if($product != null)
                        echo "value=\"".$product->descripcion_producto."\"";
                ?> class="container__product__update__input">
                </div>
    

                <div class="container__product___updtate">
                    <label for="#" class="container__product__update__label">Category <i class="fa-solid fa-pen-to-square"></i></label>
                    <select name="id_categoria" class="container__product__update__input">
                        <?php
                            $categorias = Categoria::getAll("*");
                            foreach($categorias as $categoria){
                        ?>
                        <option value="<?=$categoria->getId()?>" <?php
                            if($product != null){
                                if($categoria->getId() == $product->id_categoria)
                                echo "selected";
                            }
                        ?>><?=$categoria->nombre_categoria?></option>
                        <?php } ?>
                    </select>

                </div>

            </div>



        </div> 

        <div class="container__product__buttons">
            <img src="assets/beautics__logoOffical__BlueDark.png" alt="productbeautics" class="container__product__buttons__img">
            <input type="hidden" name="idproducto"  <?php
                    if($product != null)
                        echo "value=\"".$product->getId()."\"";
                ?> >
            <button class="button__addcart" type="submit">Save  <i class="fa-solid fa-circle-check"></i></button>
            <?php
                if($product != null){ ?>
            <a class="button__addcart" href="app/actions/admin/deleteProduct.php?idproducto=<?=$product->getId()?>"">Delete  <i class="fa-solid fa-trash"></i></a>
            <?php } ?>
        </div>
    </form>



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
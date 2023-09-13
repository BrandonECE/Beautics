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
    <title>Administrador</title>
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
                <img src="assets/admin/logo__admin.png" alt="logoadmin" class="logo__admin">
                <!-- <p class="section__called__admin__letters">Interface</p> -->
            </div>

            
            <div class="section__nav__admin"> 

                <a class="user__box" href="#">

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
<main class="mainsecundarios__admin">

    <div class="container__div">

        <div class="container__admin__interface__title">
            <h2 class="container__admin__title">INTERFACE
                <img src="assets/admin/header__admin__img.png" alt="letterinterfaceimg" class="container__admin__title__img">
            </h2>
       </div>

        <a href="invent.php" class="container__admin__interface__inventory">
            <h2 class="container__admin__title">Inventory
                <i class="fa-sharp fa-solid fa-warehouse"></i>
            </h2>
         </a>

    </div>

   
   <div class="container__admin__interface__settings">


        <div>


            <div class="container__admin__interface__settings__title">

                <h2 class="container__admin__interface__settings__title__h2">EARNINGS <i class="fa-solid fa-arrow-trend-up"></i> </h2> 
            
                <span class="container__admin__interface__settings__title__span">Total Earnings... </span>

            </div>


            <section class="box__admin__interface__settings">

                <header class="box__admin__interface__settings__header">
                    <h2>TOTAL INCOME / <i class="fa-solid fa-coins"></i> ...</h2>
                    <!-- <img src="assets/beautics__logoOffical__Black.png" alt="settings__interfaceimg" class="box__admin__interface__settings__header__img"> -->
                </header>


                <div class="box__admin__interface__settings__content">
                    <p class="box__admin__interface__settings__content__stats">$<span><?=Estadisticas::getTotalSales()?></span><i class="fa-solid fa-arrow-trend-up"></i></p>
                </div>

                <div class="box__admin__interface__settings__content">
                    <p class="box__admin__interface__settings__content__ministats">MONTH: <span><?=Estadisticas::getTotalSales(EstadisticaGroup::Month)?></span></p>
                    <p class="box__admin__interface__settings__content__ministats">WEEKLY: <span><?=Estadisticas::getTotalSales(EstadisticaGroup::Week)?></span></p>
                </div>

                <i class="fa-solid fa-chart-column box__admin__interface__settings__content__graph__admin"></i>           
                <footer class="box__admin__interface__settings__footer">
                    <i class="fa-solid fa-gears"></i> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti, rem ipsam! Eius, amet perferendis ut consequatur velit ex alias, laborum sed cupiditate quos sint quasi quam, totam cum quibusdam dolorem. 
                </footer>
                
            </section>



        </div>


        <div>
<!-- 
            <h2>CATEGORIES <i class="fa-solid fa-filter"></i></h2> -->

            <div class="container__admin__interface__settings__title">

                <h2 class="container__admin__interface__settings__title__h2">CATEGORIES <i class="fa-solid fa-filter"></i></h2> 
            
                <span class="container__admin__interface__settings__title__span">Available categories...</span>

            </div>

            <section class="box__admin__interface__settings">

                <header class="box__admin__interface__settings__header">
                    <h2>ALL PRODUCTS / <i class="fa-solid fa-box"></i> ...</h2>
                </header>

                <div class="box__admin__interface__settings__content">
                    <p class="box__admin__interface__settings__content__stats"><span><?=Estadisticas::getTotalProducts()?></span><i class="fa-brands fa-product-hunt"></i></p>
                </div>

                <div class="box__admin__interface__settings__content">
                    <?php
                        $categories = Estadisticas::getTopCategories();
                        foreach($categories as $cat){
                    ?>
                    <p class="box__admin__interface__settings__content__ministats"><?=$cat->nombre_categoria?>: <span><?=$cat->total_productos?></span></p>
                    <?php } ?>

                </div>

                <i class="fa-solid fa-chart-pie box__admin__interface__settings__content__graph__admin box__admin__interface__settings__content__graph__admin--mediumcolor"></i>
                
                <footer class="box__admin__interface__settings__footer">
                    <i class="fa-solid fa-gears"></i> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti, rem ipsam! Eius, amet perferendis ut consequatur velit ex alias, laborum sed cupiditate quos sint quasi quam, totam cum quibusdam dolorem.
                </footer>
                
                
            </section>



        </div>


        <div>

            <!-- <h2>USERS <i class="fa-solid fa-user"></i></h2> -->

            <div class="container__admin__interface__settings__title">

                <h2 class="container__admin__interface__settings__title__h2">USERS  <i class="fa-solid fa-user"></i> </h2> 
            
                <span class="container__admin__interface__settings__title__span">Registered users...</span>

            </div>

            <section class="box__admin__interface__settings">

                <header class="box__admin__interface__settings__header">

                    <h2>NEW USERS / <i class="fa-solid fa-users"></i> ...</h2>

                </header>


                   <div class="box__admin__interface__settings__content">
                    <p class="box__admin__interface__settings__content__stats"><span><?=Estadisticas::getTotalUsers()?></span> <i class="fa-solid fa-user-plus"></i> </p>
                 
                </div>

                <div class="box__admin__interface__settings__content">
                    <p class="box__admin__interface__settings__content__ministats">MONTH: <span><?=Estadisticas::getTotalUsers(EstadisticaGroup::Month)?></span></p>
                    <p class="box__admin__interface__settings__content__ministats">WEEKLY: <span><?=Estadisticas::getTotalUsers(EstadisticaGroup::Week)?></span></p>
                </div>

                <i class="fa-sharp fa-solid fa-chart-simple box__admin__interface__settings__content__graph__admin"></i> 

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
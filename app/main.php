<?php

session_start();

require_once __DIR__.'./config.php';
require_once __DIR__.'/Database/DatabaseConn.php';
require_once __DIR__.'/Database/ADBModel.php';

require_once __DIR__.'/ErrorManagement/ErrorGrades.php';
require_once __DIR__.'/ErrorManagement/ErrorMessage.php';

require_once __DIR__.'/Usuarios/TipoUsuario.php';
require_once __DIR__.'/Usuarios/Usuario.php';

require_once __DIR__.'/Producto/Categoria.php';
require_once __DIR__.'/Producto/Producto.php';

require_once __DIR__.'/Carrito/EstadoCarrito.php';
require_once __DIR__.'/Carrito/CarritoItem.php';
require_once __DIR__.'/Carrito/Carrito.php';

require_once __DIR__.'/Venta/Venta.php';

require_once __DIR__.'/Estadisticas/EstadisticaGroup.php';
require_once __DIR__.'/Estadisticas/Estadisticas.php';

require_once __DIR__.'/session.php';

DatabaseConn::getInstance()->getdbConn();
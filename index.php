<?php

/**
 * Front controller de testing, lo único que hace es invocar al controlador por defecto de nuestra aplicación.
 * No hace falta tocarlo.
 */

namespace Mpwar;

require( 'autoload.php' );

$controller = new ExamenIndexCtrl();

$controller->index();

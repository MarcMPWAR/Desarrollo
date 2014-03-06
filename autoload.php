<?php

spl_autoload_register( function ( $class_name )
{
	if ( false !== strpos( $class_name, 'Mpwar\\' ) )
	{
		include __DIR__ . '/' . str_replace( 'Mpwar\\', '', $class_name ) . '.php';
	}
} );
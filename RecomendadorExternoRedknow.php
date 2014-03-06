<?php

namespace Mpwar;

/**
 * Class RecomendadorExternoRedknow
 *
 * Encargada de la gestión de recomendaciones en base al sistema externo 'Redknow'.
 * Al ser un proveedor externo, necesita inicializarse antes de intentar obtener las recomendaciones.
 *
 * @package Mpwar
 */
class RecomendadorExternoRedknow
{
	/**
	 * @var bool indica si el sistema externo ha sido inicializado o no. Para poder obtener recomendaciones, debe ser true.
	 */
	private $sistema_externo_inicializado = false;

	/**
	 * Método fake.
	 *
	 * Simula la inicialización del sistema de recomendaciones.
	 * Común a todo sistema de recomendación externo.
	 */
	public function inicializarSistemaExternoRedknow()
	{
		$this->sistema_externo_inicializado = true;
	}

	/**
	 * Método fake.
	 * Simula la funcionalidad de recomendar una serie de canciones en base al título de una canción dada como parámetro de entrada.
	 *
	 * @param string $nombre_cancion_base nombres de la canción en la que basar las recomendaciones
	 *
	 * @return array de strings con los nombres de las canciones a recomendar
	 *
	 * @throws \RuntimeException En caso de intentar obtener recomendaciones sin haber inicializado previamente el sistema (operación necesaria al tratarse de un sistema de recomendaciones externo).
	 */
	public function obtenerRecomendacionesExternasRedknow( $nombre_cancion_base )
	{
		if ( !$this->sistema_externo_inicializado )
		{
			throw new \RuntimeException( "Error al intentar obtener recomendaciones de la clase " . __CLASS__ . ": Al ser un servicio de recomendaciones externo, primero debe ser inicializado." );
		}

		return array(
				'La vida está de lujo',
				'El cuarto de Tula'
		);
	}
}
<?php

namespace Mpwar;

/**
 * Class RecomendadorLocal
 *
 * Encargada de la gestión de recomendaciones en base al sistema local.
 * Al no ser un sistema externo, no necesita inicializarse.
 *
 * @package Mpwar
 */
class RecomendadorLocal
{

    /**
	 * Método fake.
	 * Simula la funcionalidad de recomendar una serie de canciones en base al título de una canción dada como parámetro de entrada.
	 * A pesar de que en esta implementación de testing no se use el $nombre_cancion_base, es necesario mantenerlo.
	 *
	 * @param string $nombre_cancion_base
	 * @return array
	 */
	public function obtenerRecomendacionesLocales( $nombre_cancion_base )
	{
		return array(
				'Se ven venir (quítate la venda)',
				'Cigarrito'
		);
	}
}
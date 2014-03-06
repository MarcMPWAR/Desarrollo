<?php

namespace Mpwar;

/**
 * Class ReproductorMusica
 *
 * Clase responsable de la reproducción de música.
 * Sabemos que pueden haber 3 tipos de reproductores: 'local', 'spotify' o 'google_play'.
 *
 * Delega la obtención de recomendaciones en las clases RecomendadorLocal, RecomendadorExternoBlueknow y RecomendadorExternoRedknow.
 *
 * @package Mpwar
 */
class ReproductorMusica
{
	/**
	 * @var string identificador del tipo de reproductor. Posibles valores: 'local', 'spotify' y 'google_play_music'.
	 */
	private $tipo_reproductor;

	/**
	 * @var RecomendadorLocal|RecomendadorExternoBlueknow|RecomendadorExternoRedknow Instancia del recomendador a utilizar para obtener canciones relacionadas.
	 */
	private $recomendador;

    /**
     * @var string Cancion enviada por parametro
     */
    private $cancion;


    /**
	 * Inicializa los atributos de clase verificando que son válidos.
	 *
	 * @param string $tipo_reproductor Identificador del tipo de reproductor. Posibles valores: 'local', 'spotify' y 'google_play_music'.
	 *
	 * @throws \InvalidArgumentException en caso de no recibir un valor válido para el parámetro $tipo_reproductor.
	 */
	public function __construct( $tipo_reproductor )
	{
		if ( !in_array( $tipo_reproductor, array( 'local', 'spotify', 'google_play' ) ) )
		{
			throw new \InvalidArgumentException( "Error al instanciar la clase " . __CLASS__ . ": Tipo de reproductor no soportado. Tipos disponibles: 'local', 'spotify' y 'google_play_music'. Tipo recibido: '$tipo_reproductor'." );
		}

		$this->tipo_reproductor = $tipo_reproductor;
	}

	/**
	 * Simula la funcionalidad de recomendar una serie de canciones en base al título de una canción dada como parámetro de entrada.
	 *
	 * @param string $nombre_cancion_base
	 *
	 * @return array de strings con los nombres de las canciones a recomendar
	 */


	public function obtenerRecomendaciones()
	{
		switch ( $this->tipo_reproductor )
		{
			case 'local':

                $this->setLocalReproductor();
				$this->recomendador->obtenerRecomendacionesLocales( $this->getCancion() );
                $this->getRecomendacionesLocales();

				break;
			case 'spotify':

                $this->setSpotifyReproductor();
				$this->recomendador->obtenerRecomendacionesExternasBlueknow( $this->getCancion() );
                $this->getRecomendacionesSpotify();

				break;
			case 'google_play':

                $this->recomendador=$this->setGooglePlayReproductor();
                $this->recomendador->obtenerRecomendacionesExternasRedknow( $this->getCancion() );
                $this->getRecomendacionesGooglePlay();

				break;
		}
	}

    /**
     * Setters i getters de nuestra APP
     * Vamos a SETEAR el valor del tipo de reproductor y luego vamos a lanzar un getter de la recomendación
     * en función del tipo.
     */

    //SETTER y GETTER que setea el nombre de la canción

    public function setCanción($nombreCancion)
    {
        $this->cancion = $nombreCancion;
    }

    public function getCancion()
    {
        return $this->cancion;
    }
    //----------------------------------------//

    public function setLocalReproductor()
    {
        $this->recomendador = new RecomendadorLocal();
    }
    public function setSpotifyReproductor()
    {
        $this->recomendador = new RecomendadorExternoBlueknow();

        $this->recomendador->inicializarSistemaExternoBlueknow();
    }
    public function setGooglePlayReproductor()
    {
        $this->recomendador = new RecomendadorExternoRedknow();

        $this->recomendador->inicializarSistemaExternoRedknow();
    }


    public function getRecomendacionesLocales()
    {
        return $this->recomendador;
    }
    public function getRecomendacionesSpotify()
    {
        return $this->recomendador;
    }
    public function getRecomendacionesGooglePlay()
    {
        return $this->recomendador;
    }
}
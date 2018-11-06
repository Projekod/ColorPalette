<?php

namespace ColorPalette;

/**
 * Projekod Interactive
 * http://projekod.com
 */
class PKColor {

	protected $granularity = 5;

	protected $picture = '';

	protected $colors = array();

	protected $colorsCount = 10;


	public function setGranularity( $val ) {
		$this->granularity = $val;

		return $this;
	}

	public function setPicture( $val ) {
		$this->picture = $val;

		return $this;
	}

	public function setColorsCount( $val ) {
		$this->colorsCount = $val;

		return $this;
	}


	public function getValues() {
		return array( $this->picture, $this->granularity, $this->colorsCount );
	}

	public function getIt( $picture = '' ) {

		if ( ! empty( $picture ) ) {
			$this->picture = $picture;
		}

		if ( ! file_exists( $this->picture ) ) {
			throw new \RuntimeException( 'Resim dosyası bulunamadı.' );
		}

		$_granularity = max( 1, abs( (int) $this->granularity ) );

		$_sizes = @getimagesize( $this->picture );

		if ( $_sizes === false ) {
			throw new \RuntimeException( 'Resim boyuları alınamadı.' );
		}

		$_img = @imagecreatefromstring( file_get_contents( $this->picture ) );

		if ( ! $_img ) {
			throw new \RuntimeException( 'Resim dosyası hatalı.' );
		}


		for ( $First = 0; $First < $_sizes[0]; $First += $this->granularity ) {
			for ( $Second = 0; $Second < $_sizes[1]; $Second += $this->granularity ) {
				$thisColor = imagecolorat( $_img, $First, $Second );
				$rgb       = imagecolorsforindex( $_img, $thisColor );
				$red       = round( round( ( $rgb['red'] / 0x33 ) ) * 0x33 );
				$green     = round( round( ( $rgb['green'] / 0x33 ) ) * 0x33 );
				$blue      = round( round( ( $rgb['blue'] / 0x33 ) ) * 0x33 );
				$thisRGB   = sprintf( '%02X%02X%02X', $red, $green, $blue );
				if ( array_key_exists( $thisRGB, $this->colors ) ) {
					$this->colors[ $thisRGB ] ++;
				} else {
					$this->colors[ $thisRGB ] = 1;
				}
			}
		}


		unset( $_granularity );
		unset( $_sizes );
		unset( $_img );

		arsort( $this->colors );

		return array_slice( array_keys( $this->colors ), 0, $this->colorsCount );

	}
}

<?php
/**
 *  Connector: upload json to translate content.
 *
 * @package ainsys
 */

/**
 *  Allows to upload of json files
 *
 * @param array $mimes - file types.
 *
 * @package ainsys
 */
function ainsys_upload_json( $mimes ) {
	$mimes['json'] = 'application/json';
	return $mimes;
}
add_filter( 'upload_mimes', 'ainsys_upload_json' );

/**
 *  Replaces codes like {xxx} with jso values in the text
 *
 * @param string $text - text to search/replace.
 *
 * @package ainsys
 */
function ainsys_replace_code( $text ) {
	$file = get_field( 'json_file' ) ? trim( get_field( 'json_file' ) ) : false;

	if ( $file ) {
		$json = json_decode( file_get_contents( $file ), true );

		if ( file_get_contents( $file ) ) {
			$keys   = array();
			$values = array();

			foreach ( $json as $key => $value ) {
				$keys[]   = $key;
				$values[] = trim( str_replace( '\n', '', $value ) );
			}
			$text = str_replace( $keys, $values, $text );
		}
	}
	return $text;
}
add_filter( 'the_content', 'ainsys_replace_code', 100 );

<?php
/**
 * Custom Functions to aid WordPress development
 *
 * @package     Deftly\Module\Functions
 * @since       0.0.1
 * @author      Jeff Cleverley
 * @link        https://github.com/JeffCleverley/
 * @license     GNU General Public License 2.0+
 *
 */
namespace Deftly\Module\Functions;

if ( ! function_exists( 'str_contains_subsstr' ) ) {
    /**
    * Checks if a string contains another character or substring
    *
    * @since    1.0.0
    *
    * @param    string $haystack   The string to be searched
    * @param    string $needle     The character or substring to search for
    * @param    string $encoding   Default is utf8
    *
    * @return   bool
    */
    function str_contains_substr( $haystack, $needle, $encoding = 'UTF-8' ) {

        return ( mb_strpos( $haystack, $needle, 0, $encoding ) !== false );
    }
}

if ( ! function_exists( 'str_starts_with' ) ) {
    /**
    * Checks if a string starts with a character or substring
    *
    * @since    1.0.0
    *
    * @param    string $haystack   The string to be searched
    * @param    string $needle     The character or substring to search for
    * @param    string $encoding   Default is utf8
    *
    * @return   bool
    */
    function str_starts_with( $haystack, $needle, $encoding = 'UTF-8' ) {
        $needle_length = mb_strlen( $needle, $encoding );
        return ( mb_substr( $haystack, 0, $needle_length, $encoding ) === $needle );

    }
}

if ( ! function_exists( 'str_ends_with' ) ) {
    /**
    * Checks if a string ends with a character or substring
    *
    * @since    1.0.0
    *
    * @param    string $haystack   The string to be searched
    * @param    string $needle     The character or substring to search for
    * @param    string $encoding   Default is utf8
    *
    * @return   bool
    */
    function str_ends_with( $haystack, $needle, $encoding = 'UTF-8' ) {
        $starting_offset = - mb_strlen( $needle, $encoding);
        return ( mb_substr( $haystack, $starting_offset, null, $encoding ) === $needle );

    }
}

if ( ! function_exists( 'truncate_to_char_limit' ) ) {
    /**
    * Truncates the string by the specified number of characters
    *
    * @since    1.0.0
    *
    * @param    string  $string_to_truncate The string to be truncated
    * @param    integer $character_limit    The number of characters to limit the string by
    *                                       Default = 100
    * @param    string  $ending_suffix      The suffix to append to string to show that the string
    *                                       has been truncated
    *                                       Default = '...''
    * @param    string  $encoding           Default is utf8
    *
    * @return   bool
    */
    function truncate_to_char_limit( $string_to_truncate, $character_limit = 100, $ending_suffix = '', $encoding = 'UTF-8' ) {
        $string_to_truncate_without_tags = wp_strip_all_tags( $string_to_truncate );
        if ( mb_strwidth( $string_to_truncate_without_tags ) <= $character_limit ) {
            return $string_to_truncate;
        }

        $truncated_string = mb_strimwidth( $string_to_truncate_without_tags, 0, $character_limit, '', $encoding );
        return rtrim( $truncated_string ) . $ending_suffix;
    }
}

if ( ! function_exists( 'truncate_to_word_limit' ) ) {
	/**
	 * Truncate the given string by the specified the number of words.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string_to_truncate The string to truncate
	 * @param int $word_limit Number of characters to limit the string to
	 * @param string $ending_characters (Optional) Characters to append to the end of the truncated string.
	 *
	 * @return string
	 */
	function truncate_to_word_limit( $string_to_truncate, $word_limit = 100, $ending_characters = '...' ) {
        $string_to_truncate = wp_strip_all_tags( $string_to_truncate );
		preg_match( '/^\s*+(?:\S++\s*+){1,' . $word_limit . '}/u', $string_to_truncate, $matches );
		if ( ! isset( $matches[0] ) ) {
			return $string_to_truncate;
		}

		if ( mb_strlen( $string_to_truncate ) === mb_strlen( $matches[0] ) ) {
			return $string_to_truncate;
		}
		return rtrim( $matches[0] ) . $ending_characters;
	}
}

if ( ! function_exists( 'str_to_lowercase' ) ) {
	/**
	 * Converts the string to lowercase and is UTF-8 safe.
	 *
	 * @since 1.0.0
	 *
	 * @param  string  $string_to_convert  string to truncate
	 * @param  string  $encoding           Default = UTF-8
	 *
	 * @return string
	 */
	function str_to_lowercase( $string_to_convert, $encoding = 'UTF-8' ) {

        return mb_strtolower( $string_to_convert, $encoding );
	}
}

if ( ! function_exists( 'str_to_uppercase' ) ) {
	/**
	 * Converts the string to uppercase and is UTF-8 safe.
	 *
	 * @since 1.0.0
	 *
	 * @param  string  $string_to_convert  string to truncate
	 * @param  string  $encoding           Default = UTF-8
	 *
	 * @return string
	 */
	function str_to_uppercase( $string_to_convert, $encoding = 'UTF-8' ) {
        return mb_strtoupper( $string_to_convert, $encoding );
	}
}

if ( ! function_exists( 'str_to_trimmed_array' ) ) {
	/**
	 * Converts the string to an array and trims it.
	 *
	 * @since 1.0.0
	 *
	 * @param  string  $string_to_convert  string to truncate
	 * @param  string  $delimiter          seperator watched for and used to delimit
	 *                                     values entered into the array
	 *                                     Default = ' '
	 * @return string
	 */
	function str_to_trimmed_array( $string_to_convert, $delimiter = ' ' ) {
        $string_to_convert = explode( $delimiter, $string_to_convert );
        return array_map( 'trim', $string_to_convert );
	}
}

if ( ! function_exists( 'flatten_nested_associative_array' ) ) {
	/**
	 * Flatten an associative array and preserve keys
	 *
	 * @since 1.0.0
	 *
	 * @param   array   $array  The array to be flattened
	 * @param   array   $return  The returned flattened array
	 *
	 * @return array
	 */
	function flatten_nested_associative_array( $array, $return ) {
		foreach($array as $key => $value){
			if(@is_array($value)){
				$return = $this->array_flatten($value, $return);
			}elseif(@$value){
				$return[$key] = $value;
			}
		}
		return $return;
	}
}

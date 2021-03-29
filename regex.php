<?php
/**
 * PHP RegEx Wrapper.
 *
 * A simple wrapper class for RegEx making it a little easier to remember and
 * access `preg_` methods. *Really just a coding project, but might be useful
 * for some project at some point*.
 *
 * PHP Version 7
 *
 * LICENSE: This source file is subject to version 3 of the GNU GPLv3 license
 * that is available through the world-wide-web at the following URI:
 * https://www.gnu.org/licenses/gpl-3.0.en.html. If you did not receive a
 * copy of the GNU GPLv3 License and are unable to obtain it through the web,
 * please send a note to license@direwolfdesign.co so we can mail you a copy
 * immediately.
 *
 * @package     DirewolfRegExWrapper
 * @author      Direwolf Design <developers@direwolfdesign.co>
 * @version     0.1.0
 * @copyright   2021 Direwolf Design
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 * @version     0.1.0
 * @link        https://github.com/DirewolfDesign/php-regex-wrapper
 * @since       0.1.0
 */

 namespace DirewolfDesign;

/**
 * RegEx Class
 */
 class RegEx {

     /**
      * The current version of the class.
      * @var string
      */
     private $version = "0.1.0";

     /**
      * The single class instance.
      * @var null
      */
     private static $instance = null;

     /**
      * Main Instance.
      * Ensures only one instance of this class exists in memory at any one time.
      * @return DirewolfDesign\RegEx
      */
     public static function instance() {
         if ( is_null( self::$instance ) ) self::$instance = new self();
         return self::$instance;
     }

     /**
      * RegEx Constructor.
      */
     public function __construct() {
         /* We do nothing here! */
     }

     /**
      * Perform a regular expression search and replace.
      * @see https://www.php.net/manual/en/function.preg-filter.php
      *
      * @param string|array         $pattern
      * @param string|array         $replacement
      * @param string|array         $subject
      * @param int                  $limit
      * @param int                  &$count
      *
      * @return string|array|null
      * Returns an array if the $subject is an array, otherwise returns a string.
      * If no matches are found or an error occurred, an empty array is returned
      * when subject is an array or null otherwise.
      */
     public function filter( $pattern, $replacement, $subject, int $limit = -1, &$count = null ) {
         return preg_filter( $pattern, $replacement, $subject, $limit, &$count );
     }

     /**
      * Return array entries that match the pattern.
      * @see https://www.php.net/manual/en/function.preg-grep.php
      *
      * @param string   $pattern
      * @param array    $array
      * @param int      $flags
      *
      * @return array
      * Returns an array indexed using the keys from the $array array.
      */
     public function grep( string $pattern, array $array, int $flags = 0 ): array {
         return preg_grep( $pattern, $array, $flags );
     }

     /**
      * Returns the error message of the last PCRE regex execution.
      * @see https://www.php.net/manual/en/function.preg-last-error-msg.php
      *
      * @return string
      * Returns the error message on success, or "No Error" if no error has
      * occured.
      */
     public function last_error_msg(): string {
         return preg_last_error_msg();
     }

     /**
      * Returns the error code of the last PCRE regex execution.
      * @see https://www.php.net/manual/en/function.preg-last-error.php
      *
      * @return int
      * Returns the error code of the last PCRE regex execution.
      */
     public function last_error(): int {
         return preg_last_error();
     }

     /**
      * Perform a global regular expression match.
      * @see https://www.php.net/manual/en/function.preg-match-all.php
      *
      * @param string   $pattern
      * @param string   $subject
      * @param array    &$matches
      * @param int      $flags
      * @param int      $offset
      *
      * @return int|false|null
      * Returns the number of full pattern matches (which might be zero), or
      * false if an error occurred.
      */
     public function match_all( string $pattern, string $subject, array $matches = null, int $flags = 0, int $offset = 0 ) {
         return preg_match_all( $pattern, $subject, &$matches, $flags, $offset );
     }

     /**
      * Perform a regular expression match.
      * @see https://www.php.net/manual/en/function.preg-match.php
      *
      * @param string   $pattern
      * @param string   $subject
      * @param array    &$matches
      * @param int      $flags
      * @param int      $offset
      *
      * @return int|false|null
      * Returns 1 if the pattern matches given subject, 0 if it does not, or
      * false if an error occurred.
      */
     public function match( string $pattern, string $subject, array $matches = null, int $flags = 0, int $offset = 0 ) {
         return preg_match( $pattern, $subject, &$matches, $flags, $offset );
     }

     /**
      * Quote regular expression characters.
      * @see https://www.php.net/manual/en/function.preg-quote.php
      *
      * @param string       $str
      * @param string|null  $delimiter
      *
      * @return string
      * Returns the quoted (escaped) string.
      */
     public function quote( string $str, $delimiter = null ) {
         return preg_quote( $str, $delimiter );
     }

     /**
      * Perform a regular expression search and replace using callbacks.
      * @see https://www.php.net/manual/en/function.preg-replace-callback-array.php
      *
      * @param array            $pattern
      * @param string|array     $subject
      * @param int              $limit
      * @param int              &$count
      * @param int              $flags
      *
      * @return string|array|null
      * Returns an array if the subject parameter is an array, or a string
      * otherwise. On errors the return value is null.
      * If matches are found, the new subject will be returned, otherwise
      * subject will be returned unchanged.
      */
     public function replace_callback_array( array $pattern, $subject, int $limit = -1, int &$count = null, int $flags = 0 ) {
         return preg_replace_callback_array( $pattern, $subject, $limit, $count, $flags );
     }

     /**
      * Perform a regular expression search and replace using a callback.
      *
      * @param  string|array    $pattern
      * @param  callable        $callback
      * @param  string|array    $subject
      * @param  int             $limit
      * @param  int             &$count
      * @param  int             $flags
      *
      * @return string|array|null
      * Returns an array if the $subject parameter is an array, or a string
      * otherwise. On errors the return value is null.
      * If matches are found, the new $subject will be returned, otherwise
      * $subject will be returned unchanged.
      */
     public function replace_callback( mixed $pattern, callable $callback, mixed $subject, int $limit = -1, int &$count = null, int $flags = 0 ) {
         return preg_replace_callback( $pattern, $callback, $subject, $limit, $count, $flags );
     }

     /**
      * Perform a regular expression search and replace.
      *
      * @param  string|array    $pattern
      * @param  string|array    $replacement
      * @param  string|array    $subject
      * @param  int             $limit
      * @param  int             &$count
      *
      * @return string|array|null
      * Returns an array if the subject parameter is an array, or a string
      * otherwise.
      * If matches are found, the new $subject will be returned, otherwise
      * $subject will be returned unchanged or null if an error occurred.
      */
     public function replace( mixed $pattern, mixed $replacement, mixed $subject, int $limit = -1, int &$count = null ) {
         return preg_replace( $pattern, $replacement, $subject, $limit, $count );
     }

     /**
      * Split string by a regular expression.
      *
      * @param  string      $pattern
      * @param  string      $subject
      * @param  int         $limit
      * @param  int         $flags
      *
      * @return array|false
      * Returns an array containing substrings of subject split along
      * boundaries matched by pattern, or false on failure.
      */
     public function split( string $pattern, string $subject, int $limit = -1, int $flags = 0 ) {
         return preg_split( $pattern, $subject, $limit, $flags );
     }

 }

/**
 * Main helper function for the RegEx class.
 * @return DirewolfDesign\Regex
 */
function re() {
    return RegEx::instance();
}

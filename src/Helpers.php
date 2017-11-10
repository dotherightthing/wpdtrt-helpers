<?php
/**
 * Helpers class.
 *
 * @package   WPHelpers
 * @version   1.0.0
 * @since     1.0.0
 */

namespace DoTheRightThing\WPHelpers;

if ( !class_exists( 'Helpers' ) ) {

  /**
   * Plugin helpers class.
   *
   * @example
   *  $helpers = new DoTheRightThing\WPHelpers\Helpers;
   *  $helpers->log('hello world');
   *
   *  function destroy() {
   *    global $helpers;
   *    $helpers->log('goodbye cruel world');
   *  }
   *
   * @uses        wpdtrt/debug.php
   *
   * @since       1.0.0
   * @version     1.0.0
   */
  class Helpers {

    /**
     * This constructor automatically initialises the object's properties
     * when it is instantiated,
     * using new PluginName
     *
     * @param     array $settings Plugin options
     *
     * @version   1.0.0
     * @since     1.0.0
     */
    //function __construct() {}

    //// START RENDERERS \\\\

    /**
     * Output errors to debug.log
     *
     * It is strongly recommended that plugin and theme developers use WP_DEBUG
     * in their development environments.
     *
     * @param mixed $message String or Array
     *
     * @example
     *    // Enable debugging in wp-config.php:
     *    define('WP_DEBUG', true);
     *    if ( WP_DEBUG ) {
     *      define('WP_DEBUG_LOG', true);
     *      define('WP_DEBUG_DISPLAY', false);
     *      @ini_set('display_errors', 0);
     *    }
     *
     * @return string in wp-content/debug.log
     *
     * @link http://www.stumiller.me/sending-output-to-the-wordpress-debug-log/
     * @see https://codex.wordpress.org/Debugging_in_WordPress
     * @see https://kb.pressable.com/troubleshooting/debug-500-error/
     */
    public function log( $message )  {

      if ( true === WP_DEBUG ) {

        if ( is_array( $message ) || is_object( $message ) ) {
          error_log( print_r( $message, true ) );
        }
        else {
          error_log( $message );
        }
      }
    }

    /**
     * Output a stack trace to debug.log
     *
     * @return string in wp-content/debug.log
     *
     * @uses log()
     *
     * @see http://php.net/manual/en/exception.gettraceasstring.php
     */
    public function trace()  {

      if ( true === WP_DEBUG ) {

          $e = new \Exception;
          $this->log( $e->getTraceAsString() );
        }
    }

    //// END RENDERERS \\\\
  }
}

?>

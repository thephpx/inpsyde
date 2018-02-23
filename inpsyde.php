<?php  defined('ABSPATH') or die('No direct access allowed');
/**
 * Plugin Name:     Inpsyde Plugin
 * Plugin URI:      http://www.github.com/thephpx/inpsyde
 * Description:     Inpsyde demo plguin
 * Author:          Faisal Ahmed
 * Author URI:      http://www.faisalbd.com/
 * Text Domain:     inpsyde
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Inpsyde
 */

require_once('vendor/autoload.php');

global $wpdb;

use App\Inpsyde;

if (class_exists('Inpsyde')) {
    $inpsyde = Inpsyde::getInstance();
    $inpsyde->setup('db', $wpdb);
    $inpsyde->init();
}

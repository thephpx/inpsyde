<?php
/**
 * Created by PhpStorm.
 * User: faisal
 * Date: 2/23/18
 * Time: 10:01 PM
 */

namespace App;

class Inpsyde
{

    private static $instance;
    private $db;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    private function __sleep()
    {
    }

    public function setup($type, &$object)
    {
        $this->{$type} = $object;
    }

    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new statc();
        }

        return static::$instance;
    }

    public function init()
    {
        add_action('init', array($this, 'bootstrap'));
    }

    public function bootstrap()
    {
        register_activation_hook(__FILE__, array($this, 'onActivation'));
        register_deactivation_hook(__FILE__, array($this, 'onDeactivation'));

        add_shortcode('inpsyde_form', array($this,'inpsyde_form'));

        add_action('admin_post_inpsyde_form_action', array($this, 'inpsydeFormActionDo'));
        add_action('admin_post_nopriv_inpsyde_form_action', array($this, 'inpsydeFormActionDo'));
    }

    public function onActivation()
    {
        flush_rewrite_rules();
    }

    public function onDeactivation()
    {
        ob_start();
        print 'deactivated';
        ob_end_clean();
    }

    public function inpsydeForm()
    {
        $data = array();
        $data['inpsyde_form_nonce'] = $this->getWpNonce('inpsyde_form_nonce');
        $data['inpsyde_form_action'] = 'inpsyde_form_action';

        return $this->render('/templates/form.php', $data);
    }

    public function inpsydeFormActionDo()
    {
        if (isset($_POST['inpsyde_form_nonce']) and
            $this->verifyWpNonce($_POST['inpsyde_form_nonce'], 'inpsyde_form_nonce')) {
            echo('it');
        }
    }

    private function render($file, &$data)
    {
        ob_start();
        include_once(__DIR__.$file);
        $template_html = ob_get_contents();
        ob_end_clean();
        return $template_html;
    }

    private function getWpNonce($name = "")
    {
        return wp_create_nonce($name);
    }

    private function verifyWpNonce($value = "", $name = "")
    {
        return wp_verify_nonce($value, $name);
    }

}
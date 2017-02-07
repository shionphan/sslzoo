<?php
    if ( !defined( 'QA_VERSION' ) ) { // don't allow this page to be requested directly from browser
        header( 'Location: ../../' );
        exit;
    }
    /**
     * This file will contain all the option names we are going to use in out theme
     */

    if ( !class_exists( 'Donut_Option_Keys' ) ) {
        class Donut_Option_Keys
        {
            const THEME_VERSION = 'donut_theme_ver';
            const INSTALLED_THEME_VERSION = 'donut_theme_ver_instaled';
            const CDN_ENABLED = 'donut_cdn_active';
            const BS_CSS_CDN = 'https://sslzoo.com/static/libs/bootstrap/3.3.6/bootstrap.min.css';
            const BS_THEME_CSS_CDN = 'https://sslzoo.com/static/libs/bootstrap/theme/bootstrap-theme.min.css';
            const FA_CDN = 'https://sslzoo.com/static/libs/fontawesome/4.5.0/css/font-awesome.min.css';
            const ICON_CDN = 'https://sslzoo.com/static/libs/icomoon/1.0.0/css/icomoon.min.css';
            const BS_JS_CDN = 'https://sslzoo.com/static/libs/bootstrap/3.3.6/bootstrap.min.js';
            const BS_SLTJS_CDN = 'https://sslzoo.com/static/libs/bootselect/bootstrap-select.min.js';
            const BS_SLTCSS_CDN = 'https://sslzoo.com/static/libs/bootselect/bootstrap-select.min.css';
            const HGT_JS_CDN = 'https://sslzoo.com/static/libs/highlight/9.2.0/highlight.pack.js';
            const HGT_CSS_CDN = 'https://sslzoo.com/static/libs/highlight/9.2.0/highlight.zenburn.css';

        }
    }

    /**
     * Class Donut_Options
     */
    class Donut_Options
    {
        /**
         * @var
         */
        protected static $instance;

        protected $config;
        protected $systemConfig;
        protected $userConfig;

        /**
         * @return Donut_Options
         */
        public static function getInstance()
        {
            return isset( self::$instance ) ? self::$instance : self::$instance = new self();
        }

        /**
         * Constructor function
         */
        final private function __construct()
        {
            self::init();
        }

        protected function init()
        {
            $this->systemConfig = require DONUT_THEME_BASE_DIR . '/utils/donut-system-defaults-options.php';
            $this->userConfig = require DONUT_THEME_BASE_DIR . '/options/donut-user-options.php';

            $this->config = array_merge( $this->systemConfig, $this->userConfig );
        }

        public function getConfig( $key )
        {
            return isset( $this->config[ $key ] ) ? $this->config[ $key ] : '';
        }
    }

    /**
     *
     * Reads the configuration file
     *
     * @param $key
     *
     * @return string
     *
     * @deprecated
     */
    function donut_opt( $key )
    {
        return Donut_Options::getInstance()->getConfig( strtolower($key) );
    }
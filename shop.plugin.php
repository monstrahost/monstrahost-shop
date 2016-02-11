<?php

    /**
     *  Shop plugin
     *
     *  @package Monstra
     *  @subpackage Plugins
     *  @author monstrahost
     *  @version 0.3a
     *
     */


    // Register plugin
    Plugin::register( __FILE__,                    
                    __('Shop', 'shop'),
                    __('Shop plugin for Monstra', 'shop'),  
                    '0.3a',
                    'MonstraHost',                 
                    'http://www.monstrahost.com/',
                    'shop');

    
	// Load CSS & JS
	//Javascript::add('plugins/shop/js/minicart-3.0.5.min.js','frontend',15);
	// Javascript::add('plugins/shop/js/shop.js','frontend',11);
	
	Stylesheet::add('plugins/shop/css/shop_front.css','frontend',13);

	Javascript::add('plugins/shop/js/shop_backend.js','backend',30);
	
    

    // Load Shop Admin for Editor and Admin
    if (Session::exists('user_role') && in_array(Session::get('user_role'), array('admin', 'editor'))) {        
        
        Plugin::admin('shop');

    }


    /**
     * Shop class
     */
    class Shop extends Frontend {

        /**
         * Shop Products content
         *
         * @var string
         */
        public static $shop_products = '';




        /**
         * Shop table
         */
        public static $shop = null;
        

        /**
         * Shop main functions
         */
        public static function main() {
            
            // Get shop table
            Shop::$shop = new Table('shop');

            // Select all products
            $products = Shop::$shop->select(null, 'all');



            // Get index view
            Shop::$shop_products = View::factory('shop/views/frontend/index')
                        ->assign('products', $products)
                        ->render();


        }

        /**
         * Set Shop title
         */
        public static function title() {
            return __('Shop', 'shop');
        }

        /**
         * Set Shop content
         */
        public static function content() {
            return Shop::$shop_products;
        }

        /**
         * Set Shop template
         */
        public static function template() {
            return Option::get('shop_template');
        }
    }

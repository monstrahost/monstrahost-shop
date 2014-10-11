<?php defined('MONSTRA_ACCESS') or die('No direct script access.');

    // Add New Options
    Option::add('shop_template', 'index');

    // Create New Table 'shop' width fields: 'title', 'image', 'description', 'price'
    Table::create('shop', array('title', 'image', 'description', 'price', 'shipping', 'shipping2', 'sku'));
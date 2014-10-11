<?php defined('MONSTRA_ACCESS') or die('No direct script access.');

    // Delete Options
    Option::delete('shop_template');

    // Drop table 'shop'
    Table::drop('shop');
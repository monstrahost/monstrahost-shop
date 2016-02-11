
Easy Shop
================
This is a plugin for [Monstra CMS](http://monstra.org) that implements a very simple javascript PayPal shopping cart called [Minicart.js](http://minicartjs.com). It creates products in Monstra's flatfile data storage with simple attributes of title, SKU, photo, price, shipping price, price to ship additional quantities of the same item, and long-text (html and markdown allowed) description. There is no inventory management. 

The cart is managed by Paypal and all order processing will be done _in your paypal account_. There is no 'backend' for order management with this plugin. The administration is used only to create products and display them on your website and then populate a paypal cart for checkout.

## Usage

### Installation

1. Go to _Admin Menu -> Extends -> Plugins -> Install New
2. Select File or drop the _.zip_ file to upload
3. Click 'Install'



#### Set Up Paypal and 

1. *Create a [PayPal Add to Cart Button](https://www.paypal.com/cgi-bin/webscr?cmd=p/xcl/web-accept-to-sc-button-outside)*
2. Go to Menu -> System -> Settings
3. Choose your currency from the drop menu in Shop Settings
4. Enter the email for your paypal account in Shop Settings
5. Click 'Save'

#### Create Products

Menu -> Shop

1. Images must be uploaded via Menu -> Content -> Files (copy & paste image URL into product editing page)
2. No image resizing is done - optimize images before upload. 



#### Shipping

Shipping is currently required by 

<input type="hidden" name="no_shipping" value="2">

in frontend/index.view.php

see https://developer.paypal.com/docs/classic/paypal-payments-standard/integration-guide/Appx_websitestandard_htmlvariables/#id08A6HH0D0TA

### Known Issues

- The 'View Cart' modal doesn't look so hot on mobile devices. It probably needs to be rethemed.
- Uninstalling *deletes all product data*


### To Do

1. Implement cart empty on return from completed payment. 
2. If we're managing the return request, maybe we can implement a digital download sales mechanism.


Easy Shop
================
This is a plugin for [Monstra CMS](http://monstra.org) that implements a very simple javascript PayPal shopping cart called [Minicart.js](http://minicartjs.com). It creates products in Monstra's flatfile data storage with simple attributes of title, SKU, photo, price, shipping price, price to ship additional quantities of the same item, and long-text (html and markdown allowed) description. There is no inventory management. 

### Usage

#### Create Snippets

1. Create a Monstra snippet called 'shop-paypal-address' and add the email address to which you want paypal payments sent. 
 
2. Create a Monstra snippet called 'shop-currency' and add currency in style USD, RUR, EUR etc (only one allowed)

#### Create Products

Menu -> Shop

1. Images must be uploaded via Menu -> Content -> Files (copy & paste image URL into product editing page)
2. No image resizing is done - optimize images before upload


#### Shipping

Shipping is currently required by 

<input type="hidden" name="no_shipping" value="2">

in frontend/index.view.php

see https://developer.paypal.com/docs/classic/paypal-payments-standard/integration-guide/Appx_websitestandard_htmlvariables/#id08A6HH0D0TA

### Known Issues

- Seems to not populate the editor-area under cleditor, works great with summernote
- The 'View Cart' modal doesn't look so hot on mobile devices. It probably needs to be rethemed.
- Uninstalling deletes all product data 

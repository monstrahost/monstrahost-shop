Shop
================


### Usage

#### Create Snippets

1. Create a snippet called 'paypal-address' and add the email address to which you want paypal payments sent. 
 
2. Create a snippet called 'shop-currency' and add currency in style USD, RUR, EUR etc (only one allowed)

#### Create Products

Menu -> Shop

1. Images must be uploaded via Menu -> Files (copy & paste image URL)
2. No image resizing is done - optimize images before upload


#### Shipping

Shipping is currently required by 

<input type="hidden" name="no_shipping" value="2">

in frontend/index.view.php

see https://developer.paypal.com/docs/classic/paypal-payments-standard/integration-guide/Appx_websitestandard_htmlvariables/#id08A6HH0D0TA

### Known Issues

Seems to not populate the editor-area under cleditor, works great with summernote
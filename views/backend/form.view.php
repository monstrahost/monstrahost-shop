<a href="/admin/index.php?id=shop" class="btn btn-default pull-right">Cancel</a>
<h2><?php echo __('Add/Edit Product', 'shop'); ?></h2>


    <?php if (count($errors) > 0) { ?>
    <br />
    <div class="alert alert-danger">
    <ul>
    <?php foreach($errors as $error) { ?>
        <li><?php echo $error; ?></li>
    <?php } ?>             
    </ul>
    </div>             
    <?php } ?>
    
<?php if(Notification::get('errors')) Notification::get('errors'); ?>
    
    
<form method="post" role="form" enctype="multipart/form-data">
    <?php echo (Form::hidden('csrf', Security::token())); ?>
    <input type="hidden" name="item_id" value="<?php echo $item_id; ?>" />

    <div class="row">
    <div class="col-md-12">
    <label for="shop_title"><?php echo __('Product Title', 'shop'); ?></label>
    <input type="text" name="shop_title" class="form-control" value="<?php echo $title; ?>" />
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    <label for="shop_image"><?php echo __('Image', 'shop'); ?></label>
    <input type="text" name="shop_image" class="form-control" value="<?php echo $image; ?>" />
    <span class="help-block"><?php echo __('URL Format', 'shop'); ?></span>
    </div>
    <div class="col-md-2">
    <label for="shop_price"><?php echo __('Price', 'shop'); ?></label>
    <input type="text" name="shop_price" class="form-control" value="<?php echo $price; ?>" />
    </div>
    <div class="col-md-2">
    <label for="shop_sku"><?php echo __('SKU', 'shop'); ?></label>
    <input type="text" name="shop_sku" class="form-control" value="<?php echo $sku; ?>" />
    <span class="help-block"><?php echo __('SKU help', 'shop'); ?></span>
    </div>
    <div class="col-md-2">
    <label for="shop_shipping"><?php echo __('Shipping', 'shop'); ?></label>
    <input type="text" name="shop_shipping" class="form-control" value="<?php echo $shipping; ?>" />
    </div>
    <div class="col-md-2">
    <label for="shop_shipping2"><?php echo __('Ship Additional Items', 'shop'); ?></label>
    <input type="text" name="shop_shipping2" class="form-control" value="<?php echo $shipping2; ?>" />
    <span class="help-block"><?php echo __('Additional Items Shipping', 'shop'); ?></span>
    </div>
	</div>
	<br />
    <div class="form-group">
    <label><?php echo __('Description', 'shop'); ?></label>
    <textarea class="form-control" id="editor_area" rows="10" name="shop_description"><?php echo $description; ?></textarea><br /><br />
    
    </div>
	<div class="form-group">
    <input class="btn btn-block btn-lg btn-success" type="submit" value="<?php echo __('Save Product', 'shop'); ?>" name="save_product" />
	</div>
</form>

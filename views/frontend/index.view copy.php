<div class="row">
<?php foreach($products as $product) { ?>
	<div class="col-md-4">
	<div class="thumbnail">
	<div class="product-title"><span><?php echo Html::toText($product['title']); ?></span></div>
	<span class="product-price"><?php echo Html::toText($product['price']); ?> <small><?php echo Option::get('shop_currency'); ?></small></span>
	<img src="<?php echo Html::toText($product['image']); ?>" class="img-responsive" />
	<br />	
	<!-- Button trigger modal -->
	<a class="btn btn-default pull-left" data-toggle="modal" data-target="#productDetail-<?php echo $product['id']; ?>" href="#productDetail-<?php echo $product['id']; ?>"><i class="glyphicon glyphicon-info-sign"></i>  Product Info</a>
	

	
	
	
	<form method="post" action="https://www.paypal.com/cgi-bin/webscr">
	<input type="hidden" name="cmd" value="_cart">
	<input type="hidden" name="add" value="1">
	<input type="hidden" name="business" value="<?php echo Option::get('shop_paypal'); ?>">
	<input type="hidden" name="item_name" value="<?php echo Html::toText($product['title']); ?>">
	<input type="hidden" name="item_number" value="<?php echo Html::toText($product['sku']); ?>">
	<input type="hidden" name="amount" value="<?php echo Html::toText($product['price']); ?>">
	<input type="hidden" name="shipping" value="<?php echo Html::toText($product['shipping']); ?>">
	<input type="hidden" name="shipping2" value="<?php echo Html::toText($product['shipping2']); ?>">
	<input type="hidden" name="currency_code" value="<?php echo Option::get('shop_currency'); ?>">
	<input type="hidden" name="return" value="<?php echo Page::url(); ?>shop">
	<input type="hidden" name="cancel_return" value="<?php echo Page::url(); ?>shop">
	<input type="hidden" name="no_shipping" value="2">
	<input type="hidden" name="undefined_quantity" value="1">
	<input type="submit" class="btn btn-default pull-right" name="submit"  value="Add to Cart" >
	</form>

	<div class="clearfix"></div>
	</div>
	</div>
	
		<!-- Modal -->
	<div class="modal fade" id="productDetail-<?php echo $product['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="Product Detail" aria-hidden="true">
	  <div class="modal-dialog shop-modal-dialog">
	    <div class="modal-content shop-modal-content">
	      <div class="modal-header text-center bg-success">
		    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="glyphicon glyphicon-backward"></i>&nbsp;&nbsp;Back</button>
	        
	        <h4 class="modal-title" id="productDetailTitle"><?php echo Html::toText($product['title']); ?></h4>
	        
	        <form method="post" action="https://www.paypal.com/cgi-bin/webscr" class="navbar-form navbar-right">
			<input type="hidden" name="cmd" value="_cart">
			<input type="hidden" name="add" value="1">
			<input type="hidden" name="business" value="<?php echo Option::get('shop_paypal'); ?>">
			<input type="hidden" name="item_name" value="<?php echo Html::toText($product['title']); ?>">
			<input type="hidden" name="item_number" value="<?php echo Html::toText($product['sku']); ?>">
			<input type="hidden" name="amount" value="<?php echo Html::toText($product['price']); ?>">
			<input type="hidden" name="shipping" value="<?php echo Html::toText($product['shipping']); ?>">
			<input type="hidden" name="shipping2" value="<?php echo Html::toText($product['shipping2']); ?>">
			<input type="hidden" name="currency_code" value="<?php echo Option::get('shop_currency'); ?>">
			<input type="hidden" name="return" value="<?php echo Page::url(); ?>shop">
			<input type="hidden" name="cancel_return" value="<?php echo Page::url(); ?>shop">
			<input type="hidden" name="no_shipping" value="2">
			<input type="hidden" name="undefined_quantity" value="1">
			<input type="submit" class="btn btn-default pull-right" name="submit" value="Add to Cart">
			</form>
	        
	      </div>
	      <div class="modal-body">
	      	<span class="product-price"><?php echo Html::toText($product['price']); ?> <small><?php echo Option::get('shop_currency'); ?></small></span>
	        <img src="<?php echo Html::toText($product['image']); ?>" class="product-image img-responsive img-rounded center-block" />
	        <br />
	        <div class="row">

	        <div class="col-md-12">
			<div class="pull-right">
	        	<table class="table table-condensed table-striped table-bordered">
	        		<tr>
	        			<td><?php echo __('Price', 'shop'); ?></td>
	        			<td><?php echo Html::toText($product['price']); ?> <small><?php echo Option::get('shop_currency'); ?></small></td>
	        		</tr>
	        		<tr>
	        			<td><?php echo __('Shipping', 'shop'); ?></td>
	        			<td><?php echo Html::toText($product['shipping']); ?> <small><?php echo Option::get('shop_currency'); ?></small></td>
	        		</tr>
	        		<tr>
	        			<td><small><?php echo __('Shipping2', 'shop'); ?></small></td>
	        			<td><?php echo Html::toText($product['shipping2']); ?> <small><?php echo Option::get('shop_currency'); ?></small></td>
	        		</tr>
	        	</table>
	        </div>
	        <h3><?php echo __('Description', 'shop'); ?></h3>
	        <?php echo $product['description']; ?>
	        </div>
	        </div>
	      </div>
   	    </div>
	  </div>
	</div>	
	
<?php } ?>
</div>

<script>
$( ".navbar-nav" ).append( "<form action='https://www.paypal.com/cgi-bin/webscr' method='post' class='navbar-form navbar-right'><div class='form-group'><input type='hidden' name='business' value='<?php echo Option::get('shop_paypal'); ?>'><input type='hidden' name='cmd' value='_cart'><input type='hidden' name='display' value='1'><input type='submit' name='submit' value='View Cart' class='btn btn-default'></div></form>" );
</script>


<script src="//cdnjs.cloudflare.com/ajax/libs/minicart/3.0.5/minicart.min.js"></script>
<script>
    paypal.minicart.render();
</script>

<div class="row">
<?php foreach($products as $product) { ?>
	<div class="col-md-4">
	<div class="thumbnail">
	<div class="product-title bg-primary pull-left"><?php echo Html::toText($product['title']); ?></div>
	<span class="product-price bg-warning pull-right"><?php echo Html::toText($product['price']); ?> <small><?php echo Option::get('shop_currency'); ?></small></span>
	<!-- Button trigger modal -->
	<a data-toggle="modal" data-target="#productDetail-<?php echo $product['id']; ?>" href="#productDetail-<?php echo $product['id']; ?>">
		<img src="<?php echo Html::toText($product['image']); ?>" class="img-responsive" />
	</a>
	

	
	
	
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
	<button type="submit" class="btn btn-sm btn-success pull-left" name="submit"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;&nbsp;Add to Cart</button>
	</form>

	<div class="clearfix"></div>
	</div>
	</div>
	
		<!-- Modal -->
	<div class="modal fade" id="productDetail-<?php echo $product['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="Product Detail" aria-hidden="true">
	  <div class="modal-dialog shop-modal-dialog">
	    <div class="modal-content shop-modal-content">
	      <div class="modal-header text-center bg-info">
		    <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal"><i class="glyphicon glyphicon-backward"></i>&nbsp;&nbsp;Back</button>
	        
	        	        
	        <form method="post"  class="modal-form" action="https://www.paypal.com/cgi-bin/webscr">
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
			<button type="submit" class="btn btn-success btn-sm pull-right modal-button" name="submit"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;&nbsp;Add to Cart</button>
			</form>
	        <h4 class="modal-title" id="productDetailTitle"><?php echo Html::toText($product['title']); ?></h4>

	      </div>
	      <div class="modal-body">
		     <div class="row">
			     <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
				      	<span class="product-price bg-primary"><?php echo Html::toText($product['price']); ?> <small><?php echo Option::get('shop_currency'); ?></small></span>
				        <img src="<?php echo Html::toText($product['image']); ?>" class="product-image img-responsive img-rounded center-block" />
				        <hr />
				        <div class="row">
			
					        <div class="col-md-4 col-sm-12">
					        	<table class="table table-condensed table-striped table-bordered table-responsive">
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
					        <div class="col-md-8 col-sm-12">
					        <?php echo $product['description']; ?>
					        </div>
				        </div>
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

$( ".modal-form" ).submit(function( event ) {
  $(".modal").modal("hide");
});
</script>


<script src="//cdnjs.cloudflare.com/ajax/libs/minicart/3.0.5/minicart.min.js"></script>
<script>
    paypal.minicart.render();
</script>

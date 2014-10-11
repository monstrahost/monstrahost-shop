<h2><?php echo __('Shop', 'shop'); ?></h2>
<br />
<?php if(Notification::get('success')) Alert::success(Notification::get('success')); ?>
<!-- Products_list -->
<table class="table table-bordered table-condensed">
    <thead>
        <tr>
        	<td width="20%"><?php echo __('Image', 'shop'); ?></td>
            <td width="15%"><?php echo __('Description', 'shop'); ?></td>
            <td width="40%"><?php echo __('Title', 'shop'); ?></td>
            <td width="10%"><?php echo __('Price', 'shop'); ?></td>
            <td width="15%" colspan="2"><?php echo __('Actions', 'shop'); ?></td>
        </tr>
    </thead>
    <tbody>
    <?php if (count($products) > 0) foreach ($products as $product) { ?>
    <tr>
        <td><img src="<?php echo Html::toText($product['image']); ?>" class="img-responsive" /></td>
		<td><?php echo Html::toText($product['title']); ?></td>
        <td><small><?php echo substr($product['description'], 0, 170); ?></small> ...</td>
        <td><?php echo Html::toText($product['price']); ?></td>
        <td>
            <?php echo Html::anchor(__('Delete', 'shop'),
                      'index.php?id=shop&action=delete_product&product_id='.$product['id'].'&token='.Security::token(),
                       array('class' => 'btn btn-danger btn-actions', 'onclick' => "return confirmDelete('".__('Delete Product', 'shop')."')"));
            ?>
        </td>
        <td>
            <?php echo Html::anchor(__('Edit', 'shop'),
                      'index.php?id=shop&action=edit_product&product_id='.$product['id'].'&token='.Security::token(),
                       array('class' => 'btn btn-warning btn-actions'));
            ?>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<!-- /Products_list -->

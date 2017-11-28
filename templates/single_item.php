<div class="amazon-item">
    <a href="<?php echo $item['product_link']; ?>" data-vars-link-type="amazon-single" data-vars-outbound-link="Single Item <?php echo $item['product_name']; ?>" target="_blank" class="amazon-single-link">
        <img src="<?php echo $item['product_image']['sizes']['amazon_thumbnail']; ?>">
        <p><?php echo $item['product_name']; ?></p>
        <img src="<?php echo plugins_url('assets/buy_now.gif', dirname(__FILE__)); ?>">
    </a>
</div>

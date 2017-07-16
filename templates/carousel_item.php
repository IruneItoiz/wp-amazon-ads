<li class="amazon-carousel-item">
    <a href="<?php echo $item['product_link']; ?>">
        <img src="<?php echo $item['product_image']['sizes']['amazon_thumbnail']; ?>">
        <p><?php echo $item['product_name']; ?></p>
        <img src="<?php echo plugins_url('assets/buy_now.gif', dirname(__FILE__)); ?>">
    </a>
</li>

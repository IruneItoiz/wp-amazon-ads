<?php if ($carousel['title']) { ?>
    <h3 class="text-center"><?php echo $carousel['title'];?></h3>
<?php } ?>


<ul class="amazon-carousel">
<?php
foreach ($carousel['contents'] as $item)
{
    include $item_template;
}

?>
</ul>
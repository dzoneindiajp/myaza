<?php if($images){ ?>
<div class="row">
<?php foreach($images as $img){ ?>
    <div class="col-xs-4 col-md-2 margin-bottomset py-2">
        <div class="img-thumbnail thumbnail-imgess">
            <input type="checkbox" id="myCheckbox<?php echo $img->id; ?>" data-id="<?php echo $img->id; ?>" data-img="<?php echo $img->name; ?>" >
            <label for="myCheckbox<?php echo $img->id; ?>" id="myLabel<?php echo $img->id; ?>">
                <img class="box-images px-2 py-2" image_id="" src='<?php echo e(asset("file")); ?>/<?php echo $img->name; ?>' alt="..." >
            </label>
        </div>
    </div>
<?php } ?>
</div>
<?php echo e($images->links()); ?>

<?php }else{ ?>
<?php } ?>
<?php /**PATH D:\xampp\htdocs\myazatrendz\resources\views/admin/products/paginated_media.blade.php ENDPATH**/ ?>
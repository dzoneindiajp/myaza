<label class="<?php echo e($required); ?>">
    <?php echo e($lable_name); ?>

</label>
<div>
    <?php if($image_url): ?>
        <img id="<?php echo e($image_view_name); ?>" src="<?php echo e($image_url); ?>" class="single-image-preview" />
    <?php else: ?>
        <img id="<?php echo e($image_view_name); ?>" src="" class="single-image-preview" style="display: none;" />
    <?php endif; ?>
</div>
<input type="hidden" value="<?php echo e($image_url); ?>">
<div class="custom-file">
    <input type="file" class="custom-file-input" id="fileImage" name="<?php echo e($input_name); ?>" accept="image/*"
        onchange="imagePreview(this, '<?php echo e($image_view_name); ?>', '<?php echo e($image_error_name); ?>')" <?php echo e($required); ?> />
    <label class="custom-file-label" for="fileImage">Choose Image</label>
</div>
<p class="text-danger" style="display: none;" id="<?php echo e($image_error_name); ?>"></p>
<?php /**PATH D:\xampp\htdocs\myaza\resources\views/partials/single-image-upload.blade.php ENDPATH**/ ?>
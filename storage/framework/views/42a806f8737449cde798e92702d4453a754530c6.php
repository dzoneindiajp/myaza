<div class="row">
<?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $akey => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $attributeVal = App\Models\Attribute::where('id', $akey)
                ->where('status', 1)
                ->select(['id', 'name'])
                ->first()
                ->toArray();
        $attributeValues = [];
        if(isset($attribute['attributevalues'])){
          $attributeValues = App\Models\AttributeValue::whereIn('id', $attribute['attributevalues'])
                  ->where('status', 1)
                  ->select(['id', 'value'])
                  ->get()
                  ->toArray();
        }
    ?>
    <div class="form-group col-3">
      <label for="attributeLabel_<?php echo e($akey); ?>">
          <?php echo e($attributeVal['name']); ?>

      </label>
      <select
          class="form-control select2"
          name="attributes[<?php echo e($akey); ?>]" id="attributeLabel_<?php echo e($akey); ?>" >
            <option value="">
                  Select <?php echo e($attributeVal['name']); ?>

              </option>
          <?php $__currentLoopData = $attributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($entry['id']); ?>">
                  <?php echo e($entry['value']); ?>

              </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
  </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /home/myazatrendz/public_html/resources/views/admin/products/attributes.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.edit')); ?> Shipping
            <a class="btn btn-secondary float-right" href="<?php echo e(route('admin.shipping.index')); ?>">
                Back to Shipping
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.shipping.update', [$category->id])); ?>"
                enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div class="row">
                    <input type="hidden" name="id" value="<?php echo e(old('id', $category->id)); ?>">
                    <div class="form-group col-md-4">
                        <label class="required" for="ps_pincode">Pincode</label>
                        <input class="form-control" type="text" name="ps_pincode" id="ps_pincode" value="<?php echo e(old('ps_pincode', $category->ps_pincode)); ?>" required readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="required" for="ps_price">Weight Range</label>
                        <select class="form-control" name="ps_weight_id" required disabled>
                            <option value="">Select Weight Range</option>
                            <?php foreach($categories as $cat){ ?>
                                <option <?php echo ($category->ps_weight_id == $cat->id)?'selected':'' ; ?> value="<?php echo $cat->id; ?>"><?php echo $cat->weight_from.'-'.$cat->weight_to; ?> Kg</option>
                            <?php } ?>
                        </select>
                    </div>
                    <input type="hidden" name="ps_weight_id" value="<?php echo e($category->ps_weight_id); ?>"/>
                    <div class="form-group col-md-4">
                        <label class="required" for="ps_price">Cost</label>
                        <input class="form-control" type="text" name="ps_price" id="ps_price" value="<?php echo e(old('ps_price', $category->ps_price)); ?>" required>
                    </div>

                    <div class="form-group col-md-12">
                        <button class="btn btn-warning float-right" type="submit">
                            <?php echo e(trans('global.update')); ?>

                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php echo $__env->make('admin.upload.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script>
  $(function(){
    $(document).on('click','.fa-times-circle', function(e){
      e.preventDefault();
      $(this).remove();
      $('#image-value').val('');
      $('#edit-img').remove();
    })
  })
  </script>
<?php echo $__env->make('admin.mediascript.singlecategory', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\myaza\resources\views/admin/shipping/edit.blade.php ENDPATH**/ ?>
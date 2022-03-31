
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.edit')); ?> Weight Range
            <a class="btn btn-secondary float-right" href="<?php echo e(route('admin.weight.index')); ?>">
                Back to Weight
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.weight.update', [$category->id])); ?>"
                enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div class="row">
                    <input type="hidden" name="id" value="<?php echo e(old('id', $category->id)); ?>">
                <div class="form-group col-md-6">
                        <label class="required" for="weight_from">Weight From(Kg)</label>
                        <input class="form-control" type="text" name="weight_from" id="weight_from" value="<?php echo e(old('weight_from', $category->weight_from)); ?>" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="required" for="weight_to">Weight To(Kg)</label>
                        <input class="form-control" type="text" name="weight_to" id="weight_to" value="<?php echo e(old('weight_to', $category->weight_to)); ?>" required>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myazatrendz/public_html/resources/views/admin/weight/edit.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
                <?php echo e(trans('global.create')); ?> Weight Range
                <a class="btn btn-secondary float-right" href="<?php echo e(route('admin.weight.index')); ?>">
                    Back to Weight
                </a>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.weight.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="required" for="weight_from">Weight From(Kg)</label>
                        <input class="form-control" type="text" name="weight_from" id="weight_from" value="" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="required" for="weight_to">Weight To(Kg)</label>
                        <input class="form-control" type="text" name="weight_to" id="weight_to" value="" required>
                    </div>

                    <div class="form-group col-md-12  text-right">
                        <button class="btn btn-success " type="submit">
                            <?php echo e(trans('global.save')); ?>

                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\myaza\resources\views/admin/weight/create.blade.php ENDPATH**/ ?>
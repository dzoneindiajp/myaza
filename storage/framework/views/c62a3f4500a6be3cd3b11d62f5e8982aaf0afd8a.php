
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.color.title_singular')); ?>

        <a class="btn btn-secondary float-right" href="<?php echo e(route('admin.colors.index')); ?>">
            <?php echo e(trans('global.back')); ?>

        </a>
    </div>

    <div class="card-body">
        <div class="form-group">
            
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.color.fields.id')); ?>

                        </th>
                        <td>
                            <?php echo e($color->id); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.color.fields.name')); ?>

                        </th>
                        <td>
                            <?php echo e($color->name); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.color.fields.value')); ?>

                        </th>
                        <td>
                            <?php echo e($color->value); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.color.fields.status')); ?>

                        </th>
                        <td>
                            <?php echo e(App\Models\Color::STATUS_SELECT[$color->status] ?? ''); ?>

                        </td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myazatrendz/public_html/resources/views/admin/colors/show.blade.php ENDPATH**/ ?>
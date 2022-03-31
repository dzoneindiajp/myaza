
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.category.title')); ?>

        <a class="btn btn-secondary float-right" href="<?php echo e(route('admin.categories.index')); ?>">
            <?php echo e(trans('global.back_to_category')); ?>

        </a>
    </div>
   

    <div class="card-body">
        <div class="form-group">
            
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.category.fields.id')); ?>

                        </th>
                        <td>
                            <?php echo e($category->id); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.category.fields.name')); ?>

                        </th>
                        <td>
                            <?php echo e($category->name); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.category.fields.slug')); ?>

                        </th>
                        <td>
                            <?php echo e($category->slug); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.category.fields.parent')); ?>

                        </th>
                        <td>
                            <?php echo e($category->parent); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.category.fields.image')); ?>

                        </th>
                        <td>
                            <?php if($category->image): ?>
                                <a href="<?php echo e($category->image_url); ?>" target="_blank" style="display: inline-block">
                                    <img src="<?php echo e($category->thumb_url); ?>">
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.category.fields.size_chart')); ?>

                        </th>
                        <td>
                            <?php if($category->size_chart): ?>
                                <a href="<?php echo e($category->size_chart->getUrl()); ?>" target="_blank" style="display: inline-block">
                                    <img src="<?php echo e($category->size_chart->getUrl('thumb')); ?>">
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.category.fields.is_home')); ?>

                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" <?php echo e($category->is_home ? 'checked' : ''); ?>>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.category.fields.is_menu')); ?>

                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" <?php echo e($category->is_menu ? 'checked' : ''); ?>>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.category.fields.status')); ?>

                        </th>
                        <td>
                            <?php echo e(App\Models\Category::STATUS_SELECT[$category->status] ?? ''); ?>

                        </td>
                    </tr>
                </tbody>
            </table>
           
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myazatrendz/public_html/resources/views/admin/categories/show.blade.php ENDPATH**/ ?>
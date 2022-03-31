
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.slider.title_singular')); ?>

        <a class="btn btn-secondary float-right" href="<?php echo e(route('admin.sliders.index')); ?>">
            <?php echo e(trans('global.back')); ?>

        </a>
    </div>

    <div class="card-body">
        <div class="form-group">
            
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.slider.fields.id')); ?>

                        </th>
                        <td>
                            <?php echo e($slider->id); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.slider.fields.title')); ?>

                        </th>
                        <td>
                            <?php echo e($slider->title); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.slider.fields.description')); ?>

                        </th>
                        <td>
                            <?php echo e($slider->description); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.slider.fields.url')); ?>

                        </th>
                        <td>
                            <?php echo e($slider->url); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.slider.fields.image')); ?>

                        </th>
                        <td>
                            <?php if($slider->image): ?>
                                <a href="<?php echo e($slider->photo->url); ?>" target="_blank" style="display: inline-block">
                                    <img src="<?php echo e($slider->photo->thumb); ?>">
                                    
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.slider.fields.status')); ?>

                        </th>
                        <td>
                            <?php echo e(App\Models\Slider::STATUS_SELECT[$slider->status] ?? ''); ?>

                        </td>
                    </tr>
                </tbody>
            </table>
           
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myazatrendz/public_html/resources/views/admin/sliders/show.blade.php ENDPATH**/ ?>
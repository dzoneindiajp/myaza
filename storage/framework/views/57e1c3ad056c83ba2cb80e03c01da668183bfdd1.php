
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.size.title_singular')); ?>

        <a class="btn btn-secondary float-right" href="<?php echo e(route('admin.sizes.index')); ?>">
            <?php echo e(trans('global.back')); ?>

        </a>
    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("admin.sizes.update", [$size->id])); ?>" enctype="multipart/form-data">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label class="required" for="name"><?php echo e(trans('cruds.size.fields.name')); ?></label>
                <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text" name="name" id="name" value="<?php echo e(old('name', $size->name)); ?>" required>
                <?php if($errors->has('name')): ?>
                    <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.size.fields.name_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="value"><?php echo e(trans('cruds.size.fields.value')); ?></label>
                <input class="form-control <?php echo e($errors->has('value') ? 'is-invalid' : ''); ?>" type="text" name="value" id="value" value="<?php echo e(old('value', $size->value)); ?>" required>
                <?php if($errors->has('value')): ?>
                    <span class="text-danger"><?php echo e($errors->first('value')); ?></span>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.size.fields.value_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required"><?php echo e(trans('cruds.size.fields.status')); ?></label>
                <select class="form-control <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?>" name="status" id="status" required>
                    <option value disabled <?php echo e(old('status', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Models\Size::STATUS_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('status', $size->status) == (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('status')): ?>
                    <span class="text-danger"><?php echo e($errors->first('status')); ?></span>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.size.fields.status_helper')); ?></span>
            </div>
            <div class="form-group text-right">
                <button class="btn btn-warning" type="submit">
                    <?php echo e(trans('global.update')); ?>

                </button>
            </div>
        </form>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myazatrendz/public_html/resources/views/admin/sizes/edit.blade.php ENDPATH**/ ?>
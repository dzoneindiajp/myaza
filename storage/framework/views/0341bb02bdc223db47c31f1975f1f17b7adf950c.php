
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.user.title_singular')); ?>

        <a class="btn btn-secondary float-right" href="<?php echo e(route('admin.users.index')); ?>">
            <?php echo e(trans('global.back')); ?>

        </a>
    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("admin.users.update", [$user->id])); ?>" enctype="multipart/form-data">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label class="required" for="name"><?php echo e(trans('cruds.user.fields.name')); ?></label>
                <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text" name="name" id="name" value="<?php echo e(old('name', $user->name)); ?>" required>
                <?php if($errors->has('name')): ?>
                    <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.user.fields.name_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="email"><?php echo e(trans('cruds.user.fields.email')); ?></label>
                <input class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" type="email" name="email" id="email" value="<?php echo e(old('email', $user->email)); ?>" required>
                <?php if($errors->has('email')): ?>
                    <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.user.fields.email_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="password"><?php echo e(trans('cruds.user.fields.password')); ?></label>
                <input class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" type="password" name="password" id="password">
                <?php if($errors->has('password')): ?>
                    <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.user.fields.password_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="roles"><?php echo e(trans('cruds.user.fields.roles')); ?></label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0"><?php echo e(trans('global.select_all')); ?></span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0"><?php echo e(trans('global.deselect_all')); ?></span>
                </div>
                <select class="form-control select2 <?php echo e($errors->has('roles') ? 'is-invalid' : ''); ?>" name="roles[]" id="roles" multiple required>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>" <?php echo e((in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : ''); ?>><?php echo e($roles); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('roles')): ?>
                    <span class="text-danger"><?php echo e($errors->first('roles')); ?></span>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.user.fields.roles_helper')); ?></span>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\myaza\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>
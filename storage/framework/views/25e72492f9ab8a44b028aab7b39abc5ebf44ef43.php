<?php $__env->startPush('stylesheet'); ?>
   <style media="screen">
     #remove-box{
       position: relative;
     }

     .fa-times-circle{
       position: absolute;
       right : -10px;
       top : -30px;
       color : red !important;
       cursor: pointer;
     }
   </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php if($category->parent_id == 0): ?>
                <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.category.title_singular')); ?>

                <a class="btn btn-secondary float-right" href="<?php echo e(route('admin.categories.index')); ?>">
                    <?php echo e(trans('global.back_to_category')); ?>

                </a>
            <?php else: ?>
                <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.subcategory.title_singular')); ?>

                (
                <strong>
                    <?php echo e($category->parent->name); ?>

                </strong>
                )
                <a class="btn btn-secondary float-right"
                    href="<?php echo e(route('admin.subcategories.index', ['id' => $category->id])); ?>">
                    <?php echo e(trans('global.back_to_sub_category')); ?>

                </a>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.categories.update', [$category->id])); ?>"
                enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>

                <input type="hidden" name="parent_id" value="<?php echo e($category->parent_id ?? 0); ?>">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="required" for="name"><?php echo e(trans('cruds.category.fields.name')); ?></label>
                        <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text"
                            name="name" id="name" value="<?php echo e(old('name', $category->name)); ?>" required>
                        <?php if($errors->has('name')): ?>
                            <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                        <?php endif; ?>
                        <span class="help-block"><?php echo e(trans('cruds.category.fields.name_helper')); ?></span>
                    </div>

                    <div class="form-group col-md-3">
                        <label><?php echo e(trans('cruds.category.fields.is_home_msg')); ?></label>
                        <div class="form-check <?php echo e($errors->has('is_home') ? 'is-invalid' : ''); ?>">
                            <input type="hidden" name="is_home" value="0">
                            <input class="form-check-input" type="checkbox" name="is_home" id="is_home" value="1"
                                <?php echo e($category->is_home || old('is_home', 0) === 1 ? 'checked' : ''); ?>>
                            <label class="form-check-label"
                                for="is_home"><?php echo e(trans('cruds.category.fields.is_home')); ?></label>
                        </div>
                        <?php if($errors->has('is_home')): ?>
                            <span class="text-danger"><?php echo e($errors->first('is_home')); ?></span>
                        <?php endif; ?>
                        <span class="help-block"><?php echo e(trans('cruds.category.fields.is_home_helper')); ?></span>
                    </div>

                    <div class="form-group col-md-3">
                        <label><?php echo e(trans('cruds.category.fields.is_menu_msg')); ?></label>
                        <div class="form-check <?php echo e($errors->has('is_menu') ? 'is-invalid' : ''); ?>">
                            <input type="hidden" name="is_menu" value="0">
                            <input class="form-check-input" type="checkbox" name="is_menu" id="is_menu" value="1"
                                <?php echo e($category->is_menu || old('is_menu', 0) === 1 ? 'checked' : ''); ?>>
                            <label class="form-check-label"
                                for="is_menu"><?php echo e(trans('cruds.category.fields.is_menu')); ?></label>
                        </div>
                        <?php if($errors->has('is_menu')): ?>
                            <span class="text-danger"><?php echo e($errors->first('is_menu')); ?></span>
                        <?php endif; ?>
                        <span class="help-block"><?php echo e(trans('cruds.category.fields.is_menu_helper')); ?></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="required"><?php echo e(trans('cruds.category.fields.status')); ?></label>
                        <select class="form-control <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?>" name="status"
                            id="status" required>
                            <option value disabled <?php echo e(old('status', null) === null ? 'selected' : ''); ?>>
                                <?php echo e(trans('global.pleaseSelect')); ?></option>
                            <?php $__currentLoopData = App\Models\Category::STATUS_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"
                                    <?php echo e(old('status', $category->status) == (string) $key ? 'selected' : ''); ?>>
                                    <?php echo e($label); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('status')): ?>
                            <span class="text-danger"><?php echo e($errors->first('status')); ?></span>
                        <?php endif; ?>
                        <span class="help-block"><?php echo e(trans('cruds.category.fields.status_helper')); ?></span>
                    </div>

                    <div class="form-group col-md-3">
                        

                        <label for="image">Banner</label>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".take-image-modal" id="image">Image</button>
                        &nbsp;
                        <span class="text-warning">* Banner size should be maximum 100px.</span>
                        <?php if($errors->has('image')): ?>
                            <span class="text-danger"><?php echo e($errors->first('image')); ?></span>
                        <?php endif; ?>
                        <span class="help-block"><?php echo e(trans('cruds.category.fields.name_helper')); ?></span>
                        <div class="image-load" >
                            
                            <div class="d-inline" id="remove-box">
                              <i class="fa fa-lg fa-times-circle"></i>
                              <img src="<?php echo e($category->thumb_url); ?>" style="width : 120px;" class="my-2" id="edit-img"/>
                            </div>
                            <input type="hidden" name="image" value="<?php echo e($category->image); ?>" id="image-value"/>
                        </div>
                    </div>

                    <?php if($category->parent_id > 0): ?>
                        <div class="form-group col-md-3">
                            <?php echo $__env->make('partials.single-image-upload', [
                            'input_name' => 'size_chart',
                            'lable_name' => trans('cruds.category.fields.size_chart'),
                            'image_view_name' => 'size_chart_view',
                            'image_error_name' => 'size_chart_error',
                            'required' => '',
                            'image_url' =>$category->size_chart_thumb
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\myaza\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>
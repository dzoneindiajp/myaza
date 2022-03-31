<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
           Add Video
            <a class="btn btn-secondary float-right" href="<?php echo e(route('admin.video-add.index')); ?>">
                <?php echo e(trans('global.back')); ?>

            </a>
        </div>

        <div class="card-body">
            <form method="POST" class="form-row" action="<?php echo e(route('admin.video-add.store')); ?>"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="form-group col-6">
                    <label class="required" for="title"><?php echo e(trans('cruds.slider.fields.title')); ?></label>
                    <input class="form-control <?php echo e($errors->has('title') ? 'is-invalid' : ''); ?>" type="text" name="title"
                        id="title" value="<?php echo e(old('title', '')); ?>" required>
                    <?php if($errors->has('title')): ?>
                        <span class="text-danger"><?php echo e($errors->first('title')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.slider.fields.title_helper')); ?></span>
                </div>

                <!--<div class="form-group col-6">-->
                <!--    <label for="url"><?php echo e(trans('cruds.slider.fields.url')); ?></label>-->
                <!--    <input class="form-control <?php echo e($errors->has('url') ? 'is-invalid' : ''); ?>" type="text" name="url"-->
                <!--        id="url" value="<?php echo e(old('url', '')); ?>">-->
                <!--    <?php if($errors->has('url')): ?>-->
                <!--        <span class="text-danger"><?php echo e($errors->first('url')); ?></span>-->
                <!--    <?php endif; ?>-->
                <!--    <span class="help-block"><?php echo e(trans('cruds.slider.fields.url_helper')); ?></span>-->
                <!--</div>-->

                <!--<div class="form-group col-7">-->
                <!--    <label for="description"><?php echo e(trans('cruds.slider.fields.description')); ?></label>-->
                <!--    <textarea class="form-control <?php echo e($errors->has('description') ? 'is-invalid' : ''); ?>"-->
                <!--        name="description" id="description"><?php echo e(old('description')); ?></textarea>-->
                <!--    <?php if($errors->has('description')): ?>-->
                <!--        <span class="text-danger"><?php echo e($errors->first('description')); ?></span>-->
                <!--    <?php endif; ?>-->
                <!--    <span class="help-block"><?php echo e(trans('cruds.slider.fields.description_helper')); ?></span>-->
                <!--</div> -->

                <div class="form-group col-md-3">
                    

                    <label for="image">Video</label>
                        <input type="file" class="btn btn-primary" data-toggle="modal" name="video" id="image">Upload</button>
                        &nbsp;
                        <span class="text-warning">* please upload Video only.</span>
                        <?php if($errors->has('image')): ?>
                            <span class="text-danger"><?php echo e($errors->first('image')); ?></span>
                        <?php endif; ?>
                        <span class="help-block"><?php echo e(trans('cruds.brand.fields.description_helper')); ?></span>
                        <div class="image-load">
                            
                    </div>
                </div>

                <div class="form-group col-2">
                    <label class="required"><?php echo e(trans('cruds.slider.fields.status')); ?></label>
                    <select class="form-control <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?>" name="status"
                        id="status" required>
                        <option value disabled <?php echo e(old('status', null) === null ? 'selected' : ''); ?>>
                            <?php echo e(trans('global.pleaseSelect')); ?></option>
                        <?php $__currentLoopData = App\Models\Slider::STATUS_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" <?php echo e(old('status', 1) == $key ? 'selected' : ''); ?>>
                                <?php echo e($label); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('status')): ?>
                        <span class="text-danger"><?php echo e($errors->first('status')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.slider.fields.status_helper')); ?></span>
                </div>
                <div class="form-group col-12 text-right">
                    <button class="btn btn-success" type="submit">
                        <?php echo e(trans('global.save')); ?>

                    </button>
                </div>
            </form>
        </div>
    </div>


<?php echo $__env->make('admin.upload.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('admin.mediascript.singlecategory', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myazatrendz/public_html/resources/views/admin/videoAdd/create.blade.php ENDPATH**/ ?>
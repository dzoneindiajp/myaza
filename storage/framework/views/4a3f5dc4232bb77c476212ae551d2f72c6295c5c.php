<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
       Update Text
        <a class="btn btn-secondary float-right" href="<?php echo e(route('admin.htext.index')); ?>">
            <?php echo e(trans('global.back')); ?>

        </a>
    </div>

    <div class="card-body">
        <form method="POST" class="form-row" action="<?php echo e(route('admin.htext.update', [$slider->id])); ?>" enctype="multipart/form-data">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <div class="form-group col-8">
                <label class="required" for="text">Text</label>
                <input class="form-control <?php echo e($errors->has('text') ? 'is-invalid' : ''); ?>" type="text" name="text" id="text" value="<?php echo e(old('text', $slider->text)); ?>" required>
                <?php if($errors->has('text')): ?>
                    <span class="text-danger"><?php echo e($errors->first('text')); ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group col-md-4">
                <label class="required"><?php echo e(trans('cruds.slider.fields.status')); ?></label>
                <select class="form-control <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?>" name="status" id="status" required>
                    <option value disabled <?php echo e(old('status', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Models\Slider::STATUS_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('status', $slider->status) == (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('status')): ?>
                    <span class="text-danger"><?php echo e($errors->first('status')); ?></span>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.slider.fields.status_helper')); ?></span>
            </div>
            <div class="form-group text-right col-12">
                <button class="btn btn-warning" type="submit">
                    <?php echo e(trans('global.update')); ?>

                </button>
            </div>
        </form>
    </div>
</div>


<?php echo $__env->make('admin.upload.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->make('admin.mediascript.singlecategory', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    Dropzone.options.imageDropzone = {
    url: '<?php echo e(route('admin.sliders.storeMedia')); ?>',
    maxFilesize: 1, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
    },
    params: {
      size: 1,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {

    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myazatrendz/public_html/resources/views/admin/htext/edit.blade.php ENDPATH**/ ?>
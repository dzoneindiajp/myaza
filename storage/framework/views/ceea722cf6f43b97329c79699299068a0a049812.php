<?php $__env->startSection('content'); ?>

<div class="card">
  <div class="card-header">
    <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.cmsPage.title_singular')); ?>

    <a class="btn btn-secondary float-right" href="<?php echo e(route('admin.cms-pages.index')); ?>">
        <?php echo e(trans('global.back')); ?>

    </a>
</div>

    <div class="card-body">
        <form method="POST" class="form-row" action="<?php echo e(route("admin.cms-pages.update", [$cmsPage->id])); ?>" enctype="multipart/form-data">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <div class="form-group col-3">
                <label class="required" for="title"><?php echo e(trans('cruds.cmsPage.fields.title')); ?></label>
                <input class="form-control <?php echo e($errors->has('title') ? 'is-invalid' : ''); ?>" type="text" name="title" id="title" value="<?php echo e(old('title', $cmsPage->title)); ?>" required>
                <?php if($errors->has('title')): ?>
                    <span class="text-danger"><?php echo e($errors->first('title')); ?></span>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.cmsPage.fields.title_helper')); ?></span>
            </div>
            <div class="form-group col-3">
              <label class="required" for="sub_title"><?php echo e(trans('cruds.cmsPage.fields.sub_title')); ?></label>
              <input class="form-control <?php echo e($errors->has('sub_title') ? 'is-invalid' : ''); ?>" type="text" name="sub_title" id="sub_title" value="<?php echo e(old('sub_title', $cmsPage->title)); ?>" required>
              <?php if($errors->has('sub_title')): ?>
                  <span class="text-danger"><?php echo e($errors->first('sub_title')); ?></span>
              <?php endif; ?>
              <span class="help-block"><?php echo e(trans('cruds.cmsPage.fields.sub_title_helper')); ?></span>
          </div>
            <div class="form-group col-3">
                <label for="slug"><?php echo e(trans('cruds.cmsPage.fields.slug')); ?></label>
                <input class="form-control <?php echo e($errors->has('slug') ? 'is-invalid' : ''); ?>" type="text" name="slug" id="slug" value="<?php echo e(old('slug', $cmsPage->slug)); ?>">
                <?php if($errors->has('slug')): ?>
                    <span class="text-danger"><?php echo e($errors->first('slug')); ?></span>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.cmsPage.fields.slug_helper')); ?></span>
            </div>
            <div class="form-group col-3">
                <label for="url"><?php echo e(trans('cruds.cmsPage.fields.url')); ?></label>
                <input class="form-control <?php echo e($errors->has('url') ? 'is-invalid' : ''); ?>" type="text" name="url" id="url" value="<?php echo e(old('url', $cmsPage->url)); ?>">
                <?php if($errors->has('url')): ?>
                    <span class="text-danger"><?php echo e($errors->first('url')); ?></span>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.cmsPage.fields.url_helper')); ?></span>
            </div>
            <div class="form-group col-3">
                <label for="image"><?php echo e(trans('cruds.cmsPage.fields.image')); ?></label>
                <input class="form-control <?php echo e($errors->has('image') ? 'is-invalid' : ''); ?>" type="text" name="image" id="image" value="<?php echo e(old('image', $cmsPage->image)); ?>">
                <?php if($errors->has('image')): ?>
                    <span class="text-danger"><?php echo e($errors->first('image')); ?></span>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.cmsPage.fields.image_helper')); ?></span>
            </div>
            <div class="form-group col-3">
                <label for="meta_title"><?php echo e(trans('cruds.cmsPage.fields.meta_title')); ?></label>
                <input class="form-control <?php echo e($errors->has('meta_title') ? 'is-invalid' : ''); ?>" type="text" name="meta_title" id="meta_title" value="<?php echo e(old('meta_title', $cmsPage->meta_title)); ?>">
                <?php if($errors->has('meta_title')): ?>
                    <span class="text-danger"><?php echo e($errors->first('meta_title')); ?></span>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.cmsPage.fields.meta_title_helper')); ?></span>
            </div>
            <div class="form-group col-3">
              <label for="tags"><?php echo e(trans('cruds.cmsPage.fields.tags')); ?></label>
              <input class="form-control <?php echo e($errors->has('tags') ? 'is-invalid' : ''); ?>" type="text" name="tags" id="tags" value="<?php echo e(old('tags', $cmsPage->tags)); ?>">
              <?php if($errors->has('tags')): ?>
                  <span class="text-danger"><?php echo e($errors->first('tags')); ?></span>
              <?php endif; ?>
              <span class="help-block"><?php echo e(trans('cruds.cmsPage.fields.tags_helper')); ?></span>
            </div>
            <div class="form-group col-3">
                <label class="required"><?php echo e(trans('cruds.cmsPage.fields.status')); ?></label>
                <select class="form-control <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?>" name="status" id="status" required>
                    <option value disabled <?php echo e(old('status', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Models\CmsPage::STATUS_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('status', $cmsPage->status) == (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('status')): ?>
                    <span class="text-danger"><?php echo e($errors->first('status')); ?></span>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.cmsPage.fields.status_helper')); ?></span>
            </div>
            <div class="form-group col-6">
                <label for="meta_keyword"><?php echo e(trans('cruds.cmsPage.fields.meta_keyword')); ?></label>
                <textarea class="form-control <?php echo e($errors->has('meta_keyword') ? 'is-invalid' : ''); ?>" name="meta_keyword" id="meta_keyword"><?php echo e(old('meta_keyword', $cmsPage->meta_keyword)); ?></textarea>
                <?php if($errors->has('meta_keyword')): ?>
                    <span class="text-danger"><?php echo e($errors->first('meta_keyword')); ?></span>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.cmsPage.fields.meta_keyword_helper')); ?></span>
            </div>
            <div class="form-group col-6">
                <label for="meta_description"><?php echo e(trans('cruds.cmsPage.fields.meta_description')); ?></label>
                <textarea class="form-control <?php echo e($errors->has('meta_description') ? 'is-invalid' : ''); ?>" name="meta_description" id="meta_description"><?php echo e(old('meta_description', $cmsPage->meta_description)); ?></textarea>
                <?php if($errors->has('meta_description')): ?>
                    <span class="text-danger"><?php echo e($errors->first('meta_description')); ?></span>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.cmsPage.fields.meta_description_helper')); ?></span>
            </div>

            <div class="form-group col-12">
                <label for="cms-desc"><?php echo e(trans('cruds.cmsPage.fields.description')); ?></label>
                <textarea class="form-control ckeditor <?php echo e($errors->has('description') ? 'is-invalid' : ''); ?>" name="description" id="ckeditor"><?php echo old('description', $cmsPage->description); ?></textarea>
                <?php if($errors->has('description')): ?>
                    <span class="text-danger"><?php echo e($errors->first('description')); ?></span>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.cmsPage.fields.description_helper')); ?></span>
            </div>



            <div class="form-group text-right col-12">
                <button class="btn btn-warning" type="submit">
                    <?php echo e(trans('global.update')); ?>

                </button>
            </div>

        </form>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script>
    $(document).ready(function () {
   function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '<?php echo e(route('admin.cms-pages.storeCKEditorImages')); ?>', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '<?php echo e($cmsPage->id ?? 0); ?>');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter],
      }
    );
  }
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\myazatrendz\resources\views/admin/cmsPages/edit.blade.php ENDPATH**/ ?>
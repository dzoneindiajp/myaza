<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.coupon.title_singular')); ?>

            <a class="btn btn-secondary float-right" href="<?php echo e(route('admin.coupons.index')); ?>">
                <?php echo e(trans('global.back')); ?>

            </a>
        </div>

        <div class="card-body">
            <form method="POST" class="form-row" action="<?php echo e(route('admin.coupons.update', $coupon->id)); ?>"
                enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($coupon->id); ?>" />
                <div class="form-group col-4">
                    <label class="required"><?php echo e(trans('cruds.coupon.fields.coupon_type')); ?></label>
                    <select class="form-control <?php echo e($errors->has('coupon_type') ? 'is-invalid' : ''); ?>" name="coupon_type"
                        id="coupon_type" required>
                        <option value  <?php echo e(old('coupon_type', '') === null ? 'selected' : ''); ?>>
                            <?php echo e(trans('global.pleaseSelect')); ?></option>
                        <?php $__currentLoopData = App\Models\Coupon::COUPON_TYPE_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"
                                <?php echo e(old('coupon_type', $coupon->coupon_type) == $key ? 'selected' : ''); ?>>
                                <?php echo e($label); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('coupon_type')): ?>
                        <span class="text-danger"><?php echo e($errors->first('coupon_type')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.coupon.fields.coupon_type_helper')); ?></span>
                </div>


                <div class="form-group col-4" <?php if($coupon->coupon_type != 0): ?> ? style="display:none" <?php endif; ?> id="hard-customer">
                    <label for="customer_id"><?php echo e(trans('cruds.coupon.fields.customer')); ?></label>
                    <select class="form-control select2 <?php echo e($errors->has('customer') ? 'is-invalid' : ''); ?>"
                        name="customer_id" id="customer_id" >
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($customer->id); ?>"
                                <?php echo e((old('customer_id') ? old('customer_id') : $coupon->customer->id ?? '') == $customer->id ? 'selected' : ''); ?>>
                                <?php echo e($customer->name); ?>(<?php echo e($customer->mobile); ?>)
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('customer')): ?>
                        <span class="text-danger"><?php echo e($errors->first('customer')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.coupon.fields.customer_helper')); ?></span>
                </div>


                <div class="form-group col-4" <?php if($coupon->coupon_type != 0): ?> ? style="display:none" <?php endif; ?> id="hard-user-type">
                    <label class="required"><?php echo e(trans('cruds.coupon.fields.user_type')); ?></label>
                    <select class="form-control <?php echo e($errors->has('user_type') ? 'is-invalid' : ''); ?>" name="user_type"
                        id="user_type" required>
                        <option value disabled <?php echo e(old('user_type', null) === null ? 'selected' : ''); ?>>
                            <?php echo e(trans('global.pleaseSelect')); ?></option>
                        <?php $__currentLoopData = App\Models\Coupon::USER_TYPE_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"
                                <?php echo e(old('user_type', $coupon->user_type) == $key ? 'selected' : ''); ?>>
                                <?php echo e($label); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('user_type')): ?>
                        <span class="text-danger"><?php echo e($errors->first('user_type')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.coupon.fields.user_type_helper')); ?></span>
                </div>

                <div class="form-group col-4">
                    <label class="required"><?php echo e(trans('cruds.coupon.fields.discount_type')); ?></label>
                    <select class="form-control <?php echo e($errors->has('discount_type') ? 'is-invalid' : ''); ?>"
                        name="discount_type" id="discount_type" required>
                        <option value disabled <?php echo e(old('discount_type', null) === null ? 'selected' : ''); ?>>
                            <?php echo e(trans('global.pleaseSelect')); ?></option>
                        <?php $__currentLoopData = App\Models\Coupon::DISCOUNT_TYPE_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"
                                <?php echo e(old('discount_type', $coupon->discount_type) == $key ? 'selected' : ''); ?>>
                                <?php echo e($label); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('discount_type')): ?>
                        <span class="text-danger"><?php echo e($errors->first('discount_type')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.coupon.fields.discount_type_helper')); ?></span>
                </div>

                <div class="form-group col-4">
                    <label class="required" for="value"><?php echo e(trans('cruds.coupon.fields.value')); ?></label>
                    <input class="form-control <?php echo e($errors->has('value') ? 'is-invalid' : ''); ?>" type="number"
                        name="value" id="value" value="<?php echo e(old('value', $coupon->value)); ?>" step="0.01" required>
                    <?php if($errors->has('value')): ?>
                        <span class="text-danger"><?php echo e($errors->first('value')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.coupon.fields.value_helper')); ?></span>
                </div>
                <div class="form-group col-4">
                                        <label class="required" for="optCategory">
                                            <?php echo e(trans('cruds.product.fields.category')); ?>

                                        </label>
                                        <select
                                            class="form-control select2 <?php echo e($errors->has('category') ? 'is-invalid' : ''); ?>"
                                            name="category_id" id="optCategory">
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($id); ?>" <?php echo ($coupon->category_id == $id) ? 'selected' : ''; ?>>
                                                    <?php echo e($entry); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if($errors->has('category')): ?>
                                            <span class="text-danger"><?php echo e($errors->first('category')); ?></span>
                                        <?php endif; ?>

                                        <span class="help-block">
                                            <?php echo e(trans('cruds.product.fields.category_helper')); ?>

                                        </span>
                                    </div>

                                    <div class="form-group col-4">
                                        <label class="required" for="optSubCategory">
                                            <?php echo e(trans('cruds.product.fields.sub_category')); ?>

                                        </label>

                                        <select
                                            class="form-control select2 <?php echo e($errors->has('subcategory_id') ? 'is-invalid' : ''); ?>"
                                            name="sub_category_id" id="optSubCategory">
                                            <option value="">
                                                <?php echo app('translator')->get('global.pleaseSelect'); ?>
                                            </option>
                                        </select>

                                        <?php if($errors->has('subcategory_id')): ?>
                                            <span class="text-danger"><?php echo e($errors->first('sub_category_id')); ?></span>
                                        <?php endif; ?>

                                        <span class="help-block">
                                            <?php echo e(trans('cruds.product.fields.sub_category_helper')); ?>

                                        </span>
                                    </div>
                <div class="form-group col-4">
                    <label for="max_discount"><?php echo e(trans('cruds.coupon.fields.max_discount')); ?></label>
                    <input class="form-control <?php echo e($errors->has('max_discount') ? 'is-invalid' : ''); ?>" type="number"
                        name="max_discount" id="max_discount" value="<?php echo e(old('max_discount', $coupon->max_discount)); ?>"
                        step="0.01">
                    <?php if($errors->has('max_discount')): ?>
                        <span class="text-danger"><?php echo e($errors->first('max_discount')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.coupon.fields.max_discount_helper')); ?></span>
                </div>

                <div class="form-group col-4">
                    <label for="valid_from"><?php echo e(trans('cruds.coupon.fields.valid_from')); ?></label>
                    <input class="form-control datetime <?php echo e($errors->has('valid_from') ? 'is-invalid' : ''); ?>" type="text"
                        name="valid_from" id="valid_from" value="<?php echo e(old('valid_from', $coupon->valid_from)); ?>">
                    <?php if($errors->has('valid_from')): ?>
                        <span class="text-danger"><?php echo e($errors->first('valid_from')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.coupon.fields.valid_from_helper')); ?></span>
                </div>

                <div class="form-group col-4">
                    <label for="valid_to"><?php echo e(trans('cruds.coupon.fields.valid_to')); ?></label>
                    <input class="form-control datetime <?php echo e($errors->has('valid_to') ? 'is-invalid' : ''); ?>" type="text"
                        name="valid_to" id="valid_to" value="<?php echo e(old('valid_to', $coupon->valid_to)); ?>">
                    <?php if($errors->has('valid_to')): ?>
                        <span class="text-danger"><?php echo e($errors->first('valid_to')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.coupon.fields.valid_to_helper')); ?></span>
                </div>

                <div class="form-group col-4">
                    <label for="min_cart_amt"><?php echo e(trans('cruds.coupon.fields.min_cart_amt')); ?></label>
                    <input class="form-control <?php echo e($errors->has('min_cart_amt') ? 'is-invalid' : ''); ?>" type="number"
                        name="min_cart_amt" id="min_cart_amt" value="<?php echo e(old('min_cart_amt', $coupon->min_cart_amt)); ?>"
                        step="0.01">
                    <?php if($errors->has('min_cart_amt')): ?>
                        <span class="text-danger"><?php echo e($errors->first('min_cart_amt')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.coupon.fields.min_cart_amt_helper')); ?></span>
                </div>

                <div class="form-group col-6">
                    <label class="required" for="coupon_name"><?php echo e(trans('cruds.coupon.fields.coupon_name')); ?></label>
                    <input class="form-control <?php echo e($errors->has('coupon_name') ? 'is-invalid' : ''); ?>" type="text"
                        name="coupon_name" id="coupon_name" value="<?php echo e(old('coupon_name', $coupon->coupon_name)); ?>"
                        required>
                    <?php if($errors->has('coupon_name')): ?>
                        <span class="text-danger"><?php echo e($errors->first('coupon_name')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.coupon.fields.coupon_name_helper')); ?></span>
                </div>

                <div class="form-group col-6">
                    <label class="required" for="code"><?php echo e(trans('cruds.coupon.fields.code')); ?></label>
                    <input class="form-control <?php echo e($errors->has('code') ? 'is-invalid' : ''); ?>" type="text" name="code"
                        id="code" value="<?php echo e(old('code', $coupon->code)); ?>" required>
                    <?php if($errors->has('code')): ?>
                        <span class="text-danger"><?php echo e($errors->first('code')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.coupon.fields.code_helper')); ?></span>
                </div>

                <div class="form-group col-4">
                    <label class="required"><?php echo e(trans('cruds.coupon.fields.is_unlimited')); ?></label>
                    <select class="form-control <?php echo e($errors->has('is_unlimited') ? 'is-invalid' : ''); ?>"
                        name="is_unlimited" id="is_unlimited" required>
                        <option value disabled <?php echo e(old('is_unlimited', null) === null ? 'selected' : ''); ?>>
                            <?php echo e(trans('global.pleaseSelect')); ?></option>
                        <?php $__currentLoopData = App\Models\Coupon::IS_UNLIMITED; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"
                                <?php echo e(old('is_unlimited', $coupon->is_unlimited) == $key ? 'selected' : ''); ?>>
                                <?php echo e($label); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('is_unlimited')): ?>
                        <span class="text-danger"><?php echo e($errors->first('is_unlimited')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.coupon.fields.is_unlimited_helper')); ?></span>
                </div>

                <div class="form-group col-4">
                    <label class="required" for="avlb_coupons"><?php echo e(trans('cruds.coupon.fields.avlb_coupons')); ?></label>
                    <input class="form-control <?php echo e($errors->has('avlb_coupons') ? 'is-invalid' : ''); ?>" type="number"
                        name="avlb_coupons" id="avlb_coupons" value="<?php echo e(old('avlb_coupons', $coupon->avlb_coupons)); ?>"
                        step="1" required>
                    <?php if($errors->has('avlb_coupons')): ?>
                        <span class="text-danger"><?php echo e($errors->first('avlb_coupons')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.coupon.fields.avlb_coupons_helper')); ?></span>
                </div>

                <div class="form-group col-4">
                    <label class="required"><?php echo e(trans('cruds.coupon.fields.status')); ?></label>
                    <select class="form-control <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?>" name="status"
                        id="status" required>
                        <option value disabled <?php echo e(old('status', null) === null ? 'selected' : ''); ?>>
                            <?php echo e(trans('global.pleaseSelect')); ?></option>
                        <?php $__currentLoopData = App\Models\Coupon::STATUS_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"
                                <?php echo e(old('status', $coupon->status) == $key ? 'selected' : ''); ?>>
                                <?php echo e($label); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('status')): ?>
                        <span class="text-danger"><?php echo e($errors->first('status')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.coupon.fields.status_helper')); ?></span>
                </div>

                <div class="form-group col-9">
                    <label for="term_conditions"><?php echo e(trans('cruds.coupon.fields.term_conditions')); ?></label>
                    <textarea class="form-control ckeditor <?php echo e($errors->has('term_conditions') ? 'is-invalid' : ''); ?>"
                        name="term_conditions" id="term_conditions"><?php echo old('term_conditions', $coupon->term_conditions); ?></textarea>
                    <?php if($errors->has('term_conditions')): ?>
                        <span class="text-danger"><?php echo e($errors->first('term_conditions')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.coupon.fields.term_conditions_helper')); ?></span>
                </div>

                <div class="form-group col-md-3">
                    <?php echo $__env->make('partials.single-image-upload', [
                    'input_name' => 'image',
                    'lable_name' => trans('cruds.coupon.fields.image'),
                    'image_view_name' => 'image_view',
                    'image_error_name' => 'image_error',
                    'required' => '',
                    'image_url' => (isset($coupon->photo) && isset($coupon->photo->url) ? $coupon->photo->url : '') 
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    &nbsp;
                    
                    <span class="text-warning">* Coupon size should be maximum 50px.</span>
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
    let subCategoryURL = "<?php echo e(route('admin.product.map.subcategories')); ?>";
        let attributeURL = "<?php echo e(route('admin.product.attributes')); ?>";
        let overlay = $(document).find('.loading-overlay');
        let token = "<?php echo e(csrf_token()); ?>";
        let pleaseSelect = "<?php echo e(trans('global.pleaseSelect')); ?>";
        let cid = "<?php echo e($coupon->sub_category_id); ?>";

        $('#optCategory').change(function() {
            let parent_id = $(this).val();
            if (parent_id) {
                $.ajax({
                    url: subCategoryURL,
                    data: {
                        _token: token,
                        parent_id: parent_id
                    },
                    method: 'POST',
                    beforeSend : function(){
                        overlay.addClass('is-active');
                    },
                    success: function(res) {
                        $('#optSubCategory').empty().append('<option value="">All</option>');
                        overlay.removeClass('is-active');
                        if (res.success) {
                            res.subCategories.map((item) => {
                                var sf = '';
                                if(item.parent_id == parent_id && item.id == cid){
                                    sf = 'selected';
                                }
                                $('#optSubCategory').append('<option value="'+item.id+'" '+sf+'>'+item.name+'</option>');
                            });
                        } else {
                            swal({
                                title: "Warning",
                                text: res.message,
                                type: "warning",
                                timer: 3000,
                                showConfirmButton: false
                            });
                        }
                    },
                    failure: function(status) {
                        console.log(status);
                    }
                });
            } else {
                $('#optSubCategory').empty().append(new Option(pleaseSelect));
            }
        });
    $(document).ready(function(){
    //    $(document).find("#hard-customer").hide();
    //    $(document).find("#hard-user-type").hide();
      
    $('#optCategory').trigger('change');
       $(document).on('change','#coupon_type', function(){
           if($(this).val() !== '' && $(this).val() == 0){
             $(document).find("#hard-customer").show();
             $(document).find("#hard-user-type").hide();
           }
           else{
            $(document).find("#hard-customer").hide();
            $(document).find("#hard-user-type").hide();
           }
       })

       $(document).on('change','#customer_id', function(){

           if($(this).val() !== ''){
             $(document).find("#hard-user-type").show();
           }
           else{
            $(document).find("#hard-user-type").hide();
           }
       })
    });
</script>
    <script>
        Dropzone.options.imageDropzone = {
            url: '<?php echo e(route('admin.coupons.storeMedia')); ?>',
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
            success: function(file, response) {
                $('form').find('input[name="image"]').remove()
                $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                <?php if(isset($coupon) && $coupon->image): ?>
                    var file = <?php echo json_encode($coupon->image); ?>

                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                <?php endif; ?>
            },
            error: function(file, response) {
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
    <script>
        $(document).ready(function() {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function(file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST',
                                            '<?php echo e(route('admin.coupons.storeCKEditorImages')); ?>',
                                            true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText =
                                            `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function() {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response
                                                    .message ?
                                                    `${genericErrorText}\n${xhr.status} ${response.message}` :
                                                    `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`
                                                );
                                            }

                                            $('form').append(
                                                '<input type="hidden" name="ck-media[]" value="' +
                                                response.id + '">');

                                            resolve({
                                                default: response.url
                                            });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(
                                                e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', '<?php echo e($coupon->id ?? 0); ?>');
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
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\myaza\resources\views/admin/coupons/edit.blade.php ENDPATH**/ ?>
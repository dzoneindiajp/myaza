<?php $__env->startPush('stylesheet'); ?>
<style>


#toast-container{
    margin-top : 20px;
}

#toast-container > .toast {
  width: 500px !important;
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.attribute.title_singular')); ?>

            <a class="btn btn-secondary float-right" href="<?php echo e(route('admin.map-attributes.index')); ?>">
                <?php echo e(trans('global.back')); ?>

            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.map-attributes.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="required" for="category_id"><?php echo e(trans('cruds.mapattribute.fields.category')); ?></label>
                    <select class="form-control select2 <?php echo e($errors->has('category_id') ? 'is-invalid' : ''); ?>"
                        name="category_id" id="category_id" required>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($id); ?>" <?php echo e(old('category_id') == $id ? 'selected' : ''); ?>>
                                <?php echo e($entry); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('category_id')): ?>
                        <span class="text-danger"><?php echo e($errors->first('category_id')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.mapattribute.fields.category_helper')); ?></span>
                </div>
                <div class="form-group">
                    <label class="required"
                        for="optSubCategory"><?php echo e(trans('cruds.mapattribute.fields.subcategory')); ?></label>
                    <select
                        class="form-control select2 <?php echo e($errors->has('sub_category_id') ? 'is-invalid' : ''); ?>"
                        name="sub_category_id"
                        id="optSubCategory"
                        required disabled>
                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($id); ?>" style="display:none;"
                                <?php echo e(old('sub_category_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('sub_category_id')): ?>
                        <span class="text-danger"><?php echo e($errors->first('sub_category_id')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.mapattribute.fields.subcategory_helper')); ?></span>
                </div>
                <div class="form-group" id="optSubCategoryChildDiv" style="display: none;">
                    <label class="required"
                           for="optSubCategoryChild"><?php echo e(trans('cruds.mapattribute.fields.subchildcategory')); ?>

                    </label>
                    <select
                        class="form-control select2 <?php echo e($errors->has('sub_category_child_id') ? 'is-invalid' : ''); ?>"
                        name="sub_category_child_id"
                        id="optSubCategoryChild"
                        required disabled>
                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($id); ?>" style="display:none;"
                                <?php echo e(old('sub_category_child_id') == $id ? 'selected' : ''); ?>><?php echo e($entry); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('sub_category_child_id')): ?>
                        <span class="text-danger"><?php echo e($errors->first('sub_category_child_id')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.mapattribute.fields.subcategory_helper')); ?></span>
                </div>
                <div class="row">
                    <div class="form-group form-check col-md-2">
                        
                        <input class="form-check-input" type="checkbox" name="is_size" id="is_size" value="1"
                            <?php echo e(old('is_size', 0) == 1 ? 'checked' : ''); ?> required>
                        <label class="form-check-label"
                            for="is_size"><?php echo e(trans('cruds.mapattribute.fields.is_size')); ?></label>
                    </div>
                    <div class="form-group col-md-10">
                        <div id="sizes-message"></div>
                        <label for="sizes"><?php echo e(trans('cruds.mapattribute.fields.size')); ?></label>&nbsp;
                        <a class="badge badge-secondary text-light p-1" onclick="select_all_sizes()" style="cursor: pointer;display:none;" id="select_all_sizes">Select All</a>
                        <a class="badge badge-secondary text-light p-1" onclick="unselect_all_sizes()" style="cursor: pointer;display:none;" id="unselect_all_sizes">Unselect All</a>
                        <select class="form-control select2" name="sizes[]" id="sizes" multiple disabled>
                            <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id); ?>"><?php echo e($entry); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="help-block"><?php echo e(trans('cruds.mapattribute.fields.size_helper')); ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group form-check col-md-2">
                        
                        <input class="form-check-input" type="checkbox" name="is_color" id="is_color" value="1"
                            <?php echo e(old('is_color', 0) == 1 ? 'checked' : ''); ?>  required>
                        <label class="form-check-label"
                            for="is_color"><?php echo e(trans('cruds.mapattribute.fields.is_color')); ?></label>
                    </div>
                    <div class="form-group col-md-10">
                        <label for="colors"><?php echo e(trans('cruds.mapattribute.fields.color')); ?></label>
                        <a class="badge badge-secondary text-light p-1" onclick="select_all_colors()" style="cursor: pointer;display:none;" id="select_all_colors">Select All</a>
                        <a class="badge badge-secondary text-light p-1" onclick="unselect_all_colors()" style="cursor: pointer;display:none;" id="unselect_all_colors">Unselect All</a>
                        <select class="form-control select2" name="colors[]" id="colors" multiple disabled>
                            <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id); ?>"><?php echo e($entry); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="help-block"><?php echo e(trans('cruds.mapattribute.fields.color_helper')); ?></span>
                    </div>
                </div>
                <?php /* ?>
                <div class="row">
                    <div class="form-group form-check col-md-2">
                        <input type="hidden" name="is_brand" value="0">
                        <input class="form-check-input" type="checkbox" name="is_brand" id="is_brand" value="1"
                            {{ old('is_brand', 0) == 1 ? 'checked' : '' }} required>
                        <label class="form-check-label"
                            for="is_brand">{{ trans('cruds.mapattribute.fields.is_brand') }}</label>
                    </div>
                    <div class="form-group col-md-10">
                        <label for="brands">{{ trans('cruds.mapattribute.fields.brand') }}</label>
                        <select class="form-control select2" name="brands[]" id="brands" multiple>
                            @foreach ($brands as $id => $entry)
                                <option value="{{ $id }}">{{ $entry }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{ trans('cruds.mapattribute.fields.brand_helper') }}</span>
                    </div>
                </div>
                <?php */ ?>
                <input type="hidden" name="is_attribute" id="is_attribute" value="0">
                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <div class="form-group form-check col-md-2">
                            <input type="hidden" name="attribute[<?php echo e($attribute->id); ?>]" value="0">
                            <input class="form-check-input attributes" data-number="<?php echo e($attribute->id); ?>" type="checkbox"
                                name="attributes[<?php echo e($attribute->id); ?>]" id="attribute_<?php echo e($attribute->id); ?>" value="1"
                                <?php echo e(old('is_brand', 0) == 1 ? 'checked' : ''); ?>>
                            <label class="form-check-label"
                                for="attribute_<?php echo e($attribute->id); ?>"><?php echo e($attribute->name ?? ''); ?></label>
                        </div>
                        <div class="form-group col-md-10">
                            <label><?php echo e($attribute->name ?? ''); ?></label>
                            <a class="badge badge-secondary text-light p-1" onclick="select_all(<?php echo e($attribute->id); ?>)" style="cursor: pointer;display:none;" id="select_all_<?php echo e($attribute->id); ?>">Select All</a>
                            <a class="badge badge-secondary text-light p-1" onclick="unselect_all(<?php echo e($attribute->id); ?>)" style="cursor: pointer;display:none;" id="unselect_all_<?php echo e($attribute->id); ?>">Unselect All</a>
                            <select class="form-control select2"
                                name="attributes[<?php echo e($attribute->id); ?>][attributevalues][]" multiple id="attributes_<?php echo e($attribute->id); ?>" disabled>
                                <?php $__currentLoopData = $attribute->attribute_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group">
                    <label class="required"><?php echo e(trans('cruds.attribute.fields.status')); ?></label>
                    <select class="form-control <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?>" name="status"
                        id="status" required>
                        <option value disabled <?php echo e(old('status', null) === null ? 'selected' : ''); ?>>
                            <?php echo e(trans('global.pleaseSelect')); ?></option>
                        <?php $__currentLoopData = App\Models\attribute::STATUS_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"
                                <?php echo e(old('status', '1') == (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('status')): ?>
                        <span class="text-danger"><?php echo e($errors->first('status')); ?></span>
                    <?php endif; ?>
                    <span class="help-block"><?php echo e(trans('cruds.attribute.fields.status_helper')); ?></span>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-success" type="submit">
                        <?php echo e(trans('global.save')); ?>

                    </button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $('#category_id').change(function(){
           var cat = $(this).val();
           if(cat === ''){
               $('#optSubCategory').attr('disabled', true);
           }
           else{
            $('#optSubCategory').attr('disabled', false);
           }
        });


        $('#optSubCategory').change(function(){
           var sub_cat = $(this).val();
           if(sub_cat === ''){
               $('#optSubCategoryChild').attr('disabled', true);
           }
           else{
            $('#optSubCategoryChild').attr('disabled', false);
           }
        });

        let token = "<?php echo e(csrf_token()); ?>";
        let pleaseSelect = "<?php echo e(trans('global.pleaseSelect')); ?>";
        let subCategoryURL = "<?php echo e(route('admin.category.subCategories')); ?>";
    </script>

    <script>
        $('#is_color').attr( "disabled",'disabled');
        $('.attributes').attr( "disabled",'disabled');
        $('#sizes').on('change', function() {
         if (($('#sizes').val()).length>0) {
            $('#is_color').removeAttr( "disabled" );
         }
        else{
            $('#colors option').prop('selected', false);
            $('#colors').trigger("change");
            if ($('#is_color').prop("checked")) {
              $('#is_color').trigger("click");
            }
            $('#is_color').attr( "disabled",'disabled');
        }
        });
        $('#colors').on('change', function() {
         if (($(this).val()).length>0) {
            $('.attributes').removeAttr( "disabled" );
         }
        else{
            $('.attributes').each(function() {
              if ($(this).prop("checked")) {
                $(this).trigger("click");
              }
            });
            $('.attributes').attr( "disabled",'disabled');
        }
        });
        function select_all(id){
          $('#attributes_'+id+' option').prop('selected', true);
          $('#attributes_'+id).trigger("change");
        }
        function unselect_all(id){
          $('#attributes_'+id+' option').prop('selected', false);
          $('#attributes_'+id).trigger("change");
        }
        function select_all_sizes(){
          $('#sizes option').prop('selected', true);
          $('#sizes').trigger("change");
        }
        function unselect_all_sizes(){
          $('#sizes option').prop('selected', false);
          $('#sizes').trigger("change");
        }
        function select_all_colors(){
          $('#colors option').prop('selected', true);
          $('#colors').trigger("change");
        }
        function unselect_all_colors(){
          $('#colors option').prop('selected', false);
          $('#colors').trigger("change");
        }
        $(document).ready(function() {
            $('.select-all').click(function(){

            });
            $('#is_size').click(function() {
              if(this.checked) {
                $('#sizes').removeAttr( "disabled" );
                $('#select_all_sizes').show();
                $('#unselect_all_sizes').show();
              }else{
                $('#sizes option').prop('selected', false);
                $('#sizes').trigger("change");
                $('#sizes').attr( "disabled",'disabled');
                $('#select_all_sizes').hide();
                if ($('#is_color').prop("checked")) {
                  $('#is_color').trigger("click");
                }
                $('.attributes').each(function() {
                  if ($(this).prop("checked")) {
                    $(this).trigger("click");
                  }
                });
              }
            });
            $('#is_color').click(function() {
                // console.log();

              if(this.checked && (($('#sizes').val()).length>0)) {
                $('#colors').removeAttr( "disabled" );
                $('#sizes-message').html("")
                $('#select_all_colors').show();
                $('#unselect_all_colors').show();
              }else{

                $('#colors option').prop('selected', false);
                $('#colors').trigger("change");

                $('#colors').attr( "disabled",'disabled');

                $('.attributes').each(function() {
                    if ($(this).prop("checked")) {
                    $(this).trigger("click");
                  }
                });

                $('#select_all_colors').hide();
              }
            });
            $('.attributes').click(function() {
                let id = $(this).attr( "data-number" );
                var myid = $(this).attr('id');
                var attributes = <?php echo json_encode($attributes); ?>;
                for(var i = 0; i < attributes.length; i++){
                    if($(`#${myid}`).is(":checked")){
                        if(parseInt(id) !== parseInt(attributes[i].id)){
                            if($(`#attribute_${attributes[i].id}`).is(":checked") && $(`#attributes_${attributes[i].id}`).val().length == 0){
                                $(`#${myid}`).prop('checked', false);
                                // alert('Please enter data in empty attribute first');
                                toastr.error('Error', 'Please enter atleast one value in checked attribute first',{
                                  positionClass: 'toast-top-center',
                                });
                                return;
                            }
                        }
                        else{
                            console.log('match');
                        }
                    }
                }
                if(this.checked && (($('#colors').val()).length>0)) {
                  $('#attributes_'+id).removeAttr( "disabled" );
                  $('#select_all_'+id).show();
                  $('#unselect_all_'+id).show();
                }else{
                  $('#attributes_'+id+' option').prop('selected', false);
                  $('#attributes_'+id).trigger("change");
                  $('#attributes_'+id).attr( "disabled",'disabled');
                  $('#select_all_'+id).hide();
                  $('#unselect_all_'+id).hide();
                }
                $('#is_attribute').val("1");
            });

            $('#category_id').change(function() {
                let parent_id = $(this).val();
                $('#optSubCategoryChild').empty().append(new Option(pleaseSelect));
                if (parent_id) {
                    $.ajax({
                        url: subCategoryURL,
                        data: {
                            _token: token,
                            parent_id: parent_id,
                            exclude:1
                        },
                        method: 'POST',
                        success: function(res) {
                            $('#optSubCategory').empty().append(new Option(pleaseSelect));

                            if (res.success) {
                              $('#optSubCategoryChildDiv').hide();
                                res.subCategories.map((item) => {
                                    $('#optSubCategory').append(new Option(item.name, item.id));
                                });
                            } else {
                              $('#optSubCategoryChildDiv').hide();
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
 let pleaseSelect = "<?php echo e(trans('global.pleaseSelect')); ?>";
            $('#optSubCategory').change(function() {
                let parent_id = $(this).val();

                if (parent_id) {
                    $.ajax({
                        url: subCategoryURL,
                        data: {
                            _token: token,
                            parent_id: parent_id,
                            child_category:1
                        },
                        method: 'POST',
                        success: function(res) {
                            $('#optSubCategoryChild').empty().append(new Option(pleaseSelect));

                            if (res.success) {
                                $('#optSubCategoryChildDiv').show();
                                $('.select2').select2();
                                res.subCategories.map((item) => {
                                    $('#optSubCategoryChild').append(new Option(item.name, item.id));
                                });
                            } else {
                              $('#optSubCategoryChildDiv').hide();
                                /*swal({
                                    title: "Warning",
                                    text: "Child Category not Exists in selected sub category",
                                    type: "warning",
                                    timer: 3000,
                                    showConfirmButton: false
                                });*/
                            }
                        },
                        failure: function(status) {
                            console.log(status);
                        }
                    });
                } else {
                    $('#optSubCategoryChild').empty().append(new Option(pleaseSelect));
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myazatrendz/public_html/resources/views/admin/mapAttribute/create.blade.php ENDPATH**/ ?>
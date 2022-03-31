 <div class="card">
                        <div class="card-header" id="productAttributes">
                            <button class="btn btn-block btn-link text-dark font-weight-bold text-left text-uppercase collapsed"
                                type="button" data-toggle="collapse" data-target="#productAttribute" aria-expanded="false"
                                aria-controls="productAttribute">
                                <?php echo app('translator')->get('cruds.product.product_attributes'); ?>
                            </button>
                        </div>
                        <div id="productAttribute" class="collapse" aria-labelledby="productAttributes"
                            data-parent="#accordionProduct">
                            <div class="card-body" id="attributeBLock">
                            <div class="row">
<?php if(isset($attributes) && $attributes->count()>0): ?>
<?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $akey => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $attributeVal = App\Models\Attribute::where('id', $attribute->attribute_id)
                ->where('status', 1)
                ->select(['id', 'name'])
                ->first();
                $checknew=$attributeVal->attribute_values()->pluck('id')->toArray();
                $attributeVal->toArray();
        $attributeValues = [];
        if(isset($checknew)){

          $attributeValues = App\Models\AttributeValue::whereIn('id', $checknew)
                  ->where('status', 1)
                  ->select(['id', 'value'])
                  ->get()
                  ->toArray();
        }
    ?>
    <?php if(count($attributeValues) > 0): ?>
    <div class="form-group col-3">
      <label for="attributeLabel_<?php echo e($akey); ?>">
          <?php echo e($attributeVal['name']); ?>

      </label>
      <select
          class="form-control"
          name="attributes[<?php echo e($attribute->attribute_id); ?>]" id="attributeLabel_<?php echo e($attribute->attribute_id); ?>">
            <option value="">
                  Select <?php echo e($attributeVal['name']); ?>

              </option>
          <?php $__currentLoopData = $attributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($entry['id']); ?>" <?php if($entry['id'] == $attribute->attribute_value_id): ?>
                  selected
              <?php endif; ?>>
                  <?php echo e($entry['value']); ?>

              </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


</div>


                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="productVariants">
                            <button class="btn btn-block btn-link text-dark font-weight-bold text-left text-uppercase collapsed"
                                type="button" data-toggle="collapse" data-target="#productVariant" aria-expanded="false"
                                aria-controls="productVariant">
                                <?php echo app('translator')->get('cruds.product.product_variants'); ?>
                            </button>
                            
                        </div>

                        <div id="productVariant" class="collapse" aria-labelledby="productVariants"
                            data-parent="#accordionProduct">
                            <div class="card-body" id="variationBLock">
                                <?php if(isset($colors) && count($colors) > 0): ?>
                                
                            <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ckey => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php

?>
    <div class="accordion" id="accordionVariation">
        <div class="card">
            <div class="card-header" id="colorHeading<?php echo e($loop->iteration); ?>">
                <div class="row">
                <div class="col-2">
                        <div class="icheck-primary <?php echo e($errors->has('same_price') ? 'is-invalid' : ''); ?>" style="display : inline-block";>
                            <input type="checkbox" name="same_price[]" id="same_price<?php echo e($color->id); ?>"
                                class="same-price" data-number="<?php echo e($color->id); ?>"
                                value="<?php echo e($loop->iteration); ?>"  <?php if(isset($product->productProductVariations()->where('color_id',$color->id)->first()->color_id) && $product->productProductVariations()->where('color_id',$color->id)->first()->color_id == $color->id): ?>
                                checked
                                <?php endif; ?>  style="display: inline-block;">
                            <label for="same_price<?php echo e($color->id); ?>">
                            </label>
                            <span >For all sizes</span>
                        </div>

                         

                        <button class="btn btn-link  text-dark font-weight-bold text-left text-uppercase"
                            type="button" data-toggle="collapse" data-target="#collapse<?php echo e($loop->iteration); ?>"
                            aria-expanded="true" aria-controls="collapse<?php echo e($loop->iteration); ?>" style="width : 80% !important;">
                            <span class="mr-2"
                                style="height: 20px; background: <?php echo e($color->value); ?>; color: <?php echo e($color->value); ?>;">
                                <?php echo e($color->value); ?>

                            </span>
                            <?php echo e($color->name); ?>

                        </button>
                    </div>
                    <div class="form-group col-4">
                        <input class="form-control"
                            type="text" name="single_price_<?php echo e($color->id); ?>" id="txtSinglePrice_<?php echo e($color->id); ?>"
                          value="<?php echo e(old('price',$product->productProductVariations->where('color_id',$color->id)->first()->single_price??'')); ?>" oninput="txtSinglePrice('<?php echo e($color->id); ?>')" onkeypress="return isFloat(event)"
                            maxlength="10" placeholder="Retail Price" disabled>
                    </div>
                    <div class="form-group col-4">
                        <input class="form-control"
                            type="text" name="single_price_quantity_<?php echo e($color->id); ?>" id="txtSinglePrice_quantity_<?php echo e($color->id); ?>"
                            value="<?php echo e(old('single_price_quantity',$product->productProductVariations->where('color_id',$color->id)->first()->single_price_quantity ?? '')); ?>" oninput="txtSinglePriceQuantity('<?php echo e($color->id); ?>')" onkeypress="return isFloat(event)"
                            maxlength="10" placeholder="Retail Quantity" disabled>
                    </div>
                    <div class="col-1">
                        

                        <div class="icheck-primary m-5 <?php echo e($errors->has('same_price') ? 'is-invalid' : ''); ?>"">
                            <input type="checkbox" name="sameforall[]" id="sameforall_<?php echo e($color->id); ?>"
                                class="same_for_all" data-number="<?php echo e($color->id); ?>"
                                value="<?php echo e($loop->iteration); ?>" disabled>
                            <label for="sameforall_<?php echo e($color->id); ?>"></label>
                            <span >Same qty for all</span>
                        </div>
                    </div>
                    <div class="col-1">
                        

                        <div class="icheck-primary">
                            <input type="checkbox" name="primary[<?php echo e($color->id); ?>]" id="primarydata<?php echo e($color->id); ?>" data-member="<?php echo e($color->id); ?>"
                                 value="1" data-toggle='tooltip' data-placement='right' data-original-title="tooltip here" class='checkbox'
                                 <?php if(isset($product->productProductVariations()->where('color_id',$color->id)->first()->primary_variation) && $product->productProductVariations()->where('color_id',$color->id)->first()->primary_variation == 1): ?>
                            checked
                            <?php endif; ?> >

                                 <label for="primarydata<?php echo e($color->id); ?>"></label>
                                 <span >Primary Variation</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="collapse<?php echo e($loop->iteration); ?>" class="collapse <?php echo e($ckey ? '' : 'show'); ?>"
                aria-labelledby="colorHeading<?php echo e($loop->iteration); ?>" data-parent="#accordionVariation">
                <div class="card-body">
                    <div class="row">
                      
                      <?php
                    //   dd($color->id);
                      $proimages = DB::table('product_images')
                                ->where('product_id' ,$product->id)
                                ->where('product_color_id', $color->id)
                                ->select('file_name')
                                ->get();
                      $myloop = $loop->iteration;
                      ?>
                      <?php $__currentLoopData = $proimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-2" id="<?php echo e(strtok($img->file_name, '.')); ?>">
                        <div class="border p-2" id="add-image">
                            <i class="fa fa-times" style="" id="img-cross"> </i>
                            <img src="<?php echo e(asset("file/$img->file_name")); ?>" class="w-100" style="height : 150px;">
                            <input type="hidden" name="gallery[<?php echo e($color->id); ?>][]" value="<?php echo e($img->file_name); ?>">
                        </div>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      <div class="col-2" id="before-btn-<?php echo e($color->id); ?>">
                        <div class="w-100" style="height : 170px;">
                            <button type="button" class="btn btn-primary btn-circle btn-sm center-block" style="margin-top : 40%; margin-left : 30px;" id="img-add-btn" data-id="color-<?php echo e($loop->iteration); ?>" onclick="load_media(<?php echo e($color->id); ?>)">
                                <i class="fa fa-lg fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                      </div>

                        <?php /* ?>
                        <div class="form-group col-4">
                            @include('partials.single-image-upload', [
                            'input_name' => 'front_image[]',
                            'lable_name' => trans('cruds.product.fields.front_image'),
                            'image_view_name' => 'front_image_view',
                            'image_error_name' => 'front_image_error',
                            'required' => '',
                            'image_url' => ''
                            ])
                        </div>

                        <div class="form-group col-4">
                            @include('partials.single-image-upload', [
                            'input_name' => 'back_image[]',
                            'lable_name' => trans('cruds.product.fields.back_image'),
                            'image_view_name' => 'back_image_view',
                            'image_error_name' => 'back_image_error',
                            'required' => '',
                            'image_url' => ''
                            ])
                        </div>
                        <?php */ ?>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <label>
                            Size
                                    </label>
                                </div>
                                <div class="col-3">
                                    <label>
                            Retail Price
                                    </label>
                                </div>
                                <div class="col-3">
                                    <label>
                            Retail Quantity
                                    </label>
                                </div>
                                
                                <div class="col-3">
                                    <label>
                            Stock
                                    </label>
                                </div>
                            </div>
                            <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row size-list">
                                    <div class="col-3">
                                        <div class="icheck-primary <?php echo e($errors->has('sizes') ? 'is-invalid' : ''); ?>">
                                            <input type="checkbox" class="cbSize_<?php echo e($loop->iteration); ?>_<?php echo e($color->id); ?>" name="variation[<?php echo e($color->id); ?>][sizes][]"
                                                id="cbSize<?php echo e($loop->iteration); ?><?php echo e($ckey); ?>-<?php echo e($color->id); ?>" value="<?php echo e($size->id.','.$key); ?>"
                                                class="cbSize_<?php echo e($loop->iteration); ?>_<?php echo e($size->id); ?>"
                                                <?php echo e(old('sizes', $product->productProductVariations->where('color_id',$color->id)->where('size_id',$size->id)->first()->status??'') == 1 ? 'checked' : ''); ?>>
                                            <label for="cbSize<?php echo e($loop->iteration); ?><?php echo e($ckey); ?>-<?php echo e($color->id); ?>">
                                                <?php echo e($size->name . ' (' . $size->value . ')'); ?>

                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-3">
                                        <input class="form-control single_price_<?php echo e($color->id); ?> <?php echo e($errors->has('price') ? 'is-invalid' : ''); ?>"
                                            type="text" name="variation[<?php echo e($color->id); ?>][single_price][]" id="txtSinglePrice_<?php echo e($loop->iteration); ?>_<?php echo e($color->id); ?>"
                                            value="<?php echo e(old('price',$product->productProductVariations->where('color_id',$color->id)->where('size_id',$size->id)->first()->single_price??'')); ?>" onkeypress="return isFloat(event)"
                                            maxlength="10" placeholder="Retail Price">
                                    </div>


                                    <div class="form-group col-3">
                                        <input class="form-control single_price_quantity_<?php echo e($color->id); ?> <?php echo e($errors->has('single_price_quantity') ? 'is-invalid' : ''); ?>"
                                            type="text" name="variation[<?php echo e($color->id); ?>][single_price_quantity][]" value="<?php echo e(old('single_price_quantity',$product->productProductVariations->where('color_id',$color->id)->where('size_id',$size->id)->first()->single_price_quantity ?? '')); ?>"
                                            placeholder="Retail Quantity"
                                            onkeypress="return isFloat(event)" maxlength="8"
                                            id="singleQty_<?php echo e($loop->iteration); ?>_<?php echo e($color->id); ?>"
                                            >
                                    </div>


                                    <div class="form-group col-3">
                                        <select
                                            class="form-control <?php echo e($errors->has('size_status') ? 'is-invalid' : ''); ?>"
                                            name="variation[<?php echo e($color->id); ?>][size_status][]" id="size_status" required>
                                            <option value disabled
                                                <?php echo e(old('size_status', $product->productProductVariations->where('color_id',$color->id)->where('size_id',$size->id)->first()->size_status??'') === null ? 'selected' : ''); ?>>
                                                <?php echo e(trans('global.pleaseSelect')); ?>

                                            </option>

                                            <?php $__currentLoopData = App\Models\Product::IN_STOCK_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($key); ?>"
                                                    <?php echo e(old('size_status', 1) == $key ? 'selected' : ''); ?>>
                                                    <?php echo e($label); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if($errors->has('size_status')): ?>
                                            <span class="text-danger">
                                                <?php echo e($errors->first('size_status')); ?>

                                            </span>
                                        <?php endif; ?>

                                        <span class="help-block">
                                            <?php echo e(trans('cruds.product.fields.status_helper')); ?>

                                        </span>
                                    </div>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
                            </div>
                        </div>
                    </div><?php /**PATH D:\xampp\htdocs\myaza\resources\views/admin/products/partial.blade.php ENDPATH**/ ?>
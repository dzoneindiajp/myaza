
<?php $z = 0; ?>

<?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ckey => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="accordion" id="accordionVariation">
        <div class="card">
            <div class="card-header" id="colorHeading<?php echo e($loop->iteration); ?>">
                <div class="row">
                    <div class="col-2">
                        <div class="icheck-primary <?php echo e($errors->has('same_price') ? 'is-invalid' : ''); ?>" style="display : inline-block";>
                            <input type="checkbox" name="same_price[]" id="same_price<?php echo e($color->id); ?>"
                                class="same-price" data-number="<?php echo e($color->id); ?>"
                                value="<?php echo e($loop->iteration); ?>" <?php echo e(old('same_price', 0) == 1 ? 'checked' : ''); ?>>
                            <label for="same_price<?php echo e($color->id); ?>">
                            </label>
                            <span >For all sizes</span>
                        </div>

                        <button class="btn btn-link  text-dark font-weight-bold text-left text-uppercase"
                            type="button" data-toggle="collapse" data-target="#collapse<?php echo e($loop->iteration); ?>"
                            aria-expanded="true" aria-controls="collapse<?php echo e($loop->iteration); ?>" style="width : 80%;">
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
                            value="" oninput="txtSinglePrice('<?php echo e($color->id); ?>')" onkeypress="return isFloat(event)"
                            maxlength="10" placeholder="Retail Price" disabled>
                    </div>
                    <div class="form-group col-4">
                        <input class="form-control"
                            type="text" name="single_price_quantity_<?php echo e($color->id); ?>" id="txtSinglePrice_quantity_<?php echo e($color->id); ?>"
                            value="" oninput="txtSinglePriceQuantity('<?php echo e($color->id); ?>')" onkeypress="return isFloat(event)"
                            maxlength="10" placeholder="Retail Quantity" disabled>
                    </div>
                    <!--<div class="form-group col-2">
                        <input class="form-control"
                            type="text" name="wholesale_price_<?php echo e($color->id); ?>" id="txtwholesalePrice_<?php echo e($color->id); ?>"
                            value="" oninput="txtWholesalePrice('<?php echo e($color->id); ?>')" onkeypress="return isFloat(event)"
                            maxlength="10" placeholder="Wholesale Price" disabled>
                    </div>
                    <div class="form-group col-2">
                        <input class="form-control"
                            type="text" name="wholesale_price_quantity_<?php echo e($color->id); ?>" id="txtwholesalePrice_quantity_<?php echo e($color->id); ?>"
                            value="" oninput="txtWholesalePriceQuantity('<?php echo e($color->id); ?>')" onkeypress="return isFloat(event)"
                            maxlength="10" placeholder="Wholesale Price Qty" disabled>
                    </div>-->

                    <div class="col-1">
                        <div class="icheck-primary m-5">
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
                                 value="1" data-toggle='tooltip' data-placement='right' data-original-title="tooltip here" class='checkbox' >
                                 <label for="primarydata<?php echo e($color->id); ?>"></label>
                                 <span >Primary Variation</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="collapse<?php echo e($loop->iteration); ?>" class="collapse <?php echo e($ckey ? '' : 'show'); ?>"
                aria-labelledby="colorHeading<?php echo e($loop->iteration); ?>" data-parent="#accordionVariation">
                <div class="card-body">
                    <div class="row mb-0 py-0">
                      <div class="form-group col-12">
                        <input type="hidden" name="color_id[]" value="<?php echo e($color->id); ?>">
                        <div class="input-field">
                            <div id="clr<?php echo e($color->id); ?>" custom1="<?php echo e($color->id); ?>" class="input-images" style="padding-top: .5rem;">

                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row" id="merge-image-<?php echo e($loop->iteration); ?>">
                                
                                <div class="col-2" id="before-btn-<?php echo e($color->id); ?>">
                                    <div class="w-100" style="height : 170px;">
                                        <button type="button" class="btn btn-primary btn-circle btn-sm center-block" style="margin-top : 40%; margin-left : 30px;" id="img-add-btn" data-id="color-<?php echo e($loop->iteration); ?>" onclick="load_media(<?php echo e($color->id); ?>)">
                                            <i class="fa fa-lg fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <!--<div class="col-2">
                                    <label>
                            Wholesale Price
                                    </label>
                                </div>
                                <div class="col-2">
                                    <label>
                            Wholesale Price Qty
                                    </label>
                                </div>-->
                                <div class="col-3">
                                    <label>
                            Stock
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-3">
                                        <div class="icheck-primary <?php echo e($errors->has('sizes') ? 'is-invalid' : ''); ?>">
                                            <input type="checkbox" class="cbSize_<?php echo e($loop->iteration); ?>_<?php echo e($color->id); ?>" name="variation[<?php echo e($color->id); ?>][sizes][]"
                                                id="cbSize<?php echo e($loop->iteration); ?><?php echo e($ckey); ?>-<?php echo e($color->id); ?>"  value="<?php echo e($size->id.','.$key); ?>"
                                                data-id="<?php echo e($loop->iteration); ?>_<?php echo e($color->id); ?>"
                                                <?php echo e(old('sizes', 0) == 1 ? 'checked' : ''); ?>>
                                            <label for="cbSize<?php echo e($loop->iteration); ?><?php echo e($ckey); ?>-<?php echo e($color->id); ?>">
                                                <?php echo e($size->name . ' (' . $size->value . ')'); ?>

                                            </label>
                                        </div>
                                    </div>


                                    <div class="form-group col-3">
                                        <input class="form-control single_price_<?php echo e($color->id); ?> <?php echo e($errors->has('price') ? 'is-invalid' : ''); ?>"
                                            type="text" name="variation[<?php echo e($color->id); ?>][single_price][]" id="txtSinglePrice_<?php echo e($loop->iteration); ?>_<?php echo e($color->id); ?>"
                                            value="<?php echo e(old('price')); ?>" onkeypress="return isFloat(event)"
                                            maxlength="10" placeholder="Retail Price">
                                    </div>

                                    <div class="form-group col-3">
                                        <input class="form-control single_price_quantity_<?php echo e($color->id); ?> <?php echo e($errors->has('single_price_quantity') ? 'is-invalid' : ''); ?>"
                                            type="text" name="variation[<?php echo e($color->id); ?>][single_price_quantity][]" value="<?php echo e(old('single_price_quantity')); ?>"
                                            placeholder="Retail Quantity"
                                            onkeypress="return isFloat(event)"
                                            maxlength="8"
                                            id="singleQty_<?php echo e($loop->iteration); ?>_<?php echo e($color->id); ?>"
                                            >
                                    </div>

                                   <!-- <div class="form-group col-2">
                                        <input class="form-control wholesale_price_<?php echo e($color->id); ?> <?php echo e($errors->has('price') ? 'is-invalid' : ''); ?>"
                                            type="text" name="variation[<?php echo e($color->id); ?>][wholesale_price][]" id="wholesalePrice_<?php echo e($loop->iteration); ?>_<?php echo e($color->id); ?>"
                                            value="<?php echo e(old('wholesale_price')); ?>" onkeypress="return isFloat(event)"
                                            maxlength="10" placeholder="Wholesale Price">
                                    </div>
                                    <div class="form-group col-2">
                                        <input class="form-control wholesale_price_quantity_<?php echo e($color->id); ?> <?php echo e($errors->has('wholesale_price_quantity') ? 'is-invalid' : ''); ?>"
                                            type="text" name="variation[<?php echo e($color->id); ?>][wholesale_price_quantity][]" value="<?php echo e(old('wholesale_price_quantity')); ?>"
                                            placeholder="Wholesale Price Quantity"
                                            onkeypress="return isFloat(event)" maxlength="8"
                                            id="wholesaleQty_<?php echo e($loop->iteration); ?>_<?php echo e($color->id); ?>"
                                            >
                                    </div>-->

                                    <div class="form-group col-3">
                                        <select
                                            class="form-control <?php echo e($errors->has('size_status') ? 'is-invalid' : ''); ?>"
                                            name="variation[<?php echo e($color->id); ?>][size_status][]" id="size_status" required>
                                            <option value disabled
                                                <?php echo e(old('size_status', null) === null ? 'selected' : ''); ?>>
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\xampp\htdocs\myaza\resources\views/admin/products/variation.blade.php ENDPATH**/ ?>
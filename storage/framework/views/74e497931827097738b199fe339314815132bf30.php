    <div class="product-widget-type product-widget">
        <h4 class="product-widget-title">Color</h4>
        <ul class="product-widget-filter product-categories">
            <?php
                $colors = \App\Models\Color::where('status', '1')->get();
            ?>
            <?php if(count($colors) > 0 && $match !== null): ?>
                <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($cat_id !== 0): ?>
                        <?php if(in_array($color->id, $match->colors) && $match->is_color === 1): ?>
                            <?php if($color->name != ''): ?>
                                <li>
                                    <label class="container_category">
                                        <?php
                                            $checked = '';
                                            if (!empty(request()->get('colors')) && count(request()->get('colors')) > 0) {
                                                $checked = in_array($color->id, request()->get('colors')) ? 'checked' : '';
                                            }
                                        ?>
                                        <input class="filter color_<?php echo e($color->id); ?>" id="color-<?php echo e($color->id); ?>"
                                            data-name="<?php echo e($color->id); ?>" data-id="<?php echo e($color->id); ?>"
                                            <?php echo e($checked); ?> type="checkbox">
                                        <?php echo e($color->name); ?>

                                        <span class="checkmark"></span>
                                        <?php
                                            $products_ids = new \App\Models\Product();
                                            $products_ids = $products_ids->leftJoin('product_variations', 'product_variations.product_id', '=', 'products.id');
                                            
                                            $products_ids = $products_ids->where('products.status', 1);
                                            $products_ids = $products_ids->where('product_variations.color_id', $color->id);
                                            $products_ids = $products_ids->where('products.sub_category_id', $cat_id);
                                            $products_ids = $products_ids->groupBy('products.id');
                                            $products_ids = $products_ids->get();
                                            
                                            $attribute_count = $products_ids->count();
                                            
                                        ?>
                                        (<?php echo e($attribute_count); ?>)
                                    </label>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if($color->name != ''): ?>
                            <li>
                                <label class="container_category">
                                    <?php
                                        $checked = '';
                                        if (!empty(request()->get('colors')) && count(request()->get('colors')) > 0) {
                                            $checked = in_array($color->id, request()->get('colors')) ? 'checked' : '';
                                        }
                                    ?>
                                    <input class="filter color_<?php echo e($color->id); ?>" id="color-<?php echo e($color->id); ?>"
                                        data-name="<?php echo e($color->id); ?>" data-id="<?php echo e($color->id); ?>"
                                        <?php echo e($checked); ?> type="checkbox">
                                    <?php echo e($color->name); ?>

                                    <span class="checkmark"></span>
                                    <?php
                                        $data = DB::table('product_variations')
                                            ->join('products', 'products.id', 'product_variations.product_id')
                                            ->where('product_variations.color_id', $color->id);
                                        if ($request->search != '') {
                                            $products_ids = \App\Models\Product::where('name', 'LIKE', '%' . $request->search . '%')->pluck('id');
                                            $data = $data->whereIn('product_variations.product_id', $products_ids);
                                        }
                                        $data = $data->where('products.status', 1)->where('single_price_quantity', '!=', '');
                                        
                                        $attribute_count = count($data->groupBy('products.id')->get());
                                        
                                    ?>
                                    (<?php echo e($attribute_count); ?>)
                                </label>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </ul>
    </div>

    <div class="product-widget-type product-widget">
        <h4 class="product-widget-title">Size</h4>
        <ul class="product-widget-filter product-categories">
            <?php
                $sizes = \App\Models\Size::where('status', '1')->get();
            ?>
            <?php if(count($sizes) > 0 && $match !== null): ?>
                <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($cat_id !== 0): ?>
                        <?php if(in_array($size->id, $match->sizes) && $match->is_size === 1): ?>
                            <?php if($size->name != ''): ?>
                                <li>
                                    <label class="container_category">
                                        <?php
                                            $checked = '';
                                            if (!empty(request()->get('sizes')) && count(request()->get('sizes')) > 0) {
                                                $checked = in_array($size->id, request()->get('sizes')) ? 'checked' : '';
                                            }
                                        ?>
                                        <input class="filter size_<?php echo e($size->id); ?>" id="size-<?php echo e($size->id); ?>"
                                            data-name="<?php echo e($size->id); ?>" data-id="<?php echo e($size->id); ?>"
                                            <?php echo e($checked); ?> type="checkbox">
                                        <?php echo e($size->name); ?>

                                        <span class="checkmark"></span>
                                        <?php
                                            $products_ids = new \App\Models\Product();
                                            $products_ids = $products_ids->leftJoin('product_variations', 'product_variations.product_id', '=', 'products.id');
                                            
                                            $products_ids = $products_ids->where('products.status', 1);
                                            $products_ids = $products_ids->where('product_variations.size_id', $size->id);
                                            $products_ids = $products_ids->where('products.sub_category_id', $cat_id);
                                            if (!empty(request()->get('colors')) && count(request()->get('colors')) > 0) {
                                                $products_ids = $products_ids->whereIn('product_variations.color_id', request()->get('colors'));
                                            }
                                            $products_ids = $products_ids->groupBy('products.id');
                                            $products_ids = $products_ids->get();
                                            
                                            $attribute_count = $products_ids->count();
                                            
                                        ?>
                                        (<?php echo e($attribute_count); ?>)
                                    </label>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if($size->name != ''): ?>
                            <li>
                                <label class="container_category">
                                    <?php
                                        $checked = '';
                                        if (!empty(request()->get('sizes')) && count(request()->get('sizes')) > 0) {
                                            $checked = in_array($size->id, request()->get('sizes')) ? 'checked' : '';
                                        }
                                    ?>
                                    <input class="filter size_<?php echo e($size->id); ?>" id="size-<?php echo e($size->id); ?>"
                                        data-name="<?php echo e($size->id); ?>" data-id="<?php echo e($size->id); ?>"
                                        <?php echo e($checked); ?> type="checkbox">
                                    <?php echo e($size->name); ?>

                                    <span class="checkmark"></span>
                                    <?php
                                        $data = DB::table('product_variations')
                                            ->join('products', 'products.id', 'product_variations.product_id')
                                            ->where('product_variations.size_id', $size->id);
                                        if ($request->search != '') {
                                            $products_ids = \App\Models\Product::where('name', 'LIKE', '%' . $request->search . '%')->pluck('id');
                                            $data = $data->whereIn('product_variations.product_id', $products_ids);
                                        }
                                        if (!empty(request()->get('colors')) && count(request()->get('colors')) > 0) {
                                            $data = $data->whereIn('product_variations.color_id', request()->get('colors'));
                                        }
                                        $data = $data->where('products.status', 1)->where('single_price_quantity', '!=', '');
                                        
                                        $attribute_count = count($data->groupBy('products.id')->get());
                                        
                                    ?>
                                    (<?php echo e($attribute_count); ?>)
                                </label>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </ul>
    </div>

    <?php $__currentLoopData = $selectedaatrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $daatr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="product-widget-type product-widget">
            <h4 class="product-widget-title"><?php echo e($daatr->name); ?></h4>
            <ul class="product-widget-filter product-categories">
                <?php if($daatr->attribute_values): ?>
                    <?php $__currentLoopData = $daatr->attribute_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($value->value != ''): ?>
                            <li>
                                <label class="container_category">
                                    <?php
                                        $checked = '';
                                        if (!empty(request()->get('attributes')) && count(request()->get('attributes')) > 0) {
                                            $checked = in_array($value->id, request()->get('attributes')) ? 'checked' : '';
                                        }
                                    ?>
                                    <input class="filter" id="attribute-<?php echo e($daatr->id); ?>"
                                        data-name="<?php echo e($daatr->id); ?>" data-id="<?php echo e($value->id); ?>"
                                        <?php echo e($checked); ?> type="checkbox">
                                    <?php echo e($value->value); ?>

                                    <span class="checkmark"></span>
                                    <?php
                                        $products_ids = new \App\Models\Product();
                                        $products_ids = $products_ids->leftJoin('product_variations', 'product_variations.product_id', '=', 'products.id');
                                        
                                        if (!empty(request()->get('colors')) && count(request()->get('colors')) > 0) {
                                            $products_ids = $products_ids->whereIn('product_variations.color_id', request()->get('colors'));
                                        }
                                        if (!empty(request()->get('sizes')) && count(request()->get('sizes')) > 0) {
                                            $products_ids = $products_ids->whereIn('product_variations.size_id', request()->get('sizes'));
                                        }
                                        
                                        $above = request()->get('min_price');
                                        $below = request()->get('max_price');
                                        
                                        if ($above !== 'no' && $below !== 'no') {
                                            $products_ids = $products_ids->whereBetween('product_variations.single_sales_price', [$above, $below]);
                                        } elseif ($above !== 'no' && $below === 'no') {
                                            $products_ids = $products_ids->where('product_variations.single_sales_price', '>', $above);
                                        } elseif ($above === 'no' && $below !== 'no') {
                                            $products_ids = $products_ids->where('product_variations.single_sales_price', '<', $below);
                                        }
                                        
                                        $products_ids = $products_ids->where('products.status', 1);
                                        $products_ids = $products_ids->where('products.sub_category_id', $cat_id);
                                        $products_ids = $products_ids->groupBy('products.id');
                                        // $products_ids = $products_ids->get();
                                        $products_ids = $products_ids->pluck('products.id');
                                        
                                        $attribute_count = \App\Models\ProductAttribute::whereIn('product_id', $products_ids)
                                            ->where('attribute_value_id', $value->id)
                                            ->count();
                                    ?>
                                    (<?php echo e($attribute_count); ?>)
                                </label>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\xampp\htdocs\myaza\resources\views/store/products/attributes.blade.php ENDPATH**/ ?>
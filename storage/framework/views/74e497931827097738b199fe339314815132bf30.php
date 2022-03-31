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
                                        data-name="<?php echo e($daatr->id); ?>" data-id="<?php echo e($value->id); ?>" <?php echo e($checked); ?> type="checkbox">
                                    <?php echo e($value->value); ?>

                                    <span class="checkmark"></span>
                                    <?php
                                        $products_ids = new \App\Models\Product;
                                        $products_ids = $products_ids->leftJoin('product_variations', 'product_variations.product_id', '=', 'products.id');

                                        if(request()->get('sizes') && request()->get('colors')){
                                            if(count(request()->get('sizes')) > 0 && count(request()->get('colors')) > 0){
                                                $products_ids = $products_ids->whereIn('product_variations.color_id', request()->get('colors'))->orWhereIn('product_variations.size_id',request()->get('sizes'));
                                            }
                                        }
                    
                                        elseif(request()->get('sizes')){
                                            if(count(request()->get('sizes')) > 0){
                                                $products_ids = $products_ids->whereIn('product_variations.size_id',request()->get('sizes'));
                                            }
                                        }
                                        elseif(request()->get('colors')){
                                            if(count(request()->get('colors')) > 0){
                                                $products_ids = $products_ids->whereIn('product_variations.color_id',request()->get('colors'));
                                            }
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

                                        // $products_ids = \App\Models\Product::where('sub_category_id', $cat_id)
                                        //     ->where('status', 1)
                                        //     ->get()
                                        //     ->pluck('id');
                                        
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
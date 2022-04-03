<?php
$colors = \App\Models\Color::where('status', '1')->get();
?>
<?php if(count($colors) > 0 && $match !== null): ?>
    <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($cat_id !== 0 && $match): ?>
            <?php if(in_array($color->id, $match->colors) && $match->is_color === 1): ?>
                <li class="active">
                    <?php
                        $checked = '';
                        if (!empty(request()->get('colors')) && count(request()->get('colors')) > 0) {
                            $checked = in_array($color->id, request()->get('colors')) ? 'checked' : '';
                        }
                    ?>
                    <input type="checkbox" class="filter color_<?php echo e($color->id); ?>" id="color-<?php echo e($color->id); ?>"
                        data-name="<?php echo e($color->name); ?>" <?php echo e($checked); ?> data-id="<?php echo e($color->id); ?>"><label
                        for="color-<?php echo e($color->id); ?>" style="cursor:pointer"><?php echo e($color->name); ?><span>
                            (<?php
                            
                            $data = \DB::table('product_variations')
                                ->join('products', 'products.id', 'product_variations.product_id')
                                ->where('product_variations.color_id', $color->id)
                                ->where('products.status', 1)
                                ->where('product_variations.single_price_quantity', '!=', '');
                            
                            if ($cat_id !== 0) {
                                $data->where(function ($query) use ($cat_id) {
                                    $query
                                        ->where('products.category_id', $cat_id)
                                        ->orWhere('products.sub_category_id', $cat_id)
                                        ->orWhere('products.sub_category_child_id', $cat_id);
                                });
                            }
                            
                            $colorcount = $data->groupBy('product_variations.product_id')->get();
                            
                            if ($colorcount) {
                                echo count($colorcount);
                            } else {
                                echo 0;
                            }
                            ?>)
                        </span></label>
                </li>
            <?php endif; ?>
        <?php else: ?>
            <li class="active">
                <?php
                    $checked = '';
                    if (!empty(request()->get('colors')) && count(request()->get('colors')) > 0) {
                        $checked = in_array($color->id, request()->get('colors')) ? 'checked' : '';
                    }
                ?>
                <input type="checkbox" class="filter" id="color-<?php echo e($color->id); ?>"
                    data-name="<?php echo e($color->name); ?>" data-id="<?php echo e($color->id); ?>"><label for="color-<?php echo e($color->id); ?>"
                    style="cursor:pointer" <?php echo e($checked); ?>><?php echo e($color->name); ?>


                    <span>(
                        <?php
                        $data = DB::table('product_variations')
                            ->join('products', 'products.id', 'product_variations.product_id')
                            ->where('product_variations.color_id', $color->id)
                            ->where('products.status', 1)
                            ->where('single_price_quantity', '!=', '');
                        if (request()->get('q') != '') {
                            $products_ids = \App\Models\Product::where('name', 'LIKE', '%' . request()->get('q') . '%')->pluck('id');
                            $data = $data->whereIn('product_variations.product_id', $products_ids);
                        }
                        echo count($data->groupBy('products.id')->get());
                        ?>
                        )</span>
                </label>
            </li>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\myaza\resources\views/store/products/colors.blade.php ENDPATH**/ ?>
<?php
$sizes = \App\Models\Size::where('status', '1')->get();
?>
<?php if(count($sizes) > 0 && $match !== null): ?>
    <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($cat_id !== 0 && $match): ?>
            <?php if(in_array($size->id, $match->sizes) && $match->is_size === 1): ?>
                <li class="active">
                    <?php
                        $checked = '';
                        if (!empty(request()->get('sizes')) && count(request()->get('sizes')) > 0) {
                            $checked = in_array($size->id, request()->get('sizes')) ? 'checked' : '';
                        }
                    ?>
                    <input type="checkbox" class="filter size_<?php echo e($size->id); ?>" id="size-<?php echo e($size->id); ?>"
                        data-name="<?php echo e($size->name); ?>" <?php echo e($checked); ?> data-id="<?php echo e($size->id); ?>"><label
                        for="size-<?php echo e($size->id); ?>" style="cursor:pointer"><?php echo e($size->name); ?><span>
                            (<?php
                            
                            $data = \DB::table('product_variations')
                                ->join('products', 'products.id', 'product_variations.product_id')
                                ->where('product_variations.size_id', $size->id)
                                ->where('products.status', 1)
                                ->where('product_variations.single_price_quantity', '!=', '');
                            if (!empty(request()->get('colors')) && count(request()->get('colors')) > 0) {
                                $data = $data->whereIn('product_variations.color_id', request()->get('colors'));
                            }
                            if ($cat_id !== 0) {
                                $data->where(function ($query) use ($cat_id) {
                                    $query
                                        ->where('products.category_id', $cat_id)
                                        ->orWhere('products.sub_category_id', $cat_id)
                                        ->orWhere('products.sub_category_child_id', $cat_id);
                                });
                            }
                            
                            $sizecount = $data->groupBy('product_variations.product_id')->get();
                            
                            if ($sizecount) {
                                echo count($sizecount);
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
                    if (!empty(request()->get('sizes')) && count(request()->get('sizes')) > 0) {
                        $checked = in_array($size->id, request()->get('sizes')) ? 'checked' : '';
                    }
                ?>
                <input type="checkbox" class="filter size_<?php echo e($size->id); ?>" id="size-<?php echo e($size->id); ?>"
                    data-name="<?php echo e($size->name); ?>" data-id="<?php echo e($size->id); ?>"><label for="size-<?php echo e($size->id); ?>"
                    style="cursor:pointer" <?php echo e($checked); ?>><?php echo e($size->name); ?>


                    <span>(
                        <?php
                        $data = DB::table('product_variations')
                            ->join('products', 'products.id', 'product_variations.product_id')
                            ->where('product_variations.size_id', $size->id)
                            ->where('products.status', 1)
                            ->where('single_price_quantity', '!=', '');
                        if (request()->get('q') != '') {
                            $products_ids = \App\Models\Product::where('name', 'LIKE', '%' . request()->get('q') . '%')->pluck('id');
                            $data = $data->whereIn('product_variations.product_id', $products_ids);
                        }
                        if (!empty(request()->get('colors')) && count(request()->get('colors')) > 0) {
                            $data = $data->whereIn('product_variations.color_id', request()->get('colors'));
                        }
                        echo count($data->groupBy('products.id')->get());
                        ?>
                        )</span>
                </label>
            </li>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\myaza\resources\views/store/products/sizes.blade.php ENDPATH**/ ?>
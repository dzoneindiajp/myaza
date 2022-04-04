
<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.coupon.title_singular')); ?>

            <a class="btn btn-secondary float-right" href="<?php echo e(route('admin.coupons.index')); ?>">
                <?php echo e(trans('global.back')); ?>

            </a>
        </div>

        <div class="card-body">
            <div class="form-group">
                
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.coupon.fields.id')); ?>

                            </th>
                            <td>
                                <?php echo e($coupon->id); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.coupon.fields.customer')); ?>

                            </th>
                            <td>
                                <?php echo e($coupon->customer->name ?? ''); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.coupon.fields.coupon_type')); ?>

                            </th>
                            <td>
                                <?php echo e(App\Models\Coupon::COUPON_TYPE_SELECT[$coupon->coupon_type] ?? ''); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.coupon.fields.user_type')); ?>

                            </th>
                            <td>
                                <?php echo e(App\Models\Coupon::USER_TYPE_SELECT[$coupon->user_type] ?? ''); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.coupon.fields.discount_type')); ?>

                            </th>
                            <td>
                                <?php echo e(App\Models\Coupon::DISCOUNT_TYPE_SELECT[$coupon->discount_type] ?? ''); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.coupon.fields.value')); ?>

                            </th>
                            <td>
                                <?php echo e($coupon->value); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.coupon.fields.valid_from')); ?>

                            </th>
                            <td>
                                <?php echo e($coupon->valid_from); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.coupon.fields.valid_to')); ?>

                            </th>
                            <td>
                                <?php echo e($coupon->valid_to); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.coupon.fields.coupon_name')); ?>

                            </th>
                            <td>
                                <?php echo e($coupon->coupon_name); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.coupon.fields.min_cart_amt')); ?>

                            </th>
                            <td>
                                <?php echo e($coupon->min_cart_amt); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.coupon.fields.code')); ?>

                            </th>
                            <td>
                                <?php echo e($coupon->code); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.coupon.fields.max_discount')); ?>

                            </th>
                            <td>
                                <?php echo e($coupon->max_discount); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.coupon.fields.image')); ?>

                            </th>
                            <td>
                                <?php if($coupon->image): ?>
                                    <a href="<?php echo e($coupon->photo->url); ?>" target="_blank"
                                        style="display: inline-block">
                                        <img src="<?php echo e($coupon->photo->thumb); ?>">
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.coupon.fields.is_unlimited')); ?>

                            </th>
                            <td>
                                <input type="checkbox" disabled="disabled" <?php echo e($coupon->is_unlimited ? 'checked' : ''); ?>>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.coupon.fields.avlb_coupons')); ?>

                            </th>
                            <td>
                                <?php echo e($coupon->avlb_coupons); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.coupon.fields.status')); ?>

                            </th>
                            <td>
                                <?php echo e(App\Models\Coupon::STATUS_SELECT[$coupon->status] ?? ''); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.coupon.fields.term_conditions')); ?>

                            </th>
                            <td>
                                <?php echo $coupon->term_conditions; ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\myaza\resources\views/admin/coupons/show.blade.php ENDPATH**/ ?>
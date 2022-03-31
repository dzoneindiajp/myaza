<?php $__env->startPush('stylesheet'); ?>
<style>
    .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    }

    .switch input {
    opacity: 0;
    width: 0;
    height: 0;
    }

    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: #2196F3;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }

    #toast-container{
        margin-top : 20px;
    }

    #toast-container > .toast {
    width: 370px !important;
    }

    .order-div{
        position: relative;
    }

    .order-no{
        position: absolute;
        left : 20px;
        top : -24px;
        font-size : 22px;
        padding : 5px;
        background-color: grey;
        color : white;
    }

    h5{
        margin : 0px;
    }

    .price-strike{
        text-decoration-line: line-through;
    }



.track {
    position: relative;
    background-color: #ddd;
    height: 5px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 10px
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}

.track .step.active:before {
    background: #FF5722
}

.track .step::before {
    height: 5px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}

.track .step.active .icon {
    background: #ee5435;
    color: #fff
}

.track .icon {
    display: inline-block;
    width: 30px;
    height: 30px;
    line-height: 30px;
    position: relative;
    border-radius: 100%;
    background: #ddd;
    margin-top :2px;
}

.track .step.active .text {
    font-weight: 400;
    color: #000
}

.track .text {
    display: block;
    margin-top: 7px
}

.date-no{
    position: absolute;
    right : 20px;
    top : -24px;
    font-size : 22px;
    padding : 5px;
    background-color: grey;
    color : white;
}

</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog_create')): ?>
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">

        </div>
    </div>
<?php endif; ?>
<div class="card">
    <div class="card-header">
        Order Information
    </div>

    <div class="card-body">
       <?php if($userord): ?>
       <div style="border: 1px solid grey;" class="order-div">
            <span class="order-no">ORDERID-<?php echo e($userord->order_id); ?></span>
            <span class="date-no">DATE - <?php echo e(date('d M Y H:i A', strtotime($userord->created_at))); ?></span>
            <?php $__currentLoopData = $userord->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row my-1" >
                <div class="col-md-2">
                  <div class="m-3">
                    <img src="<?php echo e(asset('file/'.$order->images)); ?>" class="w-100 border"/>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="m-3">
                      <h4><?php echo e($order->name); ?></h4>

                      <?php
                        $size = \App\Models\Size::find($order->size_id);
                        $color = \App\Models\Color::find($order->color_id);
                      ?>
                      <h5>
                        SKU CODE : <?php echo e(\App\Models\Product::find($order->product_id)->sku_code); ?>

                      </h5>
                      <h5>
                        Size : <?php echo e($size->name); ?>

                      </h5>
                      <h5>
                        Color :
                        <div
                           style="width : 50px; height : 12px;background-color: <?php echo e($color->value); ?>;display : inline-block ">
                        </div>(<?php echo e($color->name); ?>)
                      </h5>
                      <h5>
                        Mrp Price : <span class="price-strike">₹<?php echo e($order->mrp_price); ?></span>
                      </h5>
                      <h5>
                        Sale Price : ₹<?php echo e($order->sale_price); ?>

                      </h5>
                  </div>
                  <div class="col-md-12">

                  </div>
                </div>
                <div class="col-md-5">
                    <div class="m-3">
                        <h4>Discount</h4>
                       <h5>₹<?php echo e($order->mrp_price - $order->sale_price); ?></h5>

                    </div>

                    <?php
                      $gift = \App\Models\OrderProductGift::where('order_product_id',$order->id)->first();
                    ?>
                    <?php if($gift): ?>
                       <h6 class="m-3">
                           <span class="font-weight-bold">Gift Wrap</span><br>
                           Gift Type : <span><?php echo e($gift->gift_type); ?></span><br>
                           Sender : <span><?php echo e($gift->sender); ?></span><br>
                           Recipient : <span><?php echo e($gift->recipient); ?></span><br>
                           Message : <span style="width : 100%;"><?php echo e($gift->message); ?></span><br>
                       </h6>
                    <?php endif; ?>

                    <?php
                       $msg = \App\Models\OrderProductMessage::where('order_product_id',$order->id)->first();
                     ?>
                     <?php if($msg): ?>

                        <h6 class="m-3">
                            <span class="font-weight-bold">Message On Box</span><br>
                            Sender : <span><?php echo e($msg->sender); ?></span><br>
                            Recipient : <span><?php echo e($msg->recipient); ?></span><br>
                            Message : <span style="width : 100%;"><?php echo e($msg->message); ?></span><br>
                        </h6>
                     <?php endif; ?>
                </div>


            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-right mx-5">Discount : ₹<?php echo e($userord->order_discount->discount !== null ? $userord->order_discount->discount : 0); ?></h4>
                    <h4 class="text-right mx-5">Coupon Discount : ₹<?php echo e($userord->order_discount->coupon_discount !== null ? $userord->order_discount->coupon_discount : 0); ?></h4>
                </div>
            </div>
            <div class="row mx-5">
                <?php if($userord->status != 4): ?>
                <div class="col-md-12">
                    <h5 class="float-right mb-3 font-weight-bold text-danger my-2" style="font-size : 24px;">Total : <?php echo e($userord->amount); ?></h5>
                </div>
                <div class="col-md-12">
                    <div class="track">
                        <div class="step <?php if($userord->status >= 0): ?>active <?php endif; ?>"> <span class="icon"> <i class="fa fa-check mt-1"></i> </span> <span class="text">Order confirmed</span> </div>
                        <div class="step <?php if($userord->status >= 1): ?>active <?php endif; ?>"> <span class="icon"> <i class="fa fa-user mt-1"></i> </span> <span class="text"> Proccesed</span> </div>
                        <div class="step <?php if($userord->status >= 2): ?>active <?php endif; ?>"> <span class="icon"> <i class="fa fa-truck mt-1"></i> </span> <span class="text"> Shipped </span> </div>
                        <div class="step <?php if($userord->status === 3): ?>active <?php endif; ?>"> <span class="icon"> <i class="fa fa-archive mt-1"></i> </span> <span class="text">Completed</span> </div>
                    </div>
                </div>
                <?php else: ?>
                <div class="col-md-12">
                    <h4 class="text-center font-weight-bold" style="color: #ee5435;">Order Canceled</h4>
                </div>
                <?php endif; ?>
            </div>
        </div>
       <?php endif; ?>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myazatrendz/public_html/resources/views/admin/orders/show.blade.php ENDPATH**/ ?>
<!DOCTYPE html
 PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Email Template</title>
</head>

<body>
 <div class="wrapper"
   style="border: 10px solid #216159;  box-sizing: border-box;  float: left;  margin: auto;   width: 100%; box-sizing: border-box;">
   <div class="header"
     style=" border-bottom: 2px solid #eee;  display: table;  padding: 15px;  width: 100%; box-sizing: border-box;">
     <div class="logo" style="  float: left;">
          <a style="text-decoration: none;;" href="<?php echo e(url('/')); ?>"> <img style=" max-width: 120px; height: auto;" src="<?php echo e(asset('images/logo.png')); ?>" style=" max-height: 115px;">
       </a> </div>
       
     <div class="contact" style="float: right;"> <a style="text-decoration: none;;" href="mailto:info@myazatrendz.com"
         style="color:#216159;">info@myazatrendz.com</a>
          
       <p style=" margin-top: 0;" style="margin-top: 10px;"><a style="text-decoration: none;;" href="tel:+91 8905739577" style="color:#216159;">+91 8905739577</a></p>
     </div>
     
   </div>
   <div class="mid-content"
     style=" border-bottom: 2px solid #eee;  display: table;  padding: 0 15px 25px;  width: 100%; box-sizing: border-box;">
     <h1 style="color: #2a2a2a;  font-size: 24px;  text-align: center;  text-transform: uppercase;">Product Order
       Detail</h1>
     <div class="product-info">
       <h3
         style=" background-color: #216159;  color: #fff;  margin: 25px 0 0;  padding: 7px 10px;  text-transform: uppercase;">
         Product Info</h3>
       <table
         style=" background-color: #fff;  border-collapse: collapse;  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.08);  color: #333333;  font-size: 14px;  margin: auto;  padding: 5px;  text-decoration: none;  width: 100%; margin: 0 0 25px; ">
         <thead>
           <tr>
             <th style="padding: 7px 10px;  border: 1px solid #e0e0e0;font-weight: bold;"colspan="6" align="left">Order Details</th>
           </tr>
         </thead>
         <tbody>
           <tr>
             <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;"><strong>Order ID: </strong><?php echo e($single->order_id); ?><br>
               <strong>Order Date: </strong><?php echo date('d-m-Y', strtotime($single->created_at)); ?> <br>
               <strong>order InvoiceNO: </strong>INV06012017081111
             </td>
             <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;"><strong>Payment Method: </strong>cash<br>
               <strong>Shipping Date: </strong><?php echo date('d-m-Y', strtotime($single->created_at)); ?>
             </td>
           </tr>
         </tbody>
       </table>
       <table
         style=" background-color: #fff;  border-collapse: collapse;  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.08);  color: #333333;  font-size: 14px;  margin: auto;  padding: 5px;  text-decoration: none;  width: 100%; margin: 0 0 25px; ">
         <thead>
           <tr>
             <th style="padding: 7px 10px;  border: 1px solid #e0e0e0;font-weight: bold;"align="left"> Shipping Address: </th>
           </tr>
         </thead>
         <tbody>
           <tr align="left">
             <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;"><?php echo e($single->users ? $single->users->name : ""); ?><br>
               Email: <?php echo e($single->users ? $single->users->email : ""); ?> Phone: <?php echo e($single->users ? $single->users->mobile : ""); ?><br>
               
               <?php echo e($single->address); ?><br>
             </td>
           </tr>
         </tbody>
       </table>
<table style=" background-color: #fff;  border-collapse: collapse;  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.08);  color: #333333;  font-size: 14px;  margin: auto;  padding: 5px;  text-decoration: none;  width: 100%; margin: 0 0 25px; ">
       <thead>
         <tr>
           <th style="padding: 7px 10px;  border: 1px solid #e0e0e0;font-weight: bold;"scope="col">Image</th>
           <th style="padding: 7px 10px;  border: 1px solid #e0e0e0;font-weight: bold;"scope="col">Description</th>
           <th style="padding: 7px 10px;  border: 1px solid #e0e0e0;font-weight: bold;"scope="col">Quantity</th>
           <th style="padding: 7px 10px;  border: 1px solid #e0e0e0;font-weight: bold;"scope="col">Price</th>
         </tr>
       </thead>
       <tbody>
           
       <?php if($lists): ?>
           <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php
                   $product = \App\Models\Product::where("id", $list->product_id)->first();
               ?>
               <tr>
                   <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;" style="height:60px;width:60px"><img style="width: 75px; max-width: 100%; height: auto;" src="<?php echo e(asset('file/'. $list->images)); ?>"> </td>
                   <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;">
                     <p style=" margin-top: 0;"><?php echo e($product->name); ?> </p>
                     <p style=" margin-top: 0;">Size : <?php echo e($list->size ? $list->size->name : ""); ?></p>
                     <p style=" margin-top: 0;">Color : <?php echo e($list->color ? $list->color->name : ""); ?></p>
                   </td>
                   <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;"><?php echo e($list->qty); ?></td>
                   <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;"><?php echo e($list->sale_price); ?></td>
                 </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <?php endif; ?>
      
           
       </tbody>
       <tfoot>
           <tr>
             <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;" colspan="3" style="text-align:right;"><strong>Sub-Total</strong></td>
             <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;" class="text-right"><span class="price-new"> ₹   <?php echo e($single->total_amount); ?></span> </td>
           </tr>
           <tr>
             <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;" colspan="3" style="text-align:right;"><strong>Flat Shipping Rate</strong></td>
             <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;" class="text-right"><span class="price-new"> ₹  <?php echo e($single->shipping); ?></span> </td>
           </tr>
           <tr>
             <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;" colspan="3" style="text-align:right;"><strong>Tax Amount</strong></td>
             <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;" class="text-right"><span class="price-new">  ₹ </span> </td>
           </tr>
           <tr>
             <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;" colspan="3" style="text-align:right;"><strong>Total Net Payable Amount</strong></td>
             <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;" class="text-right"><span class="price-new">  ₹ <?php echo e($single->total_amount); ?></span> </td>
           </tr>
         </tfoot>
   </table>

   <table style=" background-color: #fff;  border-collapse: collapse;  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.08);  color: #333333;  font-size: 14px;  margin: auto;  padding: 5px;  text-decoration: none;  width: 100%;">
       <thead>
         <tr>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;">Order Date</td>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;">Order Delivery Status</td>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;">About Order</td>
         </tr>
       </thead>
       <tbody>
         <tr>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;">
            <?php echo date('d-m-Y', strtotime($single->created_at)); ?></td>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;">
            <?php
                $order_status = "Confirmed";
                if($single->status == 1){
                    $order_status = "Proccessed";
                }
                if($single->status == 2){
                    $order_status = "Shipped";
                }
                if($single->status == 3){
                    $order_status = "Completed";
                }
                if($single->status == 4){
                    $order_status = "Refunded";
                }
            ?>
            <?php echo e(ucfirst($order_status)); ?>

        </td>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;"></td>
         </tr>
       </tbody>
     </table>

   </div>
   <div class="customer-info">
     <h3
       style=" background-color: #216159;  color: #fff;  margin: 25px 0 0;  padding: 7px 10px;  text-transform: uppercase;">
       Customer Info</h3>
     <table
       style=" background-color: #fff;  border-collapse: collapse;  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.08);  color: #333333;  font-size: 14px;  margin: auto;  padding: 5px;  text-decoration: none;  width: 100%;">
       <tbody>
         <tr>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;">Name</td>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;"><?php echo e($single->users ? $single->users->name : ""); ?></td>
         </tr>
         
         <tr>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;">Address</td>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;"> <?php echo e($single->address); ?></td>
         </tr>
         <tr>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;">City</td>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;"> <?php echo e($single->users && $single->users->city ? $single->users->city->name : ""); ?></td>
         </tr>
         <tr>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;">State</td>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;"> <?php echo e($single->users && $single->users->stat ? $single->users->stat->name : ""); ?></td>
         </tr>
         <tr>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;">Zip code</td>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;"> <?php echo e($single->users ? $single->users->postcode : ""); ?></td>
         </tr>
         <tr>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;">Phone</td>
           <td style="border: 1px solid #e0e0e0;  padding: 7px 10px;"> <?php echo e($single->users ? $single->users->mobile : ""); ?></td>
         </tr>
         
       </tbody>
     </table>
   </div>
 </div>
 <!--container-->
 <div class="footer" style="padding: 15px; box-sizing: border-box;">
    <div>myazatrendz Jaipur <br>
       Address: F-105, EPIP<br>
       Garment Zone, Sitapura<br>
       Industrial Area, Sitapura jaipur<br>
                       State: Rajasthan<br>
                       Contact: 8905739577<br>
       <a style="text-decoration: none;;" href="mailto:info@myazatrendz.com" target="_blank">info@myazatrendz.com</a>
     </div>
   <div class="copyright" style="text-align:center; padding-top: 15px;">Copyright 2021 myazatrendz Jaipur . All Rights
     Reserved </div>
   <!--footer-->
 </div>
 <!--wrapper-->
</div>
<!--wrapper-->
</body>
</html>
   
<?php /**PATH D:\xampp\htdocs\myaza\resources\views/store/invoice/invoice_download.blade.php ENDPATH**/ ?>
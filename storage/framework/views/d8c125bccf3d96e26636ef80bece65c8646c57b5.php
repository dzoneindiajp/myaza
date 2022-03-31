<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            Import
            <a class="btn btn-secondary float-right" href="<?php echo e(route('admin.products.index')); ?>">
                <?php echo e(trans('global.back')); ?>

            </a>
        </div>

        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.products.storeimport')); ?>" enctype="multipart/form-data" id="product-form">
                <?php echo csrf_field(); ?>

                <div class="accordion" id="accordionProduct">
                    <div class="card">
                        <div class="card-header" id="productDetails">
                            <button class="btn btn-link text-dark font-weight-bold btn-block text-left text-uppercase"
                                type="button" data-toggle="collapse" data-target="#productDetail" aria-expanded="true"
                                aria-controls="productDetail">
                                Import Products
                            </button>
                        </div>

                        <div id="productDetail" class="collapse show" aria-labelledby="productDetails"
                            data-parent="#accordionProduct">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label class="required" for="name">
                                            Upload CSV
                                        </label>
                                        <input class="form-control" type="file" name="csv" id="csv" required >
                                        <a href="<?php echo e(asset('sample/product_import .csv')); ?>">Download Sample File</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-right">
                        <button class="btn btn-success" id="submit-btn" type="submit">
                            Import
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myazatrendz/public_html/resources/views/admin/products/import.blade.php ENDPATH**/ ?>
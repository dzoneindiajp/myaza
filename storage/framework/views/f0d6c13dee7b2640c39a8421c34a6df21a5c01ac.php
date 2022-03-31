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
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('stylesheet'); ?>
  <style>
      #select-bg{
            background-color : white;
            width : 100%;
        }
  </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row bg-light my-2" id="select-bg">
        <div class="col-12 text-center bg-light">
            <button class="btn btn-lg btn-primary  border" style="border-radius : 25px;" id="all">Products</button>
            <button class="btn btn-lg btn-default border" style="border-radius : 25px;" id="bulk">Bulk Products</button>
        </div>
    </div>
    <div class="card" style="display : block;" id="normal-products">
        <div class="card-header">
            <?php echo e(trans('cruds.product.title_singular')); ?> <?php echo e(trans('global.list')); ?>

            <div class="float-right">
                <a class="btn btn-primary" href="<?php echo e(route('admin.products.create')); ?>">
                    <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.product.title_singular')); ?>

                </a>
                <a class="btn btn-primary" href="<?php echo e(route('admin.products.import')); ?>">
                    Import
                </a>
            </div>
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Product">
                <thead class="thead-dark">
                    <tr class="text-center">
                        
                        <th>
                            <?php echo e(trans('cruds.product.fields.id')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.category')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.name')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.sku_code')); ?>

                        </th>
                        
                        <th>
                            <?php echo e(trans('cruds.product.fields.mrp_price')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.sales_price')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.in_stock')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.has_varient')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.front_image')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.view_count')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.status')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.action')); ?>

                        </th>
                        
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="card"  style="display : none;" id="bulk-products">
        <div class="card-header">
            <?php echo e(trans('cruds.product.title_bulk')); ?> <?php echo e(trans('global.list')); ?>

            <div class="float-right">
                <a class="btn btn-primary" href="<?php echo e(route('admin.products.create')); ?>">
                    <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.product.title_bulk')); ?>

                </a>
            </div>
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Product">
                <thead class="thead-dark">
                    <tr class="text-center">
                        
                        <th>
                            <?php echo e(trans('cruds.product.fields.id')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.category')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.name')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.sku_code')); ?>

                        </th>
                        
                        <th>
                            <?php echo e(trans('cruds.product.fields.mrp_price')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.sales_price')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.in_stock')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.has_varient')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.front_image')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.view_count')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.status')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.product.fields.action')); ?>

                        </th>
                        
                    </tr>
                </thead>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
    <script>
        $('#all').click(function(){
           $(this).removeClass('btn-default');
           $(this).addClass('btn-primary');
           $('#bulk').removeClass('btn-primary');
           $('#bulk').addClass('btn-default');
           $('#normal-products').show();
           $('#bulk-products').hide();
        });

        $('#bulk').click(function(){
           $(this).removeClass('btn-default');
           $(this).addClass('btn-primary');
           $('#all').removeClass('btn-primary');
           $('#all').addClass('btn-default');
           $('#normal-products').hide();
           $('#bulk-products').show();
        });
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_delete')): ?>
                let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>';
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "<?php echo e(route('admin.products.massDestroy')); ?>",
                    className: 'btn-danger',
                    action: function (e, dt, node, config) {
                        var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                            return entry.id
                        });

                        if (ids.length === 0) {
                            alert("<?php echo e(trans('global.datatables.zero_selected')); ?>");

                            return
                        }

                        if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
                            $.ajax({
                                headers: {'x-csrf-token': _token},
                                method: 'POST',
                                url: config.url,
                                data: { ids: ids, _method: 'DELETE' }
                            })
                            .done(function () { location.reload() })
                        }
                    }
                }

                dtButtons.push(deleteButton)
            <?php endif; ?>

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                scrollX: true,
                aaSorting: [],
                ajax: "<?php echo e(route('admin.products.index')); ?>",
                columns: [
                    // {
                    //     data: 'placeholder',
                    //     name: 'placeholder'
                    // },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'category_name',
                        name: 'category.name'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'sku_code',
                        name: 'sku_code'
                    },
                    // {
                    //     data: 'brand_name',
                    //     name: 'brand.name'
                    // },
                    {
                        data: 'mrp_price',
                        name: 'mrp_price'
                    },
                    {
                        data: 'sales_price',
                        name: 'sales_price'
                    },
                    {
                        data: 'in_stock',
                        name: 'in_stock'
                    },
                    {
                        data: 'has_varient',
                        name: 'has_varient',
                        sortable: false,
                        searchable: false
                    },
                    {
                        data: 'front_image',
                        name: 'front_image',
                        sortable: false,
                        searchable: false
                    },
                    {
                        data: 'view_count',
                        name: 'view_count'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'actions',
                        name: '<?php echo e(trans('global.actions')); ?>',
                        sortable: false,
                        searchable: false
                    }
                ],
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            };

            var table = $('.datatable-Product').DataTable(dtOverrideGlobals);

            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true))
                .DataTable()
                .columns.adjust();
            });


            $(document).on('click','#is-attribute-chk', function(){
                var id =  $(this).attr('data-id');
                var status = '';
                if ($(this).is(':checked')) {status = 1;}
                else{ status = 0;}

                $.ajax({
                    type:'POST',
                    url:"<?php echo e(route('admin.product.status.update')); ?>",
                    data:{id:id, status:status},
                    success:function(data){
                        if(data.success){
                            toastr.success('Success!', data.message,{
                            positionClass: 'toast-top-center',
                            iconClass:'toast-success',
                            });
                        }
                        else{
                            toastr.warning('Warning!', data.message,{
                            positionClass: 'toast-top-center',
                            iconClass:'toast-warning',
                            });
                            table.ajax.reload(null, false);
                        }
                    },
                    error : function(err){
                        toastr.error('Error!', data.message,{
                            positionClass: 'toast-top-center',
                            iconClass:'toast-error',
                        });
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myazatrendz/public_html/resources/views/admin/products/index.blade.php ENDPATH**/ ?>
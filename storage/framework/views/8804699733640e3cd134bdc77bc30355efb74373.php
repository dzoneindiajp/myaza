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


<?php $__env->startSection('content'); ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_create')): ?>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-primary" href="<?php echo e(route('admin.subcategories.create', ['id' => $category->id ?? 0])); ?>">
                    <?php echo e(trans('global.add')); ?> <?php echo e($category->parent_id == 0 ? trans('cruds.subcategory.title_singular'):trans('cruds.subcategory.title_singular_second')); ?>

                </a>
            </div>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('cruds.subcategory.title_singular')); ?>

            <?php echo e(trans('global.list')); ?>

            (
                <strong>
                    <?php echo e($category->name ?? ''); ?>

                </strong>
            )
            <a class="btn btn-secondary float-right mr-2" href="<?php echo e(route('admin.categories.index')); ?>">
                <?php echo e(trans('global.back_to_category')); ?>

            </a>
        </div>
        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Category">
                <thead>
                    <tr class="text-center">
                        <th>
                            <?php echo e(trans('cruds.subcategory.fields.id')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.subcategory.fields.name')); ?>

                        </th>

                        <?php if($category->parent_id == 0): ?>
                        <th>
                            <?php echo e(trans('cruds.category.fields.childs')); ?>

                        </th>
                        <?php endif; ?>
                        <th>
                            <?php echo e(trans('cruds.subcategory.fields.image')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.subcategory.fields.size_chart')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.subcategory.fields.status')); ?>

                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="text-center">
                            <td>
                                <?php echo e($row->id ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($row->name ?? ''); ?>

                            </td>
                            <?php if($category->parent_id == 0): ?>
                            <td>
                                <a href="<?php echo e(route('admin.subcategories.index', ['id' => $row->id])); ?>" class="btn btn-outline-info">
                                    <?php echo e(trans('cruds.category.fields.childs')); ?>

                                    (<?php echo e($row->subcategories->count()); ?>)
                                </a>
                            </td>
                            <?php endif; ?>
                            <td>
                                <a href="<?php echo e($row->image_url); ?>" target="_blank">
                                    <img src="<?php echo e($row->thumb_url ?? ''); ?>" width="50px" height="50px" />
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e($row->size_chart_url); ?>" target="_blank">
                                    <img src="<?php echo e($row->size_chart_url ?? ''); ?>" width="50px" height="50px" />
                                </a>
                            </td>
                            <td>
                                <?php $status =  App\Models\Category::STATUS_SELECT[$row->status] ;

                                $is_attribute = $status == 'Active' ? 'checked' : '';

                                ?>
                                        <div class="text-center">
                                            <label class="switch">
                                                <input type="checkbox"  <?php echo $is_attribute; ?> id="is-attribute-chk" data-id="<?php echo e($row->id); ?>">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                            </td>
                            <td>
                                
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_edit')): ?>
                                    <a class="btn btn-m btn-info" href="<?php echo e(route('admin.categories.edit', $row->id)); ?>">
                                        <i class="fas fa-sm fa-edit"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_delete')): ?>
                                    <form action="<?php echo e(route('admin.categories.destroy', $row->id)); ?>" method="POST"
                                        onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <button type="submit" class="btn  btn-danger"
                                            ><i class="fa fa-trash"></i></button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td class="text-center" colspan="10">
                            No record found!
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
    <script>
        $(function() {
            <?php if(\Session::has('success')): ?>
                toastr.success('Success!', "<?php echo e(\Session::get('success')); ?>",{
                    positionClass: 'toast-top-center',
                    iconClass:'toast-success',
                });
            <?php endif; ?>

            <?php if(\Session::has('warning')): ?>
                toastr.warning('Warning!', "<?php echo e(\Session::get('warning')); ?>",{
                    positionClass: 'toast-top-center',
                    iconClass:'toast-warning',
                });
            <?php endif; ?>
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_delete')): ?>
                let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>';
                let deleteButton = {
                text: deleteButtonTrans,
                url: "<?php echo e(route('admin.categories.massDestroy')); ?>",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                return entry.id
                });

                if (ids.length === 0) {
                alert('<?php echo e(trans('global.datatables.zero_selected')); ?>')

                return
                }

                if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
                $.ajax({
                headers: {'x-csrf-token': _token},
                method: 'POST',
                url: config.url,
                data: { ids: ids, _method: 'DELETE' }})
                .done(function () { location.reload() })
                }
                }
                }
                dtButtons.push(deleteButton)
            <?php endif; ?>


            $(document).on('click','#is-attribute-chk', function(){
                var id =  $(this).attr('data-id');
                $this = $(this);
                var status = '';
                if ($(this).is(':checked')) {status = 1;}
                else{ status = 0;}

                $.ajax({
                    type:'POST',
                    url:"<?php echo e(route('admin.categories.status.update')); ?>",
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

                            $this.prop('checked', true);
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myazatrendz/public_html/resources/views/admin/categories/subcategories.blade.php ENDPATH**/ ?>
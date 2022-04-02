
<?php $__env->startSection('content'); ?>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-primary" href="<?php echo e(route('admin.weight.create')); ?>">
                    Add Weight Range
                </a>
            </div>
        </div>
    <div class="card">
        <div class="card-header">
            Weight Range
        </div>
        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Category text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>
                            Id
                        </th>
                        <th>
                            From(Kg)
                        </th>
                        <th>
                            To(Kg)
                        </th>
                        <th>
                            <?php echo app('translator')->get('global.action'); ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($row->id ?? ''); ?></td>
                            <td>
                            <?php echo e($row->weight_from); ?>

                            </td>
                            <td>
                            <?php echo e($row->weight_to); ?>

                            </td>
                            <td>
                                <a class="btn btn-warning" href="<?php echo e(route('admin.weight.edit', $row->id)); ?>" title="<?php echo e(trans('global.edit')); ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn-danger" onclick="return confirm('<?php echo e(trans('global.areYouSure')); ?>');" href="<?php echo e(route('admin.weight.delete', $row->id)); ?>" title="<?php echo e(trans('global.delete')); ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                        
                                <!-- <form action="<?php echo e(route('admin.weight.destroy', $row->id)); ?>" method="POST"
                                    onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');"
                                    style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <button type="submit" class="btn btn-danger" title="<?php echo e(trans('global.delete')); ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form> -->
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4">
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
                .done(function (data) {

                    location.reload()
                    })
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\myaza\resources\views/admin/weight/index.blade.php ENDPATH**/ ?>
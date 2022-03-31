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

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-primary" href="<?php echo e(route('admin.testimonials.create')); ?>">
                <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.testimonial.title_singular')); ?>

            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('cruds.testimonial.title_singular')); ?> <?php echo e(trans('global.list')); ?>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Testimonial">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th width="10">

                        </th>
                        <th>
                            <?php echo e(trans('cruds.testimonial.fields.id')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.testimonial.fields.full_name')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.testimonial.fields.city')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.testimonial.fields.image')); ?>

                        </th>
                        <th style="width : 35%;">
                            <?php echo e(trans('cruds.testimonial.fields.description')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.testimonial.fields.status')); ?>

                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($testimonial->id); ?>" class="text-center">
                            <td>

                            </td>
                            <td>
                                <?php echo e($testimonial->id ?? ''); ?>

                            </td>
                            <td>
                                <span class="badge badge-secondary p-2"><?php echo e($testimonial->full_name ?? ''); ?></span>
                            </td>

                            <td>
                                <span class="badge badge-secondary p-2"><?php echo e($testimonial->city ?? ''); ?></span>
                            </td>
                            <td>
                                <?php if($testimonial->icon): ?>
                                    <a href="<?php echo e(asset("file/$testimonial->image")); ?>" target="_blank" style="display: inline-block">
                                        <img src="<?php echo e(asset("file/$testimonial->image")); ?>" style="width : 70px;border : 2px solid lightgray; border-radius : 10px;">
                                    </a>
                                <?php endif; ?>
                            </td>
                            <td class="text-left">
                                <p class="text-secondary"><?php echo e($testimonial->description ?? ''); ?></p>
                            </td>
                            <td>
                                <?php
                                    $status = App\Models\Testimonial::STATUS_SELECT[$testimonial->status] ;
                                    $is_attribute = $status === 'Active' ? 'checked' : ''; ?>
                                    <div class="text-center">
                                        <label class="switch">
                                            <input type="checkbox"  <?php echo e($is_attribute); ?> id="is-attribute-chk" data-id="<?php echo e($testimonial->id); ?>">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                            </td>
                            <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial_show')): ?>
                                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.testimonials.show', $testimonial->id)); ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial_edit')): ?>
                                    <a class="btn btn-sm btn-info" href="<?php echo e(route('admin.testimonials.edit', $testimonial->id)); ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial_delete')): ?>
                                    <form action="<?php echo e(route('admin.testimonials.destroy', $testimonial->id)); ?>" method="POST" onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <button type="submit" class="btn btn-sm btn-danger" >
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                <?php endif; ?>

                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
    $(function () {
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial_delete')): ?>
  let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "<?php echo e(route('admin.testimonials.massDestroy')); ?>",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Testimonial:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

            $(document).on('click','#is-attribute-chk', function(){
                var id =  $(this).attr('data-id');
                var status = '';
                if ($(this).is(':checked')) {status = 1;}
                else{ status = 0;}

                $.ajax({
                    type:'POST',
                    url:"<?php echo e(route('admin.testimonials.status.update')); ?>",
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

})

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myazatrendz/public_html/resources/views/admin/testimonials/index.blade.php ENDPATH**/ ?>
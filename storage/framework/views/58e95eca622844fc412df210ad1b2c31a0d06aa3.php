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
            <a class="btn btn-primary" href="<?php echo e(route('admin.sizes.create')); ?>">
                <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.size.title_singular')); ?>

            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('cruds.size.title_singular')); ?> <?php echo e(trans('global.list')); ?>

    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Size">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th width="10">

                    </th>
                    <th>
                        <?php echo e(trans('cruds.size.fields.id')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.size.fields.name')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.size.fields.value')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.size.fields.status')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.size.fields.action')); ?>

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
    $(function () {
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('size_delete')): ?>
  let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "<?php echo e(route('admin.sizes.massDestroy')); ?>",
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "<?php echo e(route('admin.sizes.index')); ?>",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'value', name: 'value' },
{ data: 'status', name: 'status' },
{ data: 'actions', name: '<?php echo e(trans('global.actions')); ?>' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  var table = $('.datatable-Size').DataTable(dtOverrideGlobals);
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
                url:"<?php echo e(route('admin.size.status.update')); ?>",
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myazatrendz/public_html/resources/views/admin/sizes/index.blade.php ENDPATH**/ ?>
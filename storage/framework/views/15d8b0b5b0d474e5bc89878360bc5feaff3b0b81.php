<?php $__env->startSection('content'); ?>

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-primary" href="<?php echo e(route('admin.stores.create')); ?>">
                <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.store.title_singular')); ?>

            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('cruds.store.title_singular')); ?> <?php echo e(trans('global.list')); ?>

    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Store">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th width="10">

                    </th>
                    <th>
                        <?php echo e(trans('cruds.store.fields.id')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.store.fields.name')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.store.fields.contact_person_name')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.store.fields.contact_person_number')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.store.fields.address')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.store.fields.store_pin_code')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.store.fields.store_contact')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.store.fields.open_time')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.store.fields.pin_codes')); ?>

                    </th>
                    <th>
                        Action
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
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('store_delete')): ?>
  let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "<?php echo e(route('admin.stores.massDestroy')); ?>",
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
    ajax: "<?php echo e(route('admin.stores.index')); ?>",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'contact_person_name', name: 'contact_person_name' },
{ data: 'contact_person_number', name: 'contact_person_number' },
{ data: 'address', name: 'address' },
{ data: 'store_pin_code', name: 'store_pin_code' },
{ data: 'store_contact', name: 'store_contact' },
{ data: 'open_time', name: 'open_time' },
{ data: 'pin_codes', name: 'pin_codes' },
{ data: 'actions', name: '<?php echo e(trans('global.actions')); ?>' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Store').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\myazatrendz\resources\views/admin/stores/index.blade.php ENDPATH**/ ?>
<div class="text-center" style="width : 110px;">
<?php if(isset($viewGate)){ ?>

    <a class="btn btn-sm btn-info my-1" href="<?php echo e(route('admin.' . $crudRoutePart . '.show', $row->id)); ?>"
        title="<?php echo e(trans('global.view')); ?>">
        <i class="fas fa-eye"></i>
    </a>

<?php } ?>

    <a class="btn btn-sm btn-warning my-1" href="<?php echo e(route('admin.' . $crudRoutePart . '.edit', $row->id)); ?>"
        title="<?php echo e(trans('global.edit')); ?>">
        <i class="fas fa-edit"></i>
    </a>

    <form action="<?php echo e(route('admin.' . $crudRoutePart . '.destroy', $row->id)); ?>" method="POST"
        onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <button type="submit" class="btn btn-sm btn-danger my-1" title="<?php echo e(trans('global.delete')); ?>">
            <i class="fas fa-trash"></i>
        </button>
    </form>

</div>
<?php /**PATH D:\xampp\htdocs\myazatrendz\resources\views/partials/datatablesActions.blade.php ENDPATH**/ ?>
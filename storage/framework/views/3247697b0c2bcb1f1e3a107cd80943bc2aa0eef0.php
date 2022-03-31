<?php
  use App\Models\Images;
?>

<?php $__env->startPush('stylesheet'); ?>


<style>
    #toast-container{
        margin-top : 20px;
    }

    #toast-container > .toast {
    width: 370px !important;
    }

    .thumbnail-imgess{
        vertical-align: middle;
        border : 1px solid lightgray;
        border-radius : 5px 5px 0px 0px !important;
    }

    .margin-bottomset:hover{
        transform: scale(1.05);
    }

    .box-images{
        padding : auto;
        width : 100%;
    }
    .img-thubnail img{
        vertical-align: middle;
    }

    #add-image-body{
        /* min-height : 300px;
        max-height : auto; */
    }

    input[type="checkbox"][id^="myCheckbox"] {
    display: none;
    }

    [id^="myLabel"]  {
    border: 1px solid #fff;
    padding: 2px;
    display: block;
    position: relative;
    margin: 2px;
    cursor: pointer;
    }

    [id^="myLabel"]:before {
    background-color: white;
    color: white;
    content: " ";
    display: block;
    border-radius: 50%;
    border: 1px solid grey;
    position: absolute;
    top: -5px;
    left: -5px;
    width: 25px;
    height: 25px;
    text-align: center;
    line-height: 28px;
    transition-duration: 0.4s;
    transform: scale(0);
    }

    [id^="myLabel"] img {

    transition-duration: 0.2s;
    transform-origin: 50% 50%;
    }

    input[type="checkbox"][id^="myCheckbox"]:checked + label {
    border-color: #ddd;
    }

    input[type="checkbox"][id^="myCheckbox"]:checked + label:before {
    content: "✓";
    background-color: grey;
    transform: scale(1);
    }

    input[type="checkbox"][id^="myCheckbox"]:checked + label img {
    transform: scale(0.9);
    /* box-shadow: 0 0 5px #333; */
    z-index: -1;
    }
    .modal-xl {
            width: 60%;
            max-width:1200px;
     }

    .modal-body{
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }
</style>
<?php $__env->stopPush(); ?>

<div class="modal fade take-image-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content" id="add-image-body">
         <div class="modal-header text-center">
            <h5 class="modal-title w-100">Media Browser</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#home">All Media</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#menu1">Add Media</a>
                </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane container active" id="home">
                    <div class="row" id="media-dybox">
                        <ul class="nav nav-tabs mt-4">
                          <li class="nav-item media-tabs">
                            <a class="nav-link active" data-id="0" data-toggle="tab" href="#unctg">Uncategorised</a>
                          </li>
                          <?php foreach($cat as $r=>$c){ if($r>0){ ?>
                            <li class="nav-item media-tabs">
                                <a class="nav-link" data-id="<?php echo $r; ?>" data-toggle="tab" href="#catf_<?php echo $r; ?>"><?php echo ucfirst($c); ?></a>
                            </li>
                          <?php }} ?>
                        </ul>
                        <div class="tab-content">
                             <div class="tab-pane container active" id="unctg">
                                <div class="row">
                                    
                                </div>
                             </div>
                          <?php foreach($cat as $r=>$c){ if($r>0){ ?>
                            <div class="tab-pane container main-media-parent"  id="catf_<?php echo $r; ?>"></div>
                          <?php }} ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane container fade" id="menu1">
                    <span class="text-warning text-center d-block py-2" style="font-size: 16px; ">* Upload image with size should be maximum 200px.</span>
                    <div class="upload-box h-100 mt-2" >
                        <form action="<?php echo e(route('admin.media.popstore')); ?>" method="POST" enctype="multipart/form-data" class="dropzone w-100 border p-5" id='image-upload'>
                            <?php echo csrf_field(); ?>
                            <div class="w-100">
                                <h3 class="text-center">Upload Multiple Image By Click On Box</h3>
                            </div>
                        </form>
                    </div>
                </div>
              </div>


          </div>
      </div>
    </div>
</div>

<?php $__env->startPush('scrips'); ?>
<script>

</script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\xampp\htdocs\myaza\resources\views/admin/upload/multiple_next.blade.php ENDPATH**/ ?>
<style type="text/css">
  .preview-image {
    width: 80px; 
    height: 80px; 
    margin: 5px;

}
.preview-pic{
  height: 50vh;
}
.imagePreview{
      margin: auto;
    text-align: center;
    padding: 20px;
}
#picPreview{
  zoom:50%;
}
</style>
<form class="form-horizontal form-label-left" method="POST" id="form-target" action="<?=$link;?>"  enctype="multipart/form-data">
    <div class="page-body pb-4 pb-xl-6">
          <div class="row g-0">
            <div class="col-lg-12 col-12 pe-lg-2">
              <div class="card mb-2 p-4 p-sm-5">
                <div class="card-head d-flex align-items-center justify-content-between mb-5 mb-sm-6">
                  <div class="title title-color green"><?=$title?></div>
                  <a class="btn-stroke btn-small" href="<?=base_url('blog')?>">
                    <svg class="icon icon-arrow-left me-1"> 
                      <use xlink:href="#icon-arrow-left"></use>
                    </svg><span>Back</span></a>
                </div>
                <div class="card-body p-0">
                 

                
                  <div class="row g-3">
                      <div class="row g-3">
                      <div class="col-12 col-sm-12">
                          <div class="caption mb-3">Displayed Image</div>
                          <div class="" style="border: 1px solid #d4d4d4;padding: 20px;background-color: #80808063;text-align: center;">
                             <img id="banner" class=" w-25" style="margin:auto;height: 350px;" src="<?=($action =='edit') ?$GLOBALS['uploads'].$dataBannerPromotion['bannerp_images'] : $GLOBALS['uploads'].'banner/noimg.png';?>">
                          </div>
                      </div>
                      
                    </div>

                      <div class="col-12 col-sm-12">
                          <div class="caption mb-3">Banner Image</div>
                          <div class="input-file mb-5 mb-sm-3">
                              <button class="btn-stroke" id="picButton">
                                  <svg class="icon icon-upload me-2"> 
                                      <use xlink:href="#icon-upload"></use>
                                  </svg>Click or drop image
                              </button>
                              <input type="file" id="picInput" name="input_banner_images">

                              
                          </div>
                      </div>
                    </div>

                 
                  <br>
           
                </div>

              </div>
           </div>
       </div>
    </div>
    </div>
     <div class="card page-footer p-4 p-sm-5 px-xl-7mt-auto">
          <div class="container p-0 d-block d-sm-flex">
            <?php if($action !='add'){ ?>
            <div class="d-flex align-items-center mb-4 mb-sm-0">
              <svg class="icon icon-check-all fill-shades-2 me-3">  
                <use xlink:href="#icon-check-all"></use>
              </svg><span class="caption pe-1">Last update</span>
              <?php 
              $time = $dataBannerPromotion['bannerp_updated'];
                if ($time != '' || $time != null){ 
                  $times = date('M d, Y \a\t h:i A', strtotime($dataBannerPromotion['bannerp_updated']));
                }else{
                  $times = date('M d, Y \a\t h:i A', strtotime($dataBannerPromotion['bannerp_added']));
                } 
              ?>

              <span class="caption text-reset"><?=$times?></span>
            </div>
            <?php }?>
            <div class="d-flex ms-auto">
              <a class="btn-stroke flex-grow-1" onclick="window.history.back();">Close</a>

              <?php if($action=='add'){ ?>
                <input type="submit" name="submit" value="Save" class="btn ms-2 flex-grow-1">
              <?php }else{?>
                <input type="submit" name="update" value="Update now" class="btn ms-2 flex-grow-1">
              <?php }?>
            </div>
          </div>
        </div>
</form>


<script type="text/javascript">
// Add event listener to the file input
document.getElementById('picInput').addEventListener('change', function(event) {
    // Get the selected file
    var file = event.target.files[0];

    // Check if a file is selected
    if (file) {
        // Create a FileReader object
        var reader = new FileReader();

        // Set onload callback function
        reader.onload = function(e) {
            // Update the src attribute of the img element with the data URL of the selected file
            document.getElementById('banner').src = e.target.result;
        };

        // Read the file as data URL
        reader.readAsDataURL(file);
    }
});


</script>
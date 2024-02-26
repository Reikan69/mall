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
                <div class="card-head d-flex align-items-center justify-desc-between mb-5 mb-sm-6">
                  <div class="title title-color green"><?=$title?></div>
                  <a class="btn-stroke btn-small" href="<?=base_url('Video')?>">
                    <svg class="icon icon-arrow-left me-1"> 
                      <use xlink:href="#icon-arrow-left"></use>
                    </svg><span>Back</span></a>
                </div>
                <div class="card-body p-0">
                 

                  <div class="row g-3">
                    <div class="col-6 col-sm-6">
                       <div class="caption d-flex align-items-center mb-3 text-reset fs-8">Video Name
                        <div class="info-tooltip ms-1" data-bs-toggle="tooltip" title="Maximum 100 characters. No HTML or emoji allowed">
                          <svg class="icon icon-info">  
                            <use xlink:href="#icon-info"></use>
                          </svg>
                        </div>
                    </div>
                      <input name="input_video_title" class="form-control mb-5 mb-sm-6" type="text" <?=($action == 'add')? 'required=""': '';?> value="<?=($action != 'add')? $dataVideo['video_title']: '';?>"  placeholder="Value">
                    </div>
                      <div class="col-6 col-sm-6">
                         <div class="caption d-flex align-items-center mb-3 text-reset fs-8">Date Post
                          <div class="info-tooltip ms-1" data-bs-toggle="tooltip" title="Maximum 100 characters. No HTML or emoji allowed">
                            <svg class="icon icon-info" onclick="return false;">    
                              <use xlink:href="#icon-info"></use>
                            </svg>
                          </div>
                        </div>
                       
                         <div class="input-group">
                              <input id="datepick" class="form-control rounded-2" type="text" readonly="" value="<?=($action != 'add')? date('d F, Y h:i A', strtotime($dataVideo['video_post'])) : '';?>">
                              <input id="datepickValue" class="form-control rounded-2" type="hidden" name="input_video_post" value="<?=($action != 'add')? $dataVideo['video_post'] : '';?>">
                              <a class="input-group-text" data-bs-toggle="modal" data-bs-target="#modal-datepicker">
                                <svg class="icon icon-calendar">  
                                  <use xlink:href="#icon-calendar"></use>
                                </svg>
                              </a>
                          </div>
                      </div>
                     
                    </div>
                    <div class="row g-3">
                      <div class="col-12 col-sm-12">
                         <div class="caption d-flex align-items-center mb-3 text-reset fs-8">Video Url
                          <div class="info-tooltip ms-1" data-bs-toggle="tooltip" title="Maximum 100 characters. No HTML or emoji allowed">
                            <svg class="icon icon-info">  
                              <use xlink:href="#icon-info"></use>
                            </svg>
                          </div>
                      </div>
                        <input id="videoUrl" name="input_embedlink" class="form-control mb-5 mb-sm-6" type="text" <?=($action == 'add')? 'required=""': '';?> value="<?=($action != 'add')? $dataVideo['video_embedlink']: '';?>"  placeholder="Value">
                      </div>
                        <div class="col-12 col-sm-12">
                           <div class="caption d-flex align-items-center mb-3 text-reset fs-8">Video Preview
                            <div class="info-tooltip ms-1" data-bs-toggle="tooltip" title="Maximum 100 characters. No HTML or emoji allowed">
                              <svg class="icon icon-info" onclick="return false;">    
                                <use xlink:href="#icon-info"></use>
                              </svg>
                            </div>
                          </div>
                         
                           <div id="previewVideo" style="    border: 1px solid grey;height: 315px;text-align: center;align-content: center;display: grid;"></div>
                        </div>
                     
                    </div>
                    <br>
                  <div class="row g-3">
                      <div class="col-12 col-sm-12">
                          <div class="caption mb-3">Featured Image</div>
                          <div class="input-file mb-5 mb-sm-3">
                              <button class="btn-stroke" id="picButton">
                                  <svg class="icon icon-upload me-2"> 
                                      <use xlink:href="#icon-upload"></use>
                                  </svg>Click or drop image
                              </button>
                              <input type="file" id="picInput" name="input_video_images" >
                              <div id="picPreview" class="image-preview">
                              </div>

                              
                          </div>
                      </div>
                    </div>
                    
                     <div class="border-bottom mb-5 pb-5">
                      <div class="caption mb-3 text-reset fs-8">Category</div>
                       <div class="row gx-3 mb-5">
                        <?php foreach ($dataCategory as $val){ ?>
                            <div class="col-6 col-md-4">
                                <div class="form-check mb-4">
                                    <label class="form-check-label"><?= $val->category_name ?>
                                        <input class="form-check-input me-3" type="checkbox" name="input_video_category[]" value="<?= $val->category_id ?>" <?= (in_array($val->category_id, explode(',', $dataVideo['video_category']))) ? 'checked' : '' ?>>
                                    </label>
                                </div>
                            </div>
                        <?php }?>
                    </div>


                      <div class="clearfix"></div>
                    </div>  

                  <div class="card-head d-flex align-items-center justify-desc-between mb-5 mb-sm-6">
                    <div class="title title-color green">Video Content</div>
                  </div>

                  <div id="editor"><?=($action != 'add')? $dataVideo['video_desc']: 'This is your Content';?></div>
                   <input type="hidden" id="editorContent" name="input_video_desc" value="<?=($action != 'add')? $dataVideo['video_desc']: 'This is your Content';?>">
                 
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
              $time = $dataVideo['video_updated'];
                if ($time != '' || $time != null){ 
                  $times = date('M d, Y \a\t h:i A', strtotime($dataVideo['video_updated']));
                }else{
                  $times = date('M d, Y \a\t h:i A', strtotime($dataVideo['video_added']));
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
<script>
  var quill = new Quill('#editor', {
    theme: 'snow'
  });
</script>

<script type="text/javascript">
var editor = document.getElementById('editor');
editor.addEventListener('input', function() {
    var htmlContent = editor.innerHTML;
        var combinedContent = htmlContent;
        document.getElementById('editorContent').value = combinedContent;
});
var filePic = document.getElementById('picInput');
filePic.addEventListener('change', function() {
    var previewDiv = document.getElementById('picPreview');
    picButton.style.display = 'none';
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function(event) {
            previewDiv.innerHTML = '<img src="' + event.target.result + '" class="preview-pic">';
        };

        reader.readAsDataURL(this.files[0]);
    }
});
// Function to preview the video
function previewVideo() {
    var videoUrl = document.getElementById("videoUrl").value;
    var videoId = extractVideoId(videoUrl);
    
    if (videoId) {
        var embedUrl = 'https://www.youtube.com/embed/' + videoId;
        var embedCode = '<iframe width="100%" height="315" src="' + embedUrl + '" frameborder="0" allowfullscreen></iframe>';
        document.getElementById("previewVideo").innerHTML = embedCode;
        document.getElementById("previewVideo").style.background = 'none';
    } else {
        document.getElementById("previewVideo").innerHTML = "<b>No video</b>";
        
    }
}

// Add event listener to the input box
document.getElementById("videoUrl").addEventListener("input", previewVideo);

// Call the previewVideo function when the page loads
window.addEventListener("load", previewVideo);

// Function to extract video ID from URL
function extractVideoId(url) {
    var videoId = null;
    var match = url.match(/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/);

    if (match) {
        videoId = match[1];
    }

    return videoId;
}


</script>
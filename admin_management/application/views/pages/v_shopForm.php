
<style type="text/css">
  .preview-image {
    width: 80px; /* Adjust as needed */
    height: 80px; /* Adjust as needed */
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
</style>
<form class="form-horizontal form-label-left" method="POST" id="form-target" action="<?=$link;?>"  enctype="multipart/form-data">
    <div class="page-body pb-4 pb-xl-6">
          <div class="row g-0">
            <div class="col-lg-12 col-12 pe-lg-2">
              <div class="card mb-2 p-4 p-sm-5">
                <div class="card-head d-flex align-items-center justify-content-between mb-5 mb-sm-6">
                  <div class="title title-color green"><?=$title?></div>
                  <a class="btn-stroke btn-small" href="<?=base_url('shop')?>">
                    <svg class="icon icon-arrow-left me-1"> 
                      <use xlink:href="#icon-arrow-left"></use>
                    </svg><span>Back</span></a>
                </div>
                <div class="card-body p-0">
                  <div class="caption d-flex align-items-center mb-3 text-reset fs-8">Shop Name
                    <div class="info-tooltip ms-1" data-bs-toggle="tooltip" title="Maximum 100 characters. No HTML or emoji allowed">
                      <svg class="icon icon-info">  
                        <use xlink:href="#icon-info"></use>
                      </svg>
                    </div>
                  </div>
                  <input name="input_shop_name" class="form-control mb-5 mb-sm-6" type="text" <?=($action == 'add')? 'required=""': '';?> value="<?=($action != 'add')? $dataShop['shop_name']: '';?>"  placeholder="Value">

                     <div class="border-bottom mb-5 pb-5">
                      <div class="caption mb-3 text-reset fs-8">Category</div>
                     <select name="input_shop_category" class="select select-wide">
                        <option value="0" disabled>Select</option>
                        <?php foreach ($dataCategory as $val) {?>
                            <option value="<?= $val->category_id ?>" <?= ($val->category_id == $dataShop['shop_category']) ? 'selected' : '' ?>>
                                <?= $val->category_name ?>
                            </option>
                        <?php }?>
                    </select>

                      <div class="clearfix"></div>
                    </div>  
                  <div class="caption d-flex align-items-center mb-3 text-reset fs-8">Shop Info
                    <div class="info-tooltip ms-1" data-bs-toggle="tooltip" title="Maximum 100 characters. No HTML or emoji allowed">
                      <svg class="icon icon-info">  
                        <use xlink:href="#icon-info"></use>
                      </svg>
                    </div>
                  </div>
                  <div class="card-head d-flex align-items-center justify-content-between mb-5 mb-sm-6">
                    <div class="title title-color green"> Shop Pic</div>
                  </div>
                   <div class="caption mb-3">Image</div>
                        <div class="input-file mb-5 mb-sm-6">
                            <button class="btn-stroke" id="picButton">
                                <svg class="icon icon-upload me-2"> 
                                    <use xlink:href="#icon-upload"></use>
                                </svg>Click or drop image
                            </button>
                            <input type="file" id="picInput" name="input_shop_pic" >
                            <div id="picPreview" class="image-preview"></div>

                            
                        </div>
                  
                  <div class="row g-3">
                    <div class="col-12 col-sm-6">
                       <div class="caption mb-3">Lot</div>
                      <input name="input_shop_lot" class="form-control" type="text" value="<?=($action != 'add')? $dataShop['shop_lot']: '';?>" placeholder="Value">
                    </div>
                    <div class="col-12 col-sm-6">
                       <div class="caption mb-3">Branches </div>
                      <input name="input_shop_branches" class="form-control" type="text" value="<?=($action != 'add')? $dataShop['shop_branches']: '';?>" placeholder="Value">
                    </div>
                  </div>
                 
                  <br>
                  <div class="caption d-flex align-items-center mb-3 text-reset fs-8">Description
                    <div class="info-tooltip ms-1" data-bs-toggle="tooltip" title="No HTML or emoji allowed">
                      <svg class="icon icon-info">  
                        <use xlink:href="#icon-info"></use>
                      </svg>
                    </div>
                  </div>
                  <div class="editor mb-5 mb-sm-6 position-relative">
                    <div class="editor-toolbar d-flex p-3">
                      <button class="ql-bold">
                        <svg class="icon icon-bold">  
                          <use xlink:href="#icon-bold"></use>
                        </svg>
                      </button>
                      <button class="ql-italic ms-5">
                        <svg class="icon icon-italic">  
                          <use xlink:href="#icon-italic"></use>
                        </svg>
                      </button>
                      <button class="ql-underline ms-5">
                        <svg class="icon icon-underline"> 
                          <use xlink:href="#icon-underline"></use>
                        </svg>
                      </button>
                      <div class="smileys-actions">
                        <button class="smileys-head ms-5">
                          <svg class="icon icon-double-smile"> 
                            <use class="fill" href="#icon-smile-fill"></use>
                            <use class="stroke" href="#icon-smile-stroke"></use>
                          </svg>
                        </button>
                        <div class="smileys-body d-flex rounded-1 p-1">
                          <button class="smileys-item rounded-circle"><img src="img/content/reaction/Blush.png"/></button>
                          <button class="smileys-item rounded-circle"><img src="img/content/reaction/Surprised.png"/></button>
                          <button class="smileys-item rounded-circle"><img src="img/content/reaction/SweatGrinning.png"/></button>
                          <button class="smileys-item rounded-circle"><img src="img/content/reaction/Cool.png"/></button>
                          <button class="smileys-item rounded-circle"><img src="img/content/reaction/Sleepy.png"/></button>
                          <button class="smileys-item rounded-circle"><img src="img/content/reaction/CryingWithLaughter.png"/></button>
                          <button class="smileys-item rounded-circle"><img src="img/content/reaction/HeartEyes.png"/></button>
                          <button class="smileys-item rounded-circle"><img src="img/content/reaction/SmileEyes.png"/></button>
                        </div>
                      </div>
                      <button class="ms-5">
                        <svg class="icon icon-link">  
                          <use xlink:href="#icon-link"></use>
                        </svg>
                      </button>
                      <button class="ql-list ms-5">
                        <svg class="icon icon-list">  
                          <use xlink:href="#icon-list"></use>
                        </svg>
                      </button>
                      <button class="d-none d-sm-block ql-align ms-5">
                        <svg class="icon icon-align"> 
                          <use xlink:href="#icon-align"></use>
                        </svg>
                      </button>
                     
                    </div>
                     <input type="hidden" id="editorContent" name="input_shop_desc">
                    <div class="editor-container" type="text" id="editor"><?=($action != 'add')? $dataShop['shop_desc']: '';?></div>
                  </div>
                  <br>
                   <div class="caption d-flex align-items-center mb-3 text-reset fs-8">Embed Link
                    <div class="info-tooltip ms-1" data-bs-toggle="tooltip" title="put the full url here">
                      <svg class="icon icon-info">  
                        <use xlink:href="#icon-info"></use>
                      </svg>
                    </div>
                  </div>
                  <input name="input_shop_embedlink" class="form-control mb-5 mb-sm-6" type="text" value="<?=($action != 'add')? $dataShop['shop_embedlink']: '';?>"  placeholder="Value">
                  
                  <div class="card-head d-flex align-items-center justify-content-between mb-5 mb-sm-6">
                    <div class="title title-color green"> Gallery</div>
                  </div>
                   <div class="row g-3">
                    <div class="col-12 col-sm-6">
                       <div class="caption mb-3">Image</div>
                        <div class="input-file mb-5 mb-sm-6">
                            <button class="btn-stroke">
                                <svg class="icon icon-upload me-2"> 
                                    <use xlink:href="#icon-upload"></use>
                                </svg>Click or drop image
                            </button>
                            <input type="file" id="imageInput" name="input_gallery_images[]" multiple>
                            
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                       <div class="caption mb-3">Preview</div>
                       <div id="imagePreview"></div>
                    </div>
                  </div>
                         <div class="card-head d-flex align-items-center justify-content-between mb-5 mb-sm-6">
                    <div class="title title-color green"> Gallery Menu</div>
                  </div>
                   <div class="row g-3">
                    
                    <div class="col-12 col-sm-6">
                       <div class="caption mb-3">Preview</div>
                       <div id="menuPreview"></div>
                    </div>
                    <div class="col-12 col-sm-6">
                       <div class="caption mb-3">Image</div>
                        <div class="input-file mb-5 mb-sm-6">
                            <button class="btn-stroke">
                                <svg class="icon icon-upload me-2"> 
                                    <use xlink:href="#icon-upload"></use>
                                </svg>Click or drop image
                            </button>
                            <input type="file" id="imageMenu" name="input_menu_images[]" multiple>
                            
                        </div>
                    </div>
                  </div>
                
              <!--    <textarea name="input_shop_desc" id="input_shop_desc" class="form-control" <?=($action == 'add')? 'required=""': '';?>><?=($action != 'add')? $dataShop['shop_desc']: '';?></textarea> -->
                 
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
              $time = $dataShop['shop_updated'];
                if ($time != '' || $time != null){ 
                  $times = date('M d, Y \a\t h:i A', strtotime($dataShop['shop_updated']));
                }else{
                  $times = date('M d, Y \a\t h:i A', strtotime($dataShop['shop_added']));
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
// Get the editor element
var editor = document.getElementById('editor');

// Add an event listener for the 'input' event on the editor
editor.addEventListener('input', function() {
    // Get the text content of the editor
 
    var htmlContent = editor.innerHTML;

    // Combine text and HTML content
    var combinedContent = htmlContent;

    // Update the value of the hidden input field
    document.getElementById('editorContent').value = combinedContent;
});
// Get the file input element
var fileInput = document.getElementById('imageInput');


fileInput.addEventListener('change', function() {
    var previewContainer = document.getElementById('imagePreview');
    previewContainer.innerHTML = ''; // Clear previous previews
    
    for (var i = 0; i < this.files.length; i++) {
        var file = this.files[i];
        
        // Check if the selected file is an image
        if (file.type.match('image.*')) {
            var reader = new FileReader();

            reader.onload = function(event) {
                var imgElement = document.createElement('img');
                imgElement.src = event.target.result;
                imgElement.classList.add('preview-image');
                previewContainer.appendChild(imgElement);
            };

            reader.readAsDataURL(file);
        }
    }
});
var menuImage = document.getElementById('imageMenu');


menuImage.addEventListener('change', function() {
    var previewContainer = document.getElementById('menuPreview');
    previewContainer.innerHTML = ''; // Clear previous previews
    
    for (var i = 0; i < this.files.length; i++) {
        var file = this.files[i];
        
        // Check if the selected file is an image
        if (file.type.match('image.*')) {
            var reader = new FileReader();

            reader.onload = function(event) {
                var imgElement = document.createElement('img');
                imgElement.src = event.target.result;
                imgElement.classList.add('preview-image');
                previewContainer.appendChild(imgElement);
            };

            reader.readAsDataURL(file);
        }
    }
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


</script>
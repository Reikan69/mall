

<form class="form-horizontal form-label-left" method="POST" id="form-target" action="<?=$link;?>">
    <div class="page-body pb-4 pb-xl-6">
          <div class="row g-0">
            <div class="col-lg-12 col-12 pe-lg-2">
              <div class="card mb-2 p-4 p-sm-5">
                <div class="card-head d-flex align-items-center justify-content-between mb-5 mb-sm-6">
                  <div class="title title-color green"><?=$title?></div>
                  <a class="btn-stroke btn-small" href="<?=base_url('setting/section')?>">
                    <svg class="icon icon-arrow-left me-1"> 
                      <use xlink:href="#icon-arrow-left"></use>
                    </svg><span>Back</span></a>
                </div>
                <div class="card-body p-0">
                
                  <div class="row g-3">
                    <div class="col-4 col-sm-4">
                       <div class="caption d-flex align-items-center mb-3 text-reset fs-8"> Promotion
                    </div>
                    <select class="form-control" name="input_section_promotion">
                      <option>Choose</option>
                      <?php
                       foreach ($option as $var) {
                          $selected = ($dataSection['section_promotion'] == $var) ? 'selected' : '';
                          echo "<option value='$var' $selected>$var</option>";
                        }
                      ?>
                    </select>
                    </div>
                    <div class="col-4 col-sm-4">
                       <div class="caption d-flex align-items-center mb-3 text-reset fs-8"> Shop
                    </div>
                    <select class="form-control" name="input_section_shop">
                      <option>Choose</option>
                      <?php
                       foreach ($option as $var) {
                          $selected = ($dataSection['section_shop'] == $var) ? 'selected' : '';
                          echo "<option value='$var' $selected>$var</option>";
                        }
                      ?>
                    </select>
                    </div>
                    <div class="col-4 col-sm-4">
                       <div class="caption d-flex align-items-center mb-3 text-reset fs-8"> Banner
                    </div>
                    <select class="form-control" name="input_section_banner">
                      <option>Choose</option>
                      <?php
                       foreach ($option as $var) {
                          $selected = ($dataSection['section_banner'] == $var) ? 'selected' : '';
                          echo "<option value='$var' $selected>$var</option>";
                        }
                      ?>
                    </select>
                    </div>

                    <div class="row g-3">
                       <div class="col-4 col-sm-4">
                         <div class="caption d-flex align-items-center mb-3 text-reset fs-8"> Event
                      </div>
                      <select class="form-control" name="input_section_event">
                        <option>Choose</option>
                        <?php
                         foreach ($option as $var) {
                            $selected = ($dataSection['section_event'] == $var) ? 'selected' : '';
                            echo "<option value='$var' $selected>$var</option>";
                          }
                        ?>
                      </select>
                      </div>
                       <div class="col-4 col-sm-4">
                       <div class="caption d-flex align-items-center mb-3 text-reset fs-8"> Menu
                    </div>
                    <select class="form-control" name="input_section_menu">
                      <option>Choose</option>
                      <?php
                       foreach ($option as $var) {
                          $selected = ($dataSection['section_menu'] == $var) ? 'selected' : '';
                          echo "<option value='$var' $selected>$var</option>";
                        }
                      ?>
                    </select>
                    </div>
                     <div class="col-4 col-sm-4">
                       <div class="caption d-flex align-items-center mb-3 text-reset fs-8"> News
                    </div>
                    <select class="form-control" name="input_section_news">
                      <option>Choose</option>
                      <?php
                       foreach ($option as $var) {
                          $selected = ($dataSection['section_news'] == $var) ? 'selected' : '';
                          echo "<option value='$var' $selected>$var</option>";
                        }
                      ?>
                    </select>
                    </div>
                     
                    </div>
                </div>
              </div>
           </div>
       </div>
    </div>
     <div class="card page-footer p-4 p-sm-5 px-xl-7n7 mt-auto">
          <div class="container p-0 d-block d-sm-flex">
           
            <div class="d-flex align-items-center mb-4 mb-sm-0">
            &nbsp;
            </div>
         
            <div class="d-flex ms-auto">
              <a class="btn-stroke flex-grow-1" onclick="window.history.back();">Close</a>

           
              <input type="submit" name="update" value="Update now" class="btn ms-2 flex-grow-1">
             
            </div>
          </div>
        </div>
</form>
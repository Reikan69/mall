

<form class="form-horizontal form-label-left" method="POST" id="form-target" action="<?=$link;?>">
    <div class="page-body pb-4 pb-xl-6">
          <div class="row g-0">
            <div class="col-lg-12 col-12 pe-lg-2">
              <div class="card mb-2 p-4 p-sm-5">
                <div class="card-head d-flex align-items-center justify-content-between mb-5 mb-sm-6">
                  <div class="title title-color green"><?=$title?></div>
                  <a class="btn-stroke btn-small" href="<?=base_url('categoryC')?>">
                    <svg class="icon icon-arrow-left me-1"> 
                      <use xlink:href="#icon-arrow-left"></use>
                    </svg><span>Back</span></a>
                </div>
                <div class="card-body p-0">
                  <div class="caption d-flex align-items-center mb-3 text-reset fs-8">Category Name
                    <div class="info-tooltip ms-1" data-bs-toggle="tooltip" title="Maximum 100 characters. No HTML or emoji allowed">
                      <svg class="icon icon-info">  
                        <use xlink:href="#icon-info"></use>
                      </svg>
                    </div>
                  </div>
                  <input name="input_categoryc_name" class="form-control mb-5 mb-sm-6" type="text" <?=($action == 'add')? 'required=""': '';?> value=" <?=($action != 'add')? $dataCategoryC['categoryc_name']: '';?>">
               
                </div>
              </div>
           </div>
       </div>
    </div>
     <div class="card page-footer p-4 p-sm-5 px-xl-7 mt-auto">
          <div class="container p-0 d-block d-sm-flex">
            <?php if($action !='add'){ ?>
            <div class="d-flex align-items-center mb-4 mb-sm-0">
              <svg class="icon icon-check-all fill-shades-2 me-3">  
                <use xlink:href="#icon-check-all"></use>
              </svg><span class="caption pe-1">Last update</span>
              <?php 
              $time = $dataCategoryC['categoryc_updated'];
                if ($time != '' || $time != null){ 
                  $times = date('M d, Y \a\t h:i A', strtotime($dataCategoryC['categoryc_updated']));
                }else{
                  $times = date('M d, Y \a\t h:i A', strtotime($dataCategoryC['categoryc_added']));
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

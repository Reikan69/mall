
        <div class="page-head">
          <div class="h3 mb-4 mb-xl-5"><?=$title?></div>
        </div>
        <div class="page-body pb-4 pb-xl-6">
          <div class="card mb-2 p-4 p-sm-5">
            <div class="card-head d-flex flex-wrap align-items-center mb-2 mb-sm-7">
              <div class="title title-color purple me-5 mb-4 mb-sm-0"><?=$sub_title?></div>

              <div class="search-input input-group me-sm-5 mb-3 mb-sm-0">
                <button class="input-group-text transparent">
                  <svg class="icon icon-search">    
                    <use xlink:href="#icon-search"></use>
                  </svg>
                </button>
                <input class="form-control input-small input-action rounded-2" type="text" placeholder="Search <?=$title?>">
              </div>
              <a class="btn btn-primary btn-small nav-item create"  href="<?= base_url('setting/formPromotion/-1')?>">
                <svg class="icon icon-plus me-2"> 
                  <use xlink:href="#icon-plus"></use>
                </svg><span>Create</span>
              </a>
            </div>
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="sheet-table d-table">
                    <div class="d-table-row">
                        <!-- <div class="checkbox-cell d-none d-md-table-cell py-4 px-3">
                          <input class="form-check-input" data-group-checkbox="draft" type="checkbox"/>
                        </div> -->
                        <div class="d-table-cell py-4 px-5 caption">No</div>
                        <div class="d-md-table-cell py-4 px-5 caption">Banner</div>
                        <div class="d-table-cell py-3 caption">Action</div>

                    </div>
                    <?php 
                    $i = 1;
                    foreach ($dataBannerPromotion as $list): ?>

                    <div class="d-table-row grid-markup">
                      <div class="sheet-cell d-table-cell py-3 px-5 text-shades-2 text-base-2 text-nowrap"><?=$i++;?></div>
                      <div class="sheet-cell d-md-table-cell py-3 px-5">
                        <img src="<?=$GLOBALS['uploads'].$list->bannerp_images?>" style="width: 100px">
                      </div>
                   
                      <div class="sheet-cell d-table-cell py-3 px-5 text-shades-2 text-base-2 text-nowrap">
                          <div class="btn-action-small me-5">
                              <a href="<?php echo base_url('setting/formPromotion/').$list->bannerp_id; ?>">
                                  <svg class="icon icon-edit">    
                                      <use xlink:href="#icon-edit"></use>
                                  </svg>
                              </a>
                               <a href="<?php echo site_url('setting/deleteBannerPromotion/').$list->bannerp_id; ?>"  onclick="return confirm('Are you sure you want to delete this banner?');">
                                  <svg class="icon icon-trash">   
                                      <use xlink:href="#icon-trash"></use>
                                  </svg>
                              </a>
                          </div>
                          

                      </div>
                    </div>
                    <?php endforeach; ?>
          
       
                </div>
              </div>
            <!--   <div class="mt-5 text-center">
                <div class="btn-stroke">
                  <div class="spinner-border me-2" role="status"></div>Loading
                </div>
              </div> -->
            </div>
          </div>
        </div>
      <!--   <div class="page-footer d-none d-md-block p-4 p-sm-5 px-xl-7 mx-n4 mx-sm-n5 mx-xl-n7 mt-auto">
          <div class="container p-0 d-block d-sm-flex">
            <div class="d-flex align-items-center mb-4 mb-sm-0">
              <svg class="icon icon-check-all fill-shades-2 me-3">  
                <use xlink:href="#icon-check-all"></use>
              </svg><span class="caption">2 products selected</span>
            </div>
          </div>
        </div> -->


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
            <a class="btn btn-primary btn-small nav-item create"  href="<?= base_url();?>blog/form/-1">
                <svg class="icon icon-plus me-2"> 
                  <use xlink:href="#icon-plus"></use>
                </svg><span>Create</span>
              </a>
            </div>
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="sheet-table d-block d-md-table">
                    <div class="border-bottom border-md-none d-table-row">
                        <div class="checkbox-cell d-none d-md-table-cell py-4 px-3">
                          <input class="form-check-input" data-group-checkbox="draft" type="checkbox"/>
                        </div>
                        <div class="d-none d-md-table-cell pb-4 px-3 caption">Title</div>
                        <div class="d-none d-md-table-cell pb-4 px-3 caption">Content</div>
                        <div class="d-none d-md-table-cell pb-4 px-3 caption">Date Post</div>
                    </div>
                    <?php foreach ($dataBlog as $list): ?>
                    <div class="border-bottom sheet-row position-relative d-block d-md-table-row pb-4 mb-4">
                        <div class="col checkbox-cell sheet-cell d-none d-md-table-cell py-2 py-md-4 px-3">
                          <input class="form-check-input" data-item-checkbox="draft" type="checkbox"/>
                        </div>
                        <div class="col col-md-5 sheet-cell d-block d-md-table-cell py-2 py-md-4 px-0 px-md-3">
                            <a class="sheet-table-item d-flex align-items-sm-center" data-bs-toggle="modal" data-bs-target="#modal-product">
                                <div class="sheet-table-preview md-horizontal-image vertical-image flex-shrink-0">
                                    <img src="<?= $GLOBALS['uploads'].$list->blog_images; ?>" alt="<?=$list->blog_title;?>"/>
                                </div>
                                <div class="sheet-table-details">
                                  <div class="sheet-table-title mb-2 mb-md-1 me-8 me-md-0"><?=$list->blog_title;?></div>
                                  <div class="caption w-400"><?= htmlspecialchars($list->category_names) ?></div>
                                </div>
                            </a>
                          <div class="table-btn-actions position-absolute d-block d-md-none mt-2 mt-md-3">
                            <div class="action-item">
                              <button class="action-head btn-action-small">
                                <svg class="icon icon-more-horizontal"> 
                                  <use xlink:href="#icon-more-horizontal"></use>
                                </svg>
                              </button>
                              <div class="action-body p-3">
                              
                                <button class="action-item">
                                  <svg class="icon icon-edit">  
                                    <use xlink:href="#icon-edit"></use>
                                  </svg>Edit 
                                </button>
                                <button class="action-item">
                                  <svg class="icon icon-trash"> 
                                    <use xlink:href="#icon-trash"></use>
                                  </svg>Delete 
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                       <div class="sheet-cell col col-md-3 d-block d-md-table-cell align-middle py-2 py-md-4 px-0 px-md-3">
                          <div class="d-flex align-items-center justify-content-md-between d-md-none caption">Content</div>
                          <p>
                           <?= htmlspecialchars(implode(' ', array_slice(str_word_count(strip_tags($list->blog_content), 1), 0, 10))) ?>
                           </p>
                        </div>
                       
                       
                        <div class="sheet-cell col col-md-6 d-block d-md-table-cell align-middle py-2 py-md-4 px-0 px-md-3">
                          <div class="d-flex align-items-center justify-content-md-between">
                            <div class="text-neutral-4 d-none d-md-block"><?= date('M d, Y \a\t h:i A', strtotime($list->blog_post)); ?></div>
                            <div class="caption d-inline-block d-md-none">Date Post</div>
                            <div class="caption d-block d-md-none w-50"><?= date('M d, Y \a\t h:i A', strtotime($list->blog_post)); ?></div>
                            <div class="table-btn-actions opacity-0 d-none d-md-flex">
                                 <div class="btn-action-small me-5">
                                      <a href="<?php echo base_url('blog/form/').$list->blog_id; ?>">
                                          <svg class="icon icon-edit">    
                                              <use xlink:href="#icon-edit"></use>
                                          </svg>
                                      </a>
                                  </div>
                                  <div class="btn-action-small me-5">
                                      <a href="<?php echo base_url('blog/deleteBlog/').$list->blog_id; ?>"  onclick="return confirm('Are you sure you want to delete this blog?');">
                                          <svg class="icon icon-trash">   
                                              <use xlink:href="#icon-trash"></use>
                                          </svg>
                                      </a>
                                  </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
          
       
                </div>
              </div>
             <!--  <div class="mt-5 text-center">
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

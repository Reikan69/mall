 
 <div class="modal modal-media fade" id="modal-video" tabindex="-1" aria-labelledby="modal-video-label" aria-hidden="true">
      <div class="fixed-top mt-7 mx-4 mx-sm-7">
        <div class="d-flex justify-content-between align-items-start align-items-sm-center w-100 flex-wrap">
          <div class="modal-details d-flex order-last order-lg-first mt-5 mt-lg-0">
            <button class="btn-white btn-small">
              <svg class="icon icon-heart-fill fill-red me-2">  
                <use xlink:href="#icon-heart-fill"></use>
              </svg><span>32</span>
            </button>
          </div>
          <div class="modal-title">Use guidelines</div>
          <div class="modal-controls">
            <button class="btn-rounded-stroke btn-small me-4">
              <svg class="icon icon-link">  
                <use xlink:href="#icon-link"></use>
              </svg>
            </button>
            <button class="btn-rounded" data-bs-dismiss="modal">
              <svg class="icon icon-close"> 
                <use xlink:href="#icon-close"></use>
              </svg>
            </button>
          </div>
        </div>
      </div>
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content ratio ratio-16x9">
          <iframe src="<?= $GLOBALS['assets'] ?>https://www.youtube.com/embed/5qap5aO4i9A" title="YouTube video" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal-preview" tabindex="-1" aria-labelledby="modal-preview-label" aria-hidden="true">
      <div class="fixed-top mt-7 mx-4 mx-sm-7">
        <button class="btn-rounded btn-small" data-bs-dismiss="modal">
          <svg class="icon icon-close"> 
            <use xlink:href="#icon-close"></use>
          </svg>
        </button>
      </div>
      <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content card preview p-4 p-sm-5">
          <div class="card-head d-flex align-items-center justify-content-between mb-5 mb-sm-6">
            <div class="title title-color blue">Preview</div>
            <svg class="icon icon-expand">  
              <use xlink:href="#icon-expand"></use>
            </svg>
          </div>
          <div class="card-body p-0">
            <div class="preview-photo mb-4"><img src="<?= $GLOBALS['assets'] ?>/img/content/photo-1.jpg" alt=""></div>
            <div class="preview-title d-flex align-items-start mb-2">Fleet - Travel shopping UI design kit
              <div class="badge large green ms-3">$98</div>
            </div>
            <div class="preview-user d-flex align-items-center">
              <div class="preview-userpic me-2"><img src="<?= $GLOBALS['assets'] ?>/img/content/user-1.jpg" alt="Hortense"></div><span class="me-1 text-shades-1">by </span><b>Hortense</b>
            </div>
          </div>
        </div>
      </div>
    </div>
   <div class="modal fade" id="modal-datepicker" tabindex="-1" aria-labelledby="modal-datepicker-label" aria-hidden="true" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="datepicker modal-content card p-4 p-sm-5">
            <div class="border-bottom card-head d-flex align-items-center justify-content-between mb-5 pb-5">
                <div class="title title-color red">Reschedule product</div>
                <button class="btn-rounded" data-bs-dismiss="modal">
                    <svg class="icon icon-close"> 
                        <use xlink:href="#icon-close"></use>
                    </svg>
                </button>
            </div>
            <div class="card-body p-0">
                <div class="pb-5">Choose a day and time in the future you want your product to be published.</div>
                <div class="datepicker-list">
                    <div class="action-item mb-2 w-100">
                        <div class="action-head d-flex p-4">
                            <svg class="icon icon-calendar flex-shrink-0 me-3"> 
                                <use xlink:href="#icon-calendar"></use>
                            </svg>
                            <div class="d-block">
                                <div class="caption">Date</div>
                                <input class="js-date-range p-0" type="text" data-single-month="true" data-container=".js-date-container">
                            </div>
                        </div>
                        <div class="action-body">
                            <div class="js-date-container"></div>
                            <div class="border-top d-flex justify-content-end mx-5 py-5">
                                <div class="btn-stroke btn-small js-date-clear">Clear</div>
                                <div class="btn datepicker-close btn-small ms-3" >Close</div> <!-- Add data-bs-dismiss="modal" here -->
                            </div>
                        </div>
                    </div>
                    <div class="action-item js-datepicker-time mb-4 mb-sm-5 w-100">
                        <div class="action-head d-flex p-4">
                            <svg class="icon icon-clock flex-shrink-0 me-3">  
                                <use xlink:href="#icon-clock"></use>
                            </svg>
                            <div class="d-block">
                                <div class="caption">Time</div>
                                <input class="datepicker-time p-0" type="text" value="00:00 AM">
                            </div>
                        </div>
                        <div class="action-body p-5">
                            <div class="border-bottom card-head d-flex align-items-center justify-content-between mb-5 pb-5">
                                <div class="title datepicker-title text-reset">00:00 AM</div>
                                <button class="datepicker-close btn-rounded flex-shrink-0" data-bs-dismiss="modal"> <!-- Add data-bs-dismiss="modal" here -->
                                    <svg class="icon icon-close"> 
                                        <use xlink:href="#icon-close"></use>
                                    </svg>
                                </button>
                            </div>
                            <ul class="datepicker-time-list">
                                  <ul class="datepicker-time-list">
                                  <li>00:00 AM</li>
                                  <li>00:30 AM</li>
                                  <li>1:00 AM</li>
                                  <li>1:30 AM</li>
                                  <li>2:00 AM</li>
                                  <li>2:30 AM</li>
                                  <li>3:00 AM</li>
                                  <li>3:30 AM</li>
                                  <li>4:00 AM</li>
                                  <li>4:30 AM</li>
                                  <li>5:00 AM</li>
                                  <li>5:30 AM</li>
                                  <li>6:00 AM</li>
                                  <li>6:30 AM</li>
                                  <li>7:00 AM</li>
                                  <li>7:30 AM</li>
                                  <li>8:00 AM</li>
                                  <li>8:30 AM</li>
                                  <li>9:00 AM</li>
                                  <li>9:30 AM</li>
                                  <li>10:00 AM</li>
                                  <li>10:30 AM</li>
                                  <li>11:00 AM</li>
                                  <li>11:30 AM</li>
                                  <li>12:00 PM</li>
                                  <li>12:30 PM</li>
                                  <li>1:00 PM</li>
                                  <li>1:30 PM</li>
                                  <li>2:00 PM</li>
                                  <li>2:30 PM</li>
                                  <li>3:00 PM</li>
                                  <li>3:30 PM</li>
                                  <li>4:00 PM</li>
                                  <li>4:30 PM</li>
                                  <li>5:00 PM</li>
                                  <li>5:30 PM</li>
                                  <li>6:00 PM</li>
                                  <li>6:30 PM</li>
                                  <li>7:00 PM</li>
                                  <li>7:30 PM</li>
                                  <li>8:00 PM</li>
                                  <li>8:30 PM</li>
                                  <li>9:00 PM</li>
                                  <li>9:30 PM</li>
                                  <li>10:00 PM</li>
                                  <li>10:30 PM</li>
                                  <li>11:00 PM</li>
                                  <li>11:30 PM</li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                    <div class="btn-delete flex-grow-1" data-bs-dismiss="modal">Close</div>
                    <button class="btn float-end" id="reschedule-btn" data-bs-dismiss="modal">Reschedule</button> <!-- Add data-bs-dismiss="modal" here -->
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="modal modal-media fade" id="modal-slider" tabindex="-1" aria-labelledby="modal-slider-label" aria-hidden="true">
      <div class="mt-7 mx-4 mx-sm-7">
        <div class="d-flex justify-content-between align-items-start align-items-sm-center w-100 flex-wrap">
          <div class="modal-details d-flex order-last order-lg-first mt-5 mt-lg-0">
            <button class="btn-white me-3">
              <svg class="icon icon-heart-fill fill-red me-2">  
                <use xlink:href="#icon-heart-fill"></use>
              </svg><span>32</span>
            </button>
            <button class="btn"><span>Download now</span>
              <svg class="icon icon-download ms-2"> 
                <use xlink:href="#icon-download"></use>
              </svg>
            </button>
          </div>
          <div class="modal-title">Fleet - Travel shopping UI design kit</div>
          <div class="modal-controls">
            <button class="btn-rounded-stroke btn-small me-4">
              <svg class="icon icon-link">  
                <use xlink:href="#icon-link"></use>
              </svg>
            </button>
            <button class="close btn-rounded" data-bs-dismiss="modal">
              <svg class="icon icon-close"> 
                <use xlink:href="#icon-close"></use>
              </svg>
            </button>
          </div>
        </div>
      </div>
      <div class="modal-dialog modal-xl mt-8 mx-4 mx-sm-auto">
        <div class="modal-content">
          <div class="carousel slide" id="modal-carousel" data-bs-ride="carousel">
            <div class="carousel-controls">
              <div class="carousel-control-prev" data-bs-target="#modal-carousel" data-bs-slide="prev">
                <svg class="icon icon-arrow-left">  
                  <use xlink:href="#icon-arrow-left"></use>
                </svg>
              </div>
              <div class="carousel-control-next" data-bs-target="#modal-carousel" data-bs-slide="next">
                <svg class="icon icon-arrow"> 
                  <use xlink:href="#icon-arrow"></use>
                </svg>
              </div>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active"><img class="rounded-2 d-block w-100" src="<?= $GLOBALS['assets'] ?>img/content/photo-1.jpg" alt="Fleet - Travel shopping UI design kit"></div>
              <div class="carousel-item"><img class="rounded-2 d-block w-100" src="<?= $GLOBALS['assets'] ?>img/content/photo-2.jpg" alt="Fleet - Travel shopping UI design kit"></div>
            </div>
          </div>
          <div class="carousel-caption caption">Elegant product mockup for your next project</div>
        </div>
      </div>
    </div>
    <div class="modal fade product-modal p-4 m-0" id="modal-product" tabindex="-1" aria-labelledby="modal-product-label" aria-hidden="true" aria-modal="true" role="dialog">
      <div class="d-flex justify-content-between align-items-center mx-0 mt-0 mx-lg-5 mt-lg-5"><a class="btn-stroke fill" href="products-add.html">Edit product</a>
        <button class="close btn-rounded fill-white" data-bs-dismiss="modal">
          <svg class="icon icon-close"> 
            <use xlink:href="#icon-close"></use>
          </svg>
        </button>
      </div>
      <div class="modal-dialog modal-content mx-auto">
        <div class="card tab-pane d-md-block p-4 p-sm-5">
          <div class="card-controls d-block d-sm-flex align-items-center mb-6">
            <div class="tabs nav d-flex flex-nowrap mb-4 mb-sm-0">
              <div class="btn-tab btn-small active me-2" data-bs-target="#modal-tab-product" data-bs-toggle="tab">Product</div>
              <div class="btn-tab btn-small" data-bs-target="#modal-tab-comments" data-bs-toggle="tab">Comments</div>
            </div>
          </div>
          <div class="tab-content">
            <div class="tab-pane fade show active d-xl-block" id="modal-tab-product">
              <div class="modal-buttons d-flex ms-auto flex-nowrap mt-n6 mt-sm-0 mb-6 mb-sm-0">
                <div class="btn-stroke me-4">
                  <svg class="icon icon-heart-fill me-2 fill-red">  
                    <use xlink:href="#icon-heart-fill"></use>
                  </svg>32
                </div>
                <div class="btn position-relative"><span class="separator me-5 pe-5 position-relative">$89</span>Download now
                  <svg class="icon icon-download ms-2"> 
                    <use xlink:href="#icon-download"></use>
                  </svg>
                </div>
              </div>
              <div class="card-head mb-7">
                <div class="h4">Fleet - Travel shopping UI design kit</div>
                <div class="product-modal-info mb-3">Elegant product mockup for your next project</div>
                <div class="product-modal-user d-flex align-items-center">
                  <div class="product-modal-userpic me-3"><img src="<?= $GLOBALS['assets'] ?>/img/content/user-1.jpg" alt="Hortense"></div><span class="me-1 text-shades-1">by</span><b class="me-3">Chelsie Haley</b>
                  <svg class="icon icon-star-fill fill-yellow me-2">  
                    <use xlink:href="#icon-star-fill"></use>
                  </svg><b class="me-1">4.8</b><span class="text-shades-1">(87)</span>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="product-modal-gallery mb-6 mb-sm-7">
                  <button class="btn-white" data-bs-toggle="modal" data-bs-target="#modal-slider" data-bs-prev-modal="#modal-product">Show all preview</button><img src="<?= $GLOBALS['assets'] ?>img/content/photo-1.jpg" alt="Fleet - Travel shopping UI design kit">
                </div>
                <div class="border-bottom row product-modal-content">
                  <div class="col-md-8 pe-3 pe-sm-8 pb-6 pb-md-0">
                    <div class="title title-color red mb-3 mb-md-6">Overview</div>
                    <p>Meet Node - a crypto NFT marketplace iOS UI design kit for Figma, Sketch, and Adobe XD. The kit includes 126 stylish mobile screens in light and dark mode, a bunch of crypto 3D illustrations, 1 SaaS landing page with full premade breakpoints, and hundreds of components to help you ship your next crypto, NFT product faster.</p>
                    <p>Types of screens included: onboarding, connect wallet, home feed, profile, upload, menu, search, product detail, notification...</p>
                    <p class="mb-0">If you have any questions or requests, please feel free to leave them all in the comments section.</p>
                  </div>
                  <div class="col-md-4">
                    <div class="title title-color purple mb-5 mb-md-6">Features</div>
                    <div class="border-bottom d-flex align-items-center pb-4 mb-4">
                      <svg class="icon icon-check fill-green-light me-3"> 
                        <use xlink:href="#icon-check"></use>
                      </svg>128 prebuilt screens
                    </div>
                    <div class="border-bottom d-flex align-items-center pb-4 mb-4">
                      <svg class="icon icon-check fill-green-light me-3"> 
                        <use xlink:href="#icon-check"></use>
                      </svg>SaaS landing page ready
                    </div>
                    <div class="border-bottom d-flex align-items-center pb-4 mb-4">
                      <svg class="icon icon-check fill-green-light me-3"> 
                        <use xlink:href="#icon-check"></use>
                      </svg>Global styleguide
                    </div>
                    <div class="border-bottom d-flex align-items-center pb-4 mb-4">
                      <svg class="icon icon-check fill-green-light me-3"> 
                        <use xlink:href="#icon-check"></use>
                      </svg>Dark + light more ready
                    </div>
                  </div>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-6">
                  <div class="title title-color red">More like this</div><a class="btn-stroke btn-small" href="products-dashboard.html">View all
                    <svg class="icon icon-arrow ms-2">  
                      <use xlink:href="#icon-arrow"></use>
                    </svg></a>
                </div>
                <div class="product-modal-slider ms-n3 me-n4 mx-sm-n3">
                  <div class="grid-preview mx-3">
                    <div class="grid-preview-thumbnail mb-4"><img src="<?= $GLOBALS['assets'] ?>img/content/product-5.jpg" alt="Fleet - Travel shopping UI design"/>
                      <div class="grid-preview-control d-flex align-items-center justify-content-center">
                        <button class="btn-rounded mx-2">
                          <svg class="icon icon-edit">  
                            <use xlink:href="#icon-edit"></use>
                          </svg>
                        </button>
                        <button class="btn-rounded mx-2">
                          <svg class="icon icon-trash"> 
                            <use xlink:href="#icon-trash"></use>
                          </svg>
                        </button>
                        <button class="btn-rounded mx-2" data-bs-toggle="modal" data-bs-target="#modal-product">
                          <svg class="icon icon-arrow"> 
                            <use xlink:href="#icon-arrow"></use>
                          </svg>
                        </button>
                      </div>
                    </div>
                    <div class="grid-preview-details mb-2">
                      <div class="d-flex align-items-start justify-content-between"> Fleet - Travel shopping UI design
                        <div class="badge large ms-5 green">$65</div>
                      </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <svg class="icon icon-star-fill me-1 fill-yellow">  
                        <use xlink:href="#icon-star-fill"></use>
                      </svg>4.8
                      <div class="caption ps-1">(87)</div>
                    </div>
                  </div>
                  <div class="grid-preview mx-3">
                    <div class="grid-preview-thumbnail mb-4"><img src="<?= $GLOBALS['assets'] ?>img/content/product-4.jpg" alt="Bento Matte 3D Illustration"/>
                      <div class="grid-preview-control d-flex align-items-center justify-content-center">
                        <button class="btn-rounded mx-2">
                          <svg class="icon icon-edit">  
                            <use xlink:href="#icon-edit"></use>
                          </svg>
                        </button>
                        <button class="btn-rounded mx-2">
                          <svg class="icon icon-trash"> 
                            <use xlink:href="#icon-trash"></use>
                          </svg>
                        </button>
                        <button class="btn-rounded mx-2" data-bs-toggle="modal" data-bs-target="#modal-product">
                          <svg class="icon icon-arrow"> 
                            <use xlink:href="#icon-arrow"></use>
                          </svg>
                        </button>
                      </div>
                    </div>
                    <div class="grid-preview-details mb-2">
                      <div class="d-flex align-items-start justify-content-between"> Bento Matte 3D Illustration
                        <div class="badge large ms-5 green">$130</div>
                      </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <svg class="icon icon-star-stroke me-1 fill-shades-2">  
                        <use xlink:href="#icon-star-stroke"></use>
                      </svg>
                      <div class="caption">No ratings</div>
                    </div>
                  </div>
                  <div class="grid-preview mx-3">
                    <div class="grid-preview-thumbnail mb-4"><img src="<?= $GLOBALS['assets'] ?>img/content/product-2.jpg" alt="Fleet - Travel shopping UI design"/>
                      <div class="grid-preview-control d-flex align-items-center justify-content-center">
                        <button class="btn-rounded mx-2">
                          <svg class="icon icon-edit">  
                            <use xlink:href="#icon-edit"></use>
                          </svg>
                        </button>
                        <button class="btn-rounded mx-2">
                          <svg class="icon icon-trash"> 
                            <use xlink:href="#icon-trash"></use>
                          </svg>
                        </button>
                        <button class="btn-rounded mx-2" data-bs-toggle="modal" data-bs-target="#modal-product">
                          <svg class="icon icon-arrow"> 
                            <use xlink:href="#icon-arrow"></use>
                          </svg>
                        </button>
                      </div>
                    </div>
                    <div class="grid-preview-details mb-2">
                      <div class="d-flex align-items-start justify-content-between"> Fleet - Travel shopping UI design
                        <div class="badge large ms-5 common">$0</div>
                      </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <svg class="icon icon-star-fill me-1 fill-yellow">  
                        <use xlink:href="#icon-star-fill"></use>
                      </svg>4.9
                      <div class="caption ps-1">(87)</div>
                    </div>
                  </div>
                  <div class="grid-preview mx-3">
                    <div class="grid-preview-thumbnail mb-4"><img src="<?= $GLOBALS['assets'] ?>img/content/product-3.jpg" alt="Bento Matte 3D Illustration"/>
                      <div class="grid-preview-control d-flex align-items-center justify-content-center">
                        <button class="btn-rounded mx-2">
                          <svg class="icon icon-edit">  
                            <use xlink:href="#icon-edit"></use>
                          </svg>
                        </button>
                        <button class="btn-rounded mx-2">
                          <svg class="icon icon-trash"> 
                            <use xlink:href="#icon-trash"></use>
                          </svg>
                        </button>
                        <button class="btn-rounded mx-2" data-bs-toggle="modal" data-bs-target="#modal-product">
                          <svg class="icon icon-arrow"> 
                            <use xlink:href="#icon-arrow"></use>
                          </svg>
                        </button>
                      </div>
                    </div>
                    <div class="grid-preview-details mb-2">
                      <div class="d-flex align-items-start justify-content-between"> Bento Matte 3D Illustration
                        <div class="badge large ms-5 green">$32</div>
                      </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <svg class="icon icon-star-stroke me-1 fill-shades-2">  
                        <use xlink:href="#icon-star-stroke"></use>
                      </svg>
                      <div class="caption">No ratings</div>
                    </div>
                  </div>
                  <div class="grid-preview mx-3">
                    <div class="grid-preview-thumbnail mb-4"><img src="<?= $GLOBALS['assets'] ?>img/content/product-1.jpg" alt="Fleet - Travel shopping UI design"/>
                      <div class="grid-preview-control d-flex align-items-center justify-content-center">
                        <button class="btn-rounded mx-2">
                          <svg class="icon icon-edit">  
                            <use xlink:href="#icon-edit"></use>
                          </svg>
                        </button>
                        <button class="btn-rounded mx-2">
                          <svg class="icon icon-trash"> 
                            <use xlink:href="#icon-trash"></use>
                          </svg>
                        </button>
                        <button class="btn-rounded mx-2" data-bs-toggle="modal" data-bs-target="#modal-product">
                          <svg class="icon icon-arrow"> 
                            <use xlink:href="#icon-arrow"></use>
                          </svg>
                        </button>
                      </div>
                    </div>
                    <div class="grid-preview-details mb-2">
                      <div class="d-flex align-items-start justify-content-between"> Fleet - Travel shopping UI design
                        <div class="badge large ms-5 green">$106</div>
                      </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <svg class="icon icon-star-stroke me-1 fill-shades-2">  
                        <use xlink:href="#icon-star-stroke"></use>
                      </svg>
                      <div class="caption">No ratings</div>
                    </div>
                  </div>
                  <div class="grid-preview mx-3">
                    <div class="grid-preview-thumbnail mb-4"><img src="<?= $GLOBALS['assets'] ?>img/content/product-4.jpg" alt="Bento Matte 3D Illustration"/>
                      <div class="grid-preview-control d-flex align-items-center justify-content-center">
                        <button class="btn-rounded mx-2">
                          <svg class="icon icon-edit">  
                            <use xlink:href="#icon-edit"></use>
                          </svg>
                        </button>
                        <button class="btn-rounded mx-2">
                          <svg class="icon icon-trash"> 
                            <use xlink:href="#icon-trash"></use>
                          </svg>
                        </button>
                        <button class="btn-rounded mx-2" data-bs-toggle="modal" data-bs-target="#modal-product">
                          <svg class="icon icon-arrow"> 
                            <use xlink:href="#icon-arrow"></use>
                          </svg>
                        </button>
                      </div>
                    </div>
                    <div class="grid-preview-details mb-2">
                      <div class="d-flex align-items-start justify-content-between"> Bento Matte 3D Illustration
                        <div class="badge large ms-5 green">$130</div>
                      </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <svg class="icon icon-star-stroke me-1 fill-shades-2">  
                        <use xlink:href="#icon-star-stroke"></use>
                      </svg>
                      <div class="caption">No ratings</div>
                    </div>
                  </div>
                </div>
                <div class="slider-controls d-flex align-items-center justify-content-center mt-4">
                  <div class="slider-prev btn-rounded-stroke btn-small hover-border mx-2">
                    <svg class="icon icon-arrow-left">  
                      <use xlink:href="#icon-arrow-left"></use>
                    </svg>
                  </div>
                  <div class="slider-next btn-rounded-stroke btn-small hover-border mx-2">
                    <svg class="icon icon-arrow"> 
                      <use xlink:href="#icon-arrow"></use>
                    </svg>
                  </div>
                </div>
                <div class="product-modal-panel p-5">
                  <div class="panel-item panel-userpic d-flex align-items-center justify-content-center mb-5"><img src="<?= $GLOBALS['assets'] ?>img/content/user-1.jpg" alt=""></div>
                  <div class="panel-item panel-brand d-flex align-items-center justify-content-center position-relative mb-5">
                    <div class="panel-number position-absolute d-flex align-items-center justify-content-center">3</div><img src="<?= $GLOBALS['assets'] ?>img/content/figma.png" alt="">
                  </div>
                  <button class="panel-item panel-button d-flex align-items-center justify-content-center mb-auto" data-bs-toggle="modal" data-bs-target="#modal-share" data-bs-prev-modal="#modal-product">
                    <svg class="icon icon-share fill-shades-1"> 
                      <use xlink:href="#icon-share"></use>
                    </svg>
                  </button>
                  <button class="panel-item panel-button d-flex align-items-center justify-content-center position-relative">
                    <svg class="icon icon-arrow fill-shades-1"> 
                      <use xlink:href="#icon-arrow"></use>
                    </svg>
                  </button>
                </div>
              </div>
            </div>
            <div class="card tab-pane fade p-0 p-xl-6" id="modal-tab-comments">
              <div class="title d-flex align-items-center mb-6">
                <div class="bg-light-purple rounded-1 px-3 me-3 text-dark">4</div>Reschedule product
                <button class="modal-close ms-auto">
                  <svg class="icon icon-close icon-small">  
                    <use xlink:href="#icon-close"></use>
                  </svg>
                </button>
              </div>
              <div class="caption d-flex align-items-center mb-3 text-reset fs-8">Review this product?
                <div class="info-tooltip ms-1" data-bs-toggle="tooltip" title="You’re product owner">
                  <svg class="icon icon-info">  
                    <use xlink:href="#icon-info"></use>
                  </svg>
                </div>
              </div>
              <div class="editor mb-5 mb-sm-6 position-relative has-button">
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
                      <button class="smileys-item rounded-circle"><img src="<?= $GLOBALS['assets'] ?>img/content/reaction/Blush.png"/></button>
                      <button class="smileys-item rounded-circle"><img src="<?= $GLOBALS['assets'] ?>img/content/reaction/Surprised.png"/></button>
                      <button class="smileys-item rounded-circle"><img src="<?= $GLOBALS['assets'] ?>img/content/reaction/SweatGrinning.png"/></button>
                      <button class="smileys-item rounded-circle"><img src="<?= $GLOBALS['assets'] ?>img/content/reaction/Cool.png"/></button>
                      <button class="smileys-item rounded-circle"><img src="<?= $GLOBALS['assets'] ?>img/content/reaction/Sleepy.png"/></button>
                      <button class="smileys-item rounded-circle"><img src="<?= $GLOBALS['assets'] ?>img/content/reaction/CryingWithLaughter.png"/></button>
                      <button class="smileys-item rounded-circle"><img src="<?= $GLOBALS['assets'] ?>img/content/reaction/HeartEyes.png"/></button>
                      <button class="smileys-item rounded-circle"><img src="<?= $GLOBALS['assets'] ?>img/content/reaction/SmileEyes.png"/></button>
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
                  <button class="d-none d-sm-block ms-auto">
                    <svg class="icon icon-arrow-left">  
                      <use xlink:href="#icon-arrow-left"></use>
                    </svg>
                  </button>
                  <button class="d-none d-sm-block ms-2">
                    <svg class="icon icon-arrow"> 
                      <use xlink:href="#icon-arrow"></use>
                    </svg>
                  </button>
                </div>
                <div class="editor-container" type="text"></div>
                <div class="btn btn-small btn-comment">Comment</div>
              </div>
              <div class="comments-block mt-3">
                <div class="border-bottom d-flex pb-6">
                  <div class="comment-userpic flex-shrink-0"><img class="rounded-circle w-100" src="<?= $GLOBALS['assets'] ?>img/content/user-2.jpg"></div>
                  <div class="ms-4 w-100">
                    <div class="d-flex align-items-start pb-3">
                      <div class="me-5"><b>Stephon Schumm</b>
                        <div class="caption-md mt-1">@ivawelch</div>
                      </div>
                      <div class="d-flex align-items-center ms-auto">
                        <div class="caption-2 me-3">2h</div><b class="me-2">5.0</b>
                        <svg class="icon icon-star-fill fill-yellow"> 
                          <use xlink:href="#icon-star-fill"></use>
                        </svg>
                      </div>
                    </div>
                    <div class="mb-4">Purchased the pack and loaded it in Adobe xd (installed fonts as well), some text and titles are off in some screens, is that a compatibility problem with the latest version of xd?</div>
                    <div class="d-flex comment-controls">
                      <button class="btn-favorite d-flex align-items-center me-5">
                        <svg class="icon icon-double-heart icon-small me-1"> 
                          <use class="fill" href="#icon-heart-fill"></use>
                          <use class="stroke" href="#icon-heart-stroke"></use>
                        </svg>Like
                      </button>
                      <button class="d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#comment-modal-1">
                        <svg class="icon icon-repeat icon-small me-1">  
                          <use xlink:href="#icon-repeat"></use>
                        </svg>Reply
                      </button>
                    </div>
                    <div class="comment-reply collapse" id="comment-modal-1">
                      <div class="d-flex mt-5">
                        <div class="comment-reply-userpic flex-shrink-0"><img class="rounded-circle w-100" src="<?= $GLOBALS['assets'] ?>img/content/user-1.jpg"></div>
                        <div class="ms-4">
                          <textarea class="textarea-transparent mb-4" oninput="this.style.height = &quot;&quot;;this.style.height = this.scrollHeight + &quot;px&quot;" placeholder="Leave something to reply"></textarea>
                          <button class="btn btn-small me-2">Reply</button>
                          <button class="btn-tab btn-small" data-bs-toggle="collapse" data-bs-target="#comment-modal-1">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="border-bottom d-flex pb-6 pt-5 ps-4">
                  <div class="comment-answer-userpic flex-shrink-0 ms-8"><img class="rounded-circle w-100" src="<?= $GLOBALS['assets'] ?>img/content/user-1.jpg"></div>
                  <div class="ms-4 w-100">
                    <div class="d-flex align-items-start pb-3">
                      <div class="me-5"><b>Chelsie Haley</b></div>
                      <div class="d-flex align-items-center ms-auto">
                        <div class="caption-2 me-3">18h</div><b class="me-2">4.0</b>
                        <svg class="icon icon-star-fill fill-yellow"> 
                          <use xlink:href="#icon-star-fill"></use>
                        </svg>
                      </div>
                    </div>
                    <div class="mb-4">Hi @ivawelch, let me check then tell you soon.</div>
                    <div class="d-flex comment-controls">
                      <button class="btn-favorite d-flex align-items-center me-5">
                        <svg class="icon icon-double-heart icon-small me-1"> 
                          <use class="fill" href="#icon-heart-fill"></use>
                          <use class="stroke" href="#icon-heart-stroke"></use>
                        </svg>Like
                      </button>
                      <button class="d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#comment-modal-2">
                        <svg class="icon icon-repeat icon-small me-1">  
                          <use xlink:href="#icon-repeat"></use>
                        </svg>Reply
                      </button>
                    </div>
                    <div class="comment-reply collapse" id="comment-modal-2">
                      <div class="d-flex mt-5">
                        <div class="comment-reply-userpic flex-shrink-0"><img class="rounded-circle w-100" src="<?= $GLOBALS['assets'] ?>img/content/user-1.jpg"></div>
                        <div class="ms-4">
                          <textarea class="textarea-transparent mb-4" oninput="this.style.height = &quot;&quot;;this.style.height = this.scrollHeight + &quot;px&quot;" placeholder="Leave something to reply"></textarea>
                          <button class="btn btn-small me-2">Reply</button>
                          <button class="btn-tab btn-small" data-bs-toggle="collapse" data-bs-target="#comment-modal-2">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="border-bottom d-flex pb-6 pt-5">
                  <div class="comment-userpic flex-shrink-0"><img class="rounded-circle w-100" src="<?= $GLOBALS['assets'] ?>img/content/user-3.jpg"></div>
                  <div class="ms-4 w-100">
                    <div class="d-flex align-items-start pb-3">
                      <div class="me-5"><b>Sabryna Mills</b>
                        <div class="caption-md mt-1">@ivawelch</div>
                      </div>
                      <div class="d-flex align-items-center ms-auto">
                        <div class="caption-2 me-3">15h</div><b class="me-2">5.0</b>
                        <svg class="icon icon-star-fill fill-yellow"> 
                          <use xlink:href="#icon-star-fill"></use>
                        </svg>
                      </div>
                    </div>
                    <div class="mb-4">Five stars. I love this product!</div>
                    <div class="d-flex comment-controls">
                      <button class="btn-favorite d-flex align-items-center me-5">
                        <svg class="icon icon-double-heart icon-small me-1"> 
                          <use class="fill" href="#icon-heart-fill"></use>
                          <use class="stroke" href="#icon-heart-stroke"></use>
                        </svg>Like
                      </button>
                      <button class="d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#comment-modal-3">
                        <svg class="icon icon-repeat icon-small me-1">  
                          <use xlink:href="#icon-repeat"></use>
                        </svg>Reply
                      </button>
                    </div>
                    <div class="comment-reply collapse" id="comment-modal-3">
                      <div class="d-flex mt-5">
                        <div class="comment-reply-userpic flex-shrink-0"><img class="rounded-circle w-100" src="<?= $GLOBALS['assets'] ?>img/content/user-1.jpg"></div>
                        <div class="ms-4">
                          <textarea class="textarea-transparent mb-4" oninput="this.style.height = &quot;&quot;;this.style.height = this.scrollHeight + &quot;px&quot;" placeholder="Leave something to reply"></textarea>
                          <button class="btn btn-small me-2">Reply</button>
                          <button class="btn-tab btn-small" data-bs-toggle="collapse" data-bs-target="#comment-modal-3">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="border-bottom d-flex pb-6 pt-5">
                  <div class="comment-userpic flex-shrink-0"><img class="rounded-circle w-100" src="<?= $GLOBALS['assets'] ?>img/content/user-4.jpg"></div>
                  <div class="ms-4 w-100">
                    <div class="d-flex align-items-start pb-3">
                      <div class="me-5"><b>Micaela Mayer</b>
                        <div class="caption-md mt-1">@ivawelch</div>
                      </div>
                      <div class="d-flex align-items-center ms-auto">
                        <div class="caption-2 me-3">1 day ago</div><b class="me-2">5.0</b>
                        <svg class="icon icon-star-fill fill-yellow"> 
                          <use xlink:href="#icon-star-fill"></use>
                        </svg>
                      </div>
                    </div>
                    <div class="mb-4">Purchased the pack and loaded it in Adobe xd (installed fonts as well), some text and titles are off in some screens, is that a compatibility problem with the latest version of xd?</div>
                    <div class="d-flex comment-controls">
                      <button class="btn-favorite d-flex align-items-center me-5">
                        <svg class="icon icon-double-heart icon-small me-1"> 
                          <use class="fill" href="#icon-heart-fill"></use>
                          <use class="stroke" href="#icon-heart-stroke"></use>
                        </svg>Like
                      </button>
                      <button class="d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#comment-modal-4">
                        <svg class="icon icon-repeat icon-small me-1">  
                          <use xlink:href="#icon-repeat"></use>
                        </svg>Reply
                      </button>
                    </div>
                    <div class="comment-reply collapse" id="comment-modal-4">
                      <div class="d-flex mt-5">
                        <div class="comment-reply-userpic flex-shrink-0"><img class="rounded-circle w-100" src="<?= $GLOBALS['assets'] ?>img/content/user-1.jpg"></div>
                        <div class="ms-4">
                          <textarea class="textarea-transparent mb-4" oninput="this.style.height = &quot;&quot;;this.style.height = this.scrollHeight + &quot;px&quot;" placeholder="Leave something to reply"></textarea>
                          <button class="btn btn-small me-2">Reply</button>
                          <button class="btn-tab btn-small" data-bs-toggle="collapse" data-bs-target="#comment-modal-4">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex pb-6 pt-5">
                  <div class="comment-userpic flex-shrink-0"><img class="rounded-circle w-100" src="<?= $GLOBALS['assets'] ?>img/content/user-5.jpg"></div>
                  <div class="ms-4 w-100">
                    <div class="d-flex align-items-start pb-3">
                      <div class="me-5"><b>Daphne Goodwin</b>
                        <div class="caption-md mt-1">@ivawelch</div>
                      </div>
                      <div class="d-flex align-items-center ms-auto">
                        <div class="caption-2 me-3">2 day ago</div><b class="me-2">5.0</b>
                        <svg class="icon icon-star-fill fill-yellow"> 
                          <use xlink:href="#icon-star-fill"></use>
                        </svg>
                      </div>
                    </div>
                    <div class="mb-4">Purchased the pack and loaded it in Adobe xd (installed fonts as well), some text and titles are off in some screens, is that a compatibility problem with the latest version of xd?</div>
                    <div class="d-flex comment-controls">
                      <button class="btn-favorite d-flex align-items-center me-5">
                        <svg class="icon icon-double-heart icon-small me-1"> 
                          <use class="fill" href="#icon-heart-fill"></use>
                          <use class="stroke" href="#icon-heart-stroke"></use>
                        </svg>Like
                      </button>
                      <button class="d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#comment-modal-5">
                        <svg class="icon icon-repeat icon-small me-1">  
                          <use xlink:href="#icon-repeat"></use>
                        </svg>Reply
                      </button>
                    </div>
                    <div class="comment-reply collapse" id="comment-modal-5">
                      <div class="d-flex mt-5">
                        <div class="comment-reply-userpic flex-shrink-0"><img class="rounded-circle w-100" src="<?= $GLOBALS['assets'] ?>img/content/user-1.jpg"></div>
                        <div class="ms-4">
                          <textarea class="textarea-transparent mb-4" oninput="this.style.height = &quot;&quot;;this.style.height = this.scrollHeight + &quot;px&quot;" placeholder="Leave something to reply"></textarea>
                          <button class="btn btn-small me-2">Reply</button>
                          <button class="btn-tab btn-small" data-bs-toggle="collapse" data-bs-target="#comment-modal-5">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal-share" tabindex="-1" aria-labelledby="modal-share-label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered mx-auto" style="max-width: 408px">
        <div class="modal-content card rounded-3 p-4 p-sm-5">
          <div class="border-bottom card-head d-flex align-items-center justify-content-between mb-5 pb-5">
            <div class="title title-color red">Share this product</div>
            <button class="btn-rounded btn-small close" data-bs-dismiss="modal">
              <svg class="icon icon-close"> 
                <use xlink:href="#icon-close"></use>
              </svg>
            </button>
          </div>
          <div class="card-body p-0">
            <div class="input-group mb-5">
              <button class="input-group-text transparent">
                <svg class="icon icon-link">  
                  <use xlink:href="#icon-link"></use>
                </svg>
              </button>
              <input class="rounded-1 form-control input-small input-action text-shades-1 pe-8" type="text" placeholder="Product Link" value="https://ui8.net/feel-travel">
              <button class="input-group-text transparent text-blue me-2">Copy</button>
            </div>
            <div class="border-bottom preview-photo mb-5 pb-5"><img class="w-100 rounded-2" src="<?= $GLOBALS['assets'] ?>/img/content/photo-1.jpg" alt=""></div>
            <div class="mt-4 d-flex mx-n3"><a class="btn-stroke hover-fill w-100 mx-2" href="https://www.facebook.com/ui8.net/">
                <svg class="icon icon-facebook">  
                  <use xlink:href="#icon-facebook"></use>
                </svg></a><a class="btn-stroke hover-fill w-100 mx-2" href="https://twitter.com/ui8">
                <svg class="icon icon-twitter"> 
                  <use xlink:href="#icon-twitter"></use>
                </svg></a><a class="btn-stroke hover-fill w-100 mx-2" href="https://www.instagram.com/ui8net/">
                <svg class="icon icon-instagram"> 
                  <use xlink:href="#icon-instagram"></use>
                </svg></a></div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal-filter" tabindex="-1" aria-labelledby="modal-filter-label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-fullscreen-md-down h-auto">
        <div class="modal-content card rounded-3 p-4 p-sm-5">
          <div class="border-bottom card-head d-flex align-items-center justify-content-between mb-5 pb-5">
            <div class="title title-color red">Showing 9 of 32 products</div>
            <button class="btn-rounded btn-small close" data-bs-dismiss="modal">
              <svg class="icon icon-close"> 
                <use xlink:href="#icon-close"></use>
              </svg>
            </button>
          </div>
          <div class="card-body p-0">
            <div class="border-bottom mb-5 pb-5">
              <div class="input-group">
                <button class="input-group-text transparent">
                  <svg class="icon icon-search">  
                    <use xlink:href="#icon-search"></use>
                  </svg>
                </button>
                <input class="rounded-1 form-control input-action text-shades-1" type="text" placeholder="Search for products">
              </div>
            </div>
            <div class="border-bottom mb-5 pb-5">
              <div class="caption mb-3 text-reset fs-8">Sort by</div>
              <select class="select select-wide">
                <option>Featured</option>
                <option>Last</option>
                <option>New</option>
              </select>
              <div class="clearfix"></div>
            </div>
            <div class="border-bottom mb-5 pb-5">
              <div class="caption mb-3 fs-8">Showing</div>
              <div class="form-check mb-3 ps-0">
                <label class="form-check-label w-100">All products
                  <input class="form-check-input float-end" type="checkbox">
                </label>
              </div>
              <div class="form-check mb-3 ps-0">
                <label class="form-check-label w-100">UI Kit
                  <input class="form-check-input float-end" type="checkbox">
                </label>
              </div>
              <div class="form-check mb-3 ps-0">
                <label class="form-check-label w-100">Illustration
                  <input class="form-check-input float-end" type="checkbox">
                </label>
              </div>
              <div class="form-check mb-3 ps-0">
                <label class="form-check-label w-100">Wireframe kit
                  <input class="form-check-input float-end" type="checkbox">
                </label>
              </div>
              <div class="form-check ps-0">
                <label class="form-check-label w-100">Icons
                  <input class="form-check-input float-end" type="checkbox">
                </label>
              </div>
            </div>
            <div class="border-bottom mb-5 pb-5">
              <div class="caption mb-6 fs-8">Price</div>
              <div class="js-slider" data-min="0" data-max="100" data-start="20" data-end="50" data-step="1" data-tooltips="true" data-prefix="$"></div>
            </div>
            <div class="mb-5">
              <div class="caption mb-3 fs-8">Rating</div>
              <select class="select select-wide select-rating">
                <div class="test">sdfsdf</div>
                <option>Featured</option>
                <option>Last</option>
                <option>New</option>
              </select>
              <div class="clearfix"></div>
            </div>
            <div class="d-flex justify-content-end">
              <div class="btn-stroke me-3">Reset</div>
              <div class="btn" data-bs-dismiss="modal">Apply</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal-refounds" tabindex="-1" aria-labelledby="modal-refounds-label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-fullscreen-lg-down h-auto mx-auto">
        <div class="modal-content card rounded-3 p-4 p-sm-5">
          <div class="card-head d-flex align-items-center justify-content-between pb-5">
            <div class="title title-color purple">Refunds request</div>
            <button class="btn-rounded btn-small close" data-bs-dismiss="modal">
              <svg class="icon icon-close"> 
                <use xlink:href="#icon-close"></use>
              </svg>
            </button>
          </div>
          <div class="card-body p-0">
            <div class="refounds-body d-md-flex">
              <div class="refounds-stats col-12 col-md-6 rounded-2 p-4 p-sm-5">
                <div class="d-flex align-items-center mb-5">
                  <div class="refounds-preview rounded-2 flex-shrink-0"><img src="<?= $GLOBALS['assets'] ?>img/content/product-1.jpg" alt=""></div>
                  <div class="ms-5">
                    <div class="title mb-2 d-block">Bento Matte 3D Illustration</div>
                    <div class="badge large purple">In progress</div>
                  </div>
                </div>
                <div class="pb-5">
                  <div class="border-bottom refounds-item text-semibold-1 d-flex justify-content-between py-4">
                    <div class="text-shades-2">Request send</div>Aug 20, 2021
                  </div>
                  <div class="border-bottom refounds-item text-semibold-1 d-flex justify-content-between py-4">
                    <div class="text-shades-2">Reason</div>Download link is broken
                  </div>
                  <div class="border-bottom refounds-item text-semibold-1 d-flex justify-content-between py-4">
                    <div class="text-shades-2">Product downloaded</div>
                    <div class="badge green">Yes</div>
                  </div>
                  <div class="border-bottom refounds-item text-semibold-1 d-flex justify-content-between py-4">
                    <div class="text-shades-2">Purchase date</div>July 01, 2021
                  </div>
                  <div class="border-bottom refounds-item text-semibold-1 d-flex justify-content-between py-4">
                    <div class="text-shades-2">Purchase code</div>6373ads-hd73h-8373DS
                  </div>
                  <div class="border-bottom refounds-item text-semibold-1 d-flex justify-content-between py-4">
                    <div class="text-shades-2">Request ID</div>8975ads-hd73h-8974DS
                  </div>
                  <div class="border-bottom refounds-item text-semibold-1 d-flex justify-content-between py-4">
                    <div class="text-shades-2">
                       Market fee
                      <div class="info-tooltip" data-bs-toggle="tooltip" title="Description Market fee">
                        <svg class="icon icon-info-stroke fill-shades-2 ms-1">  
                          <use xlink:href="#icon-info-stroke"></use>
                        </svg>
                      </div>
                    </div>$7.28
                  </div>
                  <div class="border-bottom refounds-item text-semibold-1 d-flex justify-content-between py-4">
                    <div class="text-shades-2">
                       Price
                      <div class="info-tooltip" data-bs-toggle="tooltip" title="Description Price">
                        <svg class="icon icon-info-stroke fill-shades-2 ms-1">  
                          <use xlink:href="#icon-info-stroke"></use>
                        </svg>
                      </div>
                    </div>$72.88
                  </div>
                </div>
                <div class="d-flex mx-n2">
                  <button class="btn-stroke mx-2 w-100">Decline refound</button>
                  <button class="btn mx-2 w-100">Give refund</button>
                </div>
              </div>
              <div class="col-12 col-md-6 pt-6 ps-0 pt-md-5 ps-md-5">
                <div class="title mt-1 mb-3">Suggestions</div>
                <div class="border-bottom refounds-stats-item d-flex py-3">
                  <svg class="icon icon-check fill-green me-3"> 
                    <use xlink:href="#icon-check"></use>
                  </svg>Talk to customer to see if you can help.
                </div>
                <div class="refounds-stats-item d-flex py-3">
                  <svg class="icon icon-check fill-green me-3"> 
                    <use xlink:href="#icon-check"></use>
                  </svg>If not, approve or decline the request.
                </div>
                <div class="title mt-6 mb-4">Download link is broken</div>
                <div class="mb-3">“ I can’t download your item at all. Even tried to change the DNS or VNP, it still doesn’t work. 😢 “</div>
                <div class="d-flex align-items-center mb-5">
                  <div class="refounds-userpic me-3"><img class="rounded-circle w-100" src="<?= $GLOBALS['assets'] ?>img/content/user-1.jpg" alt="Eldred Lockman"></div>Eldred Lockman
                </div>
                <div class="caption d-flex align-items-center mb-3 text-reset fs-8">Send message
                  <div class="info-tooltip ms-1" data-bs-toggle="tooltip" title="Maximum 100 characters. No HTML or emoji allowed">
                    <svg class="icon icon-info">  
                      <use xlink:href="#icon-info"></use>
                    </svg>
                  </div>
                </div>
                <div class="editor mb-5 mb-sm-6 position-relative has-button">
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
                        <button class="smileys-item rounded-circle"><img src="<?= $GLOBALS['assets'] ?>img/content/reaction/Blush.png"/></button>
                        <button class="smileys-item rounded-circle"><img src="<?= $GLOBALS['assets'] ?>img/content/reaction/Surprised.png"/></button>
                        <button class="smileys-item rounded-circle"><img src="<?= $GLOBALS['assets'] ?>img/content/reaction/SweatGrinning.png"/></button>
                        <button class="smileys-item rounded-circle"><img src="<?= $GLOBALS['assets'] ?>img/content/reaction/Cool.png"/></button>
                        <button class="smileys-item rounded-circle"><img src="<?= $GLOBALS['assets'] ?>img/content/reaction/Sleepy.png"/></button>
                        <button class="smileys-item rounded-circle"><img src="<?= $GLOBALS['assets'] ?>img/content/reaction/CryingWithLaughter.png"/></button>
                        <button class="smileys-item rounded-circle"><img src="<?= $GLOBALS['assets'] ?>img/content/reaction/HeartEyes.png"/></button>
                        <button class="smileys-item rounded-circle"><img src="<?= $GLOBALS['assets'] ?>img/content/reaction/SmileEyes.png"/></button>
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
                    <button class="d-none d-sm-block ms-auto">
                      <svg class="icon icon-arrow-left">  
                        <use xlink:href="#icon-arrow-left"></use>
                      </svg>
                    </button>
                    <button class="d-none d-sm-block ms-2">
                      <svg class="icon icon-arrow"> 
                        <use xlink:href="#icon-arrow"></use>
                      </svg>
                    </button>
                  </div>
                  <div class="editor-container" type="text"></div>
                  <div class="btn btn-small btn-comment">Send</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal-withdraw" tabindex="-1" aria-labelledby="modal-withdraw-label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-fullscreen-lg-down h-auto mx-auto">
        <div class="modal-content card rounded-3 p-4 p-sm-5">
          <div class="card-head d-flex align-items-center justify-content-end pb-5">
            <button class="btn-rounded btn-small close" data-bs-dismiss="modal">
              <svg class="icon icon-close"> 
                <use xlink:href="#icon-close"></use>
              </svg>
            </button>
          </div>
          <div class="card-body p-0 text-center">
            <div class="withdraw-icon bg-green rounded-circle d-flex justify-content-center align-items-center mx-auto mb-4">🎉</div>
            <div class="title mb-2">Success!</div>
            <div class="h2 mb-4">$128,000</div>
            <div class="text-semibold-1 mb-5"><span class="text-shades-2">Has been sent to your</span> Paypal: tam@ui8.net</div>
            <button class="btn mb-4" data-bs-dismiss="modal">Done!</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal-post" tabindex="-1" aria-labelledby="modal-post-label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-fullscreen-lg-down h-auto mx-auto">
        <div class="modal-content card rounded-3 p-4 p-sm-5">
          <div class="card-head d-flex align-items-center justify-content-between pb-5">
            <div class="title title-color green">New post</div>
            <button class="btn-rounded btn-small close" data-bs-dismiss="modal">
              <svg class="icon icon-close"> 
                <use xlink:href="#icon-close"></use>
              </svg>
            </button>
          </div>
          <div class="card-body p-0">
            <div class="d-flex mb-5">
              <div class="social-userpic position-relative me-5"><img class="rounded-circle w-100" src="<?= $GLOBALS['assets'] ?>img/content/user-1.jpg">
                <div class="social-link rounded-circle d-flex align-items-center justify-content-center">
                  <svg class="icon icon-min-facebook">  
                    <use xlink:href="#icon-min-facebook"></use>
                  </svg>
                </div>
              </div>
              <div class="social-userpic position-relative me-5"><img class="rounded-circle w-100" src="<?= $GLOBALS['assets'] ?>img/content/user-1.jpg">
                <div class="social-link rounded-circle d-flex align-items-center justify-content-center">
                  <svg class="icon icon-min-twitter"> 
                    <use xlink:href="#icon-min-twitter"></use>
                  </svg>
                </div>
              </div>
            </div>
            <textarea class="modal-post-textarea" placeholder="What you would like to share?"></textarea>
            <div class="title mb-3">Fleet coded version has been released 🔥</div>
            <div class="border-bottom mb-5 pb-5"><img class="rounded-2 w-100" src="<?= $GLOBALS['assets'] ?>img/content/bg-video.jpg" alt="video"></div>
            <div class="d-flex align-items-center">
              <div class="modal-post-file d-flex align-items-center justify-content-center position-relative rounded-circle overflow-hidden me-4">
                <input type="file">
                <svg class="icon icon-image-stroke">  
                  <use xlink:href="#icon-image-stroke"></use>
                </svg>
              </div>
              <div class="modal-post-file d-flex align-items-center justify-content-center position-relative rounded-circle overflow-hidden">
                <input type="file">
                <svg class="icon icon-video-stroke">  
                  <use xlink:href="#icon-video-stroke"></use>
                </svg>
              </div>
              <button class="btn ms-auto" data-bs-dismiss="modal">Post
                <svg class="icon icon-arrow ms-2">  
                  <use xlink:href="#icon-arrow"></use>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
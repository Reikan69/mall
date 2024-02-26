<div class="page-body">
          <div class="row g-0">
            <div class="col-lg-8 col-12 pe-lg-2">
              <div class="card mb-2 p-4 p-sm-5">
                <div class="card-head d-flex align-items-center justify-content-between mb-5 mb-sm-6">
                  <div class="title title-color red">Overview</div>
                  <select class="select select-small">
                    <option>All time</option>
                    <option>In a year</option>
                    <option>Per month</option>
                  </select>
                </div>
                <div class="card-body p-0">
                  <div class="overview js-animate-tabs p-2">
                    <div class="tabs nav flex-nowrap">
                      <div class="tab d-xs-block d-sm-flex" id="overview-1" data-bs-target="#overview-item-1" data-bs-toggle="tab">
                        <div class="overview-icon d-flex justify-content-center align-items-center bg-light-blue">
                          <svg class="icon icon-shopping-bag-stroke">   
                            <use xlink:href="#icon-shopping-bag-stroke"></use>
                          </svg>
                        </div>
                        <div class="overview-details">
                          <div class="caption d-flex align-items-center mb-1">Customers
                            <div class="info-tooltip ms-1" data-bs-toggle="tooltip" title="Small description">
                              <svg class="icon icon-info">  
                                <use xlink:href="#icon-info"></use>
                              </svg>
                            </div>
                          </div>
                          <div class="h2 counter mb-auto">1024</div>
                        </div>
                        <div class="balance d-inline-flex align-items-center px-1 down ms-auto fill" title="Core - Dashboard Builder">
                          <svg class="icon icon-arrow-up me-1 d-block"> 
                            <use xlink:href="#icon-arrow-up"></use>
                          </svg>37.8%<span> </span>
                        </div>
                      </div>
                      <div class="tab d-xs-block d-sm-flex" id="overview-2" data-bs-target="#overview-item-2" data-bs-toggle="tab">
                        <div class="overview-icon d-flex justify-content-center align-items-center bg-light-purple">
                          <svg class="icon icon-activity">  
                            <use xlink:href="#icon-activity"></use>
                          </svg>
                        </div>
                        <div class="overview-details">
                          <div class="caption d-flex align-items-center mb-1">Income
                            <div class="info-tooltip ms-1" data-bs-toggle="tooltip" title="Small description">
                              <svg class="icon icon-info">  
                                <use xlink:href="#icon-info"></use>
                              </svg>
                            </div>
                          </div>
                          <div class="h2 counter mb-auto">256k</div>
                        </div>
                        <div class="balance d-inline-flex align-items-center px-1 up ms-auto fill" title="Core - Dashboard Builder">
                          <svg class="icon icon-arrow-up me-1 d-block"> 
                            <use xlink:href="#icon-arrow-up"></use>
                          </svg>38.2%<span> </span>
                        </div>
                      </div>
                      <div class="bg-tab-active"></div>
                    </div>
                  </div>
                  <div class="overview-container tab-content">
                    <div class="tab-pane overview-item fade active show" id="overview-item-1" role="tabpanel" aria-labelledby="overview-1">
                      <div class="users">
                        <div class="users-head d-flex align-items-center justify-content-between mb-4">
                          <div class="users-info">Welcome <b>857 customers</b> with a personal message 😎</div><a class="btn-stroke" href="message-center.html">Send <span class="ms-1 d-none d-sm-block" >message</span></a>
                        </div>
                        <div class="users-list d-flex justify-content-around"><a class="users-item text-center" href="message-center.html">
                            <div class="userpic"><img src="<?= $GLOBALS['assets'] ?>img/content/user-2.jpg"></div>
                            <div class="name">Gladyce</div></a><a class="users-item text-center" href="message-center.html">
                            <div class="userpic"><img src="<?= $GLOBALS['assets'] ?>img/content/user-3.jpg"></div>
                            <div class="name">Elbert</div></a><a class="users-item text-center" href="message-center.html">
                            <div class="userpic"><img src="<?= $GLOBALS['assets'] ?>img/content/user-4.jpg"></div>
                            <div class="name">Joyce</div></a><a class="users-item text-center d-none d-sm-block" href="customer-list.html">
                            <div class="icon-all d-flex align-items-center justify-content-center">
                              <svg class="icon icon-arrow"> 
                                <use xlink:href="#icon-arrow"></use>
                              </svg>
                            </div>
                            <div class="name">View all</div></a></div>
                      </div>
                    </div>
                    <div class="tab-pane overview-item fade" id="overview-item-2" role="tabpanel" aria-labelledby="overview-2">
                      <div class="chart chart-overview-income">
                        <div id="overview-income"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mb-2 p-4 p-sm-5">
                <div class="card-head d-flex align-items-center justify-content-between mb-5 mb-sm-6">
                  <div class="title title-color purple">Product views</div>
                  <select class="select select-small">
                    <option>Last 7 days</option>
                    <option>All time</option>
                    <option>In a year</option>
                    <option>Per month</option>
                  </select>
                </div>
                <div class="chart chart-product-views">
                  <div id="product-views"></div>
                </div>
              </div>
              <div class="card mb-2 p-4 p-sm-5">
                <div class="card-head d-flex align-items-center justify-content-between mb-5 mb-sm-6">
                  <div class="title title-color green">Product views</div>
                </div>
                <div class="tips">
                  <div class="card-info mb-4">Need some ideas for the next product?</div>
                  <div class="tips-list row g-0">
                    <div class="col-12 col-sm-6 pe-lg-2">
                      <div class="tips-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal-video">
                        <div class="tips-icon d-flex align-items-center justify-content-center me-3 flex-shrink-0">
                          <svg class="icon icon-schedule">  
                            <use xlink:href="#icon-schedule"></use>
                          </svg>
                        </div>
                        <div class="tips-details flex-shrink-0">
                          <div class="tips-title mb-2">Early access</div>
                          <div class="caption-info d-flex">
                            <div class="badge min purple me-1">New</div>
                            <div class="user d-flex align-items-center">
                              <div class="userpic me-1"><img src="<?= $GLOBALS['assets'] ?>img/content/user-1.jpg" alt=""></div>
                              <div class="time pe-2">3 mins read</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tips-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal-video">
                        <div class="tips-icon d-flex align-items-center justify-content-center me-3 flex-shrink-0">
                          <svg class="icon icon-design">    
                            <use xlink:href="#icon-design"></use>
                          </svg>
                        </div>
                        <div class="tips-details flex-shrink-0">
                          <div class="tips-title mb-2">Exclusive downloads</div>
                          <div class="caption-info d-flex">
                            <div class="user d-flex align-items-center">
                              <div class="userpic me-1"><img src="<?= $GLOBALS['assets'] ?>img/content/user-2.jpg" alt=""></div>
                              <div class="time pe-2">3 mins</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tips-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal-video">
                        <div class="tips-icon d-flex align-items-center justify-content-center me-3 flex-shrink-0">
                          <svg class="icon icon-phone"> 
                            <use xlink:href="#icon-phone"></use>
                          </svg>
                        </div>
                        <div class="tips-details flex-shrink-0">
                          <div class="tips-title mb-2">Asset use guidelines</div>
                          <div class="caption-info d-flex">
                            <div class="badge min green me-1">Popular</div>
                            <div class="user d-flex align-items-center">
                              <div class="userpic me-1"><img src="<?= $GLOBALS['assets'] ?>img/content/user-3.jpg" alt=""></div>
                              <div class="time pe-2">Time</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 pe-lg-2">
                      <div class="tips-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal-video">
                        <div class="tips-icon d-flex align-items-center justify-content-center me-3 flex-shrink-0">
                          <svg class="icon icon-arrow"> 
                            <use xlink:href="#icon-arrow"></use>
                          </svg>
                        </div>
                        <div class="tips-details flex-shrink-0">
                          <div class="tips-title mb-2">Asset use guidelines</div>
                          <div class="caption-info d-flex">
                            <div class="badge min green me-1">Small label</div>
                            <div class="user d-flex align-items-center">
                              <div class="userpic me-1"><img src="<?= $GLOBALS['assets'] ?>img/content/user-4.jpg" alt=""></div>
                              <div class="time pe-2">Time</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tips-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal-video">
                        <div class="tips-icon d-flex align-items-center justify-content-center me-3 flex-shrink-0">
                          <svg class="icon icon-video-recorder">    
                            <use xlink:href="#icon-video-recorder"></use>
                          </svg>
                        </div>
                        <div class="tips-details flex-shrink-0">
                          <div class="tips-title mb-2">Behind the scenes</div>
                          <div class="caption-info d-flex">
                            <div class="badge min red me-1">Hot</div>
                            <div class="user d-flex align-items-center">
                              <div class="userpic me-1"><img src="<?= $GLOBALS['assets'] ?>img/content/user-5.jpg" alt=""></div>
                              <div class="time pe-2">3 mins read</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tips-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal-video">
                        <div class="tips-icon d-flex align-items-center justify-content-center me-3 flex-shrink-0">
                          <svg class="icon icon-multiselect">   
                            <use xlink:href="#icon-multiselect"></use>
                          </svg>
                        </div>
                        <div class="tips-details flex-shrink-0">
                          <div class="tips-title mb-2">Life & work updates</div>
                          <div class="caption-info d-flex">
                            <div class="user d-flex align-items-center">
                              <div class="userpic me-1"><img src="<?= $GLOBALS['assets'] ?>img/content/user-6.jpg" alt=""></div>
                              <div class="time pe-2">3 mins read</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mb-2 p-4 p-sm-5">
                <div class="card-head d-flex align-items-center justify-content-between mb-5 mb-sm-6">
                  <div class="title title-color blue">Get more customers!</div>
                </div>
                <div class="card-info">50% of new customers explore products because the author sharing the work on the social media network. Gain your earnings right now! 🔥</div>
                <div class="mt-4 d-flex mx-n3"><a class="btn-stroke hover-fill w-100 mx-2" href="https://www.facebook.com/ui8.net/">
                    <svg class="icon icon-facebook me-0 me-sm-2">   
                      <use xlink:href="#icon-facebook"></use>
                    </svg><span class="d-none d-sm-block">Facebook</span></a><a class="btn-stroke hover-fill w-100 mx-2" href="https://twitter.com/ui8">
                    <svg class="icon icon-twitter me-0 me-sm-2">    
                      <use xlink:href="#icon-twitter"></use>
                    </svg><span class="d-none d-sm-block">Twitter</span></a><a class="btn-stroke hover-fill w-100 mx-2" href="https://www.instagram.com/ui8net/">
                    <svg class="icon icon-instagram me-0 me-sm-2">  
                      <use xlink:href="#icon-instagram"></use>
                    </svg><span class="d-none d-sm-block">Instagram</span></a></div>
              </div>
            </div>
            <div class="col-lg-4 col-12">
              <div class="card mb-2 p-4 p-sm-5">
                <div class="card-head d-flex align-items-center justify-content-between mb-5 mb-sm-6">
                  <div class="title title-color blue">Popular products</div>
                </div>
                <div class="popular">
                  <div class="border-bottom d-flex justify-content-between pb-4 mb-4">
                    <div class="caption">Products</div>
                    <div class="caption">Earning</div>
                  </div>
                  <div class="popular-list"> 
                    <div class="popular-item mb-3 py-3 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal-product">
                      <div class="popular-preview flex-shrink-0 me-3"> <img srcset="img/content/product-1@2x.jpg 2x" src="<?= $GLOBALS['assets'] ?>img/content/product-1.jpg" alt="Crypter - NFT UI kit"/>
                      </div>
                      <div class="popular-title pe-3">Crypter - NFT UI kit</div>
                      <div class="popular-details flex-shrink-0 ms-auto text-end">
                        <div class="popular-price">$2,453.80</div>
                        <div class="badge min green-light">Active</div>
                      </div>
                    </div>
                    <div class="popular-item mb-3 py-3 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal-product">
                      <div class="popular-preview flex-shrink-0 me-3"> <img srcset="img/content/product-2@2x.jpg 2x" src="<?= $GLOBALS['assets'] ?>img/content/product-2.jpg" alt="Bento Matte 3D illustration 1.0"/>
                      </div>
                      <div class="popular-title pe-3">Bento Matte 3D illustration 1.0</div>
                      <div class="popular-details flex-shrink-0 ms-auto text-end">
                        <div class="popular-price">$105.60</div>
                        <div class="badge min red-light">Deactive</div>
                      </div>
                    </div>
                    <div class="popular-item mb-3 py-3 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal-product">
                      <div class="popular-preview flex-shrink-0 me-3"> <img srcset="img/content/product-3@2x.jpg 2x" src="<?= $GLOBALS['assets'] ?>img/content/product-3.jpg" alt="Excellent material 3D chair"/>
                      </div>
                      <div class="popular-title pe-3">Excellent material 3D chair</div>
                      <div class="popular-details flex-shrink-0 ms-auto text-end">
                        <div class="popular-price">$648.60</div>
                        <div class="badge min green-light">Active</div>
                      </div>
                    </div>
                    <div class="popular-item mb-3 py-3 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal-product">
                      <div class="popular-preview flex-shrink-0 me-3"> <img srcset="img/content/product-4@2x.jpg 2x" src="<?= $GLOBALS['assets'] ?>img/content/product-4.jpg" alt="Fleet - travel shopping kit"/>
                      </div>
                      <div class="popular-title pe-3">Fleet - travel shopping kit</div>
                      <div class="popular-details flex-shrink-0 ms-auto text-end">
                        <div class="popular-price">$648.60</div>
                        <div class="badge min green-light">Active</div>
                      </div>
                    </div>
                  </div><a class="btn-stroke w-100" href="products-dashboard.html">All products</a>
                </div>
              </div>
              <div class="card mb-2 p-4 p-sm-5">
                <div class="card-head d-flex align-items-center justify-content-between mb-5 mb-sm-6">
                  <div class="title title-color yellow">Comments</div>
                </div>
                <div class="review-card">
                  <div class="border-bottom review-item d-flex pb-5 mb-5">
                    <div class="review-userpic me-3 flex-shrink-0"><img src="<?= $GLOBALS['assets'] ?>img/content/user-2.jpg" alt="Ethel"></div>
                    <div class="review-details flex-grow-1">
                      <div class="review-title d-flex align-items-center">
                        <div class="user me-auto"><span class="name">Ethel</span><span class="login ms-1 text-shades-1">@ethel</span></div>
                        <div class="time text-shades-1">1h</div>
                      </div>
                      <div class="review-product mb-2 text-shades-1">On <b>Smiles – 3D icons</b></div>
                      <div class="review-message mb-4">Great work 😊</div>
                      <div class="review-control d-flex align-items-center justify-content-between"><a class="review-control-item" href="message-center.html">
                          <svg class="icon icon-messages-stroke">   
                            <use xlink:href="#icon-messages-stroke"></use>
                          </svg></a><a class="review-control-item btn-favorite">
                          <svg class="icon icon-double-heart"> 
                            <use class="fill" href="#icon-heart-fill"></use>
                            <use class="stroke" href="#icon-heart-stroke"></use>
                          </svg></a><a class="review-control-item" href="products-comments.html">
                          <svg class="icon icon-link">  
                            <use xlink:href="#icon-link"></use>
                          </svg></a></div>
                    </div>
                  </div>
                  <div class="border-bottom review-item d-flex pb-5 mb-5">
                    <div class="review-userpic me-3 flex-shrink-0"><img src="<?= $GLOBALS['assets'] ?>img/content/user-3.jpg" alt="Jazmyn"></div>
                    <div class="review-details flex-grow-1">
                      <div class="review-title d-flex align-items-center">
                        <div class="user me-auto"><span class="name">Jazmyn</span><span class="login ms-1 text-shades-1">@ethel</span></div>
                        <div class="time text-shades-1">8h</div>
                      </div>
                      <div class="review-product mb-2 text-shades-1">On <b>Fleet - Travel shopping</b></div>
                      <div class="review-message mb-4">I need react version asap!</div>
                      <div class="review-control d-flex align-items-center justify-content-between"><a class="review-control-item" href="message-center.html">
                          <svg class="icon icon-messages-stroke">   
                            <use xlink:href="#icon-messages-stroke"></use>
                          </svg></a><a class="review-control-item btn-favorite">
                          <svg class="icon icon-double-heart"> 
                            <use class="fill" href="#icon-heart-fill"></use>
                            <use class="stroke" href="#icon-heart-stroke"></use>
                          </svg></a><a class="review-control-item" href="products-comments.html">
                          <svg class="icon icon-link">  
                            <use xlink:href="#icon-link"></use>
                          </svg></a></div>
                    </div>
                  </div>
                  <div class="border-bottom review-item d-flex pb-5 mb-5">
                    <div class="review-userpic me-3 flex-shrink-0"><img src="<?= $GLOBALS['assets'] ?>img/content/user-4.jpg" alt="Ethel"></div>
                    <div class="review-details flex-grow-1">
                      <div class="review-title d-flex align-items-center">
                        <div class="user me-auto"><span class="name">Ethel</span><span class="login ms-1 text-shades-1">@ethel</span></div>
                        <div class="time text-shades-1">1h</div>
                      </div>
                      <div class="review-product mb-2 text-shades-1">On <b>Smiles – 3D icons</b></div>
                      <div class="review-message mb-4">How can I buy only the design?</div>
                      <div class="review-control d-flex align-items-center justify-content-between"><a class="review-control-item" href="message-center.html">
                          <svg class="icon icon-messages-stroke">   
                            <use xlink:href="#icon-messages-stroke"></use>
                          </svg></a><a class="review-control-item btn-favorite">
                          <svg class="icon icon-double-heart"> 
                            <use class="fill" href="#icon-heart-fill"></use>
                            <use class="stroke" href="#icon-heart-stroke"></use>
                          </svg></a><a class="review-control-item" href="products-comments.html">
                          <svg class="icon icon-link">  
                            <use xlink:href="#icon-link"></use>
                          </svg></a></div>
                    </div>
                  </div><a class="btn-stroke w-100" href="products-comments.html">View all</a>
                </div>
              </div>
              <div class="card mb-2 p-4 p-sm-5">
                <div class="card-head d-flex align-items-center justify-content-between mb-5 mb-sm-6">
                  <div class="title title-color red">Refund requests</div>
                </div>
                <div class="refound-card">
                  <div class="refound-item d-flex align-items-start mb-5">
                    <div class="refound-icon bg-tint-red flex-shrink-0 rounded-circle">
                      <svg class="icon icon-basket m-3 fill-red">   
                        <use xlink:href="#icon-basket"></use>
                      </svg>
                    </div>
                    <div class="refound-content ms-3 text-shades-1">You have <b>52 open refund requests</b> to action. This includes <b>8 new requests</b>. 👀</div>
                  </div><a class="btn-stroke w-100" href="income-refunds.html">Review refund requests</a>
                </div>
              </div>
            </div>
          </div>
</div>
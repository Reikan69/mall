var baseurl = "http://localhost/admin_management/";
//var baseurl = "https://1mall.info/admin/";

// Function to extract YouTube video ID from a given URL
function getYouTubeVideoId(url) {
    var videoId = '';
    var match = url.match(/[?&]v=([^&]+)/);
    if (match) {
        videoId = match[1];
    }
    return videoId;
}

// Function to handle 'Shop more' button click event
function moredetail() {
    $(document).on('click', '.shopmore', function(event) {
        // Resetting filter set and swiper container
        var filterSet = $('.shops-subtitle.light-gray-title');
        filterSet.text('All');
        var swiperContainer = $('.categories-slider');
        var albumGrid = $('.album-grid#load_data');

        // Function to fetch categories and populate the list
        function fetchCategory() {
            // AJAX request to fetch categories
            $.ajax({
                url: baseurl+'Api/getCategory/',
                method: 'GET',
                dataType: 'json',
                timeout: 10000,
                success: function(categories) {
                    renderCategories(categories);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching categories:', error);
                }
            });
        }

        // Function to fetch floor data including "Show all"
        function fetchFloors() {
            // AJAX request to fetch floors
            return $.ajax({
                url: baseurl+'Api/getFloor',
                method: 'GET',
                dataType: 'json',
                timeout: 10000,
                success: function(floors) {
                    var filteredFloors = floors.filter(function(floor) { return floor.floor !== 'all'; });
                    renderFloors(filteredFloors);

                    fetchShopFloor('all','all', 'all')
                        .then(function(data) {
                            renderShopItems(data);
                        });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching floors:', error);
                }
            });
        }

        // Function to fetch shop data for a specific floor and category
        function fetchShopFloor(mall,floor, category) {
            var mallData = localStorage.getItem('selectedMall');
            // Parse the JSON string to get the mall data object
            var data = JSON.parse(mallData);
            // Retrieve the UID from the mall data object
            var mall = data.uid;
            var url = baseurl+'Api/getShopFilter/' + mall;
            if (floor === 'all') {
                url += '/all';
            } else if (floor) {
                url += '/' + floor;
            }
            if (category === 'all') {
                url += '/all';
            } else if (category) {
                url += '/' + category;
            }
            return $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json'
            });
        }

        // Rendering categories in the list
        function renderCategories(categories) {
            var listContainer = $('#category-filter');
            listContainer.html('');

            var allCategory = { id: 'all', name: 'all' };
            categories.unshift(allCategory);

            categories.forEach(function(category) {
                var listItem = $('<li></li>');
                var link = $('<a></a>').addClass('list-button item-link tab-link filter-tab').attr('data-category', category.name).text(category.name);
                listItem.append(link);
                listContainer.append(listItem);
            });

            listContainer.find('li:first-child a').addClass('tab-link-active');
        }

        // Rendering floors in swiper container
        function renderFloors(floors) {
            swiperContainer.html('');

            var showAllSlide = $('<swiper-slide></swiper-slide>');
            var showAllLink = $('<a></a>').addClass('tab-link fashion-link category-slide tab-link-active').attr('data-floor', 'all').text('All Floors');
            showAllSlide.append(showAllLink);
            swiperContainer.append(showAllSlide);

            var additionalLinkSlide = $('<swiper-slide></swiper-slide>');
            var additionalLink = $('<a></a>').addClass('tab-link fashion-link category-slide').attr('href', '').text('G');
            additionalLinkSlide.append(additionalLink);
            swiperContainer.append(additionalLinkSlide);

            floors.forEach(function(floor) {
                var slide = $('<swiper-slide></swiper-slide>');
                var link = $('<a></a>').addClass('tab-link fashion-link category-slide').attr('data-floor', floor.floor).text(floor.floor);
                slide.append(link);
                swiperContainer.append(slide);
            });
        }

        // Rendering shop items
        function renderShopItems(data) {
            albumGrid.html('');

            if (data.length === 0) {
                var noDataMessage = $('<div></div>').html("<b>No data Found</b>");
                albumGrid.append(noDataMessage);
            } else {
                data.forEach(function(item) {
                    var albumLink = $('<a></a>').addClass('link');
                    var albumImage = $('<img>').attr('src', item.link_pic).attr('alt', '');
                    var albumDetails = $('<div></div>').addClass('album-details');
                    var albumTitle = $('<div></div>').addClass('album-title').text(item.name);
                    var albumAuthor = $('<div></div>').addClass('album-author').text(item.category);
                    albumDetails.append(albumTitle, albumAuthor);
                    albumLink.append(albumImage, albumDetails);
                    albumGrid.append(albumLink);
                });
            }
        }

        // Handling tab clicks
        function handleTabClick(event) {
            event.preventDefault();
            var floor = $(event.target).data('floor') || event.target.id;
            var category = $('#category-filter').find('.tab-link-active').data('category');
            var mallData = localStorage.getItem('selectedMall');
            // Parse the JSON string to get the mall data object
            var data = JSON.parse(mallData);
            // Retrieve the UID from the mall data object
            var mall = data.uid;
            if (floor) {
                console.log('Clicked on floor tab: ' + floor);

                var activeTab = swiperContainer.find('.tab-link-active');
                if (activeTab.length) {
                    activeTab.removeClass('tab-link-active');
                }

                $(event.target).addClass('tab-link-active');

                fetchShopFloor(mall,floor, category)
                    .then(function(data) {
                        renderShopItems(data);
                    });
            }
        }

        // Handling category clicks
        function handleCategoryClick(event) {
            event.preventDefault();
            var category = $(event.target).data('category');
            var floor = swiperContainer.find('.tab-link-active').data('floor');
            var mallData = localStorage.getItem('selectedMall');
            // Parse the JSON string to get the mall data object
            var data = JSON.parse(mallData);
            // Retrieve the UID from the mall data object
            var mall = data.uid;
            if (category) {
                console.log('Clicked on category: ' + category);

                var activeCategory = $('#category-filter').find('.tab-link-active');
                if (activeCategory.length) {
                    activeCategory.removeClass('tab-link-active');
                }

                $(event.target).addClass('tab-link-active');

                fetchShopFloor(mall,floor, category)
                    .then(function(data) {
                        renderShopItems(data);
                    });
                filterSet.text(category);
            }
        }

        // Fetch floors data and render tabs
        fetchFloors();
        // Load categories
        fetchCategory();
        // Attach event listener to floor tabs container
        swiperContainer.on('click', '.tab-link', handleTabClick);
        // Attach event listener to category links
        $('#category-filter').on('click', '.tab-link', handleCategoryClick);
        // Handle click on "Show all" link
        swiperContainer.on('click', '[data-floor="all"]', function(event) {   
            var mallData = localStorage.getItem('selectedMall');
            // Parse the JSON string to get the mall data object
            var data = JSON.parse(mallData);
            // Retrieve the UID from the mall data object
            var mall = data.uid;
            event.preventDefault();
            console.log("Show all link clicked");
            var category = $('#category-filter').find('.tab-link-active').data('category');
            fetchShopFloor(mall,'all', category)
                .then(function(data) {
                    renderShopItems(data);
                });
        });
    });

    // Handling 'Cuisine more' button click event
    $(document).on('click', '.cuisinemore', function(event) {
        event.preventDefault();
        // AJAX request to fetch cuisine data
        var mallData = localStorage.getItem('selectedMall');
        // Parse the JSON string to get the mall data object
        var data = JSON.parse(mallData);
        // Retrieve the UID from the mall data object
        var mall = data.uid;
        console.log(mall);
        var body = $('.menu-list');
        $.ajax({
            url: baseurl+'Api/getCuisine/' + mall,
            method: 'GET',
            dataType: 'json',
            timeout: 10000,
            success: function(response) {
                if(response.length ===0){
                     body.html('<p>No Data Found</p>');
                }else{
                    $.each(response, function(index, cuisine) {
                        var rating = (cuisine.rating === undefined || cuisine.rating === null || cuisine.rating === 0 || cuisine.rating === '') ? 5 : cuisine.rating;
                        var listItem ='<a href="/new-menu/" class="card card-album shop-photo menudetails" data-menu-id="'+cuisine.uid+'">' +
                                      '<div class="card-image">' +
                                        '<img src="'+cuisine.link_pic+'" alt="">' +
                                        '<div class="card-movie-rating">' +
                                          '<i class="icon f7-icons text-color-yellow">star_fill</i>' +
                                          rating+'/5' +
                                        '</div>' +
                                      '</div>' +
                                    '</a>' ;
                        body.append(listItem);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching events:', error);
            }
        });
    });

    // Handling 'Event more' button click event
    $(document).on('click', '.eventmore', function(event) {
        event.preventDefault();
        // AJAX request to fetch event data
        var mallData = localStorage.getItem('selectedMall');
        // Parse the JSON string to get the mall data object
        var data = JSON.parse(mallData);
        // Retrieve the UID from the mall data object
        var mall = data.uid;
        console.log(mall);
        var body = $('.event-all');
        $.ajax({
            url: baseurl+'Api/getEvent/' + mall,
            method: 'GET',
            dataType: 'json',
            timeout: 10000,
            success: function(response) {
                if(response.length ===0){
                     body.html('<p>No Data Found</p>');
                }else{

                    $.each(response, function(index, event) {
                        var listItem = '<li>' +
                            '<a href="/event/" class="item-link item-content eventdetails" data-event-id="' + event.uid + '">' +
                              '<div class="item-media"><img src="' + event.link_pic + '" class="event-thumbnail" alt=""></div>' +
                              '<div class="item-inner">' +
                                '<div class="item-title">' +
                                  '<div class="item-name">' + event.name + '</div>' +
                                  '<div class="item-footer">' + event.location + '</div>' +
                                '</div>' +
                                '<div class="item-after event-duration">' +
                                  '<span class="badge bg-color-primary">' + event.range1 + '</span>' +
                                  '<span class="date">' + event.range2 + '</span>' +
                                '</div>' +
                              '</div>' +
                            '</a>' +
                          '</li>';

                        body.append(listItem);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching events:', error);
            }
        });
    });
     // Handling 'Cuisine more' button click event
    $(document).on('click', '.blogmore', function(event) {
        event.preventDefault();
        // AJAX request to fetch cuisine data
        var mallData = localStorage.getItem('selectedMall');
        // Parse the JSON string to get the mall data object
        var data = JSON.parse(mallData);
        // Retrieve the UID from the mall data object
        var mall = data.uid;
        console.log(mall);
        var body = $('.post-list');
        $.ajax({
            url: baseurl+'Api/getBlog/' + mall,
            method: 'GET',
            dataType: 'json',
            timeout: 10000,
            success: function(response) {
                if(response.length ===0){
                     body.html('<p>No Data Found</p>');
                }else{
                    $.each(response, function(index, blog) {
                        var relativeTime = moment(blog.post_nf).fromNow();
                        var listItem = '<a href="/single/" class="link post-horizontal" data-blog-id="' + blog.uid + '">' +
                                          '<div class="infos">' +
                                            '<div class="post-category">' + blog.category + '</div>' +
                                            '<div class="post-title">' + blog.title + '</div>' +
                                            '<div class="post-date">' + relativeTime + '</div>' +
                                          '</div>' +
                                          '<div class="post-image"><img src="' + blog.link_pic + '" alt=""></div>' +
                                        '</a>';

                        body.append(listItem);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching events:', error);
            }
        });
    });
    // Handling 'Menu details' click event
    $(document).on('click', '.menudetails', function(event) {
        event.preventDefault();
        var menuId = $(this).data('menu-id');
        // AJAX request to fetch menu details
        $.ajax({
            //this all to set the mall data to all
            url: baseurl+'Api/getCuisine/all/1/' + menuId,
            method: 'GET',
            dataType: 'json',
            timeout: 10000,
            success: function(response) {
                var menuData = response[0];
                // Rendering menu details
                $('.float_page').text(menuData.title);
                $('.single-post-date').text(menuData.post);
                $('.single-post-title').text(menuData.title);
                $('.single-cover-image').attr('src', menuData.link_pic);
                $('.single-post-content').html(menuData.content);
                var categoryNames = menuData.category_name.split(',');
                var $categoryContainer  = $('.category-list');
                $categoryContainer.empty();
                categoryNames.forEach(function(category) {
                    $categoryContainer.append('<span class="single-post-category">' + category + '</span>');
                });
                $('.author-description').text(menuData.category_name);
                $('.author-name').text(menuData.by);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching menu details:', error);
            }
        });
    });

    // Handling 'Shop details' click event
    $(document).on('click', '.shopdetails', function(event) {
        event.preventDefault();
        var shopId = $(this).data('shop-id');
        // AJAX request to fetch shop details
        $.ajax({
            //this all to set the mall data to all
            url: baseurl+'Api/getShop/all/1/' + shopId,
            method: 'GET',
            dataType: 'json',
            timeout: 10000,
            success: function(response) {
                var shopData = response[0];
                // Rendering shop details
                $('.float_page').text(shopData.name);
                $('.album-header .album-title').text(shopData.name);
                $('.album-header .album-artist').text(shopData.category);
                $('.album-stat:not(.album-stat-share) .album-stat-number').text(shopData.branches);
                $('.album-stat:not(.album-stat-share) .album-stat-number').eq(0).text(shopData.lot);
                $('.album-header .album-cover').attr('src', shopData.link_pic);
                $('#tab2').find('.title').text(shopData.name);
                $('#tab2').find('.shop-photo').each(function(index) {
                    $(this).find('img').attr('src', shopData.link_pic);
                });
                var isHTML = /<[a-z][\s\S]*>/i.test(shopData.desc);
                if (isHTML) {
                    $('#tab1').find('p').html(shopData.desc);
                } else {
                    $('#tab1').find('p').text(shopData.desc);
                }
                var unescapedEmbedLink = decodeURIComponent(shopData.embedlink);
                var videoId = getYouTubeVideoId(unescapedEmbedLink);
                var embeddableUrl = 'https://www.youtube.com/embed/' + videoId;
                var newIframe = $('<iframe>', {
                    'src': embeddableUrl,
                    'title': 'YouTube video player',
                    'allow': 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share',
                    'allowfullscreen': ''
                });
                $('#tab1 iframe').replaceWith(newIframe);
                $('#tab1 iframe').replaceWith(newIframe);
                $('#tab2 .card-image').empty();
                if (shopData.gallery_images.length > 0) {
                    $.each(shopData.gallery_images, function(index, imageUrl) {
                        var galleryImage = $('<img>').attr('src', imageUrl).attr('alt', 'Food Items');
                        var card = $('<div>').addClass('card card-album shop-photo').append($('<div>').addClass('card-image').append(galleryImage));
                        $('#tab2 .grid').append(card);
                    });
                } else {
                    $('#tab2 .grid').append($('<h2>').text('No images'));
                }
                $('#tab3 .card-image').empty();
                if (shopData.menu_images.length > 0) {
                    $.each(shopData.menu_images, function(index, imageUrl) {
                        var menuImage = $('<img>').attr('src', imageUrl).attr('alt', 'Food Items');
                        var card = $('<div>').addClass('card card-album menu-photo').append($('<div>').addClass('card-image').append(menuImage));
                        $('#tab3 .grid').append(card);
                    });
                } else {
                    $('#tab3 .grid').append($('<h2>').text('No images'));
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching shop details:', error);
            }
        });
    });

    // Handling 'Event details' click event
    $(document).on('click', '.eventdetails', function(event) {
        event.preventDefault();
        var eventId = $(this).data('event-id');
        // AJAX request to fetch event details
        $.ajax({
            //this all to set the mall data to all
            url: baseurl+'Api/getEvent/all/1/' + eventId,
            method: 'GET',
            dataType: 'json',
            timeout: 10000,
            success: function(response) {
                if (response && response.length > 0) {
                    var eventData = response[0];
                    // Rendering event details

                    $('.float_page').text(eventData.name);
                    $('.album-cover').attr('src', eventData.link_pic);
                    $('.album-title').text(eventData.name);
                    $('.album-artist').text(eventData.category_name);
                    $('.album-stats .album-stat:eq(0) .album-stat-number').text(eventData.range1);
                    $('.album-stats .album-stat:eq(0) .album-stat-title').text(eventData.range2);
                    $('.album-stats .album-stat:eq(1) .album-stat-number').text(eventData.range3);
                    $('.album-stats .album-stat:eq(1) .album-stat-title').text(eventData.range4);
                    $('.venue-title').text(eventData.location);
                    $('.event-content').html(eventData.content);
                    $('.single-post-author .author-name').text(eventData.location);
                } else {
                    console.error('Error: No data returned or data format is incorrect.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching event details:', error);
            }
        });
    });

    // Handling 'Blog details' click event
    $(document).on('click', '.blogdetails', function(event) {
        event.preventDefault();
        var blogId = $(this).data('blog-id');
        // AJAX request to fetch blog details
        $.ajax({
            //this all to set the mall data to all
            url: baseurl+'Api/getBlog/all/1/' + blogId,
            method: 'GET',
            dataType: 'json',
            timeout: 10000,
            success: function(response) {
                var blogData = response[0];
                // Rendering blog details
                $('.float_page').text(blogData.title);
                $('.single-post-date').text(blogData.post);
                $('.single-post-title').text(blogData.title);
                $('.single-cover-image').attr('src', blogData.link_pic);
                $('.single-post-content').html(blogData.content);
                var categoryNames = blogData.category_name.split(',');
                var $categoryContainer  = $('.category-list');
                $categoryContainer.empty();
                categoryNames.forEach(function(category) {
                    $categoryContainer.append('<span class="single-post-category">' + category + '</span>');
                });
                $('.author-description').text(blogData.category_name);
                $('.author-name').text(blogData.post_by);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching menu details:', error);
            }
        });
    });
}

// Function to load event data from the server and populate the event list
function loadEventData($mall = null) {
    var body = $('.event-list');
    body.html('');
    $.ajax({
        url: baseurl+'Api/getEvent/' +$mall,
        method: 'GET',
        dataType: 'json',
        timeout: 10000,
        success: function(response) {
            if (response.length === 0) {
                // If response is empty, display 'No menu items found' message
                body.html('<div class="swiper-slide"><p style="padding-left:15px;">No Data found</p></div>');
            } else {
                // Iterate through each event and create list items
                $.each(response, function(index, event) {
                    var listItem = '<li>' +
                        '<a href="/event/" class="item-link item-content eventdetails" data-event-id="' + event.uid + '">' +
                        '<div class="item-media"><img src="' + event.link_pic + '" class="event-thumbnail" alt=""></div>' +
                        '<div class="item-inner">' +
                        '<div class="item-title">' +
                        '<div class="item-name">' + event.name + '</div>' +
                        '<div class="item-footer">' + event.location + '</div>' +
                        '</div>' +
                        '<div class="item-after event-duration">' +
                        '<span class="badge color-dark">' + event.range1 + '</span>' +
                        '<span class="date">' + event.range2 + '</span>' +
                        '</div>' +
                        '</div>' +
                        '</a>' +
                        '</li>';
                    body.append(listItem);
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching events:', error);
        }
    });
}

// Function to load shop data from the server and populate the shop grid
function loadShops($mall = null) {
    var body = $('.album-grid');
    body.html('');
    $.ajax({
        url: baseurl+'Api/getShop/' + $mall,
        method: 'GET',
        dataType: 'json',
        timeout: 10000,
        success: function(response) {
            if (response.length === 0) {
                // If response is empty, display 'No Data Found' message
                body.html('<p>No Data Found</p>');
            } else {
                // Iterate through each shop and create shop items
                $.each(response, function(index, shop) {
                    var shopItem = '<a href="/album/" class="link shopdetails" data-shop-id="' + shop.uid + '">' +
                        '<img src="' + shop.link_pic + '" alt="">' +
                        '<div class="album-details">' +
                        '<div class="album-title">' + shop.name + '</div>' +
                        '<div class="album-author">' + shop.category + '</div>' +
                        '</div>' +
                        '</a>';
                    body.append(shopItem);
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching shops:', error);
        }
    });
}


// Function to load cuisine menu data from the server and populate the menu slider
function loadCuisineMenu($mall = null) {
    var body = $('.menu-slider');
    body.html('');
    $.ajax({
        url: baseurl+'Api/getCuisine/' + $mall,
        method: 'GET',
        dataType: 'json',
        timeout: 10000,
        success: function(data) {
            if (data.length === 0) {
                // If response is empty, display 'No menu items found' message
                body.html('<div class="swiper-slide"><p>No Data found</p></div>');
            } else {
                // Iterate through each menu item and create slides
                data.forEach(function(item) {
                    var slide = $('<div class="swiper-slide"></div>');
                    var link = $('<a></a>').addClass('card card-album menudetails').attr('href', '/new-menu/').attr('data-menu-id', item.uid);
                    var cardImage = $('<div></div>').addClass('card-image');
                    var img = $('<img>').attr('src', item.link_pic).attr('alt', '');
                    cardImage.append(img);
                    var rating = (item.rating === undefined || item.rating === null || item.rating === 0 || item.rating === '') ? 5 : item.rating;
                    var cardRating = $('<div></div>').addClass('card-movie-rating').html('<i class="icon f7-icons text-color-yellow">star_fill</i>' + rating + '/5');

                    link.append(cardImage, cardRating);
                    slide.append(link);
                    body.append(slide);
                });

                // Initialize Swiper for the menu slider
                var swiper = new Swiper('.menu-slider', {
                    slidesPerView: 2.4,
                    spaceBetween: 15,
                    slidesOffsetAfter: 15,
                    slidesOffsetBefore: 15,
                    speed: 400
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching cuisine menu:', error);
        }
    });
}


// Function to load blog data from the server and populate the blog post list
function loadBlogs($mall = null) {
    var body = $('.post-list');
    body.html('');
    $.ajax({
        url: baseurl+'Api/getBlog/' +$mall,
        method: 'GET',
        dataType: 'json',
        timeout: 10000,
        success: function(response) {
             if (response.length === 0) {
                // If response is empty, display 'No menu items found' message
                body.html('<div class="swiper-slide"><p>No Data found</p></div>');
            } else {
                // Iterate through each blog post and create list items
                $.each(response, function(index, blog) {
                    var relativeTime = moment(blog.post_nf).fromNow();
                    var blogItem = '<a href="/single/" class="link post-horizontal blogdetails" data-blog-id="' + blog.uid + '">' +
                        '<div class="infos">' +
                        '<div class="post-category">' + blog.category_name + '</div>' +
                        '<div class="post-title">' + blog.title + '</div>' +
                        '<div class="post-date">' + relativeTime + '</div>' +
                        '</div>' +
                        '<div class="post-image"><img src="' + blog.link_pic + '" alt=""></div>' +
                        '</a>';
                    body.append(blogItem);
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching blogs:', error);
        }
    });
}
// Function to load Banner data from the server and populate the banner 
function loadBanner() {
    var body = $('#bannerImage');
      $.ajax({

            url: baseurl+'Api/getBanner',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.length === 0) {
                    var bannerImgElement = $('<img>').attr('src', 'img/cards/8.jpg').attr('alt', 'No Banner Image');
                }else{
                     // Get the link to the banner image from the response
                    var bannerImageLink = response[0].link_pic;

                    // Create an <img> element with the banner image link
                    var bannerImgElement = $('<img>').attr('src', bannerImageLink).attr('alt', 'Banner Image');

                    // Append the <img> element to the banner container
                    body.append(bannerImgElement);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching banner data:', error);
            }
        });
}
function loadBannerPromotions() {
    var body = $('.promotion');
    body.html('');
    $.ajax({
        url: baseurl+'Api/getBannerPromotion',
        method: 'GET',
        dataType: 'json',
        timeout: 10000,
        success: function(data) {
            if (data.length === 0) {
                // If response is empty, display 'No banner promotions found' message
                body.html('<div class="swiper-slide"><p>No banner promotions found</p></div>');
            } else {
                // Iterate through each banner promotion and create swiper slides
                data.forEach(function(item) {
                    var slide = $('<div class="swiper-slide"></div>');
                    var link = $('<a></a>').addClass('card card-movie').attr('href', '#').attr('data-href', '/movie/');
                    var cardImage = $('<div></div>').addClass('card-image');
                    var img = $('<img>').attr('src', item.link_pic).attr('alt', '');
                    cardImage.append(img);
                    // var cardRating = $('<div></div>').addClass('card-movie-rating').html('<i class="icon f7-icons text-color-yellow">star_fill</i> 4.5/5');
                    
                    // link.append(cardImage, cardRating);
                    link.append(cardImage);
                    slide.append(link);
                    body.append(slide);
                });

                // Reinitialize Swiper for the slider
                var swiper = new Swiper('.swiper-container', {
                    slidesPerView: 1,
                    spaceBetween: 10,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching banner promotions:', error);
        }
    });
}

// Function to handle popstate event
function handlePopstate() {
    var loadMall = localStorage.getItem('selectedMall');
    var data = JSON.parse(loadMall);
    var mall = data.uid;
    // if (!mall) {
    //     mall = 'all'; // Set mall to 'all' if it's empty or not provided
    // }
    if (!mall) {
        mall = '2'; // Set mall to '2' ( Queensbay mall ) if it's empty or not provided
    }
    loadShops(mall);
    loadEventData(mall);
    loadCuisineMenu(mall);
    loadBlogs(mall);
    loadBannerPromotions();
}

// Document ready function
$(document).ready(function() {
    var loadMall = localStorage.getItem('selectedMall');
    var data = JSON.parse(loadMall);
    // var mall = 'all'; // Default value for mall
    mall = '2'; // Default value for ( Queensbay mall ) 
    if (loadMall) {
        var data = JSON.parse(loadMall);
        // mall = data.uid || 'all'; // If data.uid is undefined or empty, set mall to 'all'
        mall = data.uid || '2'; // If data.uid is undefined or empty, set mall to ( Queensbay mall ) 
    }
    loadShops(mall);
    loadEventData(mall);
    loadCuisineMenu(mall);
    loadBlogs(mall);
    loadBanner();
    loadBannerPromotions();
    moredetail(); // Function for additional detail handling
});
$('body').on('click', '.popover.shopping-mall.modal-in .list-button.item-link', function() {
    var mall = $(this).data('mall-id');
    if (!mall) {
        mall = 'all'; // Set mall to 'all' if it's empty or not provided
    }
    loadShops(mall);
    loadEventData(mall);
    loadCuisineMenu(mall);
    loadBlogs(mall);
    loadBannerPromotions();

});
// Window popstate event listener
$(window).on('popstate', handlePopstate);


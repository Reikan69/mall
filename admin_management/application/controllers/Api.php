<?php 

class Api extends CI_Controller

{   

    function __construct() 

    {

        header('Access-Control-Allow-Origin: *');

        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        parent::__construct();

        $this->load->helper(array('url','download','form'));
        $this->load->model('Model_common');
     

    }
    public function Login() {
        // Retrieve email and password from the POST request
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Validate input (you should add more validation as per your requirements)
        if (empty($email) || empty($password)) {
            // Return an error response if email or password is empty
            $response = array(
                'success' => false,
                'message' => 'Email or password is empty.'
            );
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
            return;
        }

        // Select fields to retrieve from the database
        $select = array(
            'user_id as uid',
            'username as user',
            'name as name',
            'email as mail'
        );

        // Prepare query to retrieve user information
        $this->db->select($select);
        $this->db->from('tbl_user');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $result = $this->db->get()->result();

        // Check if user credentials are valid
        if ($result) {
            // Return user information if login is successful
            $response = array(
                'success' => true,
                'data' => $result
            );
        } else {
            // Return error response if login fails
            $response = array(
                'success' => false,
                'message' => 'Invalid email or password.'
            );
        }

        // Set JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    public function getSection() {
        $this->db->select('*');
        $this->db->from('tbl_section');
        $section = $this->db->get()->result();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($section));
    } 
    public function getBanner() {
        $select = array(
            'banner_id as uid',
            'banner_images as images',
            'banner_added as added',
            'banner_updated as updated',
            'banner_deleted as deleted',
            'mall'
        );
        $this->db->select($select);
        $this->db->from('tbl_banner');
        $this->db->where('banner_deleted', null);
        $data = $this->db->get()->result();

  
        foreach ($data as &$banner) {
            $custom = $GLOBALS['uploads'] . $banner->images;
            $banner->link_pic = $custom;

        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
    public function getBannerPromotion() {
        $select = array(
            'bannerp_id as uid',
            'bannerp_images as images',
            'bannerp_added as added',
            'bannerp_updated as updated',
            'bannerp_deleted as deleted',
            'mall'
        );
        $this->db->select($select);
        $this->db->from('tbl_banner_promotion');
        $this->db->where('bannerp_deleted', null);
        $data = $this->db->get()->result();
        foreach ($data as &$bannerPromotion) {
            $custom = $GLOBALS['uploads'] . $bannerPromotion->images;
            $bannerPromotion->link_pic = $custom;

        }
  

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
    public function getMall() {
        $select = array(
            'mall_id as uid',
            'mall_name as name',
            'mall_added as added',
            'mall_updated as updated',
            'mall_deleted as deleted'
        );
        $this->db->select($select);
        $this->db->from('tbl_mall');
        $this->db->where('mall_deleted', null);
        $category = $this->db->get()->result();

  

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($category));
    }
    public function getCategory() {
        $select = array(
            'category_id as uid',
            'category_name as name',
            'category_added as added',
            'category_updated as updated',
            'category_deleted as deleted'
        );
        $this->db->select($select);
        $this->db->from('tbl_category');
        $this->db->where('tbl_category.category_deleted', null);
        $category = $this->db->get()->result();

  

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($category));
    }
    public function getFloor() {
        $this->db->select('shop_lot as floor');
        $this->db->from('tbl_shop');
        $this->db->group_by('shop_lot');
        $this->db->order_by('shop_lot', 'ASC');
        $category = $this->db->get()->result();

  

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($category));
    }
    public function getShop($mall= null,$limit = null, $id = null) {
        $select = array(
            'shop_id as uid',
            'shop_name as name',
            'shop_pic as pic',
            'shop_desc as desc',
            'shop_lot as lot',
            'shop_branches as branches',
            'shop_embedlink as embedlink',
            'shop_added as added',
            'shop_updated as updated',
            'shop_deleted as deleted',
            'category_name as category',
            'mall'
        );
        $this->db->select($select);
        $this->db->from('tbl_shop');
        $this->db->join('tbl_category', 'tbl_shop.shop_category = tbl_category.category_id', 'left');

        // Apply where condition for shop_id if $id is not null
        if (!is_null($id)) {
            $this->db->where('tbl_shop.shop_id', $id);
        }
       
        if ($mall == 'all' ) {
            $this->db->where('tbl_shop.mall IS NOT NULL');
        }else  if (!is_null($mall) ) {
            $this->db->where('tbl_shop.mall', $mall);
        }

        // Apply where condition to filter out deleted shops
        $this->db->where('tbl_shop.shop_deleted', null);

        // Apply limit if $limit is not null
        if (!is_null($limit)) {
            $this->db->limit($limit);
        }

        $shopData = $this->db->get()->result();

        foreach ($shopData as &$shop) {
            $custom = $GLOBALS['uploads'] . $shop->pic;
            $shop->link_pic = $custom;

            $galleryImages = $this->db->select('gallery_img')->from('tbl_gallery')->where('shop_id', $shop->uid)->get()->result();
            $shop->gallery_images = array();
            foreach ($galleryImages as $image) {
                $custom_gallery = $GLOBALS['uploads'] . $image->gallery_img;
                $shop->gallery_images[] = $custom_gallery;
            }

            // Fetch menu images for the current shop
            $menuImages = $this->db->select('menu_img')->from('tbl_menu')->where('shop_id', $shop->uid)->get()->result();
            $shop->menu_images = array();
            foreach ($menuImages as $image) {
                $custom_menu = $GLOBALS['uploads'] . $image->menu_img;
                $shop->menu_images[] = $custom_menu;
            }
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($shopData));
    }
    public function getShopFilter($mall = null,$floor = null,$category = null) {
        $select = array(
            'shop_id as uid',
            'shop_name as name',
            'shop_pic as pic',
            'shop_desc as desc',
            'shop_lot as lot',
            'shop_branches as branches',
            'shop_embedlink as embedlink',
            'shop_added as added',
            'shop_updated as updated',
            'shop_deleted as deleted',
            'category_name as category',
            'mall'
        );
        $this->db->select($select);
        $this->db->from('tbl_shop');
        $this->db->join('tbl_category', 'tbl_shop.shop_category = tbl_category.category_id', 'left');
        if ($mall == 'all' ) {
            $this->db->where('tbl_shop.mall IS NOT NULL');
        }else  if (!is_null($mall) ) {
            $this->db->where('tbl_shop.mall', $mall);
        }
        // Apply where condition for shop_id if $id is not null
        if (!is_null($floor) && $floor =='all') {
            $this->db->where('tbl_shop.shop_id !=', '');
            
        }else if(!is_null($floor) && $floor !='all'){
            $this->db->where('tbl_shop.shop_lot', $floor);
        }
        if (!is_null($category) && $category =='all') {
            $this->db->where('tbl_shop.shop_id !=', '');
        }else if(!is_null($category) && $category !='all') {
            $this->db->where('tbl_category.category_name', $category);
        }

        // Apply where condition to filter out deleted shops
        $this->db->where('tbl_shop.shop_deleted', null);


        $shopData = $this->db->get()->result();

        foreach ($shopData as &$shop) {
            $custom = $GLOBALS['uploads'] . $shop->pic;
            $shop->link_pic = $custom;

            $galleryImages = $this->db->select('gallery_img')->from('tbl_gallery')->where('shop_id', $shop->uid)->get()->result();
            $shop->gallery_images = array();
            foreach ($galleryImages as $image) {
                $custom_gallery = $GLOBALS['uploads'] . $image->gallery_img;
                $shop->gallery_images[] = $custom_gallery;
            }

            // Fetch menu images for the current shop
            $menuImages = $this->db->select('menu_img')->from('tbl_menu')->where('shop_id', $shop->uid)->get()->result();
            $shop->menu_images = array();
            foreach ($menuImages as $image) {
                $custom_menu = $GLOBALS['uploads'] . $image->menu_img;
                $shop->menu_images[] = $custom_menu;
            }
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($shopData));
    }
    public function getCuisine($mall = null,$limit = null, $id = null) {
        $select = array(
            'cuisine_id as uid',
            'cuisine_title as title',
            'cuisine_images as images',
            'cuisine_category as category',
            'GROUP_CONCAT(tbl_category.category_name) as category_name',
            'DATE_FORMAT(cuisine_post, "%M %e, %Y") AS post',
            'cuisine_content as content',
            'cuisine_added as added',
            'cuisine_updated as updated',
            'cuisine_deleted as deleted',
            'username as by',
            'mall'
        );
        $this->db->select($select);
        $this->db->from('tbl_cuisine');
        $this->db->join('tbl_category', 'FIND_IN_SET(tbl_category.category_id, tbl_cuisine.cuisine_category)', 'left');
        $this->db->join('tbl_user', 'tbl_user.user_id = tbl_cuisine.post_by', 'left');
        $this->db->where('tbl_cuisine.cuisine_deleted', null);
        $this->db->group_by('tbl_cuisine.cuisine_id');

        // Apply where condition for mall is not null
      
        if ($mall == 'all' ) {
            $this->db->where('tbl_cuisine.mall IS NOT NULL');
        }else  if (!is_null($mall) ) {
            $this->db->where('tbl_cuisine.mall', $mall);
        }

        // Apply where condition for shop_id if $id is not null
        if (!is_null($id)) {
            $this->db->where('tbl_cuisine.cuisine_id', $id);
        }

        // Apply where condition to filter out deleted shops
        $this->db->where('tbl_cuisine.cuisine_deleted', null);

        // Apply limit if $limit is not null
        if (!is_null($limit)) {
            $this->db->limit($limit);
        }

        $cuisineData = $this->db->get()->result();

        foreach ($cuisineData as &$cuisine) {
            $custom = $GLOBALS['uploads'] . $cuisine->images;
            $cuisine->link_pic = $custom;

           
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($cuisineData));
    }
    public function getBlog($mall = null,$limit = null, $id = null) {
        $select = array(
            'blog_id as uid',
            'blog_title as title',
            'blog_images as images',
            'blog_category as category',
            'GROUP_CONCAT(tbl_category.category_name) as category_name',
            'DATE_FORMAT(blog_post, "%M %e, %Y") AS post',
            'blog_post AS post_nf',
            'blog_content as content',
            'blog_added as added',
            'blog_updated as updated',
            'blog_deleted as deleted',
            'username as by',
            'mall'
        );
        $this->db->select($select);
        $this->db->from('tbl_blog');
        $this->db->join('tbl_category', 'FIND_IN_SET(tbl_category.category_id, tbl_blog.blog_category)', 'left');
        $this->db->join('tbl_user', 'tbl_user.user_id = tbl_blog.post_by', 'left');
        $this->db->where('tbl_blog.blog_deleted', null);
        $this->db->group_by('tbl_blog.blog_id');

        if ($mall == 'all' ) {
            $this->db->where('tbl_blog.mall IS NOT NULL');
        }else  if (!is_null($mall) ) {
            $this->db->where('tbl_blog.mall', $mall);
        }

        // Apply where condition for shop_id if $id is not null
        if (!is_null($id)) {
            $this->db->where('tbl_blog.blog_id', $id);
        }

        // Apply where condition to filter out deleted shops
        $this->db->where('tbl_blog.blog_deleted', null);

        // Apply limit if $limit is not null
        if (!is_null($limit)) {
            $this->db->limit($limit);
        }

        $blogData = $this->db->get()->result();

        foreach ($blogData as &$blog) {
            $custom = $GLOBALS['uploads'] . $blog->images;
            $blog->link_pic = $custom;

           
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($blogData));
    }
    public function getEvent($mall = null,$limit = null, $id = null) {
        $select = array(
            'event_id as uid',
            'event_name as name',
            'event_images as images',
            'event_location as location',
            'event_category as category',
            'GROUP_CONCAT(tbl_category.category_name) as category_name',
            'DATE_FORMAT(event_start, "%d %b %Y %h:%i %p") AS start',
            'DATE_FORMAT(event_end, "%d %b %Y %h:%i %p") AS end',
            'CONCAT(
                DATE_FORMAT(event_start, "%d"),
                "-",
                DATE_FORMAT(event_end, "%d %b %Y")
            ) AS date_range', 
            'CONCAT(
                DATE_FORMAT(event_start, "%d"),
                "-",
                DATE_FORMAT(event_end, "%d")
            ) AS range1',
            'DATE_FORMAT(event_end, "%b %Y") AS range2',
            'DATE_FORMAT(event_start, "%h:%i %p") AS range3',
            'CONCAT("Till ", DATE_FORMAT(event_end, "%h:%i %p")) AS range4',
            'event_content as content',
            'event_added as added',
            'event_updated as updated',
            'event_deleted as deleted',
            'username as by',
            'mall'
        );
        $this->db->select($select);
        $this->db->from('tbl_event');
        $this->db->join('tbl_category', 'FIND_IN_SET(tbl_category.category_id, tbl_event.event_category)', 'left');
        $this->db->join('tbl_user', 'tbl_user.user_id = tbl_event.post_by', 'left');
        $this->db->where('tbl_event.event_deleted', null);
        $this->db->group_by('tbl_event.event_id');

        if ($mall == 'all' ) {
            $this->db->where('tbl_event.mall IS NOT NULL');
        }else  if (!is_null($mall) ) {
            $this->db->where('tbl_event.mall', $mall);
        }
        // Apply where condition for shop_id if $id is not null
        if (!is_null($id)) {
            $this->db->where('tbl_event.event_id', $id);
        }

        // Apply where condition to filter out deleted shops
        $this->db->where('tbl_event.event_deleted', null);

        // Apply limit if $limit is not null
        if (!is_null($limit)) {
            $this->db->limit($limit);
        }

        $eventData = $this->db->get()->result();

        foreach ($eventData as &$event) {
            $custom = $GLOBALS['uploads'] . $event->images;
            // if(empty($custom) || !file_exists($custom) || $custom == ''){
                $event->link_pic = $custom;
            // }else{

            // }

           
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($eventData));
    }




}



?>
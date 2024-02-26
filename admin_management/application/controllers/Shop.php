<?php
class Shop extends CI_Controller

{   

    public $priv = null;
    public $sessionid = null;


    function __construct() 

    {

        header('Access-Control-Allow-Origin: *');

        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        parent::__construct();

        $this->load->helper(array('url','download'));
        $this->priv = $_SESSION['privilege'];
        $this->sessionid = $_SESSION['user_id'];
        $this->load->helper(array('form', 'url'));
        $this->load->model(array('Model_common','Model_login'));

        if (!isset($_SESSION['username'])) {
            redirect(base_url());
        }        

    }

    
    public function index() 

    {
       $this->list();
    }
    public function list()
    {
        $data['div_form'] = base_url() . 'shop/list/';  
        $data['title']      = "Shop";
        $data['sub_title']  = "List";
        $data['data']   = "insert load";
        $data['page']   = "pages/v_shop.php";
        $data['link']   = base_url() . 'shop/list';
       

        $data["dataShop"] =$this->db->from('tbl_shop')
                          ->join('tbl_category', 'tbl_shop.shop_category = tbl_category.category_id', 'left')
                          ->where('tbl_shop.shop_deleted', null)
                          ->get()
                          ->result();

        $this->load->view('v_main', $data);       
    }
   
   public function form($id)


    {
        $data['div_form'] = base_url() . 'core/form/' . $id;  
        if ($id <= 0) 
        {
            $data["action"] = 'add';
            $data["title"] = 'Add ';
            $link = base_url() . 'shop/addShop/';
        } else {
            $data["action"] = 'edit';
            $data["title"] = 'Edit ';
            $link = base_url() . 'shop/updateShop/';
        }

            $data['page']   = "pages/v_shopForm.php";
            $data["title"] .= 'Form';
            $data['link'] = $link . $id;
            $data['dataShop'] = $this->Model_common->getDataOneRow('tbl_shop', 'shop_id', $id);

            $data["dataCategory"] = $this->Model_common->ResCustomQuery("SELECT * FROM tbl_category WHERE category_deleted  IS  NULL");
            $this->load->view('v_main', $data); 

    }
    public function addShop()
    {
        $link = base_url() . 'Shop/';
        $data["shop_category"]  = trim(($this->input->post('input_shop_category')));
        $data["shop_name"]      = trim(($this->input->post('input_shop_name')));
        $data["shop_lot"]       = trim(($this->input->post('input_shop_lot')));
        $data["shop_branches"]  = trim(($this->input->post('input_shop_branches')));
        $data["shop_desc"]      = trim(($this->input->post('input_shop_desc')));
        $data["shop_embedlink"] = trim(($this->input->post('input_shop_embedlink')));
        $data["shop_added"] = date('Y-m-d H:i:s');
        // Insert shop data into database
        $check = $this->Model_common->insertDataAll("tbl_shop", $data);
        $shop_id = $this->db->insert_id();

         
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        if (!empty($_FILES['input_shop_pic']['name'])) {
        $upload_path = './uploads/shop/';
        $saved_path = 'shop/';
        $config['upload_path'] = $upload_path;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('input_shop_pic')) {
                // Rename file with timestamp
                $shop_pic_data = $this->upload->data();
                $new_shop_pic_name = time() . '_' . $shop_pic_data['file_name'];
                $new_shop_pic_path = $upload_path . $new_shop_pic_name;
                rename($shop_pic_data['full_path'], $new_shop_pic_path);

                // Insert the renamed file path into the database
                $updates["shop_pic"] = $saved_path . $new_shop_pic_name;
                $updates["shop_gallery"] = $shop_id;
                $updates["shop_menu"] = $shop_id;
                $this->Model_common->updateDataAll("tbl_shop", 'shop_id', $shop_id, $updates);
            }
        }

        if (!empty($_FILES['input_gallery_images']['name'][0])) {
            $gallery_path = './uploads/shop/gallery/';
            $saved_path = 'shop/gallery/';
            $config_gallery['upload_path'] = $gallery_path;
            $config_gallery['allowed_types'] =  'jpg|jpeg|png|gif';
            $this->load->library('upload', $config_gallery);

            $total_files = count($_FILES['input_gallery_images']['name']);

            for ($i = 0; $i < $total_files; $i++) {
                $_FILES['gallery_file']['name'] = $_FILES['input_gallery_images']['name'][$i];
                $_FILES['gallery_file']['type'] = $_FILES['input_gallery_images']['type'][$i];
                $_FILES['gallery_file']['tmp_name'] = $_FILES['input_gallery_images']['tmp_name'][$i];
                $_FILES['gallery_file']['error'] = $_FILES['input_gallery_images']['error'][$i];
                $_FILES['gallery_file']['size'] = $_FILES['input_gallery_images']['size'][$i];

                if ($this->upload->do_upload('gallery_file')) {
                    // Rename file with timestamp
                    $gallery_data = $this->upload->data();
                    $new_gallery_img_name = time() . '_' . $gallery_data['file_name'];
                    $new_gallery_img_path = $gallery_path . $new_gallery_img_name;
                    rename($gallery_data['full_path'], $new_gallery_img_path);

                    // Insert the renamed file path into the database
                    $gallery = array(
                        'gallery_img' => $saved_path . $new_gallery_img_name,
                        'shop_id' => $shop_id
                    );
                    $this->Model_common->insertDataAll("tbl_gallery", $gallery);
                } else {
                    $error = $this->upload->display_errors();
                }
            }
        }
         if (!empty($_FILES['input_menu_images']['name'][0])) {
            $menu_path = './uploads/shop/menu/';
            $saved_path = 'shop/menu/';
            $config_menu['upload_path'] = $menu_path;
            $config_menu['allowed_types'] =  'jpg|jpeg|png|gif';
            $this->load->library('upload', $config_menu);

            $total_files = count($_FILES['input_menu_images']['name']);

            for ($i = 0; $i < $total_files; $i++) {
                $_FILES['menu_file']['name'] = $_FILES['input_menu_images']['name'][$i];
                $_FILES['menu_file']['type'] = $_FILES['input_menu_images']['type'][$i];
                $_FILES['menu_file']['tmp_name'] = $_FILES['input_menu_images']['tmp_name'][$i];
                $_FILES['menu_file']['error'] = $_FILES['input_menu_images']['error'][$i];
                $_FILES['menu_file']['size'] = $_FILES['input_menu_images']['size'][$i];

                if ($this->upload->do_upload('menu_file')) {
                    // Rename file with timestamp
                    $menu_data = $this->upload->data();
                    $new_menu_img_name = time() . '_' . $menu_data['file_name'];
                    $new_menu_img_path = $menu_path . $new_menu_img_name;
                    rename($menu_data['full_path'], $new_menu_img_path);

                    // Insert the renamed file path into the database
                    $menu = array(
                        'menu_img' => $saved_path . $new_menu_img_name,
                        'shop_id' => $shop_id
                    );
                    $this->Model_common->insertDataAll("tbl_menu", $menu);
                } else {
                    $error = $this->upload->display_errors();
                }
            }
        }

        $this->Model_login->updateLogs($this->sessionid,'add_shop');
        $this->check_status($check, $link);
    }


    public function updateShop($id)
    {
        $link = base_url() . 'Shop/';
        $data["shop_category"] = trim(($this->input->post('input_shop_category')));
        $data["shop_name"] = trim(($this->input->post('input_shop_name')));
        $data["shop_lot"] = trim(($this->input->post('input_shop_lot')));
        $data["shop_branches"] = trim(($this->input->post('input_shop_branches')));
        $data["shop_desc"] = trim(($this->input->post('input_shop_desc')));
        $data["shop_embedlink"] = trim(($this->input->post('input_shop_embedlink')));
        $data["shop_updated"] = date('Y-m-d H:i:s');
        // Update shop data in the database
        $check = $this->Model_common->updateDataAll("tbl_shop", 'shop_id', $id, $data);

       

        // Upload single image
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        if (!empty($_FILES['input_shop_pic']['name'])) {

       
            $upload_path = './uploads/shop/';
            $saved_path = 'shop/';
            $config['upload_path'] = $upload_path;
            $this->load->library('upload', $config);
             // Delete existing single image if any
            if ($this->upload->do_upload('input_shop_pic')) {
                $this->deleteImage($id, 'shop_pic');
                $shop_pic_data = $this->upload->data();
                $new_shop_pic_name = time() . '_' . $shop_pic_data['file_name'];
                $new_shop_pic_path = $upload_path . $new_shop_pic_name;
                rename($shop_pic_data['full_path'], $new_shop_pic_path);

                // Update the renamed file path into the database
                $updates["shop_pic"] = $saved_path . $new_shop_pic_name;
                $this->Model_common->updateDataAll("tbl_shop", 'shop_id', $id, $updates);
            }
        }


        // gallery images
        if (!empty($_FILES['input_gallery_images']['name'][0])) {
                $gallery_path = './uploads/shop/gallery/';
                $saved_path = 'shop/gallery/';
                $config_gallery['upload_path'] = $gallery_path;
                $config_gallery['allowed_types'] =  'jpg|jpeg|png|gif';
                $this->load->library('upload', $config_gallery);
                $this->deleteGalleryImages($id);
                $total_files = count($_FILES['input_gallery_images']['name']);

                for ($i = 0; $i < $total_files; $i++) {
                    $_FILES['gallery_file']['name'] = $_FILES['input_gallery_images']['name'][$i];
                    $_FILES['gallery_file']['type'] = $_FILES['input_gallery_images']['type'][$i];
                    $_FILES['gallery_file']['tmp_name'] = $_FILES['input_gallery_images']['tmp_name'][$i];
                    $_FILES['gallery_file']['error'] = $_FILES['input_gallery_images']['error'][$i];
                    $_FILES['gallery_file']['size'] = $_FILES['input_gallery_images']['size'][$i];

                    if ($this->upload->do_upload('gallery_file')) {
                        // Rename file with timestamp
                        $gallery_data = $this->upload->data();
                        $new_gallery_img_name = time() . '_' . $gallery_data['file_name'];
                        $new_gallery_img_path = $gallery_path . $new_gallery_img_name;
                        rename($gallery_data['full_path'], $new_gallery_img_path);

                        // Insert the renamed file path into the database
                        $gallery = array(
                            'gallery_img' => $saved_path . $new_gallery_img_name,
                            'shop_id' => $id
                        );
                        $this->Model_common->insertDataAll("tbl_gallery", $gallery);
                    } else {
                        $error = $this->upload->display_errors();
                    }
                }
            }
        //menu images
         if (!empty($_FILES['input_menu_images']['name'][0])) {
                $menu_path = './uploads/shop/menu/';
                $saved_path = 'shop/menu/';
                $config_menu['upload_path'] = $menu_path;
                $config_menu['allowed_types'] =  'jpg|jpeg|png|gif';
                $this->load->library('upload', $config_menu);
                $this->deleteMenuImages($id);
                $total_files = count($_FILES['input_menu_images']['name']);

                for ($i = 0; $i < $total_files; $i++) {
                    $_FILES['menu_file']['name'] = $_FILES['input_menu_images']['name'][$i];
                    $_FILES['menu_file']['type'] = $_FILES['input_menu_images']['type'][$i];
                    $_FILES['menu_file']['tmp_name'] = $_FILES['input_menu_images']['tmp_name'][$i];
                    $_FILES['menu_file']['error'] = $_FILES['input_menu_images']['error'][$i];
                    $_FILES['menu_file']['size'] = $_FILES['input_menu_images']['size'][$i];

                    if ($this->upload->do_upload('menu_file')) {
                        // Rename file with timestamp
                        $menu_data = $this->upload->data();
                        $new_menu_img_name = time() . '_' . $menu_data['file_name'];
                        $new_menu_img_path = $menu_path . $new_menu_img_name;
                        rename($menu_data['full_path'], $new_menu_img_path);

                        // Insert the renamed file path into the database
                        $menu = array(
                            'menu_img' => $saved_path . $new_menu_img_name,
                            'shop_id' => $id
                        );
                        $this->Model_common->insertDataAll("tbl_menu", $menu);
                    } else {
                        $error = $this->upload->display_errors();
                    }
                }
            }
        $this->Model_login->updateLogs($this->sessionid, 'update_shop');
        $this->check_status($check, $link);
    }

    private function deleteImage($id, $field)//worked
    {
        
        $shop_data = $this->Model_common->getDataOneRow("tbl_shop", "shop_id", $id);
        if (!empty($shop_data)) {
            $img_path =$GLOBALS['pathfile'].$shop_data['shop_pic'];
            if (file_exists($img_path)) {
                unlink($img_path);
            }
            $updates = array($field => NULL);
            $this->Model_common->updateDataAll("tbl_shop", 'shop_id', $id, $updates);
        }
    }

     private function deleteGalleryImages($id)
    {
        // Fetch all gallery images associated with the given shop ID
        $gallery_images = $this->Model_common->getDataWhere("tbl_gallery", "shop_id", $id);
        
        if (!empty($gallery_images)) {
            foreach ($gallery_images as $image) {
                // Construct full image path
                $img_path = $GLOBALS['pathfile'] . $image->gallery_img;
                
                // Check if the file exists and delete it
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
            }
            // Delete all gallery images associated with the given shop ID from the database
            $this->Model_common->deleteData("tbl_gallery", "shop_id", $id);
        }
    }
    private function deleteMenuImages($id)
    {
        // Fetch all gallery images associated with the given shop ID
        $menu_images = $this->Model_common->getDataWhere("tbl_menu", "shop_id", $id);
        
        if (!empty($menu_images)) {
            foreach ($menu_images as $image) {
                // Construct full image path
                $img_path = $GLOBALS['pathfile'] . $image->menu_img;
                
                // Check if the file exists and delete it
                if (file_exists($img_path)) {
                    unlink($img_path);
                }
            }
            // Delete all menu images associated with the given shop ID from the database
            $this->Model_common->deleteData("tbl_menu", "shop_id", $id);
        }
    }


     public function deleteShop($id)

    {
        $link =  base_url() . 'shop/';
        $data["shop_deleted"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->updateDataAll("tbl_shop","shop_id",$id, $data);
        $this->Model_login->updateLogs($this->sessionid,'delete_shop');
        $this->check_status($check,$link);   

    }
   
    public function check_status($check, $url) 

    {
        if ($check==true) 
        {
            $this->session->set_flashdata('success','Action Completed');
            redirect($url);
        } else {
            $this->session->set_flashdata('failed','Action Not Completed');
            redirect($url);
        }

    }

}

<?php
class Setting extends CI_Controller

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
       $this->section();
    }
    public function section()
    {
        $data['div_form'] = base_url() . 'setting/section/';  
        $data['title']  = "Section";
        $data['sub_title']  = "List";
        $data['data']   = "insert load";
        $data['page']   = "pages/v_section.php";
        $data['link']   = base_url() . 'setting/section';
        $data["dataSection"]=$this->Model_common->ResCustomQuery("SELECT'section_promotion'AS`name`,section_promotion AS`display`FROM tbl_section UNION ALL SELECT'section_banner',section_banner FROM tbl_section UNION ALL SELECT'section_shop',section_shop FROM tbl_section UNION ALL SELECT'section_event',section_event FROM tbl_section UNION ALL SELECT'section_menu',section_menu FROM tbl_section UNION ALL SELECT'section_news', section_news FROM tbl_section");

        $this->load->view('v_main', $data);       
    }
   
  
    public function formSection()


    {
        $id = 1;
        $data['div_form'] = base_url() . 'setting/formSection/';  
        $data["action"] = 'setting';
        $data["title"]  = 'Section Settings ';
        $data['link'] = base_url() . 'setting/updateSection/';
       
        $data['page']   = "pages/v_sectionForm.php";
        $data['option'] = array("hidden", "show");
        $data['dataSection'] = $this->Model_common->getDataOneRow('tbl_section', 'section_id', $id);
        $this->load->view('v_main', $data); 
    }

    public function updateSection()

    {
        $id = 1;
        $link =  base_url() . 'setting/section';

      
        $data["section_promotion"]  = trim(($this->input->post('input_section_promotion')));
        $data["section_banner"]     = trim(($this->input->post('input_section_banner')));
        $data["section_shop"]       = trim(($this->input->post('input_section_shop')));
        $data["section_event"]      = trim(($this->input->post('input_section_event')));
        $data["section_menu"]       = trim(($this->input->post('input_section_menu')));
        $data["section_news"]       = trim(($this->input->post('input_section_news')));

        $check = $this->Model_common->updateDataAll("tbl_section","section_id",$id, $data);
        $this->Model_login->updateLogs($this->sessionid,'setting_section');
        $this->check_status($check,$link);   

    }

    public function banner()


    {
        $id = 1;
        $data['div_form'] = base_url() . 'setting/banner/';  
        $data["action"] = 'setting';
        $data["title"]  = 'Banner Dont Miss it Settings ';
        $data['link'] = base_url() . 'setting/updateBanner/';
       
        $data['page']   = "pages/v_banner.php";
        $data['dataBanner'] = $this->Model_common->getDataOneRow('tbl_banner', 'banner_id', $id);
        $this->load->view('v_main', $data); 
    }
    public function updateBanner()

    {
        $id = 1;
        $link =  base_url() . 'setting/banner';
        $data["post_by"]            = $this->sessionid;
        $data["banner_updated"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->updateDataAll("tbl_banner","banner_id",$id, $data);
      
       

        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        if (!empty($_FILES['input_banner_images']['name'])) {
        $upload_path = './uploads/banner/';
        $saved_path = 'banner/';
        $config['upload_path'] = $upload_path;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('input_banner_images')) {
                $this->deleteImage($id, 'banner_images');
                $imageData = $this->upload->data();
                $newName = time() . '_' . $imageData['file_name'];
                $newPath = $upload_path . $newName;
                rename($imageData['full_path'], $newPath);

                // Insert the renamed file path into the database
                $updates["banner_images"] = $saved_path . $newName;
                $this->Model_common->updateDataAll("tbl_banner", 'banner_id', $id, $updates);
            }
        }

      

        $check = $this->Model_common->updateDataAll("tbl_banner","banner_id",$id, $data);
        $this->Model_login->updateLogs($this->sessionid,'setting_banner');
        $this->check_status($check,$link);   

    }
     public function bannerPromotion()


    {
        
        $data['div_form'] = base_url() . 'setting/bannerPromotion/';  
        $data["action"] = 'setting';
        $data["title"]  = 'Banner Promotion Settings ';
        $data["sub_title"]  = 'Banner Promotion';
        $data['link'] = base_url() . 'setting/updateBannerPromotion/';
       
        $data['page']   = "pages/v_bannerPromotion.php";
        $data["dataBannerPromotion"] = $this->Model_common->getDataAll('tbl_banner_promotion WHERE bannerp_deleted IS NULL');
        $this->load->view('v_main', $data); 
    }

    public function formPromotion($id)


    {

        $data['div_form'] = base_url() . 'setting/formPromotion/' . $id;  

        if ($id <= 0) 
        {
            $data["action"] = 'add';
            $data["title"] = 'Promotion Add ';
            $link = base_url() . 'setting/addPromotion/';
        } else {
            $data["action"] = 'edit';
            $data["title"] = 'Promotion Edit ';
            $link = base_url() . 'setting/updatePromotion/';
        }

            $data['page']   = "pages/v_bannerPromotionForm.php";
            $data["title"] .= 'Form';
            $data['link'] = $link . $id;
            $data['dataBannerPromotion'] = $this->Model_common->getDataOneRow('tbl_banner_promotion', 'bannerp_id', $id);
            $this->load->view('v_main', $data); 

    }
    public function addPromotion()

    {
    $link =  base_url() . 'Setting/bannerPromotion';

        $data["bannerp_added"]    = date('Y-m-d H:i:s');
        $data["post_by"]            = $this->sessionid;
        $data["mall"]            = '1';


        $check = $this->Model_common->insertDataAll("tbl_banner_promotion", $data);
        $bannerp_id = $this->db->insert_id();

        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        if (!empty($_FILES['input_banner_images']['name'])) {
        $upload_path = './uploads/banner/';
        $saved_path = 'banner/';
        $config['upload_path'] = $upload_path;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('input_banner_images')) {
                // Rename file with timestamp
                $imageData = $this->upload->data();
                $newName = time() . '_' . $imageData['file_name'];
                $newPath = $upload_path . $newName;
                rename($imageData['full_path'], $newPath);

                // Insert the renamed file path into the database
                $updates["bannerp_images"] = $saved_path . $newName;
                $this->Model_common->updateDataAll("tbl_banner_promotion", 'bannerp_id', $bannerp_id, $updates);
            }
        }


        $this->Model_login->updateLogs($this->sessionid,'add_banner_promotion');
        $this->check_status($check,$link);   



    }
    public function updatePromotion($id)

    {
        
        $link =  base_url() . 'Setting/bannerPromotion/';

        $data["bannerp_updated"]   = date('Y-m-d H:i:s');
        $data["post_by"]            = $this->sessionid;
        $check = $this->Model_common->updateDataAll("tbl_banner_promotion","bannerp_id",$id, $data);
      
       

        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        if (!empty($_FILES['input_banner_images']['name'])) {
        $upload_path = './uploads/banner/';
        $saved_path = 'banner/';
        $config['upload_path'] = $upload_path;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('input_banner_images')) {
                $this->deleteImagePromotion($id, 'bannerp_images');
                $imageData = $this->upload->data();
                $newName = time() . '_' . $imageData['file_name'];
                $newPath = $upload_path . $newName;
                rename($imageData['full_path'], $newPath);

                // Insert the renamed file path into the database
                $updates["bannerp_images"] = $saved_path . $newName;
                $this->Model_common->updateDataAll("tbl_banner_promotion", 'bannerp_id', $id, $updates);
            }
        }

        $this->Model_login->updateLogs($this->sessionid,'update_banner_promotion');
        $this->check_status($check,$link);   


    }
    public function deleteBannerPromotion($id)

    {
        $link =  base_url() . 'setting/bannerPromotion/';
        
        $data["bannerp_deleted"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->updateDataAll("tbl_banner_promotion","bannerp_id",$id, $data);
        $this->Model_login->updateLogs($this->sessionid,'delete_banner_promotion');
        $this->check_status($check,$link);   

    }
    private function deleteImage($id, $field)//worked
    {
        
        $banner = $this->Model_common->getDataOneRow("tbl_banner", "banner_id", $id);
        if (!empty($banner)) {
            $img_path =$GLOBALS['pathfile'].$banner['banner_images'];
            if (file_exists($img_path)) {
                unlink($img_path);
            }
            $updates = array($field => NULL);
            $this->Model_common->updateDataAll("tbl_banner", 'banner_id', $id, $updates);
        }
    }
    private function deleteImagePromotion($id, $field)//worked
    {
        
        $bannerPromotion = $this->Model_common->getDataOneRow("tbl_banner_promotion", "bannerp_id", $id);
        if (!empty($bannerPromotion)) {
            $img_path =$GLOBALS['pathfile'].$bannerPromotion['bannerp_images'];
            if (file_exists($img_path)) {
                unlink($img_path);
            }
            $updates = array($field => NULL);
            $this->Model_common->updateDataAll("tbl_banner_promotion", 'bannerp_id', $id, $updates);
        }
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

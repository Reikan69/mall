<?php
class Promotion extends CI_Controller

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
        $data['div_form']   = base_url() . 'promotion/list/';  
        $data['title']      = "Promotion";
        $data['sub_title']  = "List";
        $data['data']       = "insert load";
        $data['page']       = "pages/v_promotion.php";
        $data['link']       = base_url() . 'Promotion/list';

        $this->db->select('tbl_promotion.*, GROUP_CONCAT(tbl_category.category_name) as category_names');
        $this->db->from('tbl_promotion');
        $this->db->join('tbl_category', 'FIND_IN_SET(tbl_category.category_id, tbl_promotion.promotion_category)', 'left');
        $this->db->where('tbl_promotion.promotion_deleted', null);
        $this->db->group_by('tbl_promotion.promotion_id');
      

        $data["dataPromotion"] = $this->db->get()->result();

        
        $this->load->view('v_main', $data);       
    }
   
  
    public function form($id)


    {

        $data['div_form'] = base_url() . 'promotion/form/' . $id;  

        if ($id <= 0) 
        {
            $data["action"] = 'add';
            $data["title"] = 'Promotion Add ';
            $link = base_url() . 'promotion/addPromotion/';
        } else {
            $data["action"] = 'edit';
            $data["title"] = 'Promotion Edit ';
            $link = base_url() . 'promotion/updatePromotion/';
        }

            $data['page']   = "pages/v_promotionForm.php";
            $data["title"] .= 'Form';
            $data['link'] = $link . $id;
            $data['dataPromotion'] = $this->Model_common->getDataOneRow('tbl_promotion', 'promotion_id', $id);
            $data["dataCategory"] = $this->Model_common->ResCustomQuery("SELECT * FROM tbl_category WHERE category_deleted  IS  NULL");
            $this->load->view('v_main', $data); 

    }
     public function addpromotion()

    {
        $link =  base_url() . 'Promotion';

        $data["promotion_title"]      = trim(($this->input->post('input_promotion_title')));
        $data["promotion_post"]       = trim(($this->input->post('input_promotion_post')));
        $categories                 = implode(',', $this->input->post('input_promotion_category'));
        $data["promotion_category"]   = $categories;
        $data["promotion_content"]    = trim(($this->input->post('input_promotion_content')));
        $data["promotion_added"]    = date('Y-m-d H:i:s');


        $check = $this->Model_common->insertDataAll("tbl_promotion", $data);
        $promotion_id = $this->db->insert_id();

        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        if (!empty($_FILES['input_promotion_images']['name'])) {
        $upload_path = './uploads/promotion/';
        $saved_path = 'promotion/';
        $config['upload_path'] = $upload_path;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('input_promotion_images')) {
                // Rename file with timestamp
                $imageData = $this->upload->data();
                $newName = time() . '_' . $imageData['file_name'];
                $newPath = $upload_path . $newName;
                rename($imageData['full_path'], $newPath);

                // Insert the renamed file path into the database
                $updates["promotion_images"] = $saved_path . $newName;
                $this->Model_common->updateDataAll("tbl_promotion", 'promotion_id', $promotion_id, $updates);
            }
        }


        $this->Model_login->updateLogs($this->sessionid,'add_promotion');
        $this->check_status($check,$link);   

    }
  
    public function updatepromotion($id)

    {
        $link =  base_url() . 'Promotion/';
        $data["promotion_title"]      = trim(($this->input->post('input_promotion_title')));
        $data["promotion_post"]       = trim(($this->input->post('input_promotion_post')));
        $categories                 = implode(',', $this->input->post('input_promotion_category'));
        $data["promotion_category"]   = $categories;
        $data["promotion_content"]    = trim(($this->input->post('input_promotion_content')));
        $data["promotion_added"]    = date('Y-m-d H:i:s');


        $data["promotion_updated"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->updateDataAll("tbl_promotion","promotion_id",$id, $data);
      
       

        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        if (!empty($_FILES['input_promotion_images']['name'])) {
        $upload_path = './uploads/promotion/';
        $saved_path = 'promotion/';
        $config['upload_path'] = $upload_path;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('input_promotion_images')) {
                $this->deleteImage($id, 'promotion_images');
                $imageData = $this->upload->data();
                $newName = time() . '_' . $imageData['file_name'];
                $newPath = $upload_path . $newName;
                rename($imageData['full_path'], $newPath);

                // Insert the renamed file path into the database
                $updates["promotion_images"] = $saved_path . $newName;
                $this->Model_common->updateDataAll("tbl_promotion", 'promotion_id', $id, $updates);
            }
        }

        $this->Model_login->updateLogs($this->sessionid,'update_promotion');
        $this->check_status($check,$link);   

    }
     public function deletepromotion($id)

    {
        $link =  base_url() . 'Promotion/';
        
        $data["promotion_deleted"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->updateDataAll("tbl_promotion","promotion_id",$id, $data);
        $this->Model_login->updateLogs($this->sessionid,'delete_promotion');
        $this->check_status($check,$link);   

    }
    private function deleteImage($id, $field)//worked
    {
        
        $promotion = $this->Model_common->getDataOneRow("tbl_promotion", "promotion_id", $id);
        if (!empty($promotion)) {
            $img_path =$GLOBALS['pathfile'].$promotion['promotion_images'];
            if (file_exists($img_path)) {
                unlink($img_path);
            }
            $updates = array($field => NULL);
            $this->Model_common->updateDataAll("tbl_promotion", 'promotion_id', $id, $updates);
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

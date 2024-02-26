<?php
class Cuisine extends CI_Controller

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
        $data['div_form']   = base_url() . 'cuisine/list/';  
        $data['title']      = "Cuisine";
        $data['sub_title']  = "List";
        $data['data']       = "insert load";
        $data['page']       = "pages/v_cuisine.php";
        $data['link']       = base_url() . 'cuisine/list';

        $this->db->select('tbl_cuisine.*, GROUP_CONCAT(tbl_category.category_name) as category_names');
        $this->db->from('tbl_cuisine');
        $this->db->join('tbl_category', 'FIND_IN_SET(tbl_category.category_id, tbl_cuisine.cuisine_category)', 'left');
        $this->db->where('tbl_cuisine.cuisine_deleted', null);
        $this->db->group_by('tbl_cuisine.cuisine_id');
      

        $data["dataCuisine"] = $this->db->get()->result();

        
        $this->load->view('v_main', $data);       
    }
   
  
    public function form($id)


    {

        $data['div_form'] = base_url() . 'Cuisine/form/' . $id;  

        if ($id <= 0) 
        {
            $data["action"] = 'add';
            $data["title"] = 'Cuisine Add ';
            $link = base_url() . 'Cuisine/addCuisine/';
        } else {
            $data["action"] = 'edit';
            $data["title"] = 'Cuisine Edit ';
            $link = base_url() . 'Cuisine/updateCuisine/';
        }

            $data['page']   = "pages/v_cuisineForm.php";
            $data["title"] .= 'Form';
            $data['link'] = $link . $id;
            $data['dataCuisine'] = $this->Model_common->getDataOneRow('tbl_cuisine', 'cuisine_id', $id);
            $data["dataCategory"] = $this->Model_common->ResCustomQuery("SELECT * FROM tbl_category WHERE category_deleted  IS  NULL");
            $this->load->view('v_main', $data); 

    }
     public function addCuisine()

    {
        $link =  base_url() . 'Cuisine';

        $data["cuisine_title"]      = trim(($this->input->post('input_cuisine_title')));
        $data["cuisine_post"]       = trim(($this->input->post('input_cuisine_post')));
        $categories                 = implode(',', $this->input->post('input_cuisine_category'));
        $data["cuisine_category"]   = $categories;
        $data["cuisine_content"]    = trim(($this->input->post('input_cuisine_content')));
        $data["cuisine_added"]      = date('Y-m-d H:i:s');
        $data["post_by"]            = $this->sessionid;


        $check = $this->Model_common->insertDataAll("tbl_cuisine", $data);
        $cuisine_id = $this->db->insert_id();

        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        if (!empty($_FILES['input_cuisine_images']['name'])) {
        $upload_path = './uploads/cuisine/';
        $saved_path = 'cuisine/';
        $config['upload_path'] = $upload_path;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('input_cuisine_images')) {
                // Rename file with timestamp
                $imageData = $this->upload->data();
                $newName = time() . '_' . $imageData['file_name'];
                $newPath = $upload_path . $newName;
                rename($imageData['full_path'], $newPath);

                // Insert the renamed file path into the database
                $updates["cuisine_images"] = $saved_path . $newName;
                $this->Model_common->updateDataAll("tbl_cuisine", 'cuisine_id', $cuisine_id, $updates);
            }
        }


        $this->Model_login->updateLogs($this->sessionid,'add_cuisine');
        $this->check_status($check,$link);   

    }
  
    public function updateCuisine($id)

    {
        $link =  base_url() . 'cuisine/';
        $data["cuisine_title"]      = trim(($this->input->post('input_cuisine_title')));
        $data["cuisine_post"]       = trim(($this->input->post('input_cuisine_post')));
        $categories                 = implode(',', $this->input->post('input_cuisine_category'));
        $data["cuisine_category"]   = $categories;
        $data["cuisine_content"]    = trim(($this->input->post('input_cuisine_content')));
        $data["cuisine_added"]    = date('Y-m-d H:i:s');
        $data["post_by"]            = $this->sessionid;

        $data["cuisine_updated"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->updateDataAll("tbl_cuisine","cuisine_id",$id, $data);
      
       

        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        if (!empty($_FILES['input_cuisine_images']['name'])) {
        $upload_path = './uploads/cuisine/';
        $saved_path = 'cuisine/';
        $config['upload_path'] = $upload_path;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('input_cuisine_images')) {
                $this->deleteImage($id, 'cuisine_images');
                $imageData = $this->upload->data();
                $newName = time() . '_' . $imageData['file_name'];
                $newPath = $upload_path . $newName;
                rename($imageData['full_path'], $newPath);

                // Insert the renamed file path into the database
                $updates["cuisine_images"] = $saved_path . $newName;
                $this->Model_common->updateDataAll("tbl_cuisine", 'cuisine_id', $id, $updates);
            }
        }

        $this->Model_login->updateLogs($this->sessionid,'update_cuisine');
        $this->check_status($check,$link);   

    }
     public function deleteCuisine($id)

    {
        $link =  base_url() . 'cuisine/';
        
        $data["cuisine_deleted"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->updateDataAll("tbl_cuisine","cuisine_id",$id, $data);
        $this->Model_login->updateLogs($this->sessionid,'delete_cuisine');
        $this->check_status($check,$link);   

    }
    private function deleteImage($id, $field)//worked
    {
        
        $cuisine = $this->Model_common->getDataOneRow("tbl_cuisine", "cuisine_id", $id);
        if (!empty($cuisine)) {
            $img_path =$GLOBALS['pathfile'].$cuisine['cuisine_images'];
            if (file_exists($img_path)) {
                unlink($img_path);
            }
            $updates = array($field => NULL);
            $this->Model_common->updateDataAll("tbl_cuisine", 'cuisine_id', $id, $updates);
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

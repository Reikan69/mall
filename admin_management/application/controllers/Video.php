<?php
class Video extends CI_Controller

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
        $data['div_form']   = base_url() . 'video/list/';  
        $data['title']      = "Video";
        $data['sub_title']  = "List";
        $data['data']       = "insert load";
        $data['page']       = "pages/v_video.php";
        $data['link']       = base_url() . 'video/list';

        $this->db->select('tbl_video.*, GROUP_CONCAT(tbl_category.category_name) as category_names');
        $this->db->from('tbl_video');
        $this->db->join('tbl_category', 'FIND_IN_SET(tbl_category.category_id, tbl_video.video_category)', 'left');
        $this->db->where('tbl_video.video_deleted', null);
        $this->db->group_by('tbl_video.video_id');
      

        $data["dataVideo"] = $this->db->get()->result();

        
        $this->load->view('v_main', $data);       
    }
   
  
    public function form($id)


    {

        $data['div_form'] = base_url() . 'Video/form/' . $id;  

        if ($id <= 0) 
        {
            $data["action"] = 'add';
            $data["title"] = 'Video Add ';
            $link = base_url() . 'Video/addVideo/';
        } else {
            $data["action"] = 'edit';
            $data["title"] = 'Video Edit ';
            $link = base_url() . 'Video/updateVideo/';
        }

            $data['page']   = "pages/v_videoForm.php";
            $data["title"] .= 'Form';
            $data['link'] = $link . $id;
            $data['dataVideo'] = $this->Model_common->getDataOneRow('tbl_video', 'video_id', $id);
            $data["dataCategory"] = $this->Model_common->ResCustomQuery("SELECT * FROM tbl_category WHERE category_deleted  IS  NULL");
            $this->load->view('v_main', $data); 

    }
     public function addVideo()

    {
        $link =  base_url() . 'Video';

        $data["video_title"]      = trim(($this->input->post('input_video_title')));
        $data["video_post"]       = trim(($this->input->post('input_video_post')));
        $data["video_embedlink"]       = trim(($this->input->post('input_embedlink')));
        $categories                 = implode(',', $this->input->post('input_video_category'));
        $data["video_category"]   = $categories;
        $data["video_desc"]    = trim(($this->input->post('input_video_desc')));
        $data["video_added"]      = date('Y-m-d H:i:s');
        $data["post_by"]            = $this->sessionid;


        $check = $this->Model_common->insertDataAll("tbl_video", $data);
        $video_id = $this->db->insert_id();

        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        if (!empty($_FILES['input_video_images']['name'])) {
        $upload_path = './uploads/video/';
        $saved_path = 'video/';
        $config['upload_path'] = $upload_path;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('input_video_images')) {
                // Rename file with timestamp
                $imageData = $this->upload->data();
                $newName = time() . '_' . $imageData['file_name'];
                $newPath = $upload_path . $newName;
                rename($imageData['full_path'], $newPath);

                // Insert the renamed file path into the database
                $updates["video_images"] = $saved_path . $newName;
                $this->Model_common->updateDataAll("tbl_video", 'video_id', $video_id, $updates);
            }
        }


        $this->Model_login->updateLogs($this->sessionid,'add_video');
        $this->check_status($check,$link);   

    }
  
    public function updateVideo($id)

    {
        $link =  base_url() . 'video/';
        $data["video_title"]      = trim(($this->input->post('input_video_title')));
        $data["video_post"]       = trim(($this->input->post('input_video_post')));
        $categories                 = implode(',', $this->input->post('input_video_category'));
        $data["video_embedlink"]       = trim(($this->input->post('input_embedlink')));
        $data["video_category"]   = $categories;
        $data["video_desc"]    = trim(($this->input->post('input_video_desc')));
        $data["video_added"]    = date('Y-m-d H:i:s');
        $data["post_by"]            = $this->sessionid;

        $data["video_updated"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->updateDataAll("tbl_video","video_id",$id, $data);
      
       

        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        if (!empty($_FILES['input_video_images']['name'])) {
        $upload_path = './uploads/video/';
        $saved_path = 'video/';
        $config['upload_path'] = $upload_path;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('input_video_images')) {
                $this->deleteImage($id, 'video_images');
                $imageData = $this->upload->data();
                $newName = time() . '_' . $imageData['file_name'];
                $newPath = $upload_path . $newName;
                rename($imageData['full_path'], $newPath);

                // Insert the renamed file path into the database
                $updates["video_images"] = $saved_path . $newName;
                $this->Model_common->updateDataAll("tbl_video", 'video_id', $id, $updates);
            }
        }

        $this->Model_login->updateLogs($this->sessionid,'update_video');
        $this->check_status($check,$link);   

    }
     public function deleteVideo($id)

    {
        $link =  base_url() . 'video/';
        
        $data["video_deleted"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->updateDataAll("tbl_video","video_id",$id, $data);
        $this->Model_login->updateLogs($this->sessionid,'delete_video');
        $this->check_status($check,$link);   

    }
    private function deleteImage($id, $field)//worked
    {
        
        $video = $this->Model_common->getDataOneRow("tbl_video", "video_id", $id);
        if (!empty($video)) {
            $img_path =$GLOBALS['pathfile'].$video['video_images'];
            if (file_exists($img_path)) {
                unlink($img_path);
            }
            $updates = array($field => NULL);
            $this->Model_common->updateDataAll("tbl_video", 'video_id', $id, $updates);
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

<?php
class Event extends CI_Controller

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
        $data['div_form']   = base_url() . 'event/list/';  
        $data['title']      = "Event";
        $data['sub_title']  = "List";
        $data['data']       = "insert load";
        $data['page']       = "pages/v_event.php";
        $data['link']       = base_url() . 'Event/list';

        $this->db->select('tbl_event.*, GROUP_CONCAT(tbl_category.category_name) as category_names');
        $this->db->from('tbl_event');
        $this->db->join('tbl_category', 'FIND_IN_SET(tbl_category.category_id, tbl_event.event_category)', 'left');
        $this->db->where('tbl_event.event_deleted', null);
        $this->db->group_by('tbl_event.event_id');
      

        $data["dataEvent"] = $this->db->get()->result();

        
        $this->load->view('v_main', $data);       
    }
   
  
    public function form($id)


    {

        $data['div_form'] = base_url() . 'Event/form/' . $id;  

        if ($id <= 0) 
        {
            $data["action"] = 'add';
            $data["title"] = 'Event Add ';
            $link = base_url() . 'Event/addEvent/';
        } else {
            $data["action"] = 'edit';
            $data["title"] = 'Event Edit ';
            $link = base_url() . 'Event/updateEvent/';
        }

            $data['page']   = "pages/v_eventForm.php";
            $data["title"] .= 'Form';
            $data['link'] = $link . $id;
            $data['dataEvent'] = $this->Model_common->getDataOneRow('tbl_event', 'event_id', $id);
            $data["dataCategory"] = $this->Model_common->ResCustomQuery("SELECT * FROM tbl_category WHERE category_deleted  IS  NULL");
            $this->load->view('v_main', $data); 

    }
     public function addevent()

    {
        $link =  base_url() . 'Event';

        $data["event_name"]      = trim(($this->input->post('input_event_name')));
        $date_parts = explode(' - ', $this->input->post('input_date_range'));

        // Trim whitespace from each part
        $start_date = trim($date_parts[0]);
        $end_date   = trim($date_parts[1]);

        // Now you can use $start_date and $end_date as separate inputs
        $data["event_start"]    = date('Y-m-d H:i:s', strtotime($start_date));
        $data["event_end"]      = date('Y-m-d H:i:s', strtotime($end_date));
        $data["event_location"]       = trim(($this->input->post('input_event_location')));
        $categories                 = implode(',', $this->input->post('input_event_category'));
        $data["event_category"]   = $categories;
        $data["event_content"]    = trim(($this->input->post('input_event_content')));
        $data["event_added"]      = date('Y-m-d H:i:s');
        $data["post_by"]            = $this->sessionid;


        $check = $this->Model_common->insertDataAll("tbl_event", $data);
        $event_id = $this->db->insert_id();

        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        if (!empty($_FILES['input_event_images']['name'])) {
        $upload_path = './uploads/event/';
        $saved_path = 'event/';
        $config['upload_path'] = $upload_path;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('input_event_images')) {
                // Rename file with timestamp
                $imageData = $this->upload->data();
                $newName = time() . '_' . $imageData['file_name'];
                $newPath = $upload_path . $newName;
                rename($imageData['full_path'], $newPath);

                // Insert the renamed file path into the database
                $updates["event_images"] = $saved_path . $newName;
                $this->Model_common->updateDataAll("tbl_event", 'event_id', $event_id, $updates);
            }
        }


        $this->Model_login->updateLogs($this->sessionid,'add_event');
        $this->check_status($check,$link);   

    }
  
    public function updateevent($id)

    {
        $link =  base_url() . 'Event/';
        $data["event_name"]      = trim(($this->input->post('input_event_name')));

        $date_parts = explode(' - ', $this->input->post('input_date_range'));

        // Trim whitespace from each part
        $start_date = trim($date_parts[0]);
        $end_date   = trim($date_parts[1]);

        // Now you can use $start_date and $end_date as separate inputs
        $data["event_start"]    = date('Y-m-d H:i:s', strtotime($start_date));
        $data["event_end"]      = date('Y-m-d H:i:s', strtotime($end_date));
        $data["event_location"]     = trim(($this->input->post('input_event_location')));
        $categories                 = implode(',', $this->input->post('input_event_category'));
        $data["event_category"]     = $categories;
        $data["event_content"]      = trim(($this->input->post('input_event_content')));
        $data["event_added"]        = date('Y-m-d H:i:s');
        $data["post_by"]            = $this->sessionid;

        $data["event_updated"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->updateDataAll("tbl_event","event_id",$id, $data);
      
       

        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        if (!empty($_FILES['input_event_images']['name'])) {
        $upload_path = './uploads/event/';
        $saved_path = 'event/';
        $config['upload_path'] = $upload_path;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('input_event_images')) {
                $this->deleteImage($id, 'event_images');
                $imageData = $this->upload->data();
                $newName = time() . '_' . $imageData['file_name'];
                $newPath = $upload_path . $newName;
                rename($imageData['full_path'], $newPath);

                // Insert the renamed file path into the database
                $updates["event_images"] = $saved_path . $newName;
                $this->Model_common->updateDataAll("tbl_event", 'event_id', $id, $updates);
            }
        }

        $this->Model_login->updateLogs($this->sessionid,'update_event');
        $this->check_status($check,$link);   

    }
     public function deleteevent($id)

    {
        $link =  base_url() . 'Event/';
        
        $data["event_deleted"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->updateDataAll("tbl_event","event_id",$id, $data);
        $this->Model_login->updateLogs($this->sessionid,'delete_event');
        $this->check_status($check,$link);   

    }
    private function deleteImage($id, $field)//worked
    {
        
        $event = $this->Model_common->getDataOneRow("tbl_event", "event_id", $id);
        if (!empty($event)) {
            $img_path =$GLOBALS['pathfile'].$event['event_images'];
            if (file_exists($img_path)) {
                unlink($img_path);
            }
            $updates = array($field => NULL);
            $this->Model_common->updateDataAll("tbl_event", 'event_id', $id, $updates);
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

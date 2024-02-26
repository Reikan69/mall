<?php
class Category extends CI_Controller

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
        $data['div_form'] = base_url() . 'category/list/';  
        $data['title']  = "Category";
        $data['sub_title']  = "List";
        $data['data']   = "insert load";
        $data['page']   = "pages/v_category.php";
        $data['link']   = base_url() . 'category/list';
        // $data["dataCategory"] = $this->Model_common->getDataAll("tbl_category");
        $data["dataCategory"] = $this->Model_common->ResCustomQuery("SELECT * FROM tbl_category WHERE category_deleted  IS  NULL");
        
        $this->load->view('v_main', $data);       
    }
   
  
    public function form($id)


    {

        $data['div_form'] = base_url() . 'core/form/' . $id;  

        if ($id <= 0) 
        {
            $data["action"] = 'add';
            $data["title"] = 'Category Add ';
            $link = base_url() . 'category/addCategory/';
        } else {
            $data["action"] = 'edit';
            $data["title"] = 'Category Edit ';
            $link = base_url() . 'category/updateCategory/';
        }

            $data['page']   = "pages/v_categoryForm.php";
            $data["title"] .= 'Form';
            $data['link'] = $link . $id;
            $data['dataCategory'] = $this->Model_common->getDataOneRow('tbl_category', 'category_id', $id);
            $this->load->view('v_main', $data); 

    }
    public function addCategory()

    {
        $link =  base_url() . 'category/';
        $data["category_name"]    = trim(($this->input->post('input_category_name')));
        $data["category_added"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->insertDataAll("tbl_category", $data);
        $this->Model_login->updateLogs($this->sessionid,'add_category');
        $this->check_status($check,$link);   

    }
    public function updateCategory($id)

    {
        $link =  base_url() . 'category/';
        $data["category_name"]    = trim(($this->input->post('input_category_name')));
        $data["category_updated"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->updateDataAll("tbl_category","category_id",$id, $data);
        $this->Model_login->updateLogs($this->sessionid,'update_category');
        $this->check_status($check,$link);   

    }
     public function deleteCategory($id)

    {
        $link =  base_url() . 'category/';
        
        $data["category_deleted"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->updateDataAll("tbl_category","category_id",$id, $data);
        $this->Model_login->updateLogs($this->sessionid,'delete_category');
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

<?php
class CategoryC extends CI_Controller

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
        $data['title']  = "Category Cuisine";
        $data['sub_title']  = "List";
        $data['data']   = "insert load";
        $data['page']   = "pages/v_categoryC.php";
        $data['link']   = base_url() . 'categoryC/list';
        $data["dataCategoryC"] = $this->Model_common->ResCustomQuery("SELECT * FROM tbl_category_cuisine WHERE categoryc_deleted  IS  NULL");
        
        $this->load->view('v_main', $data);       
    }
   
  
    public function form($id)


    {

        $data['div_form'] = base_url() . 'core/form/' . $id;  

        if ($id <= 0) 
        {
            $data["action"] = 'add';
            $data["title"] = 'Category Add ';
            $link = base_url() . 'categoryC/addCategory/';
        } else {
            $data["action"] = 'edit';
            $data["title"] = 'Category Edit ';
            $link = base_url() . 'categoryC/updateCategory/';
        }

            $data['page']   = "pages/v_categoryCForm.php";
            $data["title"] .= 'Form';
            $data['link'] = $link . $id;
            $data['dataCategoryC'] = $this->Model_common->getDataOneRow('tbl_category_cuisine', 'categoryc_id', $id);
            $this->load->view('v_main', $data); 

    }
    public function addCategory()

    {
        $link =  base_url() . 'categoryC';
        $data["categoryc_name"]    = trim(($this->input->post('input_categoryc_name')));
        $data["categoryc_added"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->insertDataAll("tbl_category_cuisine", $data);
        $this->Model_login->updateLogs($this->sessionid,'add_categoryC');
        $this->check_status($check,$link);   

    }
    public function updateCategory($id)

    {
        $link =  base_url() . 'categoryC';
        $data["categoryc_name"]    = trim(($this->input->post('input_categoryc_name')));
        $data["categoryc_updated"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->updateDataAll("tbl_category_cuisine","categoryc_id",$id, $data);
        $this->Model_login->updateLogs($this->sessionid,'update_categoryC');
        $this->check_status($check,$link);   

    }
     public function deleteCategory($id)

    {
        $link =  base_url() . 'categoryC';
        
        $data["categoryc_deleted"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->updateDataAll("tbl_category_cuisine","categoryc_id",$id, $data);
        $this->Model_login->updateLogs($this->sessionid,'delete_categoryC');
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

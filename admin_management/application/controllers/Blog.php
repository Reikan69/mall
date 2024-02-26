<?php
class Blog extends CI_Controller

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
        $data['div_form']   = base_url() . 'blog/list/';  
        $data['title']      = "Blog";
        $data['sub_title']  = "List";
        $data['data']       = "insert load";
        $data['page']       = "pages/v_blog.php";
        $data['link']       = base_url() . 'blog/list';

        $this->db->select('tbl_blog.*, GROUP_CONCAT(tbl_category.category_name) as category_names');
        $this->db->from('tbl_blog');
        $this->db->join('tbl_category', 'FIND_IN_SET(tbl_category.category_id, tbl_blog.blog_category)', 'left');
        $this->db->where('tbl_blog.blog_deleted', null);
        $this->db->group_by('tbl_blog.blog_id');
      

        $data["dataBlog"] = $this->db->get()->result();

        
        $this->load->view('v_main', $data);       
    }
   
  
    public function form($id)


    {

        $data['div_form'] = base_url() . 'Blog/form/' . $id;  

        if ($id <= 0) 
        {
            $data["action"] = 'add';
            $data["title"] = 'Blog Add ';
            $link = base_url() . 'Blog/addBlog/';
        } else {
            $data["action"] = 'edit';
            $data["title"] = 'Blog Edit ';
            $link = base_url() . 'Blog/updateBlog/';
        }

            $data['page']   = "pages/v_blogForm.php";
            $data["title"] .= 'Form';
            $data['link'] = $link . $id;
            $data['dataBlog'] = $this->Model_common->getDataOneRow('tbl_blog', 'blog_id', $id);
            $data["dataCategory"] = $this->Model_common->ResCustomQuery("SELECT * FROM tbl_category WHERE category_deleted  IS  NULL");
            $this->load->view('v_main', $data); 

    }
     public function addBlog()

    {
        $link =  base_url() . 'Blog';

        $data["blog_title"]      = trim(($this->input->post('input_blog_title')));
        $data["blog_post"]       = trim(($this->input->post('input_blog_post')));
        $categories                 = implode(',', $this->input->post('input_blog_category'));
        $data["blog_category"]   = $categories;
        $data["blog_content"]    = trim(($this->input->post('input_blog_content')));
        $data["blog_added"]      = date('Y-m-d H:i:s');
        $data["post_by"]            = $this->sessionid;


        $check = $this->Model_common->insertDataAll("tbl_blog", $data);
        $blog_id = $this->db->insert_id();

        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        if (!empty($_FILES['input_blog_images']['name'])) {
        $upload_path = './uploads/blog/';
        $saved_path = 'blog/';
        $config['upload_path'] = $upload_path;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('input_blog_images')) {
                // Rename file with timestamp
                $imageData = $this->upload->data();
                $newName = time() . '_' . $imageData['file_name'];
                $newPath = $upload_path . $newName;
                rename($imageData['full_path'], $newPath);

                // Insert the renamed file path into the database
                $updates["blog_images"] = $saved_path . $newName;
                $this->Model_common->updateDataAll("tbl_blog", 'blog_id', $blog_id, $updates);
            }
        }


        $this->Model_login->updateLogs($this->sessionid,'add_blog');
        $this->check_status($check,$link);   

    }
  
    public function updateBlog($id)

    {
        $link =  base_url() . 'blog/';
        $data["blog_title"]      = trim(($this->input->post('input_blog_title')));
        $data["blog_post"]       = trim(($this->input->post('input_blog_post')));
        $categories                 = implode(',', $this->input->post('input_blog_category'));
        $data["blog_category"]   = $categories;
        $data["blog_content"]    = trim(($this->input->post('input_blog_content')));
        $data["blog_added"]    = date('Y-m-d H:i:s');
        $data["post_by"]            = $this->sessionid;

        $data["blog_updated"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->updateDataAll("tbl_blog","blog_id",$id, $data);
      
       

        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        if (!empty($_FILES['input_blog_images']['name'])) {
        $upload_path = './uploads/blog/';
        $saved_path = 'blog/';
        $config['upload_path'] = $upload_path;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('input_blog_images')) {
                $this->deleteImage($id, 'blog_images');
                $imageData = $this->upload->data();
                $newName = time() . '_' . $imageData['file_name'];
                $newPath = $upload_path . $newName;
                rename($imageData['full_path'], $newPath);

                // Insert the renamed file path into the database
                $updates["blog_images"] = $saved_path . $newName;
                $this->Model_common->updateDataAll("tbl_blog", 'blog_id', $id, $updates);
            }
        }

        $this->Model_login->updateLogs($this->sessionid,'update_blog');
        $this->check_status($check,$link);   

    }
     public function deleteBlog($id)

    {
        $link =  base_url() . 'blog/';
        
        $data["blog_deleted"]   = date('Y-m-d H:i:s');
        $check = $this->Model_common->updateDataAll("tbl_blog","blog_id",$id, $data);
        $this->Model_login->updateLogs($this->sessionid,'delete_blog');
        $this->check_status($check,$link);   

    }
    private function deleteImage($id, $field)//worked
    {
        
        $blog = $this->Model_common->getDataOneRow("tbl_blog", "blog_id", $id);
        if (!empty($blog)) {
            $img_path =$GLOBALS['pathfile'].$blog['blog_images'];
            if (file_exists($img_path)) {
                unlink($img_path);
            }
            $updates = array($field => NULL);
            $this->Model_common->updateDataAll("tbl_blog", 'blog_id', $id, $updates);
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

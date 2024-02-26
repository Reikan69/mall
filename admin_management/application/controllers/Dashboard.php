<?php 



class Dashboard extends CI_Controller

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
        $this->load->model('Model_common');
        if (!isset($_SESSION['username'])) {
            redirect(base_url());
        }        


    }

    function download($src)

    {
        force_download('uploads/'.$src, NULL);
    }

    public function index() 

    {
        $data['div_form'] = base_url() . 'core/dashboard/'; 

        $data['title']  = "Dashboard";

        $data['data']   = "insert dashboard";

        $data['page']   = "pages/v_dashboard.php";

        $data['link']   = base_url() . 'core/dashboard';



        $this->load->view('v_main', $data);
    }




}



?>
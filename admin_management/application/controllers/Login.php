<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_login');
    }

    function index() {
        $this->load->view('v_login');
    }

    function log_in() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'username' => $username,
            'password' => md5($password)
        );
        $cek = $this->Model_login->checkLogin($where)->num_rows();
        if ($cek > 0) {
           
            $data = $this->Model_login->checkLogin($where)->row();

//          SET USERNAME, DATA NAMA, DATA DEPARTMENT PRODUKSI, DATA DEPARTMENT USER
            
            $this->session->set_userdata('user_id', $data->user_id);
            $this->session->set_userdata('username', $data->username);            
            $this->session->set_userdata('privilege', $data->privilege);
            $this->session->set_userdata('name', $data->name);
            $this->session->set_userdata('email', $data->email);
            
//          UPDATE LAST LOGIN
            $login=$this->Model_login->updateDataLastLogin($data->user_id);
            $this->session->set_flashdata('login_success','Action Completed'); 
            sleep(3);
            redirect(base_url("Dashboard"));
        } else {

            $login = '';
            $this->session->set_flashdata('login_gagal','Action Completed');
            sleep(2);
            redirect(base_url("Login"));
        }
    }

    function log_out() {
//      UPDATE LAST LOGIN
        $this->Model_login->updateDataLastLogout($_SESSION['user_id']);
//      DESTROY SESSION
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('privilege');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('logout_sistem',' Completed');
        sleep(3);
        redirect(base_url("Login"));
    }




}

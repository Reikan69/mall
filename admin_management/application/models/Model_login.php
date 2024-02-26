<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

    function checkLogin($where) {
        return $this->db->get_where("tbl_user", $where);
    }
    function updateLogs($user_id,$action) {
        $query = "INSERT INTO tbl_user_log SET id_user = '" .$user_id . "', act='".$action."', info='IP:" . $this->get_client_ip() . "'";
        $this->db->query($query);
    }
    function updateDataLastLogin($user_id) {
        $query = "INSERT INTO tbl_user_log SET id_user = '" .$user_id . "', act='LOGIN', info='IP:" . $this->get_client_ip() . "'";
        $this->db->query($query);
    }

    function updateDataLastLogout($user_id) {
        $query = "INSERT INTO tbl_user_log SET id_user = '" .$user_id . "', act='LOGOUT', info='IP:" . $this->get_client_ip() . "'";
        $this->db->query($query);
    }

    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP')) {
            $ipaddress = getenv('HTTP_CLIENT_IP');
        } else if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        } else if (getenv('HTTP_X_FORWARDED')) {
            $ipaddress = getenv('HTTP_X_FORWARDED');
        } else if (getenv('HTTP_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        } else if (getenv('HTTP_FORWARDED')) {
            $ipaddress = getenv('HTTP_FORWARDED');
        } else if (getenv('REMOTE_ADDR')) {
            $ipaddress = getenv('REMOTE_ADDR');
        } else {
            $ipaddress = 'UNKNOWN';
        }
        return $ipaddress;
    }

}

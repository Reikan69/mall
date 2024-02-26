<?php

class Model_common extends CI_Model
{
 
	function insertDataAll($table, $data) 
	{
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }
    
    
    function getDataAll($table) 
    {
        $data = $this->db->query("SELECT * FROM $table")->result();
        return $data;
    }

    function getDataAllOneRow($table) 
    {
        $data = $this->db->query("SELECT * FROM $table")->row_array();
        return $data;
    }

    function getDataOneRow($table, $column, $id) 
    {
        $data = $this->db->query("SELECT * FROM $table WHERE $column LIKE $id")->row_array();
        return $data;
    }

    function getDataMax($table, $column) 
    {
        $data = $this->db->query("SELECT MAX($column) AS 'maxValue' FROM $table")->row_array();
        return $data;
    }
    
    function getDataExcept($table,$column,$id){
        $data = $this->db->query("SELECT * FROM $table WHERE $column!=$id")->result();
        return $data;
    }
    function getDataNot($table,$column,$id){
        $data = $this->db->query("SELECT * FROM $table WHERE $column NOT IN $id")->result();
        return $data;
    }
     function getDataIn($table,$column,$id){
        $data = $this->db->query("SELECT * FROM $table WHERE $column IN ($id)")->result();
        return $data;
    }
    function getDataWhere($table, $column, $id) 
    {
        $data = $this->db->query("SELECT * FROM $table WHERE $column LIKE $id")->result();
        return $data;
    }
    function getDataWhereMore($table, $column, $id) 
    {
        $data = $this->db->query("SELECT * FROM $table WHERE $column > $id")->result();
        return $data;
    }
   
    function checkExist($table, $column, $id) 
    {
        $query = $this->db->query("SELECT COUNT(*) FROM $table WHERE $column= '".$id."'");
       
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        
        return $hasil;
    }
     function RowCustomQuery($query) { 
        $data =$this->db->query($query);
        return $data->row_array();
    }
     function ResCustomQuery($q) {
        return $this->db->query($q)->result();
    }

     function getCountData($table) 
    {
        $data = $this->db->query("SELECT COUNT(*) as count_data FROM $table");
        return $data->row();
        
    }
    function getCountDataSet($table,$set) 
    {
        $data = $this->db->query("SELECT COUNT(*) as count_data FROM $table $set");
        return $data->row();
        
    }
    

    function updateDataAll($table, $column, $id, $data) 
    {
        $this->db->where($column, $id);
        $this->db->update($table, $data);

        return $this->db->affected_rows();
    }

    function deleteData($table, $column, $id) 
    {
        $this->db->delete($table, array($column => $id));

        return $this->db->affected_rows();
    }

    function updateCustomData($table, $set, $where) 
    {
        return $this->db->query("UPDATE $table SET $set WHERE $where");
    }

    function deleteCustomData($table, $where) 
    {
        return $this->db->query("DELETE FROM $table WHERE $where");
    }

    function deleteDataAll($table) 
    {
        $this->db->truncate($table);
    }

    private function _get_datatables_query($field,$table)
    {
         
        $this->db->from($table);
 
     
       
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                    $this->db->like($field, $_POST['search']['value']);
            }
         
        // if(isset($_POST['order'])) 
        // {
        //     $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        // } 
        // else if(isset($this->order))
        // {
        //     $order = $this->order;
        //     $this->db->order_by(key($order), $order[key($order)]);
        // }
    }
 
   
 
    function get_datatables($field,$table,$where)
    {
        $this->_get_datatables_query($field,$table);
        //$this->db->from($table);
        if($_POST['length'] != -1)
        $st="cabang_toko = $where";
        $this->db->where($st);  
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    
 
    function count_filtered($field,$table,$where)
    {
        $this->_get_datatables_query($field,$table);
        $st="cabang_toko = $where";
        $this->db->where($st);  
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($field,$table,$where)
    {
        $this->_get_datatables_query($field,$table);
        $st="cabang_toko = $where";
        $this->db->where($st);  
        return $this->db->count_all_results();
    }
    
 



}

?>
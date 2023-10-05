<?php

class main_model extends CI_Model {

    function get_node_level($id = 0, $level = 1) {
        if ($id == 0) {
            return $id;
        }
        $parent = $this->get_name_from_id("node", "parent_id", $id);
        if ($parent) {
            return $this->get_node_level($parent, ++$level);
        } else {
            return $level;
        }
    }

    function get_records($table, $id_name = '', $id_value = 0, $orderby = '') { //for orderby field : 'title desc, name asc'
        $this->db->where('is_deleted', 0);
        if ($id_name) {
            $this->db->where($id_name, $id_value);
        }
        if ($orderby) {
            $this->db->order_by($orderby);
        }
        $query = $this->db->get($table); // automatically add above conditions if enabled by if statement
        return $query;
    }

    function add_update_record($tbl, $data = array(), $id_name = '') {//$id_name for update record, id_name field must be present in associative $data array
        if (count($data)) {
            unset($data['submit']);
            $this->db->set($data); //passing associative array to values in SET sql query
            if ($id_name) {//updating record on getting id name - id value is sent through form
                $this->db->where($id_name, $data[$id_name]);
                $query = $this->db->update($tbl);
                return $data[$id_name];
            } else {//adding record in table
                $this->db->set($data);
                $query = $this->db->insert($tbl);
                return $this->db->insert_id(); //autoincreament id after insert query
            }
        }
    }

    function add_update_many_records($tbl, $data = array(), $id_name = "", $id_value = 0) {// delete and then add
        if ($id_name && $id_value) {//deleting previous records
            $this->db->where($id_name, $id_value);
            $this->db->delete($tbl);
        }
        if (count($data)) {//if data present..
            if (isset($data['submit'])) {//precautionary unset if sent from a form
                unset($data['submit']);
            }
            foreach ($data as $rec) {//entering database records
                $rec[$id_name] = $id_value;
                $this->db->set($rec);
                $query = $this->db->insert($tbl);
            }
        }
    }

    function delete_many_records($tbl = "", $foreign_key = "", $foreign_key_value = "") {
        $this->db->where($foreign_key, $foreign_key_value);
        $this->db->delete($tbl);
    }

    function my_delete_record($tbl, $id_name, $id_value) {
        $this->db->set('is_deleted', 1);
        $this->db->where($id_name, $id_value);
        $this->db->update($tbl);
    }

//for feeding select boxes
    public function fill_select($table_name = '', $field_name = '', $selected_id = 0, $where_id = '', $where_val = 0) {// select boxes, $selected_id - to mark selected option in select box, $field_name - for name of primary id in table
        $this->db->where('is_deleted', 0);
        $this->db->where('status', 'Active');
        if ($where_id) {
            $this->db->where($where_id, $where_val);
        }
        $this->db->select("id, $field_name"); //id primary key is hard coded
        $this->db->from($table_name);
        $data = $this->db->get()->result_array();
        $table = $table_name;
        if ($table_name != 'quiz') {
            $table = substr($table_name, 0, -1);
        }
        $option_str = '<option value=""';
        if (!($selected_id)) {
            $option_str .= ' selected';
        }
        $option_str .= '> -- Select a ' . $table . " -- </option>";
        foreach ($data as $rec) {
            $option_str .= '<option ';

            $option_str .= 'value="' . $rec['id'] . '"';
            if ($rec['id'] == $selected_id) {
                $option_str .= ' selected';
            }
            $option_str .= '>' . $rec[$field_name] . '</option>';
        }
        return $option_str;
    }

    public function fill_node_select($parent = 0, $selected_id = 0) {// select boxes, $selected_id - to mark selected option in select box, $field_name - for name of primary id in table
        $this->db->where('is_deleted', 0);
        $this->db->where('status', 'Active');
        $this->db->where('parent_id', $parent);
        $this->db->select("id, name");
        $this->db->from('node');
        $data = $this->db->get()->result_array();

        $option_str = '<option value="' . $parent . '"';
        if (!($selected_id)) {
            $option_str .= ' selected';
        }
        $level = $this->get_node_level($parent);
        $option_str .= '> Select Level-' . ++$level . " Node </option>";
        
        foreach ($data as $rec){
            if ($_SESSION['role_name'] == 'Content Creator'){//page specified in url but permission not allowing
                $is_permitted = $this->custom->get_access_permit_parent($rec['id']);//=================== this is to check parent node =========
                if ($is_permitted) {

                    $option_str .= '<option ';
                    $option_str .= 'value="' . $rec['id'] . '"';
                    if ($rec['id'] == $selected_id) {
                        $option_str .= ' selected';
                    }
                    $option_str .= '>' . $rec['name'] . '</option>';
                }else{
                      $is_permitted = $this->custom->get_access_permit($rec['id']); //======================= this is to check chield node ===============
                    if ($is_permitted) {

                        $option_str .= '<option ';
                        $option_str .= 'value="' . $rec['id'] . '"';
                        if ($rec['id'] == $selected_id) {
                            $option_str .= ' selected';
                        }
                        $option_str .= '>' . $rec['name'] . '</option>';
                    }
                
                
                }
            } else {
                $option_str .= '<option ';
                $option_str .= 'value="' . $rec['id'] . '"';
                if ($rec['id'] == $selected_id) {
                    $option_str .= ' selected';
                }
                $option_str .= '>' . $rec['name'] . '</option>';
            }
        }
        return $option_str;
    }

    public function fill_li($table_name = '', $field_name = '', $selected_id = 0) {// select boxes, $selected_id - to mark selected option in select box, $field_name - for name of primary id in table
        $this->db->where('is_deleted', 0);
        $this->db->where('status', 'Active');
        $this->db->select("id, $field_name"); //id primary key is hard coded
        $this->db->from($table_name);
        $data = $this->db->get()->result_array();
        $option_str = '';
        foreach ($data as $rec) {
            if ($table_name == 'sheets') {
                $option_str .= '<li><a href="' . base_url() . 'value_action/sheets/';
                $option_str .= $rec['id'] . '">' . $rec[$field_name] . '</a></li>';
            } else {
                $option_str .= '<li><a href="' . base_url() . 'show/programs/';
                $option_str .= $rec['id'] . '">' . $rec[$field_name] . '</a></li>';
            }
        }
        return $option_str;
    }

    public function fill_node_li($table_name = '', $field_name = '', $selected_id = 0, $column_name = "id", $column_id = 0) {
// select boxes, $selected_id - to mark selected option in select box, $field_name - for name of primary id in table
        $this->db->where('is_deleted', 0);
        $this->db->where('status', 'Active');
        $this->db->where($column_name, $column_id);
        $this->db->select("id, $field_name");
        $this->db->from($table_name);
        $data = $this->db->get()->result_array();
        $option_str = '';
        foreach ($data as $rec) {
            $option_str .= '<li><a href="' . base_url() . 'node/';
            $option_str .= $rec['id'] . '">' . $rec[$field_name] . '</a></li>';
        }
        return $option_str;
    }

    public function fill_node_new($table_name = '', $field_name = '', $selected_id = 0, $nav_type = '') {
// select boxes, $selected_id - to mark selected option in select box, $field_name - for name of primary id in table
        $this->db->where('is_deleted', 0);
        $this->db->where('status', 'Active');
        $this->db->where('parent_id', 0);
        $this->db->where('type !=', 'Quiz');
        $this->db->select("id, $field_name");
        $this->db->from($table_name);
        $data = $this->db->get()->result_array();
        $option_str = '';
        foreach ($data as $rec) {
            if ($_SESSION['role_name'] == 'Content Creator') {
                $is_permitted = $this->custom->get_access_permit_parent($rec['id']);
                if ($is_permitted){
            $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
            $option_str .= $rec['id'] . '">' . $rec[$field_name] . '</a></li>';
        }
        }else {
            $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
            $option_str .= $rec['id'] . '">' . $rec[$field_name] . '</a></li>';
        }
        }
        return $option_str;
    }

    public function fill_nav_node_li($table1 = '', $table2 = '', $tb1_field = '', $tab2_field = '', $join = 'LEFT', $nav_type = '') {
        // select boxes, $selected_id - to mark selected option in select box, $field_name - for name of primary id in table
        $this->db->where($table1 . '.is_deleted', 0);
        $this->db->where($table1 . '.status', 'Active');
        $this->db->where($table1 . '.parent_id', '0');
        $this->db->where($table1 . '.type', 'Module');

        $this->db->or_where($table1 . '.type', 'Quiz');

        if ($nav_type == 'program') {
            $this->db->where($table2 . '.quiz_type', 'Practice');
        } else {
            $this->db->where($table2 . '.quiz_type !=', 'Practice');
        }

        $this->db->where($table1 . '.parent_id', '0');
        $this->db->where($table2 . '.is_deleted', 0);
        $this->db->where($table2 . '.status', 'Active');

        $this->db->select("node.id, node.parent_id, node.type, node.name, quiz.quiz_type");
        $this->db->join($table2, $table2 . '.' . $tab2_field . ' = ' . $table1 . '.' . $tb1_field, $join);

        $this->db->from($table1);
        $data = $this->db->get()->result_array();

        $option_str = '';


        foreach ($data as $rec) {

            if ($_SESSION['role_name'] == 'Content Creator') {//page specified in url but permission not allowing
                $is_permitted = $this->custom->get_access_permit_parent($rec['id']);
                if ($is_permitted) {

                    $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                    $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
                }
            } else {
                $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
            }
        }
        return $option_str;
    }

    public function get_name_from_id($table_name = '', $requested_column = 'name', $id = 0, $id_name = "id") {// for grid column, $id to get single record
        $this->db->where('is_deleted', 0);
        $this->db->where($id_name, $id);
        $this->db->select("$requested_column as name");
        $this->db->from($table_name);
        $query = $this->db->get(); //->result_array()
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->name;
        }
    }

    public function get_record_count($table_name = '', $where_id = '', $where_val = 0) {
        $this->db->where('is_deleted', 0);
        $this->db->where($where_id, $where_val);
        $this->db->from($table_name);
        return $this->db->count_all_results();
    }

    public function get_selected_records($table_name = '', $search_column = '', $search_value = 0, $request_fields) {//$request_fields=array(),
        $this->db->where('is_deleted', 0);
        $this->db->where('status', 'Active');
        if ($search_column) {
            $this->db->where($search_column, $search_value);
        };
        $str = '';
        foreach ($request_fields as $column_name) {

            $str.= $column_name . ', ';
        }
        $this->db->select($str); //id primary key is hard coded, $field_name is name of requested  column in table
        $this->db->from($table_name);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function get_many_records($table_name = '', $filters_id_values, $request_fields, $order_by = '') {//to get records from table having many related records --- $request_fields_values=array(id,value)
        $str = '';
//        print_r($request_fields);
//        die;
        if ($request_fields) {
            foreach ($request_fields as $column_name) {
                $str.= $column_name . ', ';
            }
        } else {
            $str = ' * ';
        }
        $this->db->select($str);

        $this->db->where('is_deleted', 0);
        if ($filters_id_values) {
            foreach ($filters_id_values as $filter) {
                $this->db->where($filter['id'], $filter['value']);
            }
        }

        if ($order_by) {//format : $this->db->order_by('title desc, name asc');
            $this->db->order_by($order_by);
        }
        $this->db->from($table_name);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function get_records_group_by($table = '', $filters_id_values, $group_col_name = '', $request_fields = '', $order_by = '') {
        $str = '';
        if ($request_fields) {
            foreach ($request_fields as $column_name) {
                $str.= $column_name . ', ';
            }
        } else {
            $str = ' * ';
        }
        $this->db->select($str);
        $this->db->from($table);
        $this->db->where('is_deleted', 0);
        if ($filters_id_values) {
            foreach ($filters_id_values as $filter) {
                $this->db->where($filter['id'], $filter['value']);
            }
        }
        $this->db->group_by($group_col_name);
        if ($order_by) {//format : $this->db->order_by('title desc, name asc');
            $this->db->order_by($order_by);
        }
        $data = $this->db->get()->result_array();
        return $data;
    }

}

//class end
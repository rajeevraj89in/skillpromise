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

    function get_records($table, $id_name = '', $id_value = 0, $orderby = '', $arrayreturn = 0) { //for orderby field : 'title desc, name asc'
        $this->db->where('is_deleted', 0);
        if ($id_name) {
            $this->db->where($id_name, $id_value);
        }
        if ($orderby) {
            $this->db->order_by($orderby);
        }

        $query = $this->db->get($table); // automatically add above conditions if enabled by if statement
        //echo $this->db->last_query();die;
        if ($arrayreturn) {
            return $query->result_array();
        } else {

            return $query;
        }
    }
    public function selectSingleData($table,$data,$where=''){
        $this->db->select($data);
        $this->db->from($table);
        if($where != ''){
            $this->db->where($where);
        }
        $query = $this->db->get();
        return $query->row();
    }
    public function getData($type,$packages){
        $query = $this->db->query("SELECT node.id,node.name,node.parent_id FROM `packages-node` INNER JOIN node ON `packages-node`.`node`=node.id WHERE node.parent_id=0 AND node.type='$type' AND `packages-node`.packages='$packages' ");
        return $query->row();
    }
    public function select($table,$data,$orderby=''){
        $this->db->select($data);
        $this->db->from($table);
        // if($where != ''){
        //     $this->db->where($where);
        // }
        if($orderby != ''){
            $this->db->order_by($orderby);
        }
        $query = $this->db->get();
        return $query->result();
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

    public function fill_select_noheader($table_name = '', $field_name = '', $selected_id = 0, $where_id = '', $where_val = 0) {// select boxes, $selected_id - to mark selected option in select box, $field_name - for name of primary id in table
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
//        $option_str = '<option value=""';
//        if (!($selected_id)) {
//            $option_str .= ' selected';
//        }
//        $option_str .= '> -- Select a ' . $table . " -- </option>";
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

        foreach ($data as $rec) {
            if ($_SESSION['role_name'] == 'Content Creator') {//page specified in url but permission not allowing
                $is_permitted = $this->custom->get_access_permit_parent($rec['id']); //=================== this is to check parent node =========
                if ($is_permitted) {

                    $option_str .= '<option ';
                    $option_str .= 'value="' . $rec['id'] . '"';
                    if ($rec['id'] == $selected_id) {
                        $option_str .= ' selected';
                    }
                    $option_str .= '>' . $rec['name'] . '</option>';
                } else {
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
//        print_r($option_str);
//        die;
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
//        $this->db->where('parent_id', 0);
        $this->db->where('type', 'Sheet');
        $this->db->select("id, $field_name");
        $this->db->from($table_name);
        $data = $this->db->get()->result_array();
        $option_str = '';
        foreach ($data as $rec) {
            if ($_SESSION['role_name'] == 'Content Creator') {
                $is_permitted = $this->custom->get_access_permit_parent($rec['id']);
                if ($is_permitted) {
                    $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                    $option_str .= $rec['id'] . '">' . $rec[$field_name] . '</a></li>';
                }
            } else {
                $is_package = $this->custom->check_node_on_package($rec['id']);
                if ($is_package) {
                    $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                    $option_str .= $rec['id'] . '">' . $rec[$field_name] . '</a></li>';
                } else {
                    $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                    $option_str .= $rec['id'] . '">' . $rec[$field_name] . '</a></li>';
                }
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

        $nodes = $data;
        // echo "<pre>";
        // print_r($nodes);die;
        foreach ($nodes as $key => $value) {
            $is_grant = $this->custom->is_associated_with_package($value["id"]);
            if (!$is_grant) {
                unset($nodes[$key]);
            }
        }
        // echo "<pre>";
        // print_r($nodes);
        // die;
        foreach ($nodes as $rec) {

            if ($nav_type == 'test_centre') {
                $is_dashboard_quiz_attached = $this->custom->is_dashboard_quiz_attached($rec['id']); //============== this is check for attache dashboard quiz
                //var_dump($is_dashboard_quiz_attached);
                if ($is_dashboard_quiz_attached) {
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
            } else {                                            //================= check on chield node there have any dashboard quiz or not ===================
//            echo "<pre>";
//            print_r($rec);
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
        }
        return $option_str;
    }

    public function fill_nav_node_li_program($table1 = '', $table2 = '', $tb1_field = '', $tab2_field = '', $join = 'LEFT', $nav_type = '') {
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

        $nodes = $data;
        // echo "<pre>";
        // print_r($nodes);die;
        foreach ($nodes as $key => $value) {
            $is_grant = $this->custom->is_associated_with_package($value["id"]);
            if (!$is_grant) {
                unset($nodes[$key]);
            }
        }
        // echo "<pre>";
        // print_r($nodes);
        // die;
        foreach ($nodes as $rec) {

            if ($nav_type == 'test_centre') {
                $is_dashboard_quiz_attached = $this->custom->is_dashboard_quiz_attached($rec['id']); //============== this is check for attache dashboard quiz
                //var_dump($is_dashboard_quiz_attached);
                if ($is_dashboard_quiz_attached) {
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
            } else {                                            //================= check on chield node there have any dashboard quiz or not ===================
//            echo "<pre>";
//            print_r($rec);
                if ($_SESSION['role_name'] == 'Content Creator') {//page specified in url but permission not allowing
                    $is_permitted = $this->custom->get_access_permit_parent($rec['id']);
                    if ($is_permitted) {

                        $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                        $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
                    }
                } else {
                    // $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                    // $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
                    $option_str.= $rec['id'];
                }
            }
        }
        return $option_str;
    }

    public function fill_nav_node_li_student($table1 = '', $table2 = '', $tb1_field = '', $tab2_field = '', $join = 'LEFT', $nav_type = '') {
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

        $this->db->select("node.id, node.parent_id, node.type, node.name, quiz.quiz_type,node.image_file");
        $this->db->join($table2, $table2 . '.' . $tab2_field . ' = ' . $table1 . '.' . $tb1_field, $join);

        $this->db->from($table1);

        $data = $this->db->get()->result_array();
        //echo $this->db->last_query();die;
        $option_str = '';

        $nodes = $data;

        foreach ($nodes as $key => $value) {
            $is_grant = $this->custom->is_associated_with_package($value["id"]);
            if (!$is_grant) {
                unset($nodes[$key]);
            }
        }
        // echo "<pre>";
        // print_r($nodes);die;
        foreach ($nodes as $rec) {

            if ($nav_type == 'test_centre') {
                $is_dashboard_quiz_attached = $this->custom->is_dashboard_quiz_attached($rec['id']); //============== this is check for attache dashboard quiz
                //var_dump($is_dashboard_quiz_attached);
                if ($is_dashboard_quiz_attached) {
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
            } else {                                          //================= check on chield node there have any dashboard quiz or not ===================
//            echo "<pre>";
//            print_r($rec);
                if ($_SESSION['role_name'] == 'Content Creator') {//page specified in url but permission not allowing
                    $is_permitted = $this->custom->get_access_permit_parent($rec['id']);
                    if ($is_permitted) {

                        $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                        $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
                    }
                } else {
                    // $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                    // $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
                    $option_str .= '<a class="prog-block" href="' . base_url() . 'node/' . $nav_type . '/'.$rec['id'] . '">
                    <img class="img-responsive" src="'.base_url().'assets/img/icons/'.$rec['image_file'].'">
                    <span>' . $rec['name'] . '</span>
                </a>';
                }
            }
        }
        return $option_str;
    }

    public function fill_nav_node_li_admin($table1 = '', $table2 = '', $tb1_field = '', $tab2_field = '', $join = 'LEFT', $nav_type = '') {
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
        
        //echo '<pre>';
        //print_r($data);die;

        $option_str = '';


        foreach ($data as $rec) {

            if ($nav_type == 'test_centre') {
                $is_dashboard_quiz_attached = $this->custom->is_dashboard_quiz_attached($rec['id']); //============== this is check for attache dashboard quiz
                //var_dump($is_dashboard_quiz_attached);
                if ($is_dashboard_quiz_attached) {
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
            } else {                                            //================= check on chield node there have any dashboard quiz or not ===================
//            echo "<pre>";
//            print_r($rec);
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

    public function get_name_from_id_groupby($table_name = '', $requested_column = 'name', $id = 0, $id_name = "id", $group_by = "") {// for grid column, $id to get single record
        $this->db->group_by("$group_by");
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

            $str .= $column_name . ', ';
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
                $str .= $column_name . ', ';
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
                $str .= $column_name . ', ';
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

    public function get_child($table = "", $col_name = "", $id = 0, $list = array()) {
        $result = $this->get_data_self_table($table, $col_name, $id);
        //var_dump($result);die;
        foreach ($result as $data) {
            $list[] = $data->id;
            $child = $this->get_data_self_table($table, $col_name, $data->id);
            if (!is_null($child)) {
                $list = $this->get_child($table, $col_name, $data->id, $list);
            }
        }
        return $list;
    }

    public function get_data_self_table($table, $col_name, $req_data) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('is_deleted', '0');
        $this->db->where($col_name, $req_data);
        $query = $this->db->get();
        return $query->result();
    }

    function findAll($table = '', $filters_id_values = '') {

        $this->db->where('is_deleted', 0);
        if ($filters_id_values) {
            foreach ($filters_id_values as $filter) {
                $this->db->where($filter['id'], $filter['value']);
            }
        }
        $query = $this->db->get($table);
        return $query->result();
    }

//for pagination

    public function count_records($table_name = '', $filters_id_values) {
        $this->db->where('is_deleted', 0);
        if ($filters_id_values) {
            foreach ($filters_id_values as $filter) {
                $this->db->where($filter['id'], $filter['value']);
            }
        }
        $this->db->from($table_name);
        return $this->db->count_all_results();
    }

    function get_records_with_limit($table, $filters_id_values, $start = '', $limit = 0, $orderby = '') { //for orderby field : 'title desc, name asc'
        $this->db->where('is_deleted', 0);
        if ($filters_id_values) {
            foreach ($filters_id_values as $filter) {
                $this->db->where($filter['id'], $filter['value']);
            }
        }
        if ($orderby) {
            $this->db->order_by($orderby);
        }
        if ($limit) {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get($table); // automatically add above conditions if enabled by if statement
        return $query;
    }

    public function get_records_from_id($table, $id_value = 0, $id_name = 'id', $request_fields = '*') { //for orderby field : 'title desc, name asc'
        $str = '';
        if ($request_fields != '*') {
            foreach ($request_fields as $column_name) {
                $str .= $column_name . ', ';
            }
        } else {
            $str = ' * ';
        }
        $this->db->select($str);
        $this->db->where('is_deleted', 0);
        $this->db->where($id_name, $id_value);
        $query = $this->db->get($table);
        return $query->row_array();
    }

    public function select_template_types($value = "") {//=================== action sheet : templete type ================
        $opt_str = "";
        $str[1] = 'Multiple choice and add more';
        $str[2] = 'Multiple choice with no tooltip';
        $str[3] = 'Single Tick';
        $str[4] = 'List type';
        $str[5] = 'Descriptive type';
        $str[6] = 'Marking type';
        $str[7] = 'Give Range';
        $str[8] = 'Advance tickmark';
        $str[9] = 'Dropdown with multi add_more';
        $str[10] = 'Addmore Checkbox Category';
        $str[11] = 'Add Cover Letter';
        $str[12] = 'Add Curriculum Vitae';

        if (!$value) {
            $opt_str .= '<option selected="selected" value="">- Select a Type -</option>';
        } else {
            $opt_str .= '<option value="">- Select a Type -</option>';
        }
        $i = 1;
        foreach ($str as $key => $type) {
            $opt_str .= '<option ';
            if (($value) && ($value == $i)) {
                $opt_str .= 'selected="selected" ';
            }
            $opt_str .= 'value="' . $i . '">' . $type . '</option>';
            $i++;
        }

        return $opt_str;
    }

    public function select_section_types($value = "") { ///================= action sheet : section type ==============
        $opt_str = "";
        $str[1] = 'Checkbox with tooltip';
        $str[2] = 'Add more type';
        $str[3] = 'Checkbox with no tooltip';
        $str[4] = 'Tick Mark';
        $str[5] = 'Listing type';
        $str[6] = 'Descriptive';
        $str[7] = 'Marking(Agree/Disagree etc)';
        $str[8] = 'Range Type';
        $str[9] = 'Advance Tickmark';
        $str[10] = 'Dropdown with multi Addmore';
        $str[11] = 'Addmore Checkbox Category';
        $str[12] = 'Add Cover Letter';
        $str[13] = 'Add Curriculum Vitae';
        if (!$value) {
            $opt_str .= '<option selected="selected" value="">- Select a Type -</option>';
        } else {
            $opt_str .= '<option value="">- Select a Type -</option>';
        }
        $i = 1;
        foreach ($str as $key => $type) {
            $opt_str .= '<option ';
            if (($value) && ($value == $i)) {
                $opt_str .= 'selected="selected" ';
            }
            $opt_str .= 'value="' . $i . '">' . $type . '</option>';
            $i++;
        }

        return $opt_str;
    }

    public function fill_nav_node_li_quiz_type_two($table1 = '', $tb1_field = '', $nav_type = '') {
        // select boxes, $selected_id - to mark selected option in select box, $field_name - for name of primary id in table
        $this->db->where($table1 . '.type', 'Quiz');
        $this->db->where($table1 . '.status', 'Active');
        $this->db->where($table1 . '.parent_id', 0);
        $this->db->where($table1 . '.is_deleted', 0);

        $this->db->select("node.id, node.parent_id, node.type, node.name");

        $this->db->from($table1);
        $data = $this->db->get()->result_array();


        $option_str = '';

        $nodes = $data;
        // echo "<pre>";
        // print_r($nodes);die;
        foreach ($nodes as $key => $value) {
            $is_grant = $this->custom->is_associated_with_package($value["id"]);
            //echo $is_grant."<br>";
            if (!$is_grant) {
                unset($nodes[$key]);
            }
        }
        // echo "<pre>";
        // print_r($nodes);die;

        foreach ($nodes as $rec) {
//=======================switch case for nav_type==================================
            switch ($nav_type) {

                case "test_centre":
                    if ($_SESSION['role_name'] == 'Content Creator') {//page specified in url but permission not allowing
                        $is_permitted = $this->custom->get_access_permit_parent($rec['id']);


                        if ($is_permitted) {
                            $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                            $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
                        }
                    } else {
                        $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
//                    $option_str .= $rec['parent_id'] . '">' . $rec['name'] . '</a></li>';
                        $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
                    }
                    break;


                case "program":
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
                    break;



                case "analytics":

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

                    break;

                default :
                    break;
            }
        }

        return $option_str;
    }

    public function fill_nav_node_li_quiz_type_two_new_design($table1 = '', $tb1_field = '', $nav_type = '') {
        // select boxes, $selected_id - to mark selected option in select box, $field_name - for name of primary id in table
        $this->db->where($table1 . '.type', 'Quiz');
        $this->db->where($table1 . '.status', 'Active');
        $this->db->where($table1 . '.parent_id', 0);
        $this->db->where($table1 . '.is_deleted', 0);

        $this->db->select("node.id, node.parent_id, node.type, node.name, node.image_file");

        $this->db->from($table1);
        $data = $this->db->get()->result_array();


        $option_str = '';

        $nodes = $data;
        // echo "<pre>";
        // print_r($nodes);die;
        foreach ($nodes as $key => $value) {
            $is_grant = $this->custom->is_associated_with_package_test($value["id"]);
            //echo $is_grant."<br>";
            if (!$is_grant) {
                unset($nodes[$key]);
            }
        }
        // echo "<pre>";
        // print_r($nodes);die;

        foreach ($nodes as $rec) {
//=======================switch case for nav_type==================================
            switch ($nav_type) {

                case "test_centre":
                    if ($_SESSION['role_name'] == 'Content Creator') {//page specified in url but permission not allowing
                        $is_permitted = $this->custom->get_access_permit_parent($rec['id']);


                        if ($is_permitted) {
                            $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                            $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
                        }
                    } else {
                            $option_str.= '<a class="prog-block" href="' . base_url() . 'node/' . $nav_type . '/'.$rec['id'] . '">
                                 <img class="img-responsive" src="'.base_url().'assets/img/icons/'.$rec['image_file'].'">
                                    <span>' . $rec['name'] . '</span>
                                </a>';
//                         $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
// //                    $option_str .= $rec['parent_id'] . '">' . $rec['name'] . '</a></li>';
//                         $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
                    }
                    break;


                case "program":
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
                    break;



                case "analytics":

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

                    break;

                default :
                    break;
            }
        }

        return $option_str;
    }
	
	public function fill_nav_node_li_quiz_type_two_new_design_test_center() {
        $query = $this->db->query("SELECT * FROM (`node`) WHERE `node`.`type` = 'Quiz' AND `node`.`status` = 'Active' AND `node`.`parent_id` = 0 AND `node`.`is_deleted` = 0");
		return $query->result();
    }

    public function fill_nav_node_li_quiz_type_two_admin($table1 = '', $tb1_field = '', $nav_type = '') {
        // select boxes, $selected_id - to mark selected option in select box, $field_name - for name of primary id in table
        $this->db->where($table1 . '.type', 'Quiz');
        $this->db->where($table1 . '.status', 'Active');
        $this->db->where($table1 . '.parent_id', 0);
        $this->db->where($table1 . '.is_deleted', 0);

        $this->db->select("node.id, node.parent_id, node.type, node.name");

        $this->db->from($table1);
        $data = $this->db->get()->result_array();


        $option_str = '';



        foreach ($data as $rec) {
//=======================switch case for nav_type==================================
            switch ($nav_type) {

                case "test_centre":

                    if ($_SESSION['role_name'] == 'Content Creator') {//page specified in url but permission not allowing
                        $is_permitted = $this->custom->get_access_permit_parent($rec['id']);


                        if ($is_permitted) {
                            $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                            $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
                        }
                    } else {

                        $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
//                    $option_str .= $rec['parent_id'] . '">' . $rec['name'] . '</a></li>';
                        $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
                    }
                    break;


                case "program":
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
                    break;



                case "analytics":

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

                    break;

                default :
                    break;
            }
        }

        return $option_str;
    }

// public function fill_nav_node_li_quiz_type_two($table1 = '', $tb1_field = '', $nav_type = '') {
//     $this->db->where($table1 . '.type', 'Quiz');
//     $this->db->where($table1 . '.status', 'Active');
//     $this->db->where($table1 . '.parent_id', 0);
//     $this->db->where($table1 . '.is_deleted', 0);
//     $this->db->select("node.id, node.parent_id, node.type, node.name");
//     $this->db->from($table1);
//     $data = $this->db->get()->result_array();
//     $option_str = '';
//     foreach ($data as $rec) {
//         if ($nav_type == 'test_centre') {
//             if ($_SESSION['role_name'] == 'Content Creator') {//page specified in url but permission not allowing
//                 $is_permitted = $this->custom->get_access_permit_parent($rec['id']);
//                 if ($is_permitted) {
//                     $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
//                     $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
//                 }
//             } else {
//                 $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
//                 $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
//             }
//         } else {                                            //================= check on chield node there have any dashboard quiz or not ===================
//             if ($_SESSION['role_name'] == 'Content Creator') {//page specified in url but permission not allowing
//                 $is_permitted = $this->custom->get_access_permit_parent($rec['id']);
//                 if ($is_permitted) {
//                     $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
//                     $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
//                 }
//             } else {
//                 $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
//                 $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
//             }
//         }
//     }
//     return $option_str;
// }


    public function fill_nav_node_li_quiz_type_analytics($table1 = '', $tb1_field = '', $nav_type = '') {
        // select boxes, $selected_id - to mark selected option in select box, $field_name - for name of primary id in table
        $sql = "SELECT $table1.id, $table1.parent_id, $table1.type, $table1.name FROM $table1 WHERE ($table1.type = 'Quiz' OR $table1.type = 'Sheet') AND $table1.status = 'Active' AND $table1.parent_id = '0' AND $table1.`is_deleted` = '0'";

//        $this->db->where($table1 . '.type', 'Quiz' . 'OR' . 'Sheet');
//        $this->db->where($table1 . '.status', 'Active');
//        $this->db->where($table1 . '.parent_id', 0);
//        $this->db->where($table1 . '.is_deleted', 0);
//
//        $this->db->select("node.id, node.parent_id, node.type, node.name");
//
//        $this->db->from($table1);
        $data = $this->db->query($sql)->result_array();
//        $data = $this->db->get()->result_array();
//        echo "<pre>";
//        print_r($data);
//        die;

        $option_str = '';

        $nodes = $data;

        foreach ($nodes as $key => $value) {
            $is_grant = $this->custom->is_associated_with_package($value["id"]);
            if (!$is_grant) {
                unset($nodes[$key]);
            }
        }

        foreach ($nodes as $rec) {
//            echo $rec['id'];
            $CI = & get_instance();
//            $total = $CI->headertotalchild($rec['id']);
            $total = $CI->get_node_child($rec['id']);


//=======================switch case for nav_type==================================
            switch ($nav_type) {


                case "test_centre":

                    if ($_SESSION['role_name'] == 'Content Creator') {//page specified in url but permission not allowing
                        $is_permitted = $this->custom->get_access_permit_parent($rec['id']);

                        if ($is_permitted) {

                            $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                            $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
                        }
                    } else {
                        $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
//                    $option_str .= $rec['parent_id'] . '">' . $rec['name'] . '</a></li>';
                        $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
                    }
                    break;


                case "program":
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
                    break;



                case "analytics":

                    if ($_SESSION['role_name'] == 'Content Creator') {//page specified in url but permission not allowing
                        $is_permitted = $this->custom->get_access_permit_parent($rec['id']);



                        if ($is_permitted) {

                            $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                            $option_str .= $rec['id'] . '">' . $rec['name'] . '(' . $total . ')' . '</a></li>';
                        }
                    } else {
                        $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                        $option_str .= $rec['id'] . '">' . $rec['name'] . '(' . $total . ')' . '</a></li>';
                    }

                    break;

                default :
                    break;
            }
        }

        return $option_str;
    }

    public function fill_nav_node_li_quiz_type_analytics_admin($table1 = '', $tb1_field = '', $nav_type = '') {
        // select boxes, $selected_id - to mark selected option in select box, $field_name - for name of primary id in table
        $sql = "SELECT $table1.id, $table1.parent_id, $table1.type, $table1.name FROM $table1 WHERE ($table1.type = 'Quiz' OR $table1.type = 'Sheet') AND $table1.status = 'Active' AND $table1.parent_id = '0' AND $table1.`is_deleted` = '0'";

//        $this->db->where($table1 . '.type', 'Quiz' . 'OR' . 'Sheet');
//        $this->db->where($table1 . '.status', 'Active');
//        $this->db->where($table1 . '.parent_id', 0);
//        $this->db->where($table1 . '.is_deleted', 0);
//
//        $this->db->select("node.id, node.parent_id, node.type, node.name");
//
//        $this->db->from($table1);
        $data = $this->db->query($sql)->result_array();
//        $data = $this->db->get()->result_array();
//        echo "<pre>";
//        print_r($data);
//        die;

        $option_str = '';

        foreach ($data as $rec) {
//            echo $rec['id'];
            $CI = & get_instance();
//            $total = $CI->headertotalchild($rec['id']);
            $total = $CI->get_node_child($rec['id']);


//=======================switch case for nav_type==================================
            switch ($nav_type) {


                case "test_centre":

                    if ($_SESSION['role_name'] == 'Content Creator') {//page specified in url but permission not allowing
                        $is_permitted = $this->custom->get_access_permit_parent($rec['id']);

                        if ($is_permitted) {

                            $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                            $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
                        }
                    } else {
                        $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
//                    $option_str .= $rec['parent_id'] . '">' . $rec['name'] . '</a></li>';
                        $option_str .= $rec['id'] . '">' . $rec['name'] . '</a></li>';
                    }
                    break;


                case "program":
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
                    break;



                case "analytics":

                    if ($_SESSION['role_name'] == 'Content Creator') {//page specified in url but permission not allowing
                        $is_permitted = $this->custom->get_access_permit_parent($rec['id']);



                        if ($is_permitted) {

                            $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                            $option_str .= $rec['id'] . '">' . $rec['name'] . '(' . $total . ')' . '</a></li>';
                        }
                    } else {
                        $option_str .= '<li><a href="' . base_url() . 'node/' . $nav_type . '/';
                        $option_str .= $rec['id'] . '">' . $rec['name'] . '(' . $total . ')' . '</a></li>';
                    }

                    break;

                default :
                    break;
            }
        }

        return $option_str;
    }

    public function fill_node_select_2($parent = 0, $customer = 1, $selected_id = 0, $table = "node") {// select boxes, $selected_id - to mark selected option in select box, $field_name - for name of primary id in table
        $this->db->where('is_deleted', 0);
        $this->db->where('status', 'Active');
        $this->db->where('customer', $customer);
        $this->db->where('parent_id', $parent);
        $this->db->select("id, name");
        $this->db->from($table);
        $data = $this->db->get()->result_array();

        $option_str = '<option value="' . $parent . '"';
        if (!($selected_id)) {
            $option_str .= ' selected';
        }
        $level = $this->get_node_level($parent);
        $option_str .= '> Select Level-' . ++$level . " " . $table . " </option>";
        foreach ($data as $rec) {
            $option_str .= '<option ';

            $option_str .= 'value="' . $rec['id'] . '"';
            if ($rec['id'] == $selected_id) {
                $option_str .= ' selected';
            }
            $option_str .= '>' . $rec['name'] . '</option>';
        }
        return $option_str;
    }

    public function fill_selected_state($value = "") {
        $opt_str = "";
        $str[1] = 'Assam';
        $str[2] = 'Bihar';
        $str[3] = 'Chandigarh';
        $str[4] = 'Chhatisgarh';
        $str[5] = 'Delhi';
        $str[6] = 'Gujarat';
        $str[7] = 'Haryana';
        $str[8] = 'Jammu and Kashmir';
        $str[9] = 'Jharkhand';
        $str[10] = 'Karnataka';
        $str[11] = 'Kerala';
        $str[12] = 'Madhya Pradesh';
        $str[13] = 'Maharashtra';
        $str[14] = 'Manipur';
        $str[15] = 'Meghalaya';
        $str[16] = 'Mizoram';
        $str[17] = 'Orissa';
        $str[18] = 'Pondicherry';
        $str[19] = 'Punjab';
        $str[20] = 'Rajasthan';
        $str[21] = 'Tamil Nadu';
        $str[22] = 'Tripura';
        $str[23] = 'Uttar Pradesh';
        $str[24] = 'Uttaranchal';
        $str[25] = 'West Bengal';

        if (!$value) {
            $opt_str .= '<option selected="selected" value="">- Select a State -</option>';
        } else {
            $opt_str .= '<option value="">- Select a State -</option>';
        }

        foreach ($str as $state) {
            $opt_str .= '<option ';
            if (($value) && ($value == $state)) {
                $opt_str .= 'selected="selected" ';
            }
            $opt_str .= 'value="' . $state . '">' . $state . '</option>';
        }
        return $opt_str;
    }

    public function fill_selected_countries($value = "") {
        $opt_str = "";
        $str[1] = 'Afghanistan';
        $str[2] = 'Albania';
        $str[3] = 'Algeria';
        $str[4] = 'Andorra';
        $str[5] = 'Angola';
        $str[6] = 'Antigua and Barbuda';
        $str[7] = 'Argentina';
        $str[8] = 'Armenia';
        $str[9] = 'Australia';
        $str[10] = 'Austria';
        $str[11] = 'Azerbaijan';
        $str[12] = 'The Bahamas';
        $str[13] = 'Bahrain';
        $str[14] = 'Bangladesh';
        $str[15] = 'Barbados';
        $str[16] = 'Belarus';
        $str[17] = 'Belgium';
        $str[18] = 'Belize';
        $str[19] = 'Benin';
        $str[20] = 'Bhutan';
        $str[21] = 'Bolivia';
        $str[22] = 'Bosnia and Herzegovina';
        $str[23] = 'Botswana';
        $str[24] = 'Brazil';
        $str[25] = 'Brunei';
        $str[1] = 'Bulgaria';
        $str[2] = 'Burkina Faso';
        $str[3] = 'Burundi';
        $str[4] = 'Cabo Verde';
        $str[5] = 'Cambodia';
        $str[6] = 'Cameroon';
        $str[7] = 'Canada';
        $str[8] = 'Central African Republic';
        $str[9] = 'Chad';
        $str[10] = 'Chile';
        $str[11] = 'China';
        $str[12] = 'Colombia';
        $str[13] = 'Congo, Democratic Republic of the Costa Rica';
        $str[14] = 'Côte d’Ivoire';
        $str[15] = 'Croatia';
        $str[16] = 'Cuba';
        $str[17] = 'Cyprus';
        $str[18] = 'Czech Republic';
        $str[19] = 'Denmark';
        $str[20] = 'Djibouti';
        $str[21] = 'Dominica';
        $str[22] = 'Dominican Republic';
        $str[23] = 'East Timor (Timor-Leste)';
        $str[24] = 'Ecuador';
        $str[25] = 'Egypt';
        $str[1] = 'El Salvador';
        $str[2] = 'Equatorial Guinea';
        $str[3] = 'Eritrea';
        $str[4] = 'Estonia';
        $str[5] = 'Eswatini';
        $str[6] = 'Ethiopia';
        $str[7] = 'Fiji';
        $str[8] = 'Finland';
        $str[9] = 'France';
        $str[10] = 'Gabon';
        $str[11] = 'The Gambia';
        $str[12] = 'Georgia';
        $str[13] = 'Germany';
        $str[14] = 'Ghana';
        $str[15] = 'Greece';
        $str[16] = 'Grenada';
        $str[17] = 'Guatemala';
        $str[18] = 'Guinea';
        $str[19] = 'Guinea-Bissau';
        $str[20] = 'Guyana';
        $str[21] = 'Haiti';
        $str[22] = 'Honduras';
        $str[23] = 'Hungary';
        $str[24] = 'Iceland';
        $str[25] = 'India';
        $str[1] = 'Indonesia';
        $str[2] = 'Iran';
        $str[3] = 'Iraq';
        $str[4] = 'Ireland';
        $str[5] = 'Israel';
        $str[6] = 'Italy';
        $str[7] = 'Jamaica';
        $str[8] = 'Japan';
        $str[9] = 'Jordan';
        $str[10] = 'Kazakhstan';
        $str[11] = 'Kenya';
        $str[12] = 'Kiribati';
        $str[13] = ' Korea, North';
        $str[14] = 'Korea, South';
        $str[15] = 'Kosovo';
        $str[16] = 'Kuwait';
        $str[17] = 'Kyrgyzstan';
        $str[18] = 'Laos';
        $str[19] = 'Latvia';
        $str[20] = 'Lebanon';
        $str[21] = 'Lesotho';
        $str[22] = 'Liberia';
        $str[23] = 'Libya';
        $str[24] = 'Liechtenstein';
        $str[25] = 'Lithuania';
        $str[1] = 'Luxembourg';
        $str[2] = 'Madagascar';
        $str[3] = 'Malawi';
        $str[4] = 'Malaysia';
        $str[5] = 'Maldives';
        $str[6] = 'Mali';
        $str[7] = 'Malta';
        $str[8] = 'Marshall Islands';
        $str[9] = 'Mauritania';
        $str[10] = 'Mauritius';
        $str[11] = 'Mexico';
        $str[12] = 'Micronesia, Federated States of Moldova';
        $str[13] = 'Monaco';
        $str[14] = 'Mongolia';
        $str[15] = 'Montenegro';
        $str[16] = 'Morocco';
        $str[17] = 'Mozambique';
        $str[18] = 'Myanmar (Burma)';
        $str[19] = 'Namibia';
        $str[20] = 'Nauru';
        $str[21] = 'Nepal';
        $str[22] = 'Netherlands';
        $str[23] = 'New Zealand';
        $str[24] = 'Nicaragua';
        $str[25] = 'Niger';
        $str[1] = 'Nigeria';
        $str[2] = 'North Macedonia';
        $str[3] = 'Norway';
        $str[4] = 'Oman';
        $str[5] = 'Pakistan';
        $str[6] = 'Palau';
        $str[7] = 'Panama';
        $str[8] = 'Papua New Guinea';
        $str[9] = 'Paraguay';
        $str[10] = 'Peru';
        $str[11] = 'Philippines';
        $str[12] = 'Poland';
        $str[13] = 'Portugal';
        $str[14] = 'Qatar';
        $str[15] = 'Romania';
        $str[16] = 'Russia';
        $str[17] = 'Rwanda';
        $str[18] = 'Saint Kitts and Nevis';
        $str[19] = 'Saint Lucia';
        $str[20] = 'Saint Vincent and the Grenadines';
        $str[21] = 'Samoa';
        $str[22] = 'San Marino';
        $str[23] = 'Sao Tome and Principe';
        $str[24] = 'Saudi Arabia';
        $str[25] = 'Senegal';
        $str[1] = 'Serbia';
        $str[2] = 'Seychelles';
        $str[3] = 'Sierra Leone';
        $str[4] = 'Singapore';
        $str[5] = 'Slovakia';
        $str[6] = 'Slovenia';
        $str[7] = 'Solomon Islands';
        $str[8] = 'Somalia';
        $str[9] = 'South Africa';
        $str[10] = 'Spain';
        $str[11] = 'Sri Lanka';
        $str[12] = 'Sudan';
        $str[13] = 'Sudan, South';
        $str[14] = 'Suriname';
        $str[15] = 'Sweden';
        $str[16] = 'Switzerland';
        $str[17] = 'Syria';
        $str[18] = 'Taiwan';
        $str[19] = 'Tanzania';
        $str[20] = 'Thailand';
        $str[21] = 'Togo';
        $str[22] = 'Tonga';
        $str[23] = 'Trinidad and Tobago';
        $str[24] = 'Tunisia';
        $str[25] = 'Turkey';
        $str[1] = 'Turkmenistan';
        $str[2] = 'Tuvalu';
        $str[3] = 'Sierra Leone';
        $str[4] = 'Singapore';
        $str[5] = 'Slovakia';
        $str[6] = 'Slovenia';
        $str[7] = 'Solomon Islands';
        $str[8] = 'Somalia';
        $str[9] = 'South Africa';
        $str[10] = 'Spain';
        $str[11] = 'Sri Lanka';
        $str[12] = 'Sudan';
        $str[13] = 'Sudan, South';
        $str[14] = 'Suriname';
        $str[15] = 'Sweden';
        $str[16] = 'Switzerland';
        $str[17] = 'Syria';
        $str[18] = 'Taiwan';
        $str[19] = 'Tanzania';
        $str[20] = 'Thailand';
        $str[21] = 'Togo';
        $str[22] = 'Tonga';
        $str[23] = 'Trinidad and Tobago';
        $str[24] = 'Tunisia';
        $str[25] = 'Turkey';

        if (!$value) {
            $opt_str .= '<option selected="selected" value="">- Select a State -</option>';
        } else {
            $opt_str .= '<option value="">- Select a State -</option>';
        }

        foreach ($str as $state) {
            $opt_str .= '<option ';
            if (($value) && ($value == $state)) {
                $opt_str .= 'selected="selected" ';
            }
            $opt_str .= 'value="' . $state . '">' . $state . '</option>';
        }
        return $opt_str;
    }

    public function get_many_data_with_where_in($table_name = '', $request_fields = '', $filters_id_values = '', $filters_where_in = '', $id = '') {
        $this->db->where('is_deleted', 0);
        if ($filters_id_values) {
            foreach ($filters_id_values as $filter) {
                $this->db->where($filter['id'], $filter['value']);
            }
        }

        $str = '';
        if ($request_fields) {
            foreach ($request_fields as $column_name) {
                $str .= $column_name . ', ';
            }
        } else {
            $str = ' * ';
        }
        $this->db->select($str);

        if ($filters_where_in) {

            foreach ($filters_where_in as $filters) {
                $this->db->where_in($id, $filters);
            }
        }
        $this->db->from($table_name);
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function test($a = "users", $b = "payment_details") {
        $this->db->select("id");
        $this->db->distinct();
        $this->db->from($a);
        $query1 = $this->db->get();

        $this->db->select("id");
        $this->db->distinct();
        $this->db->from($b);
        $query2 = $this->db->get();

        $data = $this->db->get($query1 . "UNION" . $query2)->result_array();
        return $data;
    }


   public function fill_select_action_sheets($table_name = '', $field_name = '', $selected_id = 0, $where_id = '', $where_val = 0) {// select boxes, $selected_id - to mark selected option in select box, $field_name - for name of primary id in table
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
        $option_str .= '> -- Select a option -- </option>';
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


}

//class end

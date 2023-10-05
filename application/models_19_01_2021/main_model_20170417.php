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
        $this->db->where($table1 . '.type', 'Quiz');
        $this->db->where($table1 . '.status', 'Active');
        $this->db->where($table1 . '.parent_id', 0);
        $this->db->where($table1 . '.is_deleted', 0);

        $this->db->select("node.id, node.parent_id, node.type, node.name");

        $this->db->from($table1);
        $data = $this->db->get()->result_array();


        $option_str = '';


        foreach ($data as $rec) {
//            echo $rec['id'];
            $CI = & get_instance();
            $total = $CI->headertotalchild($rec['id']);

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

}

//class end
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {
    protected _db_table = 'abstract';
    protected _db_table_pk = 'abstract';

    function __construct($table = '')
    {
        parent::__construct();
        date_default_timezone_set('Asia/Taipei');
        if( ! empty($table)) $this->_db_table = $table;
    }

    private function generate_fields() {
        $fields = $this->db->list_fields($this->_db_table);
        foreach ($fields as $field)
        {
            $this->{$field->name} = 0;
            if($field->primary_key){
                $this->_db_table_pk = $field->name;
            }
        }
    }
    
    /**
     * Create record.
     */
    private function insert() {
        $this->db->insert($this->_db_table, $this);
        $this->{$this->_db_table_pk} = $this->db->insert_id();
    }
    
    /**
     * Update record.
     */
    private function update() {
        $this->db->update($this->_db_table, $this, array($this->_db_table_pk => $this->{$this->_db_table_pk}));
    }
    
    /**
     * Populate from an array or standard class.
     * @param mixed $row
     */
    public function populate($row, $post = 0) {
        foreach ($row as $key => $value) {
            $this->$key = $value;
            if($post)
            {
                $_POST[$key] = $value;
            }
        }
    }
    
    /**
     * Load from the database.
     * @param int $id
     */
    public function load($id, $post = 0, $where = array()) {
         $where = empty($where) ? array(
           $this->_db_table_pk => $id, 
        ) : $where;
        $query = $this->db->get_where($this->_db_table, $where);
        $this->populate($query->row(),$post);
    }
    
    /**
     * Delete the current record.
     */
    public function delete($where = array()) {
        $where = empty($where) ? array(
           $this->_db_table_pk => $this->{$this->_db_table_pk}, 
        ) : $where;
        $this->db->where($where)->delete($this->_db_table);
        unset($this->{$this->_db_table_pk});
    }
    
    /**
     * Save the record.
     */
    public function save() {
        if ( ! empty($this->{$this->_db_table_pk})) {
            $this->update();
        }
        else {
            $this->insert();
        }
    }
    
    /**
     * Get an array of Models with an optional limit, offset.
     * 
     * @param int $limit Optional.
     * @param int $offset Optional; if set, requires $limit.
     * @return array Models populated by database, keyed by PK.
     */
    public function get($limit = 0, $offset = 0) {
        if ($limit) {
            $query = $this->db->get($this->_db_table, $limit, $offset);
        }
        else {
            $query = $this->db->get($this->_db_table);
        }
        $ret_val = array();
        $class = get_class($this);
        foreach ($query->result() as $row) {
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{$this->_db_table_pk}] = $model;
        }
        return $ret_val;
    }
    
    public function get_where($where = array(), $limit = 0, $offset = 0) {
        if ($limit) {
            $query = $this->db->get_where($this->_db_table, $where, $limit, $offset);
        }
        else {
            $query = $this->db->get_where($this->_db_table, $where);
        }
        $ret_val = array();
        $class = get_class($this);
        foreach ($query->result() as $row) {
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{$this->_db_table_pk}] = $model;
        }
        return $ret_val;
    }
}
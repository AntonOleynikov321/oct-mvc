<?php



namespace models;
use core\Model;

class ModelApi extends Model{
    public function __construct() {
        parent::__construct();
        $this->table = 'questions';
    }
    public function add($question) {
        $query = 'INSERT INTO '.$this->table." values (null,'{$question['author']}','{$question['text']}');";
        $this->db->query($query);
    }
}

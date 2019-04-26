<?php

namespace controllers;

use core\Controller;
use models\ModelTasks;

class ControllerTasks extends Controller {

    public function __construct() {
        parent::__construct();
        $this->model = new ModelTasks();
    }

    public function action_index() {
        $this->view->tasks = $this->model->all();
        $this->view->render('tasks_index_view');
    }

    public function action_create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->action_add();
        } else {
            $this->view->render('task_add_view');
        }
    }

    public function action_add() {
        $task_text = filter_input(INPUT_POST, 'task_text');
   
            $this->model->save($task_text);
            $url = $_SERVER['HTTP_ORIGIN'] . '/tasks';
            header("Location: " . $url);
      
    }
    public function action_edit(){
        $this->view->render('task_edit_view');
        
    }
    public function action_delete() {
        $this->model->delete();
    }

}

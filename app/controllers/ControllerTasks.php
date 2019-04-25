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
        $this->view->render('task_add_view');
    }

    public function action_add() {
//        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
//
//            $task_text = filter_input(INPUT_POST, 'task_text');
//            $this->view->render('tasks_index_view');
//        }
//    }
    }
}

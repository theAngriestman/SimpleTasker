<?php

require_once 'AController.php';
require_once 'models/Tasks.php';

class Task extends AController
{

    public function process()
    {
        $id = $_GET['id'] ?? -1;
        $tasks_manager = new Tasks();
        $this->task = $tasks_manager->get($id);
        if (!$this->task) {
            $this->render_404();
            exit();
        }
        $this->set_title('Просмотр задания: ' . $this->task['name']);
        $this->render('task.php');

    }
}

(new Task())->process();
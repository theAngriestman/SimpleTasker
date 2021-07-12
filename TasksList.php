<?php
require_once 'AController.php';
require_once 'models/Tasks.php';
class TasksList extends AController
{

    public function process()
    {
        $tasks_manager = new Tasks();
        $this->tasks = $tasks_manager->getList();
        $this->set_title('Список заданий');
        $this->render('tasks_list.php');
    }
}

(new TasksList())->process();



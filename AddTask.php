<?php

require_once 'AController.php';
require_once 'models/Tasks.php';

class AddTask extends AController
{

    public function process()
    {
        if(!empty($_POST)){
            $tasks_manager = new Tasks();
            $tasks_manager->add($_POST['name'],$_POST['description']);
            $this->redirect('TasksList.php');
        }
        $this->set_title('Новое задане');
        $this->render('task.php');

    }
}

(new AddTask())->process();
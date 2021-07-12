<?php


class Tasks
{
    private $file = 'tasks.json';

    /**
     * @param string $file
     */

    /**
     * Tasks constructor.
     */
    public function __construct($file = 'tasks.json')
    {
        if (!file_exists($file)) {
            file_put_contents($file, json_encode([]));
        }
        $this->file = $file;
    }

    public function getList()
    {
        return json_decode(file_get_contents($this->file), true);
    }

    public function add($task_name, $description)
    {
        $task_data = [
            'name' => $task_name,
            'description' => $description,
            'time' => date('U')
        ];
        $tempArray = $this->getList();
        array_push($tempArray, $task_data);
        $jsonData = json_encode($tempArray,JSON_PRETTY_PRINT);
        file_put_contents($this->file, $jsonData);
    }

    public function get($id)
    {
        $list = $this->getList();
        return $list[$id] ?? [];
    }
}
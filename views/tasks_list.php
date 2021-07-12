Отобразим через хелпер:
<?php
$vh->array_to_table($this->tasks);

if($this->tasks){
?>
    <br><br>
    ИЛИ используя цикл в представлении и метод хелпера для преобразования дат.</br>
    Используя цикл можем подставить ссылочки
    <br><br>

    <table>
        <?php foreach ($this->tasks as $id => $task) {?>
        <tr>
            <td><?=$vh->timestatmp_to_date($task['time'])?></td>
            <td><a href="Task.php?id=<?=$id?>"><?=$task['name']?></a></td>
        </tr>
        <?php }?>
    </table>
    <a href="AddTask.php" style="background-color: lightgray;border: 1px solid #ababab;padding: 2px;margin-top: 15px;display: inline-block">Добавить задание</a>


<?php
}


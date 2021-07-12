<form action="AddTask.php" method="post">
    <div>Название: <input type="text" name="name" value="<?= $this->task['name'] ?? '' ?>"></div>
    <div>Описание: <textarea name="description"><?= $this->task['description'] ?? '' ?></textarea>
    </div>
    <?php if ($this->task['time'] ?? false) { ?>
        <div>Создано: <?= $vh->timestatmp_to_datetime($this->task['time']) ?></div>
    <?php } else {
        echo '<input type="submit">';
    } ?>
</form>

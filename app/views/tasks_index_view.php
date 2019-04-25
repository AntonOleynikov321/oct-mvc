<ul>
    <?php foreach ($this->tasks as $task): ?>
        <li><?= $task['name'] ?></li>
    <?php endforeach; ?>

</ul>

<button onclick="location.href='tasks/create'">Add</button>
<table>
    <th>#</th>
    <th>Task Name</th>
    <th>Options</th>
    <?php foreach ($this->tasks as $task): ?>
    <tr>
        <td><?= $task['id'] ?></td>
        <td><?= $task['name'] ?></td>
        <td><button id="edit_btn_<?=$task['id']?>" onclick="location.href='tasks/edit'">Edit</button><button id="delete_btn_<?=$task['id']?>" onclick="location.href='tasks/delete'">Delete</button></td>
    </tr>
    <?php endforeach; ?>

</table>

<button onclick="location.href='tasks/create'">Add</button>
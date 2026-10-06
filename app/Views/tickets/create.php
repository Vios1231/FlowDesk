<!DOCTYPE html>
<html>
<head>
    <title>FlowDesk - Create Ticket</title>
</head>
<body>

    <h1>Create Ticket</h1>
    
    <?php if (isset($validation)): ?>
        <div>
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="/tickets/store" method="post">

        <div>
            <label>Title</label>
            <input type="text" name="title" required>
        </div>

        <br>

        <div>
            <label>Description</label>
            <textarea name="description" required></textarea>
        </div>

        <br>

        <div>
            <label>Priority</label>
            <select name="priority">
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>

        <br>

        <button type="submit">Create Ticket</button>

    </form>

</body>
</html>
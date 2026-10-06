<!DOCTYPE html>
<html>
<head>
    <title>FlowDesk - Edit Ticket</title>
</head>
<body>

    <h1>Edit Ticket</h1>

    <form action="/tickets/<?= $ticket['id'] ?>/update" method="post">

        <div>
            <label>Title</label>
            <input
                type="text"
                name="title"
                value="<?= $ticket['title'] ?>"
                required
            >
        </div>

        <br>

        <div>
            <label>Description</label>
            <textarea name="description" required><?= $ticket['description'] ?></textarea>
        </div>

        <br>

        <div>
            <label>Priority</label>
            <select name="priority">

                <option value="Low"
                    <?= $ticket['priority'] === 'Low' ? 'selected' : '' ?>>
                    Low
                </option>

                <option value="Medium"
                    <?= $ticket['priority'] === 'Medium' ? 'selected' : '' ?>>
                    Medium
                </option>

                <option value="High"
                    <?= $ticket['priority'] === 'High' ? 'selected' : '' ?>>
                    High
                </option>

            </select>
        </div>

        <br>

        <div>
            <label>Status</label>
            <select name="status">

                <option value="Open"
                    <?= $ticket['status'] === 'Open' ? 'selected' : '' ?>>
                    Open
                </option>

                <option value="In Progress"
                    <?= $ticket['status'] === 'In Progress' ? 'selected' : '' ?>>
                    In Progress
                </option>

                <option value="Resolved"
                    <?= $ticket['status'] === 'Resolved' ? 'selected' : '' ?>>
                    Resolved
                </option>

            </select>
        </div>

        <br>

        <button type="submit">Update Ticket</button>

    </form>

    <br>

    <a href="/tickets/<?= $ticket['id'] ?>">Cancel</a>

</body>
</html>
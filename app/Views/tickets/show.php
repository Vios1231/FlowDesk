<!DOCTYPE html>
<html>
<head>
    <title>FlowDesk - Ticket Detail</title>
</head>
<body>

    <h1>Ticket Detail</h1>

    <h2><?= $ticket['title'] ?></h2>

    <p>
        <strong>Description:</strong>
        <?= $ticket['description'] ?>
    </p>

    <p>
        <strong>Priority:</strong>
        <?= $ticket['priority'] ?>
    </p>

    <p>
        <strong>Status:</strong>
        <?= $ticket['status'] ?>
    </p>

    <p>
        <strong>Created At:</strong>
        <?= $ticket['created_at'] ?>
    </p>

    <a href="/tickets">Back to Tickets</a>

</body>
</html>
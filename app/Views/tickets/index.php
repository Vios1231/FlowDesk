<!DOCTYPE html>
<html>
<head>
    <title>FlowDesk - Tickets</title>
</head>
<body>

    <h1>Tickets</h1>
    
    <?php if (session()->getFlashdata('success')): ?>
        <div>
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    
    <?php foreach ($tickets as $ticket): ?>

        <div>
            <h3><?= $ticket['title'] ?></h3>

            <p>Priority: <?= $ticket['priority'] ?></p>
            <p>Status: <?= $ticket['status'] ?></p>

            <a href="/tickets/<?= $ticket['id'] ?>">View Detail</a>

            <form action="/tickets/<?= $ticket['id'] ?>/delete" method="post">
                <button type="submit">Delete</button>
            </form>
        </div>

        <hr>

    <?php endforeach; ?>

</body>
</html>
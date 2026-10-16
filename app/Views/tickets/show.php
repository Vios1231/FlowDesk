
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-1">Ticket Details</h1>
        <p class="text-secondary mb-0">
            View the information for this ticket.
        </p>
    </div>

    <a href="<?= site_url('tickets') ?>" class="btn btn-light border">
        Back to Tickets
    </a>
</div>

<div class="card content-card">
    <div class="card-body p-4">

        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <p class="text-secondary small mb-1">
                    Ticket #<?= esc($ticket['id']) ?>
                </p>
                <h2 class="h4 mb-0"><?= esc($ticket['title']) ?></h2>
            </div>

            <?php
                $statusClass = match ($ticket['status']) {
                    'Open' => 'primary',
                    'In Progress' => 'warning',
                    'Resolved' => 'success',
                    default => 'secondary',
                };
            ?>

            <span class="badge text-bg-<?= $statusClass ?>">
                <?= esc($ticket['status']) ?>
            </span>
        </div>

        <hr>

        <div class="mb-4">
            <h6 class="text-secondary">Description</h6>
            <p class="mb-0" style="white-space: pre-wrap;"><?= esc($ticket['description']) ?></p>
        </div>

        <div class="mb-4">
            <h6 class="text-secondary">Priority</h6>

            <?php
                $priorityClass = match ($ticket['priority']) {
                    'High' => 'danger',
                    'Medium' => 'warning',
                    default => 'success',
                };
            ?>

            <span class="badge text-bg-<?= $priorityClass ?>">
                <?= esc($ticket['priority']) ?>
            </span>
        </div>

        <?php if (session()->get('role') === 'admin'): ?>
            <div class="d-flex gap-2 mt-4">
                <a
                    href="<?= site_url('tickets/' . $ticket['id'] . '/edit') ?>"
                    class="btn btn-primary"
                >
                    Edit Ticket
                </a>

                <form
                    action="<?= site_url('tickets/' . $ticket['id'] . '/delete') ?>"
                    method="post"
                    onsubmit="return confirm('Are you sure you want to delete this ticket?');"
                >
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-outline-danger">
                        Delete Ticket
                    </button>
                </form>
            </div>
        <?php endif; ?>

    </div>
</div>

<?= $this->endSection() ?>


<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-1">Tickets</h1>
        <p class="text-secondary mb-0">
            Manage and track your support tickets.
        </p>
    </div>

    <?php if (session()->get('role') === 'admin'): ?>
        <a href="<?= site_url('tickets/create') ?>" class="btn btn-primary">
            + Create Ticket
        </a>
    <?php endif; ?>
</div>

<div class="card content-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Ticket</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (empty($tickets)): ?>
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <h6 class="mb-1">No tickets found</h6>
                                <p class="text-secondary mb-0">
                                    Tickets will appear here once they are created.
                                </p>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($tickets as $ticket): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-semibold">
                                        <?= esc($ticket['title']) ?>
                                    </div>
                                    <small class="text-secondary">
                                        Ticket #<?= esc($ticket['id']) ?>
                                    </small>
                                </td>

                                <td>
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
                                </td>

                                <td>
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
                                </td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a
                                            href="<?= site_url('tickets/' . $ticket['id']) ?>"
                                            class="btn btn-sm btn-outline-secondary"
                                        >
                                            View
                                        </a>

                                        <?php if (session()->get('role') === 'admin'): ?>
                                            <a
                                                href="<?= site_url('tickets/' . $ticket['id'] . '/edit') ?>"
                                                class="btn btn-sm btn-outline-primary"
                                            >
                                                Edit
                                            </a>

                                            <form
                                                action="<?= site_url('tickets/' . $ticket['id'] . '/delete') ?>"
                                                method="post"
                                                onsubmit="return confirm('Are you sure you want to delete this ticket?');"
                                            >
                                                <?= csrf_field() ?>
                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                >
                                                    Delete
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

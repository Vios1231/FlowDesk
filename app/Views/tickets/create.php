
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-4">
    <h1 class="h3 mb-1">Create Ticket</h1>
    <p class="text-secondary mb-0">
        Create a new ticket and provide the required information.
    </p>
</div>

<div class="card content-card">
    <div class="card-body p-4">

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <strong>Please fix the following errors:</strong>
                <ul class="mb-0 mt-2">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('tickets/store') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="title" class="form-label">Ticket Title</label>
                <input
                    type="text"
                    class="form-control"
                    id="title"
                    name="title"
                    value="<?= esc(old('title') ?? '') ?>"
                    placeholder="Enter ticket title"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea
                    class="form-control"
                    id="description"
                    name="description"
                    rows="5"
                    placeholder="Describe the issue..."
                    required
                ><?= esc(old('description') ?? '') ?></textarea>
            </div>

            <div class="mb-4">
                <label for="priority" class="form-label">Priority</label>
                <select
                    class="form-select"
                    id="priority"
                    name="priority"
                    required
                >
                    <option value="">Select priority</option>
                    <option value="Low" <?= old('priority') === 'Low' ? 'selected' : '' ?>>Low</option>
                    <option value="Medium" <?= old('priority') === 'Medium' ? 'selected' : '' ?>>Medium</option>
                    <option value="High" <?= old('priority') === 'High' ? 'selected' : '' ?>>High</option>
                </select>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    Create Ticket
                </button>

                <a href="<?= site_url('tickets') ?>" class="btn btn-light border">
                    Cancel
                </a>
            </div>
        </form>

    </div>
</div>

<?= $this->endSection() ?>

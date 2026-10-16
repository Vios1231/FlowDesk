
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'FlowDesk') ?></title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            background-color: #f5f7fb;
            color: #212529;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #172033;
        }

        .sidebar a {
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 6px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #2b3852;
            color: #ffffff;
        }

        .main-content {
            min-width: 0;
        }

        .content-card {
            border: 0;
            border-radius: 14px;
            box-shadow: 0 2px 10px rgba(15, 23, 42, 0.05);
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

        <aside class="col-md-3 col-lg-2 sidebar p-3">
            <h4 class="text-white mb-4">FlowDesk</h4>

            <a href="<?= site_url('tickets') ?>" class="active">
                Tickets
            </a>

            <?php if (session()->get('role') === 'admin'): ?>
                <a href="<?= site_url('tickets/create') ?>">
                    Create Ticket
                </a>
            <?php endif; ?>

            <hr class="border-secondary">

            <div class="text-white-50 small mb-2">
                Signed in as <?= esc(session()->get('username')) ?>
            </div>

            <div class="text-white small mb-3">
                Role: <?= esc(ucfirst(session()->get('role') ?? '')) ?>
            </div>

            <form action="<?= site_url('logout') ?>" method="post">
                <?= csrf_field() ?>
                <button class="btn btn-outline-light btn-sm w-100" type="submit">
                    Logout
                </button>
            </form>
        </aside>

        <main class="col-md-9 col-lg-10 main-content p-4 p-lg-5">
            <?= $this->renderSection('content') ?>
        </main>

    </div>
</div>

</body>
</html>

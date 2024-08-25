<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">

        <h1 class="mt-5">Login</h1>

        <?php if (\Config\Services::validation()->listErrors()): ?>
            <div class="alert alert-danger mt-3">
                <?= \Config\Services::validation()->listErrors(); ?>
            </div>
        <?php endif; ?>


        <form method="post" action="<?= site_url('auth/login') ?>" class="mt-4">
        <?= csrf_field() ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?= set_value('username') ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <p class="mt-3">Don't have an account? <a href="<?= site_url('auth/register') ?>">Register here</a></p>
    </div>


    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    
</body>
</html>

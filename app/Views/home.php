<?php
?>

<h1>Welcome, <?= session()->get('username'); ?></h1>
<a href="<?= site_url('auth/logout') ?>">Logout</a>

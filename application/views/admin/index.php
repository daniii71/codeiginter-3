<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="https://cdn.tailwindcss.com/"></script>
</head>
<body>
    <h1 class="my-5 text-2x1 font-bold">selamat datang <?php echo $this->session->userdata('username')?></h1>
    <a href="<?php echo base_url('auth/logout');?>" class="btn btn-primary">
    logout
</a>
</body>
</html>
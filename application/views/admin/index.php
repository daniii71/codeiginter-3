<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keuangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>

    body {
        display: flex;
        margin: 0;
        min-height: 100vh;
        background-color: #61677A;

    }

    #sidebar {
        background-color: #272829;

        color: #fff;
        height: 100%;
        width: 250px;
        position: fixed;
        left: 0;
        top: 0;
        transition: 0.3s;
        padding-top: 20px;
    }

    #sidebar a {
        padding: 10px 15px;
        text-decoration: none;
        color: #fff;
        display: block;
    }

    #sidebar a:hover {
        background-color: #3366ff;
        /* Darker blue on hover */
    }

    #content {
        flex: 1;
        margin-left: 250px;
        transition: 0.3s;
        padding: 20px;
    }

    @media screen and (max-width: 788px) {
        #sidebar {
            width: 100%;
            position: static;
            height: auto;
            margin-bottom: 20px;
        }

        #content {
            margin-left: 0;
        }
    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div id="sidebar" class="col-md-3 col-lg-2 d-md-block">
                <br>
                <a href="<?php echo base_url('admin/siswa') ?>">
                    <i class="fas fa-user mr-2"></i> siswa
                </a>
                <br>
                <a type="button" onclick="confirmLogout()">
                    <i class="fas fa-sign-out-alt text-danger">KELUAR</i>
                </a>
            </div>

            <div id="content" role="main">
                <div class="card mb-4 shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h1>siswa</h1>

                    </div>
                </div>
                <div class="card mb-4 shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-4">
                                <div class="card shadow bg-D8D9DA text-black shadow border-10 rounded">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="fas fa-coins text-gray-600 text-6x1 abolute right-4 top-9" style="font-size: 60px;"></i>
                                            <div class="ml-auto">Jumlah uang spp</div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-4">
                                <div class="card shadow bg-D8D9DA text-black shadow border-10 rounded">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                        <i class="fas fa-coins text-gray-600 text-6x1 abolute right-4 top-9" style="font-size: 60px;"></i>
                                        <div class="ml-auto">Jumlah Mapel</div>
                                    </div>
                                    </div>
                                </div>
                            </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- LOGOUT -->
    <script>
    function confirmLogout() {
        Swal.fire({
            title: 'Yakin mau LogOut?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo base_url('/') ?>";
            }
        });
    }
    </script>
    <script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        var content = document.getElementById("content");
        sidebar.style.width = sidebar.style.width === "250px" ? "0" : "250px";
        content.style.marginLeft = content.style.marginLeft === "250px" ? "0" : "250px";
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
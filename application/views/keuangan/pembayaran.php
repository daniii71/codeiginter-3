<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEMBAYARAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <button data-drawer-target=" default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>
    
    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="<?php echo base_url('keuangan/index') ?>"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        
                        <i class="fa-solid fa-house">
                         DASHBROD </i>
                    </a>
                </li>

                <br>
                <li>
                    <a href="<?php echo base_url('keuangan/pembayaran') ?>"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        
                        <i class="fa-solid fa-wallet">
                            Pembayaran
                        </i>

                    </a>
                </li>
                <br>
                <li>

                    <a href="<?php echo base_url('Login/logout'); ?>"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                        <i class="fa-solid fa-right-from-bracket">
                        keluar</i>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <div class="p-4 sm:ml-64">
    <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a href="">PEMBAYARAN UANG SEKOLAH</a>
                <form class="d-flex" role="search">
                </form>
            </div>
        </nav> 
        <br>
        <br>
        <br>    
        <div class="row ">
            <div class="col-12 card p-2">
                <div class="card-body min-vh-100  align-items-center">
                    <div class="card w-100 m-auto p-2">
                        <table class="table  table-striped">
                        <a href="<?php echo base_url('keuangan/tambah_pembayaran') ?>" class="btn btn-success m-2"> 
                        <i class="fa-solid fa-folder-plus"></i> Tambah 
                        </a>
                        <a href="<?php echo base_url('keuangan/export') ?>" class="btn btn-primary m-2"> 
                        <i class="fa-solid fa-file-circle-plus"></i> Export 
                        </a>
                            <thead> 
                                    <tr> 
                                        <th>No</th> 
                                        <th>Nama Siswa</th> 
                                        <th>Jenis Pembayaran</th> 
                                        <th>Total Pembayaran</th> 
                                        <th class="text-center">Aksi</th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                <?php $no = 0; 
                            foreach ($pembayaran as $row): 
                                $no++ ?> 
                                    <!-- Data Siswa --> 
                                    <tr> 
                                        <td> 
                                            <?php echo $no ?> 
                                        </td> 
                                        <td> 
                                        <?php echo tampil_full_siswa_byid($row->id_siswa) ?>
                                        </td> 
                                        <td> 
                                            <?php echo $row->jenis_pembayaran ?> 
                                        </td> 
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                        <?php echo convRupiah($row->total_pembayaran) ?>
                                        </td>
                                        <td class="text-center"> 
                                            <a href="<?php echo base_url('keuangan/ubah_pembayaran/') . $row->id ?>" 
                                                class="btn btn-primary"> <i class="fa-solid fa-camera-rotate"></i>
                                                Ubah 
                                            </a> 
                                            <button onClick="hapus(<?php echo $row->id; ?>)" 
                                                class="btn btn-warning"><i class="fa-solid fa-trash-can-arrow-up"></i> 
                                                Hapus 
                                            </button> 
                                        </td> 
 
 
                                    </tr> 
                                    <!-- Tambahkan baris data siswa lainnya sesuai kebutuhan --> 
                                    <?php endforeach ?> 
                                </tbody> 
                            </table> 
                            <form method="post" action="<?php echo base_url('keuangan/import') ?>" enctype="multipart/form-data">
                            <input type="file" name="file" />
                            <button class="btn btn-primary w-2/12" type="submit" style="background-color: blue">
                            <i class="fa-solid fa-file-arrow-up"></i> import</button>
                        </form>

                            <!-- <form method="post" action="<?php echo base_url('keuangan/import') ?>"> 
                            <input type="file" name="file" /></input> 
                            <button class="btn btn-primary" type="submit" style="background-color:blue"> 
                            import 
                           </button> 
                        </form> -->
                        </div> 
                    </div>
                    
        <script> 
    function openNav() { 
        document.getElementById("mySidenav").style.width = "250px"; 
        document.getElementsByClassName("content")[0].style.marginLeft = "250px"; 
    } 
 
    function closeNav() { 
        document.getElementById("mySidenav").style.width = "0"; 
        document.getElementsByClassName("content")[0].style.marginLeft = "0"; 
    } 
    function hapus(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('keuangan/hapus_pembayaran/'); ?>" + id;
            }
        }
    </script>
    </div>
</body>
</html>
</body>
</html>
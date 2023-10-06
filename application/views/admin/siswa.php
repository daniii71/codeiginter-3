    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISWA</title>
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
                    <a href="<?php echo base_url('admin/index') ?>"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fa-solid fa-house">
                            DASHBROD
                        </i>
                    </a>
                </li>

                <br>
                <li>
                    <a href="<?php echo base_url('admin/siswa') ?>"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fa-solid fa-person-chalkboard">
                            siswa
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
                </li>
            </ul>
        </div>
    </aside>
    <div class="p-4 sm:ml-64">
    <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a href="">BINUSA</a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav> 
        <br>
        <br>    
        <div class="row ">
            <div class="col-12 card p-2">
                <div class="card-body min-vh-100  align-items-center">
                    <div class="card w-100 m-auto p-2">
                        <table class="table  table-striped">
                        <a href="<?php echo base_url('admin/tambah_siswa') ?>" class="btn btn-success m-2"> 
                        <i class="fa-solid fa-user-plus"></i> Tambah 
                            </a>
                            <a href="<?php echo base_url('admin/export') ?>" class="btn btn-primary m-2"> 
                            <i class="fa-solid fa-square-plus"></i> Export 
                        </a>
                        <thead> 
                                    <tr> 
                                        <th>No</th> 
                                        <th>Foto Siswa</th> 
                                        <th>Nama Siswa</th> 
                                        <th>NISN</th> 
                                        <th>Gender</th> 
                                        <th>Kelas</th> 
                                        <th class="text-center">Aksi</th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <?php $no = 0; 
                            foreach ($siswa as $row): 
                                $no++ ?> 
                                    <!-- Data Siswa --> 
                                    <tr> 
                                        <td> 
                                            <?php echo $no ?> 
                                        </td> 
                                        <td> 
                                            <img src="<?php echo base_url('images/siswa/'.$row->foto) ?>" width="100" 
                                                height="100" alt="Foto Siswa"> 
                                        </td> 
                                        <td> 
                                            <?php echo $row->nama_siswa ?> 
                                        </td> 
                                        <td> 
                                            <?php echo $row->nisn ?> 
                                        </td> 
                                        <td> 
                                            <?php echo $row->gender ?> 
                                        </td> 
                                        <td> 
                                            <?php echo tampil_full_kelas_byid($row->id_kelas) ?> 
                                        </td> 
                                        <td class="text-center"> 
                                            <a href="<?php echo base_url('admin/ubah_siswa/') . $row->id_siswa ?>" 
                                                class="btn btn-primary"> <i class="fa-solid fa-rotate"></i> 
                                                Ubah 
                                            </a> 
                                            <button onClick="hapus(<?php echo $row->id_siswa; ?>)" 
                                                class="btn btn-warning"> <i class="fa-solid fa-eraser"></i>
                                                Hapus 
                                            </button> 
                                        </td> 
 
 
                                    </tr> 
                                    <!-- Tambahkan baris data siswa lainnya sesuai kebutuhan --> 
                                    <?php endforeach ?> 
                                </tbody> 
                            </table> 
                            <form method="post" action="<?php echo base_url('admin/import') ?>" enctype="multipart/form-data">
                            <input type="file" name="file" />
                            <button class="btn btn-primary w-2/12" type="submit" style="background-color: blue"><i class="fa-solid fa-file-import"></i> import</button>
                        </form>
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
                window.location.href = "<?php echo base_url('admin/hapus_siswa/'); ?>" + id;
            }
        }
    </script>
    </div>
</body>
</html>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="flex">
        <div>

        </div>

        <div class="container mt-12">
           <div class="overflow-x-auto">
                <form action="<?php echo base_url('keuangan/aksi_tambah_pembayaran') ?>" enctype="multipart/form-data"
                    method="post">
                    <div class="max-full rounded border overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            <p class="text-xl font-bold text-center">Tambah pembayaran</p>
                            <div class="grid grid-cols-2 gap-4 mt-5">
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                                        Siswa
                                    </label>
                                    <select name="siswa" id="siswa"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option selected>Pilih Siswa</option>
                                        <?php foreach($siswa as $row): ?>
                                        <option value="<?php echo $row->id_siswa ?>">
                                            <?php echo $row->nama_siswa ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="total_pembayaran">
                                        total pembayaran
                                    </label>
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="total_pembayaran" name="total_pembayaran" type="text" placeholder="total">
                                </div>
                                <select id="countries" name="jenis_pembayaran"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih Jenis Pembayaran</option>
                                <option value="Pembayaran SPP">Pembayaran SPP</option>
                                <option value="Pembayaran Uang Gedung">Pembayaran Uang Gedung</option>
                                <option value="Pembayaran Seragam">Pembayaran Seragam</option>
                                </select>
                                <div class="w-full mt-5 px-3">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fa-solid fa-arrow-right"></i>
                                submit
                            </button>
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
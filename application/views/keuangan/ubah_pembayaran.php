<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <?php foreach ($pembayaran as $data_pembayaran): ?>
    <form action="<?php echo base_url('keuangan/aksi_ubah_pembayaran') ?>"  enctype="multipart/form-data" method="post" >
    <input type="hidden" name="id" value="<?php echo $data_pembayaran->id ?>">
    <div class="max-full rounded border overflow-hidden shadow-lg">
        <div class="px-6 py-4">
            <p class="text-xl font-bold text-center">Ubah pembayaran</p>
                            <div class="grid grid-cols-2 gap-4 mt-5">
                            <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="siswa">
                                        siswa
                                    </label>
                                    <select name="siswa" id="siswa"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            <option value="<?php echo $data_pembayaran->id_siswa ?>"
                                                style="display: none;">
                                                <?php echo tampil_full_siswa_byid($data_pembayaran->id_siswa) ?>
                                            </option>
                                                <?php foreach($siswa as $row): ?>
                                            <option value="<?php echo $row->id_siswa ?>">
                                                <?php echo $row->nama_siswa ?>
                                            </option>
                                        <?php endforeach ?>
                                        </select>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="total">
                                        Total pembayaran
                                    </label>
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="total_pembayaran" name="total_pembayaran" type="text" value="<?php echo $data_pembayaran->total_pembayaran ?>">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="jenis">
                                        jenis pembayaran
                                    </label>
                                    <select name="jenis_pembayaran" id="jenis_pembayaran"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option name="jenis_pembayaran" style="display: none;" value="<?php echo $data_pembayaran->jenis_pembayaran ?>">
                                        <?php echo $data_pembayaran->jenis_pembayaran ?></option>

                                        <?php echo $data_pembayaran->siswa->jenis_pembayaran ?>
                                </option>
                                        <option value="uang spp"> uang spp</option>
                                        <option value="uang gedung">Uang Gedung</option>
                                        <option value="uang seragam">Uang seragam</option>
                                    </select>
                                    
                                </div>
                                <!-- <input type="hidden" name="id_siswa" value="<?php echo $data_siswa->id; ?>"> -->
                                    <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-2xl rounded w-2/6">
                                    <i class="fas fa-pen-square"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php endforeach; ?>
</body>
</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
</head>

<body>
    <h1>DATA Guru</h1>
    <table style="font-size: 14px; font-weight: bold;">
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><?php echo $this->session->userdata('email') ?></td>
        </tr>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td><?php echo $this->session->userdata('username') ?></td>
        </tr>
    </table>
    <hr>
    <br>
    <table border="1">
        <tr style="font-weight: bold;">
            <td>No</td>
            <td>Nama Guru</td>
            <td>Nik</td>
            <td>Gender</td>
            <td>Mapel</td>
            <td>Walikelas</td>
        </tr>
        <?php $no = 1;
        foreach ($data_guru as $key) {
            // ambil nama mapel berdasarkan id_mapel tersebut 
            $mapel = $this->m_model->get_mapel_by_id($key->id_mapel);
            // gantilah get_mapel_by_id dengan fungsi yang sama di model tersebut
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $key->nama_guru; ?></td>
                <td><?php echo $key->nik; ?></td>
                <td><?php echo $key->gender; ?></td>
                <td><?php echo $mapel->nama_mapel; ?></td>
                <td>
                    <?php
                    $walikelas = tampil_full_kelas_byid($key->id_walikelas);
                    if ($walikelas) {
                        echo $walikelas;
                    } else {
                        echo "Tidak menjadi walikelas";
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>

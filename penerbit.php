<!DOCTYPE html>
<html>

<head>
    <title>Muhamad Isa Firdaus</title>
    <style>
        fieldset {
            width: 400px;
            margin: auto;
        }

        table {
            background-color: blanchedalmond;
        }

        h1 {
            color: cornflowerblue;
        }
    </style>
</head>

<body>

    <!--Judul pada fieldset-->

    <center>
        <h1>TOKO BUKU MUHAMAD ISA FIRDAUS</h1>
    </center>
    <center>||<a href="index.php">Home</a>||<a href="admin.php">Admin</a>||</center>
    <br>

    <form method="GET" action="index.php" style="text-align: center;">
        <label>Kata Pencarian : </label>
        <input type="text" name="kata_cari" value="<?php if (isset($_GET['kata_cari'])) {
                                                        echo $_GET['kata_cari'];
                                                    } ?>" />
        <button type="submit">Cari</button>
    </form>
    <br>

    <table border="2" cellpadding="5" cellspacing="0" width="100%">

        <thead>
            <tr>
                <th>ID Penerbit</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //untuk meinclude kan koneksi
            include 'koneksi.php';
            //jika kita klik cari, maka yang tampil query cari ini
            if (isset($_GET['kata_cari'])) {
                //menampung variabel kata_cari dari form pencarian
                $kata_cari = $_GET['kata_cari'];
                $query = "SELECT * FROM tabel_penerbit WHERE id_penerbit like '%" . $kata_cari . "%' OR nama like '%" . $kata_cari . "%' ORDER BY id_penerbit ASC";
            } else {
                //jika tidak ada pencarian, default yang dijalankan query ini
                $query = "SELECT * FROM tabel_penerbit ORDER BY id_penerbit ASC";
            }
            $result = mysqli_query($koneksi, $query);
            if (!$result) {
                die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
            }
            //kalau ini melakukan foreach atau perulangan
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['id_penerbit']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['kota']; ?></td>
                    <td><?php echo $row['telepon']; ?></td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>

</body>

</html>
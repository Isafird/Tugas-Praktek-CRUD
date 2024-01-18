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
    <center>||<a href="index.php">Home</a>||<a href="admin.php">Admin</a>||<a href="penerbit.php">Pengadaan</a>||<a href="tambah_form.html">Tambah Data Buku</a>||<a href="tambah_penerbit.html">Tambah Data Penerbit</a>||</center>
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
                <th>ID Buku</th>
                <th>Kategori</th>
                <th>Nama Buku</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Penerbit</th>
                <th>OPSI</th>
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
                $query = "SELECT * FROM tabel_buku WHERE id_buku like '%" . $kata_cari . "%' OR nama_buku like '%" . $kata_cari . "%' ORDER BY id_buku ASC";
            } else {
                //jika tidak ada pencarian, default yang dijalankan query ini
                $query = "SELECT * FROM tabel_buku ORDER BY id_buku ASC";
            }
            $result = mysqli_query($koneksi, $query);
            if (!$result) {
                die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
            }
            //kalau ini melakukan foreach atau perulangan
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['id_buku']; ?></td>
                    <td><?php echo $row['kategori']; ?></td>
                    <td><?php echo $row['nama_buku']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td><?php echo $row['stok']; ?></td>
                    <td><?php echo $row['penerbit']; ?></td>

                    <!--Tambahan untuk opsi edit dan hapus-->
                    <td>
                        <a href="edit_buku.php?id=<?php echo $row['id_buku']; ?>">EDIT</a>
                        <a href="delete_buku.php?id=<?php echo $row['id_buku']; ?>">HAPUS</a>
                    </td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
    <br><br><br>

    <table border="2" cellpadding="5" cellspacing="0" width="100%">

        <thead>
            <tr>
                <th>ID Penerbit</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Telepon</th>
                <th>OPSI</th>
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

                    <td>
                        <a href="edit_penerbit.php?id=<?php echo $row['id_penerbit']; ?>">EDIT</a>
                        <a href="delete_penerbit.php?id=<?php echo $row['id_penerbit']; ?>">HAPUS</a>
                    </td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>

</body>

</html>
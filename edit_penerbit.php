<!DOCTYPE html>
<html>

<head>
    <title>Form Edit Data</title>
    <style>
        fieldset {
            width: 400px;
            margin: auto;
        }
    </style>
</head>

<body>
    <fieldset>
        <!--Judul pada fieldset-->
        <legend align="center">Edit Data Penerbit</legend>
        <h3>Edit Data</h3>

        <?php
        include "koneksi.php";

        $id_penerbit = $_GET['id_buku'];

        $edit = mysqli_query($koneksi, "SELECT * FROM tabel_penerbit WHERE id_penerbit='$id_penerbit'");
        while ($row = mysqli_fetch_array($edit)) {
        ?>

            <form method="post" action="edit_penerbit_proses.php">
                <table>
                    <tr>
                        <td>ID Penerbit</td>
                        <td>
                            <input type="text" name="id_penerbit" value="<?php echo $row['id_penerbit']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Nama</td>
                        <td>
                            <input type="text" name="nama" value="<?php echo $row['nama']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Alamat</td>
                        <td>
                            <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>">

                        </td>
                    </tr>

                    <tr>
                        <td>Kota</td>
                        <td>
                            <input type="text" name="kota" value="<?php echo $row['kota']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Telepon</td>
                        <td>
                            <input type="text" name="telepon" value="<?php echo $row['telepon']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td><input type="submit" value="SIMPAN"></td>
                    </tr>
                </table>
            </form>
        <?php
        }
        ?>
    </fieldset>
</body>

</html>
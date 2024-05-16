<div id="frame-tambah">
    <a href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=form"; ?>" class="tombol-action"> + Tambah Barang </a>
</div>

<?php 
    $queryBarang = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id=kategori.kategori_id ORDER BY nama_barang ASC");

    if(mysqli_num_rows($queryBarang) == 0)
    {
        echo"<h3> Saat ini belum ada data pada tabel barang </h3>";
    }
    else
    {
        echo "<table class='table-list'>";

        echo "<tr class='table-title'>
                <th class='kolom-nomor'>No</th>
                <th class='kiri'>Barang</th>
                <th class='kiri'>Spesifikasi</th>
                <th class='kiri'>Gambar</th>
                <th class='kiri'>Harga</th>
                <th class='kiri'>Stok</th>
                <th class='tengah'>Status</th>
                <th class='tengah'>Action</th>  
            </tr>";

            $no=1;
            while($rowBarang=mysqli_fetch_assoc($queryBarang))
            {
                echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td class='kiri'>$rowBarang[nama_barang]</td>
                        <td class='kiri'>$rowBarang[spesifikasi]</td>
                        <td class='kiri'>$rowBarang[gambar]</td>
                        <td class='kiri'>$rowBarang[harga]</td>
                        <td class='kiri'>$rowBarang[stock]</td>
                        <td class='tengah'>$rowBarang[status]</td>
                        <td class='tengah'>
                            <a class='tombol-action' href='".BASE_URL. "index.php?page=my_profile&module=barang&action=form&barang_id=$rowBarang[barang_id]'>Edit</a>
                        </td>
                    </tr>";
                $no++;
            }
        echo"</table>";
    }
?>
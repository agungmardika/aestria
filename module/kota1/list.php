<div id="frame-tambah">
    <a href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=form"; ?>" class="tombol-action"> + Tambah Kota </a>
</div>

<?php 
    $queryKota = mysqli_query($koneksi, "SELECT * FROM kota");

    if(mysqli_num_rows($queryKota) == 0)
    {
        echo"<h3> Saat ini belum kota pada database</h3>";
    }
    else
    {
        echo "<table class='table-list'>";

        echo "<tr class='table-title'>
                <th class='kolom-nomor'>No</th>
                <th class='kiri'>Kota</th>
                <th>Tarif</th>
                <th class='tengah'>Status</th>
                <th class='tengah'>Action</th>
            </tr>";

            $no=1;
            while($rowKota=mysqli_fetch_assoc($queryKota))
            {
                echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <th class='kiri'>$rowKota[kota]</th>
                        <th>".rupiah($rowKota['tarif'])."</th>
                        <th class='tengah'>$rowKota[status]</th>
                        <th class='tengah'>
                            <a class='tombol-action' href='".BASE_URL. "index.php?page=my_profile&module=kota&action=form&kota_id=$rowKota[kota_id]'>Edit</a>
                        </th>
                    </tr>";
                $no++;
            }
        echo"</table>";
    }
?>
<?php
    $barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

    $nama_barang = "";
    $spesifikasi = "";
    $stok = "";
    $harga = "";
    $status = "";
    $button = "add";

    /*if($kategori_id)
    {
        $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");
        $row = mysqli_fetch_assoc($queryKategori);

        $kategori = $row['kategori'];
        $status = $row['status'];
        $button = "Update";
    }
    */
?>

<form action="<?php echo BASE_URL."module/barang/action.php?barang_id=$barang_id"; ?>" method="POST" enctype="multipart/form-data" autocomplete="off"> 

    <div class="element-form">
        <label>Kategori</label>
        <span>
            <select name="kategori_id">
                <?php
                    $query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
                    while($row = mysqli_fetch_assoc($query))
                    {
                        echo "<option value='$row[kategori_id]'>$row[kategori] </option>";
                    }
                ?>
            </select>
        </span>
    </div>

    <div class="element-form">
        <label>Nama Barang</label>
        <span>
            <input type="text" name="nama_barang" value="<?php echo $nama_barang ?>">
        </span>
    </div>

    <div class="element-form">
        <label>Spesifikasi</label>
        <span>
            <textarea name="spesifikasi"><?php echo $spesifikasi ?></textarea>
        </span>
    </div>

    <div class="element-form">
        <label>Stok</label>
        <span>
            <input type="number" name="stok" value="<?php echo $stok ?>">
        </span>
    </div>

    <div class="element-form">
        <label>Harga</label>
        <span>
            <input type="number" name="harga" value="<?php echo $harga ?>">
        </span>
    </div>

    <div class="element-form">
        <label>Gambar Produk</label>
        <span>
            <input type="file" name="file">
        </span>
    </div>

    <div class="element-form">
        <label>Status</label>
        <span>
            <input type="radio" name="status" value="on" <?php if($status == "on"){echo "checked='true'";} ?> /> On 
            <input type="radio" name="status" value="off" <?php if($status == "off"){echo "checked='true'";} ?> /> Off 
        </span>
    </div>

    <div class="element-form">
        <span>
            <input type="submit" value="<?php echo $button; ?>" name="button" />
        </span>
    </div>

</form>
<?php

$pesanan_id =  $_GET["pesanan_id"];

$query = mysqli_query($koneksi, "SELECT status FROM pesanan WHERE pesanan_id='$pesanan_id'");
$row = mysqli_fetch_assoc($query);
$status = $row['status'];

?>
<div class="ml-32 w-[50rem]">
    <h3 class="text-2xl font-bold text-center mb-10">Perbarui Status</h3>
    <form action="<?php echo BASE_URL . "module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST">
        <div class="element-form">
            <label>Pesanan Id (Faktur Id)</label>
            <span><input type="text" value="<?php echo $pesanan_id; ?>" class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="pesanan_id" readonly="true" /></span>
        </div>
        <div class="">
            <label>Status</label>
            <span>
                <select name="status" class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <?php
                    foreach ($arrayStatusPesanan as $key => $value) {
                        if ($status == $key) {
                            echo "<option value='$key' selected='true'>$value</option>";
                        } else {
                            echo "<option value='$key'>$value</option>";
                        }
                    }
                    ?>
                </select>
            </span>
        </div><br>
        <div class="element-from">
            <span>
                <input name="button" class="appearance-none rounded-lg block w-full bg-black font-bold text-white border py-3 px-[14.4rem] mb-3" type="submit" value="Edit Status" />
            </span>
        </div>
    </form>
</div>
<?php

$barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

$nama_barang = "";
$kategori_id = "";
$spesifikasi = "";
$gambar = "";
$stok = "";
$harga = "";
$status = "";
$section = "";
$keterangan_gambar = "";
$button = "Tambah";

if ($barang_id) {
    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");
    $row = mysqli_fetch_assoc($query);

    $nama_barang = $row['nama_barang'];
    $kategori_id = $row['kategori_id'];
    $spesifikasi = $row['spesifikasi'];
    $gambar = $row['gambar'];
    $stok = $row['stok'];
    $harga = $row['harga'];
    $status = $row['status'];
    $section = $row['section'];
    $button = "Perbarui";

    $keterangan_gambar = "(Click image if you want to replace the image below)";
    $gambar = "<img src='" . BASE_URL . "/image/barang/$gambar' style='width :250px; position: flex; justify-content: center; margin-left: 50px ;' />";
}
?>
<div class="">
    <form action="<?php echo BASE_URL . "module/barang/action.php?barang_id=$barang_id"; ?>" method="post" enctype="multipart/form-data">
        <div class="flex justify-center ml-32">
            <div class="flex flex-col items-center justify-center px-6 py-6 mx-auto  ">
                <div class="w-fullmx-auto rounded-lg shadow dark:border md:mt-0 sm:max-w-xl xl:p-0 w-[50rem]">
                    <div class="p-6  mx-auto space-y-4 md:space-y-6 sm:p-8">
                        <div class="flex justify-center">
                            <p class="font-light  text-black  text-3xl"><?php echo $button; ?> Barang</p>
                        </div>
                        <br>

                        <div class=" flex justify-center">
                            <div class="w-full relative group">

                                <select name="kategori_id" class="w-full bg-gray-50 outline-none text-sm peer border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600  p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        if ($kategori_id == $row['kategori_id']) {
                                            echo "<option class='w-full bg-gray-50 pr-24  outline-none text-sm peer border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600  p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500' value='$row[kategori_id]' selected='true'>$row[kategori]</option>";
                                        } else {
                                            echo "<option class='bg-gray-50 w-full  outline-none text-sm peer border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600  p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500' value='$row[kategori_id]'>$row[kategori]</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="ml-10 w-full relative group ">
                                <input name="nama_barang" type="text" value="<?php echo $nama_barang; ?>" id="email" required class=" w-full bg-gray-50 outline-none text-sm peer border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600  p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <label for="nama_barang" class="  transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-sm group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">Nama Barang</label>
                            </div>
                        </div>
                        <div class=" flex justify-center">
                            <div class="w-full relative group">
                                <input name="spesifikasi" type="text" value="<?php echo $spesifikasi; ?>" id="phone" required class="w-full bg-gray-50 outline-none text-sm peer border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600  p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <label for="spesifikasi" class=" transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-sm group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">Spesifikasi</label>
                            </div>

                        </div>
                        <div class=" w-full relative group ">
                            <input name="stok" type="number" value="<?php echo $stok; ?>" id="stok" required class=" w-full bg-gray-50 outline-none text-sm peer border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600  p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <label for="stok" class="transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-sm group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">Stok</label>
                        </div>
                        <div class=" flex justify-center">
                            <div class="w-full relative group">
                                <input name="harga" type="number" value="<?php echo $harga; ?>" id="password" required class="w-full bg-gray-50 outline-none text-sm peer border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600  p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <label for="harga" class=" transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-sm group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">Harga</label>
                            </div>
                            <!-- <div class="ml-10 w-full relative group ">
                        <input name="file" value="<?php echo $gambar; ?>" type="file" id="re_password" required class=" w-full bg-gray-50 outline-none text-sm peer border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div> -->
                        </div>
                        <div class="">
                            <label for="file" class=" bottom-0 h-full flex items-center pl-2 text-xs ">Gambar Produk <?php echo $keterangan_gambar; ?></label>
                        </div>
                        <div class=" w-full relative group ">
                            <input name="file" value="" type="file" id="file" required class="flex justify-center w-full bg-gray-50 outline-none text-sm peer border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600  p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-black">
                            <div class="flex justify-center">
                                <?php echo $gambar; ?>
                            </div>
                        </div>
                        <div class=" flex w-max gap-2 mx-auto">
                            <div class="inline-flex items-center">
                                <label class="relative flex cursor-pointer items-center rounded-full p-3" for="pink">
                                    <input id="pink" name="section" <?php if ($section == "women") {
                                                                        echo "checked='true'";
                                                                    } ?> value="women" type="radio" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-blue-gray-200 text-green-700 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-green-500 checked:before:bg-green-500 hover:before:opacity-10" />
                                    <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-green-700 opacity-0 transition-opacity peer-checked:opacity-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 16 16" fill="currentColor">
                                            <circle data-name="ellipse" cx="8" cy="8" r="8"></circle>
                                        </svg>
                                    </div>
                                </label>
                                <label id="label2" class=" text-sm leading-4 font-normal text-black dark:text-black">Women</label>
                            </div>
                            <div class="inline-flex items-center">
                                <label class="relative flex cursor-pointer items-center rounded-full p-3" for="indigo">
                                    <input id="indigo" name="section" <?php if ($section == "men") {
                                                                            echo "checked='true'";
                                                                        } ?> value="men" type="radio" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-blue-gray-200 text-green-700 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-green-500 checked:before:bg-green-500 hover:before:opacity-10" />
                                    <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-green-700 opacity-0 transition-opacity peer-checked:opacity-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 16 16" fill="currentColor">
                                            <circle data-name="ellipse" cx="8" cy="8" r="8"></circle>
                                        </svg>
                                    </div>
                                </label>
                                <label id="label2" class=" text-sm leading-4 font-normal text-black dark:text-black">Men</label>
                            </div>
                            <div class="inline-flex items-center">
                                <label class="relative flex cursor-pointer items-center rounded-full p-3" for="indigo">
                                    <input id="pink" name="section" <?php if ($section == "unisex") {
                                                                        echo "checked='true'";
                                                                    } ?> value="unisex" type="radio" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-blue-gray-200 text-green-700 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-green-500 checked:before:bg-green-500 hover:before:opacity-10" />
                                    <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-green-700 opacity-0 transition-opacity peer-checked:opacity-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 16 16" fill="currentColor">
                                            <circle data-name="ellipse" cx="8" cy="8" r="8"></circle>
                                        </svg>
                                    </div>
                                </label>
                                <label id="label2" class=" text-sm leading-4 font-normal text-black dark:text-black">Unisex</label>
                            </div>

                        </div>
                        <div class=" flex w-max gap-2 mx-auto">

                            <div class="inline-flex items-center">
                                <label class="relative flex cursor-pointer items-center rounded-full p-3" for="green">
                                    <input id="green" name="status" <?php if ($status == "on") {
                                                                        echo "checked='true'";
                                                                    } ?> value="on" type="radio" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-blue-gray-200 text-red-700 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-red-700 checked:before:bg-red-500 hover:before:opacity-10" />
                                    <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-red-700 opacity-0 transition-opacity peer-checked:opacity-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 16 16" fill="currentColor">
                                            <circle data-name="ellipse" cx="8" cy="8" r="8"></circle>
                                        </svg>
                                    </div>
                                </label>
                                <label id="label2" class=" text-sm leading-4 font-normal text-black dark:text-black">On</label>
                            </div>
                            <div class="inline-flex items-center">
                                <label class="relative flex cursor-pointer items-center rounded-full p-3" for="green">
                                    <input id="green" name="status" <?php if ($status == "off") {
                                                                        echo "checked='true'";
                                                                    } ?> value="off" type="radio" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-blue-gray-200 text-red-700 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-red-700 checked:before:bg-red-500 hover:before:opacity-10" />
                                    <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-red-700 opacity-0 transition-opacity peer-checked:opacity-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 16 16" fill="currentColor">
                                            <circle data-name="ellipse" cx="8" cy="8" r="8"></circle>
                                        </svg>
                                    </div>
                                </label>
                                <label id="label2" class=" text-sm leading-4 font-normal text-black dark:text-black">Off</label>
                            </div>
                        </div>
                        <input type="submit" name="button" value="<?php echo $button; ?>" class="w-full outline-none text-white text-sm peer border font-medium sm:text-base rounded-md  p-2.5 bg-black">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<h3 class="text-center text-3xl font-bold my-10">Men Section</h3>

<div class="">
    <hr>
    <div class="items-center flex justify-center">
        <a class="mr-28 my-10 text-xl font-bold text-blue-500" href="<?php echo BASE_URL . "index.php?page=men-section"; ?>">Men Section</a>
        <a class="mr-28 my-10 text-xl font-bold hover:text-blue-500" href="<?php echo BASE_URL . "index.php?page=unisex-section"; ?>">Unisex Section</a>
        <a class="my-10 text-xl font-bold hover:text-blue-500" href="<?php echo BASE_URL . "index.php?page=women-section"; ?>">Women Section</a>
    </div>
    <hr>
</div>
<?php
$kategori_id = @$_GET['kategori_id'];
$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='ON'");
$kategori_id =  @$_GET['kategori_id'];
?>


<div class="mt-10 ml-5 flex">

    <div x-data="{ sidebarOpen: true }" class="flex overflow-x-hidden h-screen">
        <aside class="flex-shrink-0 w-64 flex flex-col border-r transition-all duration-300" :class="{ '-ml-64': !sidebarOpen }">
            <nav class="flex-1 flex flex-col bg-white">
                <ul class="mt-10">
                    <?php while ($row = mysqli_fetch_assoc($query)) {
                        if ($kategori_id == $row['kategori_id']) {
                            echo "
        <li class='text-sm my-5 font-semibold'>
            <a class='' href='" . BASE_URL . "index.php?page=men-section&kategori_id=$row[kategori_id]' class=''>$row[kategori]</a>
        </li>
        <hr>
        ";
                        } else {
                            echo
                            "
                            <li class='text-sm my-5 font-semibold'>
         <a href='" . BASE_URL . "index.php?page=men-section&kategori_id=$row[kategori_id]' class=''>$row[kategori]</a>
         </li> <hr>
         ";
                        }
                    }
                    ?>
                </ul>
            </nav>
        </aside>
    </div>
    <div class="frame-barang mt-15">
        <div class="p-10 flex flex-wrap items-center justify-center">
            <?php
            if ($kategori_id) {
                $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND section='men' AND kategori_id='$kategori_id' ORDER BY rand() DESC LIMIT 9");
            } else {
                $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND section='men' ORDER BY rand() DESC LIMIT 9");
            }
            $no = 1;
            while ($row = mysqli_fetch_assoc($query)) {
                $style = false;
                if ($no == 3) {
                    $no = 0;
                }
                echo "
                    <div class='flex-shrink-0 group group-hover:bg-opacity-60 m-6 relative overflow-hidden  rounded-lg max-w-xs shadow-lg'>
                        <div class='relative pt-10 px-10 flex items-center justify-center'>
                            <div class='block text-center absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3'></div>
                            <a href='" . BASE_URL . "index.php?page=detail&barang_id=$row[barang_id]'>
                                <div class='float-right'>
                                    <i class='fa-sharp fa-solid fa-star mt-3'></i>
                                    <span class='mt-2 ml-1'>$row[review]</span>
                                    <img class='relative w-40 group-hover:opacity-60 transition duration-500' src='" . BASE_URL . "image/barang/$row[gambar]' alt='barang' />
                                </div>
                            </a>
                            </div>
                        <div class='relative text-black px-6 pb-6 mt-6'>
                            <div class='flex justify-between'>
                                <span class='block font-semibold text-xl'> <a href='" . BASE_URL . "index.php?page=detail&barang_id=$row[barang_id]'>$row[nama_barang]</a></span>
                            </div>
                            <div class='flex justify-between'>
                                <span class='block opacity-75 -mb-1'>Stock <a href='" . BASE_URL . "index.php?page=detail&barang_id=$row[barang_id]'>$row[stok]</a></span>
                                <span class='ml-5 rounded-full text-black-500 text-xs font-bold px-3 py-2 leading-none flex items-center'>" . rupiah($row['harga']) . "</span>
                            </div>
                            <div class='flex justify-center '>
                            <br>
                            <a href='" . BASE_URL . "tambah_keranjang.php?barang_id=$row[barang_id]' class=' mt-10 mr-3 text-white  flex justify-center bg-indigo-400 hover:bg-indigo-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>
                                <img class='w-4' src=" . "image/cart.png' alt=''> Tambah Ke Keranjang
                            </a>
                        </div>
                        </div>
                    </div>
                ";
            }
            ?>
        </div>
    </div>
</div>
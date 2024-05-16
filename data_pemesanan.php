<?php
if ($user_id == false) {
    $_SESSION["proses_pemesan"] = true;

    header("location:" . BASE_URL . "index.php?page=login");
    exit;
}
?>

<div>
    <nav class="px-5 py-1 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-200 dark:border-gray-700" aria-label="Breadcrumb">
        <div class="w-fit mx-auto">
            <div class="">
                <p class="text-center text-4xl font-bold">Detail Pemesanan</p>
            </div><br>
            <div class="flex justify-center">
                <ol class="inline-flex space-x-1 md:space-x-3">
                    <li class="inline-flex">
                        <a href="index.php" class="inline-flex text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>Beranda</a>
                    </li>
                    <li class="inline-flex">
                        <a href="<?php echo BASE_URL . "index.php?page=keranjang"; ?>" class="inline-flex text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>Keranjang</a>
                    </li>
                    <li>
                        <div class="flex">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Checkout</p>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </nav><br>
</div>

<div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
    <form action="<?php echo BASE_URL . "proses_pemesanan.php" ?>" method="post">
        <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
            <p class="text-xl font-medium">Rincian Pembayaran</p>
            <p class="text-gray-400">Selesaikan pesanan anda dengan memasukkan rincian pemesanan yang sesuai </p>
            <div class="">
                <label for="nama_penerima" class="mt-4 mb-2 block text-base font-semibold">Nama Penerima <span class="text-red-600">*</span></label>
                <div class="relative">
                    <input type="text" id="nama_penerima" name="nama_penerima" class="w-full rounded-sm border border-gray-200 px-4 py-3  text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" />
                </div>
                <label for="card-holder" class="mt-4 mb-2 block text-base font-semibold">Nomor Telepon <span class="text-red-600">*</span></label>
                <div class="relative">
                    <input type="number" id="card-holder" name="nomor_telepon" class="w-full rounded-sm border border-gray-200 px-4 py-3  text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" />
                </div>
                <label for="kota" class="mt-4 mb-2 block text-base font-semibold">Kota
                    <span class="text-red-600">*</span>
                </label>
                <div class="relative">
                    <select name="kota" class="w-full rounded-sm border border-gray-200 px-4 py-3  text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM kota");

                        while ($row = mysqli_fetch_assoc($query)) {
                            echo "<option value ='$row[kota_id]'>$row[kota] (" . rupiah($row["tarif"]) . ")</option>";
                        }
                        ?>
                    </select>

                </div>
                <label for="alamat" class="mt-4 mb-2 block text-base font-semibold">Alamat <span class="text-red-600">*</span></label>
                <div class="relative">
                    <textarea id="alamat" name="alamat" class="w-full rounded-sm border border-gray-200 px-4 py-3  text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"></textarea>
                </div>

            </div>
            <input type="submit" value="Checkout" class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">
        </div>
    </form>

    <?php
    $subtotal = 0;
    foreach ($keranjang as $key => $value) {

        $barang_id = $key;
        $nama_barang = $value['nama_barang'];
        $harga = $value['harga'];
        $quantity = $value['quantity'];
        $gambar = $value["gambar"];

        $total = $quantity * $harga;
        $subtotal = $subtotal + $total;
        echo "
    <div class='px-4 pt-8'>
        <div class='' space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6'>
            <div class='flex flex-col rounded-lg bg-white sm:flex-row'>";
        $barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;
        echo "                
        <img class='m-2 h-24 w-28 rounded-md border object-cover object-center' src='" . BASE_URL . "image/barang/$gambar' height='100px' alt='' />
                <div class='flex w-full flex-col px-4 py-4'>
                    <span class='text-xl font-semibold'>$nama_barang</span>
                    <span class='float-right text-gray-400'>Jumlah $quantity</span>
                    <p class='text-lg font-bold'>" . rupiah($total) . "</p>
                </div>
            </div> 
        </div>";
    }
    echo "
        <div class='mt-6 border-t border-b py-2'>
            <div class='flex items-center justify-between'>
                <div class='py-5 flex justify-center'>
                    <p class='text-2xl font-medium text-gray-900'>Subtotal</p>
                    <p class=' ml-80 font-semibold text-2xl text-gray-900'>" . rupiah($subtotal) . "</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>";


    // echo "
    //     <div class='mt-6 flex items-center justify-between'>
    //         <div class=''>
    //             <p class='text-2xl font-medium text-gray-900'>Total</p>
    //         </div>
    //         <div class=''>
    //             <p class='text-2xl font-semibold text-gray-900'>" . rupiah($total) . "</p>
    //         </div>
    //     </div>
    // </div>
    // ";
    ?>

</div>
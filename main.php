<!-- <div id="kiri">


<?php
$kategori_id = @$_GET['kategori_id'];
echo kategori($kategori_id);
?>

</div> -->


<div id="">
    <div class="">
        <div id="slides">

            <?php
            $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on' ORDER BY banner_id DESC LIMIT 4");
            while ($rowBanner = mysqli_fetch_assoc($queryBanner)) {
                echo "
            <a class='flex justify-center ' href='" . BASE_URL . "$rowBanner[link]'>
                <img class='flex justify-center w-full'  width='100%' src='" . BASE_URL . "image/slide/$rowBanner[gambar]' />
            </a>";
            }
            ?>
        </div>
    </div>
    <div class="text-center">
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='ON'");
        $kategori_id =  @$_GET['kategori_id'];
        while ($row = mysqli_fetch_assoc($query)) {
            if ($kategori_id == $row['kategori_id']) {
                echo "
        
                <a class='ml-1 font-semibold bg-slate-600 text-white px-6 py-2 rounded-lg hover:bg-slate-600 text-lg' href='" . BASE_URL . "index.php?kategori_id=$row[kategori_id]' class=''>$row[kategori]</a>
        ";
            } else {

                echo

                "
         <a href='" . BASE_URL . "index.php?kategori_id=$row[kategori_id]' class='ml-1 bg-black  font-semibold text-white px-6 py-2 rounded-lg hover:bg-slate-600 text-lg'>$row[kategori]</a>
         ";
            }
        }
        ?>
    </div>
    <div class="text-2xl flex justify-center">
        <p></p>
    </div>
    <div class="frame-barang mt-15">
        <div class="p-10 flex flex-wrap items-center justify-center">
            <?php
            if ($kategori_id) {
                $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND kategori_id='$kategori_id' ORDER BY rand() DESC LIMIT 9");
            } else {
                $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' ORDER BY rand() DESC LIMIT 9");
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
                            <a href='" . BASE_URL . "tambah_keranjang.php?barang_id=$row[barang_id]' class=' mt-10 mr-3 text-white  flex justify-center bg-indigo-400 hover:bg-indigo-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center'>
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
    <div class="mb-16 ml-7">
        <div class="mt-7 flex items-center justify-center">
            <div class="flex justify-center ">
                <div class=" mr-28">
                    <card class="w-full flex flex-col">
                        <div class="relative">
                            <a href="<?php echo BASE_URL . "index.php?page=women-section"; ?>">
                                <img src="image/banner/section-women.png" class="w-96 h-auto" />
                            </a>
                        </div>
                    </card>
                </div>

                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <card class="w-full flex flex-col">
                        <div class="relative">
                            <a href="<?php echo BASE_URL . "index.php?page=men-section"; ?>">
                                <img src="image/banner/section-men-fix.png" class="w-96 h-auto" />
                            </a>
                        </div>
                    </card>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
?>
</div>
</div>
<br><br>
<div class="bg-white  overflow-hidden relative lg:flex lg:items-center">
    <div class="w-full py-12 px-4 sm:px-6 lg:py-16 lg:px-8 z-20">
        <h2 class="text-3xl font-extrabold text-black  sm:text-4xl">
            <span class="block mt-2">
                Tingkatkan gaya busanamu dengan Aestria
            </span>
        </h2>
        <p class="text-md mt-4 ">
            Aestria menyediakan gaya busana yang sempurna </p>
    </div>
    <div class="flex items-center gap-8 p-8 lg:p-24">
        <img src="image/banner/component.jpg" class="w-1/2 rounded-lg" alt="" />
        <div>
            <img src="image/banner/component-2.jpg" class="mb-8 rounded-lg" alt="" />
            <img src="image/banner/component-3.jpg" class="rounded-lg" alt="" />
        </div>
    </div>
</div>


<div class="flex justify-center mb-5">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.6250730200954!2d114.83017931475813!3d-3.441032997495412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de681d47b0ffd3b%3A0x3b48838a3c931f5b!2sTelkom%20Schools%20-%20SMK%20Telkom%20Banjarbaru!5e0!3m2!1sid!2sid!4v1685877516898!5m2!1sid!2sid" width="1400" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
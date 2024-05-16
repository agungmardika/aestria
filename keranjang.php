<?php
echo "<div>
<nav class='px-5 py-1 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-200 dark:border-gray-700' aria-label='Breadcrumb'>
    <div class='w-fit mx-auto'>
        <div class=''>
            <p class='text-center text-4xl font-bold'>Keranjang</p>
        </div><br>
        <div class='flex justify-center'>
            <ol class='inline-flex space-x-1 md:space-x-3'>
                <li class='inline-flex'>
                    <a href='index.php' class='inline-flex text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white'>
                        <svg aria-hidden='true' class='w-4 h-4 mr-2' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z'></path>
                        </svg>Beranda</a>
                </li>
                <li>
                    <div class='flex'>
                        <svg aria-hidden='true' class='w-6 h-6 text-gray-400' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                            <path fill-rule='evenodd' d='M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z' clip-rule='evenodd'></path>
                        </svg>
                        <p class='ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white'>Keranjang</p>
                    </div>
                </li>
            </ol>
        </div>
    </div>
</nav><br>
</div>";
if ($totalBarang == 0) {
    echo "
    <br>
    <div class='flex justify-center'>
    <h3 class='  text-xl font-bold'>Saat ini belum ada data di dalam keranjang belanja anda</h3>
    </div>
    <div class='mt-10 flex justify-center'>
    <a href='index.php'>
    <button class=' bg-blue-600 font-semibold text-white py-2 px-4 rounded-md'>
    Belanja Sekarang
    </button>
    </a>    
    </div>";
} else {

    $no = 1;

    echo "<center>
    <div class='mx-10  shadow rounded'>
        <div class=''>
                <div class='mx-10  shadow rounded'>
            <div class=''>
                <table class='w-[1200px]'>
        <thead>
            <tr class='w-full h-16 border-gray-300 border-b py-8'>
                <th class='pl-8 text-black pr-6 text-left text-sm track ing-normal leading-4'>
                    <p class='font-semibold '>No</p>
                </th>
                <th class=' text-black pr-6 text-left text-sm tracking-normal leading-4'>
                    <p class='font-semibold '>Gambar</p>
                </th>
                <th class=' text-black pr-6 text-left text-sm tracking-normal leading-4'>
                    <p class='font-semibold ''>Barang</p>
                </th>
                <th class=' text-black pr-6 text-left text-sm tracking-normal leading-4'>
                    <p class='font-semibold ''>Kuantitas</p>
                </th>
                <th class=' text-black pr-6 text-left text-sm tracking-normal leading-4'>
                    <p class='font-semibold ''>Hapus</p>
                </th>
                <th class=' text-black pr-6 text-left text-sm tracking-normal leading-4'>
                    <p class='font-semibold '>Harga per Unit </p>
                </th>
                
            </tr>
        </thead>
        </div>
    </div>";

    $subtotal = 0;
    foreach ($keranjang as $key => $value) {
        $barang_id = $key;

        $nama_barang = $value["nama_barang"];
        $quantity = $value["quantity"];
        $gambar = $value["gambar"];
        $harga = $value["harga"];


        $total = $quantity * $harga;
        $subtotal = $subtotal + $total;

        echo "
                <tbody>
                    <tr class='h-24 border-gray-300 border-b'>
                        <td class='pl-8 pr-6 text-left whitespace-no-wrap text-sm text-gray-800 tracking-normal leading-4'>
                            <p> $no</p>
                        </td>
                        <td class='text-sm ml-5 pr-6 whitespace-no-wrap text-gray-800 tracking-normal leading-4'><a href='" . BASE_URL . "index.php?page=detail&barang_id=$barang_id'>
                            <img class='w-48' src='" . BASE_URL . "image/barang/$gambar' alt='barang' height='50px'/></a>
                        </td>
                        <td class='pr-6 whitespace-no-wrap'>
                            <div class='flex items-center'>
                            <a href='" . BASE_URL . "index.php?page=detail&barang_id=$barang_id'>$nama_barang</a>
                            </div>
                        </td>
                        <td class='text-sm ml-5 pr-6 whitespace-no-wrap text-gray-800 tracking-normal leading-4'><input type='number' name='$barang_id' value='$quantity' class='border-2 p-1 border-black update-quantity' /></td>
                        <td class='text-sm ml-5 pr-6 whitespace-no-wrap text-gray-800 tracking-normal leading-4'><a class='font-bold text-lg' href='" . BASE_URL . "hapus_item.php?barang_id=$barang_id'>X</a></td>
                        <td class='text-sm ml-5 pr-6 whitespace-no-wrap text-gray-800 tracking-normal leading-4'>" . rupiah($harga) . "</td>
                        </tr>
                </tbody>
            </div>
        </div>
    
        ";

        $no++;
    }

    echo "
    <div class=''>  
        <div class=''>
            <tr class='py-10'>
                <td colspan='5' class='kanan py-4'><b>Sub Total</b></td>
                <td class='kanan'><b>" . rupiah($subtotal) . "</b></td>
            </tr>
        </div>
        ";
    echo "
    </table>
    </center> <br>";
    echo "
        <div class='mt-10 flex justify-between'>  
            <div class=''>
                <button class='bg-red-600 rounded-lg ml-10 px-3 py-3'>
                    <a class='text-white' id='lanjut-belanja' href='" . BASE_URL . "index.php'> ← Kembali </a>
                </button>
            </div>
            <div class='flex justify-end'>
                <button class='bg-black rounded-lg mr-10  px-3 py-3'>
                    <a class='text-white' href='" . BASE_URL . "index.php?page=data_pemesanan'> Lanjut Pemesanan → </a>
                </button>
            </div>
        </div>
        ";
}


?>

<script>
    $(".update-quantity").on("input", function(e) {
        var barang_id = $(this).attr("name");
        var value = $(this).val();

        $.ajax({
                method: "POST",
                url: "update_keranjang.php",
                data: "barang_id=" + barang_id + "&value=" + value
            })
            .done(function(data) {
                location.reload();
            });
    });
</script><br><br><br><br>
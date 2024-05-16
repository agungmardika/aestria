<?php
$pesanan_id = $_GET["pesanan_id"];

$query = mysqli_query($koneksi, "SELECT pesanan.nama_penerima, pesanan.nomor_telepon, pesanan.alamat, pesanan.tanggal_pemesanan, user.nama,kota.kota, kota.tarif FROM pesanan JOIN user ON pesanan.user_id-user.user_id JOIN kota ON kota.kota_id=pesanan.kota_id WHERE pesanan.pesanan_id='$pesanan_id'");

$row = mysqli_fetch_assoc($query);

$tanggal_pemesanan = $row['tanggal_pemesanan'];
$nama_penerima = $row['nama_penerima'];
$nomor_telepon = $row['nomor_telepon'];
$alamat = $row['alamat'];
$tarif = $row['tarif'];
$nama = $row['nama'];
$kota = $row['kota'];
?>

<div class="ml-60">
    <nav class="px-16 py-1 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-200 dark:border-gray-700" aria-label="Breadcrumb">
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
<div id="frame-faktur">
    <table>
        <tr>
            <td>Nomor Faktur</td>
            <td>:</td>
            <td><?php echo $pesanan_id; ?></td>
        </tr>

        <tr>
            <td>Nama Pemesan</td>
            <td>:</td>
            <td><?php echo $nama; ?></td>
        </tr>

        <tr>
            <td>Nama Penerima</td>
            <td>:</td>
            <td><?php echo $nama_penerima; ?><Id>
        </tr>

        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?php echo $alamat; ?></td>
        </tr>

        <tr>
            <td>Nomor Telepon</td>
            <td>:</td>
            <td><?php echo $nomor_telepon; ?></td>
        </tr>

        <tr>
            <td>Tanggal Pemesanan</td>
            <td>:</td>
            <td><?php echo $tanggal_pemesanan; ?></td>
        </tr>
    </table>
</div>

<table class="table-list">
    <tr class="baris-title">
        <th class="no">No</th>
        <th class="kiri">Nama Barang</th>
        <th class="tengah">Qty</th>
        <th class="kanan">Harga Satuan</th>
        <th class="kanan">Total</th>
    </tr>

    <?php

    $queryDetail = mysqli_query($koneksi, "SELECT pesanan_detail.*, barang.nama_barang FROM pesanan_detail JOIN barang ON pesanan_detail.barang_id=barang.barang_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");

    $no = 1;
    $subtotal = 0;
    while ($rowDetail = mysqli_fetch_assoc($queryDetail)) {
        $total = $rowDetail["harga"] * $rowDetail["quantity"];
        $subtotal = $subtotal + $total;

        echo "<tr>
                <td class='no'>$no</td>
                <td class='kiri'>$rowDetail[nama_barang]</td>
                <td class='tengah'>$rowDetail[quantity]</td>
                <td class='kanan'>" . rupiah($rowDetail["harga"]) . "</td>
                <td class='kanan'>" . rupiah($total) . "</td>
            </tr>";
        $no++;
    }

    $subtotal = $subtotal + $tarif;
    ?>

    <tr>
        <td class="kanan" colspan="4">Biaya Pengiriman</td>
        <td class="kanan"><?php echo rupiah($tarif); ?></td>
    </tr>
    <tr>
        <td class="kanan" colspan="4"><b>Sub total</b></td>
        <td class="kanan"><b><?php echo rupiah($subtotal); ?></b></td>
    </tr>

</table>



<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-bold text-black whitespace-nowrap ">
                    Nomor Faktur
                </th>
                <td class="px-6 py-4">
                    <?php echo $pesanan_id; ?>
                </td>

            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-white">
                    Nama Pemesan
                </th>
                <td class="font-semibold px-6 py-4">
                    <?php echo $nama; ?>
                </td>

            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Nama Penerima
                </th>
                <td class="px-6 py-4">
                    <?php echo $nama_penerima; ?>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Alamat
                </th>
                <td class="px-6 py-4">
                    <?php echo $alamat; ?>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Nomor Telepon
                </th>
                <td class="px-6 py-4">
                    <?php echo $nomor_telepon; ?>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Tanggal Pemesanan
                </th>
                <td class="px-6 py-4">
                    <?php echo $tanggal_pemesanan; ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>




<div id="Frame-keterangan-pembayaran">
    <p>Silahkan Lakukan pembayaran ke Bank YPT<br />
        Nomor Account: 0001-9991-8881-0-1 (A/N SMK Telkom Banjarbaru).<br /> Setelah melakukan pembayaran silahkan lakukan konfirmasi pembayaran
        <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=pesanan&action=konfirmasi_pembayaran&pesanan_id=$pesanan_id" ?>">Disini</a>.
    </p>
</div>
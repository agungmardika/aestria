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

<div class="ml-10 w-[60rem]">
    <table class=" text-base w-[60rem] text-left text-black ">
        <tbody>
            <tr class=" border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-bold text-black whitespace-nowrap ">
                    Nomor Faktur
                </th>
                <td class="px-6 py-4">
                    <?php echo $pesanan_id; ?>
                </td>

            </tr>
            <tr class="border-b dark:border-gray-700">
                <th scope="row" class="px-6 border-b dark:border-gray-700 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    Nama Penerima
                </th>
                <td class="px-6 py-4">
                    <?php echo $nama_penerima; ?>
                </td>
            </tr>
            <tr class=" border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 dark:border-gray-700 border-b font-medium text-gray-900 whitespace-nowrap ">
                    Alamat
                </th>
                <td class="px-6 py-4">
                    <?php echo $alamat; ?>
                </td>
            </tr>
            <tr class=" border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 dark:border-gray-700 border-b font-medium text-gray-900 whitespace-nowrap ">
                    Nomor Telepon
                </th>
                <td class="px-6 py-4">
                    <?php echo $nomor_telepon; ?>
                </td>
            </tr>
            <tr class=" border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 dark:border-gray-700 border-b font-medium text-gray-900 whitespace-nowrap  ">
                    Tanggal Pemesanan
                </th>
                <td class="px-6 py-4">
                    <?php echo $tanggal_pemesanan; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br>


    <table class="p-2 w-full ">
        <div class="rounded-lg">
            <tr class="bg-gray-900 text-white rounded-lg  ">
                <th class="text-center p-2">No</th>
                <th class="text-center p-2">Nama Barang</th>
                <th class="text-center p-2">Kuantitas</th>
                <th class="text-center p-2">Harga Satuan</th>
                <th class="text-center p-2">Total</th>
            </tr>
        </div>

        <?php

        $queryDetail = mysqli_query($koneksi, "SELECT pesanan_detail.*, barang.nama_barang FROM pesanan_detail JOIN barang ON pesanan_detail.barang_id=barang.barang_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");

        $no = 1;
        $subtotal = 0;
        while ($rowDetail = mysqli_fetch_assoc($queryDetail)) {
            $total = $rowDetail["harga"] * $rowDetail["quantity"];
            $subtotal = $subtotal + $total;

            echo "
            <tr class='my-10 border-b-2 py-4'>
                <td class='text-center'>$no</td>
                <td class='text-center'>$rowDetail[nama_barang]</td>
                <td class='text-center'>$rowDetail[quantity]</td>
                <td class='text-center'>" . rupiah($rowDetail["harga"]) . "</td>
                <td class='text-center'>" . rupiah($total) . "</td>
            </tr>";
            $no++;
        }

        $subtotal = $subtotal + $tarif;
        ?>

        <tr class="mt-5">
            <td class="kanan" colspan="4">Biaya Pengiriman</td>
            <td class="kanan"><?php echo rupiah($tarif); ?></td>
        </tr>
        <tr>
            <td class="kanan" colspan="4"><b>Sub total</b></td>
            <td class="kanan"><b><?php echo rupiah($subtotal); ?></b></td>
        </tr>

    </table>

    <div id="Frame-keterangan-pembayaran">
        <p>Silahkan Lakukan pembayaran ke Admin Aestria<br />
            Nomor Rekening : 71994777374 (A/N Najmi Fathony).<br /> Setelah melakukan pembayaran silahkan lakukan konfirmasi pembayaran
            <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=pesanan&action=konfirmasi_pembayaran&pesanan_id=$pesanan_id" ?>" class="text-blue-400 border-b-2 font-bold border-b-blue-400">Disini</a>.
        </p>
    </div>
</div>
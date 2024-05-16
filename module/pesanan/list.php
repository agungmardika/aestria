<div class='mt-5 ml-[57rem]'>
    <a href='#'>
        <button class=' items-center px-4 py-2 bg-white text-white text-sm font-medium rounded-md'>
            xxxxxxx xxxxxxxxx
        </button>
    </a>
</div>

<?php
if ($level == "superadmin") {
    $queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id
                                        ORDER BY pesanan.tanggal_pemesanan DESC");
} else {
    $queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id
                                        WHERE pesanan.user_id='$user_id' ORDER BY pesanan.tanggal_pemesanan DESC");
}

if (mysqli_num_rows($queryPesanan) == 0) {
    echo "
    <div class=''>
        <h3 class='font-bold text-lg text-center'>Saat ini belum ada data pesanan</h3>
        <div class='ml-[28rem] mt-20'><a href='index.php'>
            <button class=' bg-indigo-500 px-4 py-2 rounded-lg font-semibold text-white'>Belanja Sekarang</button>
            </a>
        </div>
    </div>";
} else {

    echo "<div class='mx-auto py-4 overflow-x-auto'>
    <div class=' w-full shadow rounded-lg overflow-hidden'>
        <table class='min-w-full leading-normal'>
<h2 class='text-2xl font-bold text-center mb-10'>Pesanan</h2>

<tr>
        <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider'>
            No Pesanan
        </th>
        <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider'>
            Status
        </th>
        <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider'>
            Nama Pemesan
        </th>
        <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider'>
            Opsi
        </th>
    </tr>";

    $adminButton = "";
    while ($row = mysqli_fetch_assoc($queryPesanan)) {
        if ($level == "superadmin") {
            $adminButton = "<a class='ml-5 items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md' href='" . BASE_URL . "index.php?page=my_profile&module=pesanan&action=status&pesanan_id=$row[pesanan_id]'>Perbarui Status</a>";
        }

        $status = $row['status'];
        echo "
        <tr>
                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                            <div class='flex items-center'>
                                <div class='ml-3'>
                                    <p class='text-gray-900 whitespace-no-wrap'>
                                    <span>$row[pesanan_id]</span>
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                            <p class='text-gray-900 whitespace-no-wrap'>$arrayStatusPesanan[$status]</p>
                        </td>
                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm '>
                            <p class='text-gray-900 whitespace-no-wrap'>
                            <span>$row[nama]</span>
                            </p>
                        </td>
                        <td class='px-5 py-5  border-b border-gray-200 bg-white text-sm'>
                        <div class='flex justify-center-center'>
                            <a class=' items-center px-3 py-2 bg-indigo-400 text-white text-sm font-medium rounded-md' href='" . BASE_URL . "index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]'>Detail Pesanan</a>
                            $adminButton
                        </div>
                        </td>
                    </tr>
        </div>
    </div>";
    }
    echo "</table>";
}
?>
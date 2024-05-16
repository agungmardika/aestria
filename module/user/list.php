<?php
include_once("function/koneksi.php");
include_once("function/helper.php");
?>

<div class="mt-5 ml-[57rem]">
    <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=user&action=form"; ?>">
    </a>
</div>

<?php
$no = 1;
$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");
$queryAdmin     = mysqli_query($koneksi, "SELECT * FROM user ORDER BY nama ASC");

//melakukan pengecekan apakah hasil query memiliki data, jika tidak ada maka akan tampil sebuah pesan saat ini belum ada data di dalam table
if (mysqli_num_rows($queryAdmin) == 0) {
    echo " <h3> Saat ini belum ada data di dalam table </h3>";
} else {
    echo "
        <div class='-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto'>
            <div class='inline-block min-w-full shadow rounded-lg overflow-hidden'>
                <table class='min-w-full leading-normal'>";
    echo "
        <h2 class='text-2xl font-bold text-center mb-10'>Pengguna</h2>
            <tr>
                    <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider'>
                        No
                    </th>
                    <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider'>
                        Nama
                    </th>
                    <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider'>
                        Email
                    </th>
                    <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider'>
                        No Telepon
                    </th>
                    <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider'>
                        Alamat
                    </th>
                    <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider'>
                        Level
                    </th>
                    <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider'>
                        Status
                    </th>
                    <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider'>
                    Opsi
                    </th>
                </tr>";
    while ($rowUser = mysqli_fetch_assoc($queryAdmin)) {
        echo "<tr>
                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                            <div class='flex items-center'>
                                <div class='ml-3'>
                                    <p class='text-gray-900 whitespace-no-wrap'>
                                    <span>$no</span>
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                            <p class='text-gray-900 whitespace-no-wrap'><span>$rowUser[nama]</span></p>
                        </td>
                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                            <p class='text-gray-900 whitespace-no-wrap'><span>$rowUser[email]</span></p>
                        </td>
                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                            <p class='text-gray-900 whitespace-no-wrap'><span>$rowUser[phone]</span></p>
                        </td>
                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                            <p class='text-gray-900 whitespace-no-wrap'><span>$rowUser[alamat]</span></p>
                        </td>
                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                            <p class='text-gray-900 whitespace-no-wrap'><span>$rowUser[level]</span></p>
                        </td>
                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                            <p class='text-gray-900 whitespace-no-wrap'>
                            <span>$rowUser[status]</span>
                            </p>
                        </td>
                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                            <p class=text-gray-900 whitespace-no-wrap'>
                            <a title='Edit' class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=user&action=form&user_id=$rowUser[user_id]'><i  class='text-green-600  fa-sharp fa-solid fa-pen'></i></a>
                            </p>
                        </td>
                    </tr>
        </div>
    </div>";
        $no++;
    }
    echo "</table>";
};

?>
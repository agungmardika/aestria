<?php
include_once("function/koneksi.php");
include_once("function/helper.php");
?>
<div class="mt-5 ml-[57rem]">
    <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=kategori&action=form"; ?>">
        <button class=" items-center px-4 py-2 bg-green-400 hover:bg-green-600 text-white text-sm font-medium rounded-md">
            <i class="fa-sharp fa-solid fa-plus mr-1"></i>
            Tambah Kategori
        </button>
    </a>
</div>

<?php
$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori"); //Digunakan untuk mengambil data yang ada  pada table kategori

//melakukan pengecekan apakah hasil query memiliki data, jika tidak ada maka akan tampil sebuah pesan saat ini belum ada data di dalam table
if (mysqli_num_rows($queryKategori) == 0) {
    echo " <h3> Saat ini belum ada data di dalam table </h3>";
} else {
    echo "
    <div class=' mx-auto py-4 overflow-x-auto'>
        <div class=' w-full shadow rounded-lg overflow-hidden'>
            <table class='min-w-full leading-normal'>";


    echo "
    <h2 class='text-2xl font-bold text-center mb-10'>Kategori</h2>
    <tr>
            <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider'>
                No
            </th>
            <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider'>
                Kategori
            </th>
            <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider'>
                Status
            </th>
            <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider'>
                Opsi
            </th>
        </tr>";

    $no = 1;
    while ($row = mysqli_fetch_assoc($queryKategori)) {

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
                            <p class='text-gray-900 whitespace-no-wrap'><span>$row[kategori]</span></p>
                        </td>
                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                            <p class='text-gray-900 whitespace-no-wrap'>
                            <span>$row[status]</span>
                            </p>
                        </td>
                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                            <p class=text-gray-900 whitespace-no-wrap'>
                            <a title='Edit' class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=kategori&action=form&kategori_id=$row[kategori_id]'><i  class='text-green-600  fa-sharp fa-solid fa-pen'></i></a>
                            </p>
                        </td>
                    </tr>
        </div>
    </div>";
        $no++;
    }
    echo "</table>";
}

?>
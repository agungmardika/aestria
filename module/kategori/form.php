<?php
$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

$kategori = "";
$status = "";
$button = "Tambah";

if ($kategori_id) {
    $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");
    $row = mysqli_fetch_assoc($queryKategori);

    $kategori = $row['kategori'];
    $status = $row['status'];
    $button = "Perbarui";
}
?>
<div class="ml-[240px] flex justify-center px-6 py-6   ">
    <div class=" flex justify-center  rounded-lg shadow dark:border md:mt-0  ">
        <div class="p-6 space-y-4 md:space-y-6 w-[400px] sm:p-8">
            <form action="<?php echo BASE_URL . "module/kategori/action.php?kategori_id=$kategori_id"; ?>" method="POST" autocomplete="off">
                <div class="">
                    <div class="flex justify-center">
                        <p class="font-light  text-black text-3xl"><?php echo $button ?> Kategori</p>
                    </div><br><br>
                    <div class=" w-full relative group ">
                        <input name="kategori" type="text" value="<?php echo $kategori ?>" id="kategori" required class=" w-full bg-gray-50 outline-none text-sm peer border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600  p-2.5  dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <label for="kategori" class="  transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-sm group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">Kategori</label>
                    </div><br>
                    <div class="flex w-max gap-2 mx-auto">
                        <div class="inline-flex items-center">
                            <label class="relative flex cursor-pointer items-center rounded-full p-3" for="red">
                                <input id="red" name="status" <?php if ($status == "on") {
                                                                    echo "checked='true'";
                                                                } ?> value="on" type="radio" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-blue-gray-200 text-green-700 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-green-500 checked:before:bg-green-500 hover:before:opacity-10" />
                                <div class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-green-700 opacity-0 transition-opacity peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 16 16" fill="currentColor">
                                        <circle data-name="ellipse" cx="8" cy="8" r="8"></circle>
                                    </svg>
                                </div>
                            </label>
                            <label id="label2" class=" text-sm leading-4 font-normal text-black dark:text-black">On</label>

                        </div>
                        <div class="inline-flex items-center ml-14">
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
                    </div><br>
                    <div class=" w-full relative group ">
                        <input type="submit" class=" w-full outline-none text-sm peer border font-medium  text-white sm:text-base rounded-md  p-2.5 bg-black dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="button" value="<?php echo $button; ?>" />
                    </div>
                    <br>
                </div>
            </form>
        </div>
    </div>
</div>




<style>
    .checkbox:checked {
        border: none;
    }

    .checkbox:checked+.check-icon {
        display: flex;
    }
</style>
<br><br><br><br>
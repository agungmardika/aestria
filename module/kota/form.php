<?php

$kota_id = isset($_GET['kota_id']) ? $_GET['kota_id'] : false;

$kota = "";
$tarif = "";
$status = "";
$button = "Tambah";

if ($kota_id) {
    $queryKota = mysqli_query($koneksi, "SELECT * FROM kota WHERE kota_id='$kota_id'");
    $row = mysqli_fetch_assoc($queryKota);

    $kota = $row['kota'];
    $tarif = $row['tarif'];
    $status = $row['status'];
    $button = "Perbarui";
}
?>

<form action="<?php echo BASE_URL . "module/kota/action.php?kota_id=$kota_id"; ?>" method="post">
    <div class="flex justify-center  ml-[240px]">
        <div class="flex flex-col items-center justify-center px-6 py-6 mx-auto ">
            <div class="w-fullmx-auto rounded-lg shadow dark:border md:mt-0 w-[400px] 2xl:p-0">
                <div class="p-6  mx-auto space-y-4 md:space-y-6 sm:p-8">
                    <div class="flex justify-center">
                        <p class="font-light  text-black  text-3xl"><?php echo $button; ?> Kota</p>
                    </div>
                    <br>

                    <div class=" flex justify-center">
                        <div class="w-full relative group">
                            <input name="kota" type="text" value="<?php echo $kota; ?>" id="phone" required class="w-full bg-gray-50 outline-none text-sm peer border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600  p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-black dark:focus:border-black">
                            <label for="kota" class=" transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-sm group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">Kota</label>
                        </div>

                    </div>
                    <div class=" flex justify-center">
                        <div class="w-full relative group">
                            <input name="tarif" type="text" value="<?php echo $tarif; ?>" id="phone" required class="w-full bg-gray-50 outline-none text-sm peer border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600  p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-black dark:focus:border-black">
                            <label for="tarif" class=" transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-sm group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">Tarif</label>
                        </div>
                    </div>
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
                    </div>
                    <input type="submit" name="button" value="<?php echo $button; ?>" class="w-full outline-none text-sm peer border font-medium bg-black  text-white sm:text-base rounded-md  p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-black dark:focus:border-black">
                </div>
            </div>
        </div>
    </div>
</form>
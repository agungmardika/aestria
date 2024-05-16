<hr>

<?php

if ($user_id) {
    $module     = isset($_GET['module']) ? $_GET['module'] : false;
    $action     = isset($_GET['action']) ? $_GET['action'] : false;
    $mode       = isset($_GET['mode']) ? $_GET['mode'] : false;
} else {
    header("Location:" . BASE_URL . "index.php?page=login");
}

?>
<div class="mt-10 ml-5 flex">
    <div x-data="{ sidebarOpen: true }" class="flex overflow-x-hidden h-screen">
        <aside class="flex-shrink-0 w-64 flex flex-col border-r transition-all duration-300" :class="{ '-ml-64': !sidebarOpen }">
            <nav class="flex-1 flex flex-col bg-white">

                <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=user&action=profile" ?>" class=" text-2xl font-bold">
                    <i class="mr-2 fa-solid fa-user"></i>
                    Profil Saya
                </a>
                <ul class="mt-10">
                    <?php
                    if ($level == "superadmin") {
                    ?>
                        <li class="text-sm my-5 font-semibold">
                            <a <?php if ($module == "kategori") {
                                    echo "class='active'";
                                } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=kategori&action=list" ?>">Kategori</a>
                        </li>
                        <hr>
                        <li class="text-sm my-5 font-semibold">
                            <a <?php if ($module == "barang") {
                                    echo "class='active'";
                                } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=barang&action=list" ?>">Barang</a>
                        </li>
                        <hr>
                        <li class="text-sm my-5 font-semibold">
                            <a <?php if ($module == "kota") {
                                    echo "class='active'";
                                } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=kota&action=list" ?>">Kota</a>
                        </li>
                        <hr>

                        <hr>
                        <li class="text-sm my-5 font-semibold">
                            <a <?php if ($module == "banner") {
                                    echo "class='active'";
                                } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=banner&action=list" ?>">Spanduk</a>
                        </li>
                        <hr>
                        <li class="text-sm my-5 font-semibold">
                            <a <?php if ($module == "user") {
                                    echo "class='active'";
                                } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=user&action=list" ?>">Pengguna</a>
                        </li>
                        <hr>
                    <?php
                    }
                    ?>
                    <hr>
                    <li class="text-sm my-5 font-semibold">
                        <a <?php if ($module == "pesanan") {
                                echo "class='active'";
                            } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=pesanan&action=list" ?>">Pesanan</a>
                    </li>
                    <hr>

                </ul>

            </nav>
        </aside>
    </div>
    <div class="ml-10">
        <div id="profile-content">
            <?php
            $file    = "module/$module/$action.php";
            if (file_exists($file)) {
                include_once($file);
            } else {
                echo "<h3>Halaman tidak ditemukan</h3>";
            }
            ?>
        </div>
    </div>
</div>
</div>
<?php
session_start();

include_once("function/helper.php");
include_once("function/koneksi.php");
$page = isset($_GET['page']) ? $_GET['page'] : false;

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$nama    = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
$level   = isset($_SESSION['level']) ? $_SESSION['level'] : false;
$keranjang   = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
$totalBarang   = count($keranjang);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="image/logo.ico">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aestria Clothing</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL . "css/banner.css"; ?>" type="text/css">
    <!-- <link rel="stylesheet" href="<?php echo BASE_URL . "css/style.css"; ?>"> -->
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/slidesjs-SlidesJS-3/source/jquery.slides.min.js"></script>
    <script src="js/slidesjs-SlidesJS-3/source/jquery.slides.js"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <script>
        $(function() {
            $('#slides').slidesjs({
                height: 360,
                paly: {
                    auto: true,
                    interval: 3000
                },
                navigation: true
            });
        });
    </script>
</head>

<body>

    <div class="sticky-top-0 ">
        <div class="flex ml-[42.6rem]">
            <div class="mt-1 flex justify-center">
                <a href="<?php echo BASE_URL . "index.php"; ?>" class="">
                    <img class="h-20" src="<?php echo BASE_URL . "image/Logo.png"; ?>" alt="">
                </a>
            </div>
            <div class="">
                <div id="user">
                    <div class="flex justify-center ml-[23rem] mt-4">
                        <a class="mr-4 p-0" href="<?php echo BASE_URL . "index.php?page=keranjang"; ?>">
                            <div class="relative py-2">
                                <div class="t-0 absolute left-3">

                                    <?php
                                    if ($totalBarang != 0) {
                                        echo "
                                                <p class='ml-4 flex h-2 w-2 items-center justify-center rounded-full bg-gray-200 p-2 text-xs text-black font-semibold'>
                                                    <span class='total-barang'>$totalBarang</span>
                                                </p>";
                                    }
                                    ?>

                                </div>
                            </div>
                            <img class="h-8 mb-4 mt-" src="<?php echo BASE_URL . "image/pngegg.png"; ?>" alt="">
                        </a>
                        <div class="mr-5 mt-5 ">
                            <?php
                            if ($user_id) {
                                echo "
                            <a class='text-black text-base  font-semibold ' href='" . BASE_URL . "index.php?page=my_profile&module=user&action=list'>Profil Saya </a>
                            <a class='ml-5 text-white text-base rounded-lg font-semibold bg-black py-3 px-7' href='" . BASE_URL . "logout.php'>Keluar</a>";
                            } else {
                                echo "<a class='text-black text-base font-semibold ' href='" . BASE_URL . "index.php?page=login'>Masuk</a>
                                      <a class='ml-5 mr-10 text-white text-base bg-black py-3 px-7 rounded-lg ' class='' href='" . BASE_URL . "index.php?page=register'>Daftar</a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <hr class="mt-1 mx-2 ">


    <div id="content">


        <?php
        $filename = "$page.php";

        if (file_exists($filename)) {
            include_once($filename);
        } else {
            include_once("main.php");
        }
        ?>
    </div>

    <footer class="p-4 bg-white  sm:p-6">
        <hr>
        <div class="mt-5 md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="index.php" class="flex items-center">
                    <p class="text-3xl text-black font-bold  tracking-widest pl-10">Aestria™</p>
                </a>
                <p class="text-lg mt-2 text-black font-light pl-10">Authentic Fashion Store</p>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3 mr-10">
                <div>
                    <h2 class="mb-6 text-base font-bold text-gray-900 uppercase ">Referensi</h2>
                    <ul class="text-gray-600 ">
                        <li class="mb-4">
                            <a href="https://www.kickavenue.com/" class=" font-semibold hover:underline">Kick Avenue</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-base font-bold text-gray-900 uppercase">Kontak</h2>
                    <ul class="text-gray-600 ">
                        <li class="mb-4">
                            
                            <a href="whatsapp://send?text=bang, aku mau beli&phone=+6283844870780" class=" font-semibold hover:underline">Whatsapp</a>
                        </li>
                        <li class="mb-4">
                            <a href="mailto:agungdmardika@gmail.com" class=" font-semibold hover:underline">Email</a>
                        </li>
                        
                    </ul>
                </div>
                <div class="">
                    <h2 class="mb-6 text-base font-bold text-gray-900 uppercase">FAQ</h2>
                    <ul class="text-gray-600 ">
                        <li class="mb-4">
                            <a href="<?php echo BASE_URL . "index.php?page=about"; ?>" class="font-semibold hover:underline ">Tentang Aestria</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://github.com/lunar-archive/aestria" class="font-semibold hover:underline ">Panduan Ukuran</a>
                        </li>
                        <li class="mb-4">
                            <a href="<?php echo BASE_URL . "index.php?page=return"; ?>" class="font-semibold hover:underline">Panduan Pengembalian</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL . "index.php?page=privacy"; ?>" class="font-semibold hover:underline">Kebijakan Privasi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto " />
        <div class="sm:flex sm:items-center sm:justify-between mr-8">
            <span class="text-sm text-gray-500 sm:text-center ">© 2023 <a href="" class="hover:underline">Aestria®</a> All Rights Reserved. Powered by Telkom Schools
            </span>
            <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0 mr-10">
                <a href="#" class="text-gray-500 hover:text-gray-900 ">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Instagram page</span>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900 ">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">GitHub account</span>
                </a>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </div>
</body>

</html>
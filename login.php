<body>
    <center>
        <div>
            <nav class="px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-200 dark:border-gray-700" aria-label="Breadcrumb">
                <div class="w-fit mx-auto">
                    <div class="">
                        <p class="text-4xl font-bold">Akun Saya</p>
                    </div><br>
                    <div class="">
                        <ol class="inline-flex space-x-1 md:space-x-3">
                            <li class="inline-flex">
                                <a href="index.php" class="inline-flex text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                    </svg>Beranda</a>
                            </li>
                            <li>
                                <div class="flex">
                                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <a href="<?php echo BASE_URL . "index.php?page=login"; ?>" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Masuk</a>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav><br>
        </div>

        <form action="<?php echo BASE_URL . "proses_login.php"; ?>" method="post" class="ml-1 w-full max-w-lg" autocomplete="off">
            <!--notif -->
            <?php
                              $email = isset($_GET['email']) ? $_GET['email'] : false;
                              $notif = isset($_GET['notif']) ? $_GET['notif'] : false;

                            if ($notif == "true") {
                                echo " <div class='bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md' role='alert'>
            <div class='flex'>
                <div class='py-1'><svg class='fill-current h-6 w-6 text-red-500 mr-4' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'>
                        <path d='M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z' />
                    </svg></div>
                <div>
                    <p class='font-bold'>Data yang anda masukkan tidak tepat</p>
                    <p class='text-sm'>Pastikan anda memasukkan data yang benar!</p>
                </div>
            </div>
        </div>";
                            }
                            ?>

            <div class="mt-8">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            Email
                        </label>
                        <input name="email" class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Masukkan Email" value="<?php echo $nama; ?>">
                    </div>
                </div>


                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            sandi
                        </label>
                        <div class="flex">
                            <input type="password" name="password" autocomplete="current-password" minlength="8" maxlength="32" required="" id="id_password" class="appearance-none block w-full px-4 py-2 bg-gray-100 text-gray-700 border border-gray-200 rounded h-10 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Masukkan Sandi">
                            <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; margin-top: 14px; margin-bottom: 80px; cursor: pointer;"></i>
                        </div>
                        <!-- <input name="password" class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-10 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="Input Password"> -->
                    </div>

                    <div class="flex justify-end pt-2">
                        <button value="Sign In" name="" type="submit" class="appearance-none rounded-lg block w-full bg-black font-bold text-white border py-3 px-[14.4rem] mb-3 ml-[10px]">Masuk</button>
                    </div>
                </div>
        </form>
        <div class=" pb-20">
            <p class="tracking-wide  font-semibold text-right">Belum memiliki akun?
                <a href="<?php echo BASE_URL . "index.php?page=register"; ?>">
                    <span class="text-blue-700 ">Daftar</span>
                </a>
            </p>
        </div>
    </center>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
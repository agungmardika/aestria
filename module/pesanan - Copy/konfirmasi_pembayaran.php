<?php
$pesanan_id =   $_GET["pesanan_id"];
?>

<table class="table-list">

    <form action="<?php echo BASE_URL . "module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST">

        <!-- <div class="element-form">
            <label for="">Nomor Rekening</label>
            <span><input type="text" name="nomor_rekening" id=""></span>
        </div>

        <div class="element-form">
            <label for="">Nama Account</label>
            <span><input type="text" name="nama_account" id=""></span>
        </div>

        <div class="element-form">
            <label for="">Tanggal Transfer </label>
            <span><input type="date" name="tanggal_transfer" id=""></span>
        </div>

        <div class="element-form">
            <span><input type="submit" value="Konfirmasi" name="button" id=""></span>
        </div> -->

        <div class="mt-8">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Nomor Rekening
                    </label>
                    <input name="nomor_rekening" class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="number" placeholder="Masukkan No Rekening">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Nama Akun
                    </label>
                    <input name="nama_account" class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Masukkan Nama Akun Sesuai Bank">
                </div>
            </div>


            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Tanggal Transfer
                    </label>
                    <div class="flex">
                        <input type="date" name="tanggal_transfer" class=" mb-5 appearance-none block w-full px-4 py-2 bg-gray-100 text-gray-700 border border-gray-200 rounded h-10 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Masukkan Sandi">
                    </div>
                </div>
                <div class="flex justify-end pt-2">
                    <input type="submit" value="Konfirmasi" name="button" class="appearance-none rounded-lg block w-full bg-black font-bold text-white border py-3 px-[14.4rem] mb-3 ml-[10px]">
                </div>
            </div>
        </div>
</table>

</form>
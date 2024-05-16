<?php
$pesanan_id =   $_GET["pesanan_id"];
?>
<div class="ml-32">
    <h3 class="font-bold flex justify-center text-3xl">Konfirmasi Pembayaran</h3><br>
    <form action="<?php echo BASE_URL . "module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST">
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
                <div class="w-full px-3">
                    <input type="submit" value="Konfirmasi" name="button" class="font-semibold text-lg block w-full bg-black text-white border  rounded py-3 px-[16rem] mb-3 leading-tight focus:outline-none">
                </div>
            </div>
        </div>
    </form>
</div>
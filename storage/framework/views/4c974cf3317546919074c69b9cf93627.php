<?php $__env->startSection('title','Tambah Produk'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-7xl mx-auto px-6 py-8">

    <a href="<?php echo e(route('produk.index')); ?>"
        class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">
        ← Kembali ke Daftar Produk
    </a>

    <h1 class="text-4xl font-bold mt-4 text-slate-800">
        Tambah Produk
    </h1>

    <p class="text-slate-500 mt-2">
        Lengkapi informasi produk dengan benar
    </p>

    <form action="<?php echo e(route('produk.store')); ?>"
          method="POST"
          enctype="multipart/form-data"
          class="mt-8">

        <?php echo csrf_field(); ?>

        <div class="bg-white rounded-3xl shadow-lg border border-slate-200 overflow-hidden">

            <div class="grid lg:grid-cols-2">

                <!-- FOTO -->
                <div class="p-8 border-r">

                    <h3 class="font-semibold text-xl">
                        Foto Produk
                    </h3>

                    <p class="text-slate-500 text-sm mt-1">
                        Upload JPG / PNG (Max 2MB)
                    </p>

                    <label for="foto"
                        class="mt-6 flex flex-col items-center justify-center h-80 border-2 border-dashed border-indigo-300 rounded-2xl cursor-pointer hover:bg-indigo-50 transition">

                        <img id="preview"
                             src="https://placehold.co/300x220?text=Upload+Foto"
                             class="max-h-56 rounded-xl object-cover">

                        <p class="mt-5 text-indigo-600 font-semibold">
                            Pilih File
                        </p>

                        <span class="text-slate-500 text-sm">
                            atau drag & drop
                        </span>

                    </label>

                    <input
                        id="foto"
                        type="file"
                        name="foto"
                        class="hidden"
                        accept="image/*"
                        onchange="previewImage(event)">

                    <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-2">
                        <?php echo e($message); ?>

                    </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>

                <!-- DATA -->
                <div class="p-8 space-y-6">

                    <!-- Nama -->
                    <div>

                        <label class="font-semibold">
                            Nama Produk
                        </label>

                        <input
                            type="text"
                            name="nama"
                            value="<?php echo e(old('nama')); ?>"
                            class="mt-2 w-full rounded-xl border px-5 py-3"
                            placeholder="Masukkan nama produk">

                        <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1">
                            <?php echo e($message); ?>

                        </p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <div class="mb-3">

                    <!-- Jenis Produk -->
<div>
    <label class="block text-sm font-semibold text-slate-700 mb-3">
        Jenis Produk
    </label>

    <div class="grid grid-cols-2 gap-3">

        <!-- Minuman -->
        <label class="cursor-pointer">
            <input
                type="radio"
                name="jenis_produk"
                value="Minuman"
                class="peer hidden"
                <?php echo e(old('jenis_produk') == 'Minuman' ? 'checked' : ''); ?>>

            <div
                class="flex items-center justify-center gap-2
                py-3 rounded-xl border
                bg-white
                transition-all duration-200
                hover:border-indigo-400
                peer-checked:bg-indigo-600
                peer-checked:border-indigo-600
                peer-checked:text-white">

                <span class="text-lg">☕</span>

                <span class="font-medium">
                    Minuman
                </span>

            </div>

        </label>

        <!-- Makanan -->
        <label class="cursor-pointer">
            <input
                type="radio"
                name="jenis_produk"
                value="Makanan"
                class="peer hidden"
                <?php echo e(old('jenis_produk') == 'Makanan' ? 'checked' : ''); ?>>

            <div
                class="flex items-center justify-center gap-2
                py-3 rounded-xl border
                bg-white
                transition-all duration-200
                hover:border-indigo-400
                peer-checked:bg-indigo-600
                peer-checked:border-indigo-600
                peer-checked:text-white">

                <span class="text-lg">🍽️</span>

                <span class="font-medium">
                    Makanan
                </span>

            </div>

        </label>

    </div>

    <?php $__errorArgs = ['jenis_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-red-500 text-sm mt-2">
            <?php echo e($message); ?>

        </p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>

                    <!-- Harga -->
                    <div class="grid md:grid-cols-2 gap-5">

                        <div>

                            <label class="font-semibold">
                                Harga Beli
                            </label>

                            <div class="flex mt-2">

                                <span class="px-4 flex items-center border rounded-l-xl bg-gray-100">
                                    Rp
                                </span>

                                <input
                                    type="number"
                                    name="harga_beli"
                                    value="<?php echo e(old('harga_beli')); ?>"
                                    class="w-full border rounded-r-xl px-4 py-3"
                                    placeholder="0">

                            </div>

                            <?php $__errorArgs = ['harga_beli'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1">
                                <?php echo e($message); ?>

                            </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>

                        <div>

                            <label class="font-semibold">
                                Harga Jual
                            </label>

                            <div class="flex mt-2">

                                <span class="px-4 flex items-center border rounded-l-xl bg-gray-100">
                                    Rp
                                </span>

                                <input
                                    type="number"
                                    name="harga_jual"
                                    value="<?php echo e(old('harga_jual')); ?>"
                                    class="w-full border rounded-r-xl px-4 py-3"
                                    placeholder="0">

                            </div>

                            <?php $__errorArgs = ['harga_jual'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1">
                                <?php echo e($message); ?>

                            </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>

                    </div>

                    <!-- Stok -->
                    <div>

                        <label class="font-semibold">
                            Stok
                        </label>

                        <input
                            type="number"
                            name="stok"
                            value="<?php echo e(old('stok')); ?>"
                            class="mt-2 w-full rounded-xl border px-5 py-3"
                            placeholder="0">

                        <?php $__errorArgs = ['stok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1">
                            <?php echo e($message); ?>

                        </p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <div class="bg-indigo-50 rounded-2xl p-5">

                        <h4 class="font-semibold text-indigo-700">
                            Informasi
                        </h4>

                        <p class="text-indigo-600 text-sm mt-1">
                            Pastikan semua data telah benar sebelum menyimpan produk.
                        </p>

                    </div>

                </div>

            </div>

            <div class="border-t bg-slate-50 p-6 flex justify-end gap-3">

                <a href="<?php echo e(route('produk.index')); ?>"
                    class="px-8 py-3 rounded-xl border font-semibold hover:bg-gray-100">

                    Batal

                </a>

                <button type="submit"
                    class="px-8 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold">

                    Simpan Produk

                </button>

            </div>

        </div>

    </form>

</div>

<script>
function previewImage(event){
    let reader = new FileReader();

    reader.onload = function(){
        document.getElementById('preview').src = reader.result;
    }

    if(event.target.files[0]){
        reader.readAsDataURL(event.target.files[0]);
    }
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_faiq\resources\views/produk/create.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title','Edit Produk'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-3xl mx-auto">

    <div class="mb-6">

        <a href="<?php echo e(route('produk.index')); ?>"
            class="text-slate-500 hover:text-indigo-600">

            ← Kembali

        </a>

        <h1 class="text-3xl font-bold mt-3">

            Edit Produk

        </h1>

    </div>

    <div class="bg-white rounded-2xl shadow p-6">

        <form
            action="<?php echo e(route('produk.update',$produk->id)); ?>"
            method="POST"
            enctype="multipart/form-data">

            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            

            <div class="mb-6">

                <label class="block font-medium mb-2">

                    Foto Produk

                </label>

                <?php if($produk->foto): ?>

                    <img
                        src="<?php echo e(asset('storage/'.$produk->foto)); ?>"
                        class="w-40 h-40 rounded-xl object-cover border mb-3">

                <?php endif; ?>

                <input
                    type="file"
                    name="foto"
                    accept="image/*"
                    onchange="previewImage(event)"
                    class="w-full border rounded-xl p-2">

                <?php $__errorArgs = ['foto'];
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

                <img
                    id="preview"
                    class="hidden mt-3 w-40 h-40 rounded-xl border object-cover">

            </div>

            

            <div class="mb-5">

                <label class="block font-medium mb-2">

                    Nama Produk

                </label>

                <input
                    type="text"
                    name="nama"
                    value="<?php echo e(old('nama',$produk->nama)); ?>"
                    class="w-full border rounded-xl p-3">

            </div>

            

            <div class="mb-5">

                <label class="block font-medium mb-2">

                    Harga Beli

                </label>

                <input
                    type="number"
                    name="harga_beli"
                    value="<?php echo e(old('harga_beli',$produk->harga_beli)); ?>"
                    class="w-full border rounded-xl p-3">

            </div>

            

            <div class="mb-5">

                <label class="block font-medium mb-2">

                    Harga Jual

                </label>

                <input
                    type="number"
                    name="harga_jual"
                    value="<?php echo e(old('harga_jual',$produk->harga_jual)); ?>"
                    class="w-full border rounded-xl p-3">

            </div>

            

            <div class="mb-5">

                <label class="block font-medium mb-2">

                    Stok

                </label>

                <input
                    type="number"
                    name="stok"
                    value="<?php echo e(old('stok',$produk->stok)); ?>"
                    class="w-full border rounded-xl p-3">

            </div>

            <div class="flex gap-3">

                <button
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl">

                    Update

                </button>

                <a
                    href="<?php echo e(route('produk.index')); ?>"
                    class="bg-gray-300 px-6 py-3 rounded-xl">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

<script>

function previewImage(event){

    const reader = new FileReader();

    reader.onload = function(){

        let output=document.getElementById('preview');

        output.src=reader.result;

        output.classList.remove('hidden');

    }

    reader.readAsDataURL(event.target.files[0]);

}

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_faiq\resources\views/produk/edit.blade.php ENDPATH**/ ?>
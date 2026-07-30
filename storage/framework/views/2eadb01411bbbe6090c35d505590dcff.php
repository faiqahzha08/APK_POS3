<?php $__env->startSection('title', 'Produk - POS'); ?>

<?php $__env->startSection('content'); ?>

<!-- Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl sm:text-3xl font-bold text-slate-900">
            Daftar Produk
        </h1>

        <p class="text-sm text-slate-500 mt-1">
            Kelola semua produk yang tersedia di toko
        </p>
    </div>

    <a href="<?php echo e(route('produk.create')); ?>"
        class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl">

        <i data-lucide="plus" class="w-4 h-4"></i>

        Tambah Produk

    </a>

</div>

<!-- Search -->
<div class="bg-white rounded-2xl shadow border border-slate-200 p-5 mb-6">

    <form method="GET" action="<?php echo e(route('produk.index')); ?>"
        class="flex flex-col sm:flex-row gap-3">

        <input
            type="text"
            name="search"
            value="<?php echo e(request('search')); ?>"
            placeholder="Cari produk..."
            class="flex-1 border rounded-xl px-4 py-2">

        <select
            name="stok"
            class="border rounded-xl px-4 py-2">

            <option value="">Semua Stok</option>

            <option value="aman"
                <?php echo e(request('stok')=='aman' ? 'selected' : ''); ?>>
                Aman
            </option>

            <option value="rendah"
                <?php echo e(request('stok')=='rendah' ? 'selected' : ''); ?>>
                Rendah
            </option>

            <option value="habis"
                <?php echo e(request('stok')=='habis' ? 'selected' : ''); ?>>
                Habis
            </option>

        </select>

        <button
            class="bg-slate-800 text-white rounded-xl px-5">

            Filter

        </button>

    </form>

</div>

<!-- Table -->

<div class="bg-white rounded-2xl shadow border border-slate-200 overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full text-sm">

            <thead>

                <tr class="bg-slate-50 border-b">

                    <th class="px-6 py-3 text-left">#</th>

                    <th class="px-6 py-3 text-left">
                        Foto
                    </th>

                    <th class="px-6 py-3 text-left">
                        Nama Produk
                    </th>

                    <th class="px-6 py-3 text-left">
                        Harga Beli
                    </th>

                    <th class="px-6 py-3 text-left">
                        Harga Jual
                    </th>

                    <th class="px-6 py-3 text-center">
                        Stok
                    </th>

                    <th class="px-6 py-3 text-right">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y">

                <?php $__empty_1 = true; $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <tr class="hover:bg-slate-50">

                    <td class="px-6 py-4">

                        <?php echo e($produks->firstItem()+$index); ?>


                    </td>

                    <td class="px-6 py-4">

                        <?php if($produk->foto): ?>

                            <img
                                src="<?php echo e(asset('storage/'.$produk->foto)); ?>"
                                class="w-16 h-16 rounded-xl object-cover border">

                        <?php else: ?>

                            <div
                                class="w-16 h-16 rounded-xl border bg-slate-100 flex items-center justify-center text-xs text-slate-500">

                                No Image

                            </div>

                        <?php endif; ?>

                    </td>

                    <td class="px-6 py-4">

                        <div class="font-semibold">

                            <?php echo e($produk->nama); ?>


                        </div>

                    </td>

                    <td class="px-6 py-4">

                        Rp <?php echo e(number_format($produk->harga_beli,0,',','.')); ?>


                    </td>

                    <td class="px-6 py-4 font-semibold text-green-600">

                        Rp <?php echo e(number_format($produk->harga_jual,0,',','.')); ?>


                    </td>

                    <td class="px-6 py-4 text-center">

                        <?php if($produk->stok==0): ?>

                            <span
                                class="px-3 py-1 rounded-full bg-red-100 text-red-600 text-xs">

                                Habis

                            </span>

                        <?php elseif($produk->stok<10): ?>

                            <span
                                class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs">

                                <?php echo e($produk->stok); ?>


                            </span>

                        <?php else: ?>

                            <span
                                class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">

                                <?php echo e($produk->stok); ?>


                            </span>

                        <?php endif; ?>

                    </td>

                    <td class="px-6 py-4">

                        <div class="flex justify-end gap-2">

                            
                            <a
                                href="<?php echo e(route('produk.show',$produk->id)); ?>"
                                class="p-2 rounded-lg bg-blue-100 hover:bg-blue-200">

                                <i data-lucide="eye"
                                    class="w-4 h-4 text-blue-700"></i>

                            </a>

                            
                            <a
                                href="<?php echo e(route('produk.edit',$produk->id)); ?>"
                                class="p-2 rounded-lg bg-yellow-100 hover:bg-yellow-200">

                                <i data-lucide="pencil"
                                    class="w-4 h-4 text-yellow-700"></i>

                            </a>

                            
                            <form
                                action="<?php echo e(route('produk.destroy',$produk->id)); ?>"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button
                                    class="p-2 rounded-lg bg-red-100 hover:bg-red-200">

                                    <i
                                        data-lucide="trash-2"
                                        class="w-4 h-4 text-red-700"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <tr>

                    <td colspan="7"
                        class="text-center py-10 text-slate-500">

                        Belum ada produk

                    </td>

                </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

    <div class="p-5 border-t">

        <?php echo e($produks->links()); ?>


    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_faiq\resources\views/produk/index.blade.php ENDPATH**/ ?>
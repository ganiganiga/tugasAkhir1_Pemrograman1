

<?php $__env->startSection('content'); ?>

<div class="p-8 bg-gradient-to-br from-gray-50 to-gray-200 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Kelola Produk</h1>
                <p class="text-gray-600">Total <?php echo e($products->count()); ?> produk</p>
            </div>
            <a href="/admin/products/create"
               class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition-colors flex items-center gap-2">
                <i class="bi bi-plus-circle"></i>
                Tambah Produk
            </a>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <!-- Product Image -->
                <div class="relative">
                    <img src="<?php echo e($product->image); ?>"
                         class="w-full h-48 object-cover"
                         alt="<?php echo e($product->name); ?>">
                    <?php if($product->collection): ?>
                    <span class="absolute top-2 left-2 bg-gray-500 text-white text-xs px-2 py-1 rounded-full">
                        <?php echo e($product->collection); ?>

                    </span>
                    <?php endif; ?>
                    <span class="absolute top-2 right-2 
                        'bg-green-600' : 'bg-red-600' }}
                        text-black text-xs px-2 py-1 rounded-full shadow">
                        Stok: <?php echo e($product->stok); ?>

                    </span>
                </div>

                <!-- Product Info -->
                <div class="p-4">
                    <h3 class="font-semibold text-gray-900 mb-1 truncate"><?php echo e($product->name); ?></h3>
                    <p class="text-lg font-bold text-blue-600 mb-2">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></p>

                    <?php if($product->description): ?>
                    <p class="text-sm text-gray-600 mb-3 line-clamp-2"><?php echo e(Str::limit($product->description, 60)); ?></p>
                    <?php endif; ?>

                    <!-- Actions -->
                    <div class="flex gap-2">
                        <a href="/admin/products/<?php echo e($product->id); ?>/edit"
                           class="flex-1 bg-gray-100 text-gray-700 px-3 py-2 rounded-lg hover:bg-gray-200 transition-colors text-center text-sm">
                            <i class="bi bi-pencil mr-1"></i>Edit
                        </a>
                        <form action="/admin/products/<?php echo e($product->id); ?>"
                              method="POST"
                              onsubmit="return confirm('Yakin hapus produk ini?')"
                              class="flex-1">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="w-full bg-red-100 text-red-700 px-3 py-2 rounded-lg hover:bg-red-200 transition-colors text-sm">
                                <i class="bi bi-trash mr-1"></i>Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full">
                <div class="bg-white rounded-xl shadow-lg p-12 text-center">
                    <i class="bi bi-box-seam text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum ada produk</h3>
                    <p class="text-gray-600 mb-4">Mulai tambahkan produk pertama Anda</p>
                    <a href="/admin/products/create"
                       class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition-colors inline-flex items-center gap-2">
                        <i class="bi bi-plus-circle"></i>
                        Tambah Produk Pertama
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\algha\Downloads\FEBEOptik\FEBEOptik\resources\views/admin/products/index.blade.php ENDPATH**/ ?>
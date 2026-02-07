

<?php $__env->startSection('content'); ?>

<div class="p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Edit Product</h1>

        <div class="bg-white rounded-lg shadow-sm border p-6">
            <form method="POST" action="/admin/products/<?php echo e($product->id); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Product Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
                        <input
                            type="text"
                            name="name"
                            value="<?php echo e($product->name); ?>"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            required
                        >
                    </div>

                    <!-- Price -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Price (IDR)</label>
                        <input
                            type="number"
                            name="price"
                            value="<?php echo e($product->price); ?>"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            required
                        >
                    </div>

                    <!-- Collection -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Collection</label>
                        <select
                            name="collection"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                            <option value="">Select Collection</option>
                            <option value="Classic" <?php echo e($product->collection == 'Classic' ? 'selected' : ''); ?>>Classic</option>
                            <option value="Modern" <?php echo e($product->collection == 'Modern' ? 'selected' : ''); ?>>Modern</option>
                            <option value="Sport" <?php echo e($product->collection == 'Sport' ? 'selected' : ''); ?>>Sport</option>
                            <option value="Kids" <?php echo e($product->collection == 'Kids' ? 'selected' : ''); ?>>Kids</option>
                        </select>
                    </div>

                    <!-- Main Image URL -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Main Image URL</label>
                        <input
                            type="text"
                            name="image"
                            value="<?php echo e($product->image); ?>"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Hover Image URL -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Hover Image URL</label>
                        <input
                            type="text"
                            name="image_hover"
                            value="<?php echo e($product->image_hover); ?>"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                    </div>
                </div>

                <!-- Description -->
                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea
                        name="description"
                        rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    ><?php echo e($product->description); ?></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Stock</label>
                    <input
                        type="number"
                        name="stok"
                        value="<?php echo e($product->stok); ?>"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    >
                </div>

                <!-- Image Preview -->
                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Image Preview</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php if($product->image): ?>
                        <div class="border rounded-lg p-2">
                            <p class="text-xs text-gray-500 mb-1">Main Image</p>
                            <img src="<?php echo e($product->image); ?>" alt="Main" class="w-full h-32 object-cover rounded">
                        </div>
                        <?php endif; ?>
                        <?php if($product->image_hover): ?>
                        <div class="border rounded-lg p-2">
                            <p class="text-xs text-gray-500 mb-1">Hover Image</p>
                            <img src="<?php echo e($product->image_hover); ?>" alt="Hover" class="w-full h-32 object-cover rounded">
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="mt-8 flex gap-4">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Update Product
                    </button>
                    <a href="/admin/products" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\algha\Downloads\FEBEOptik\FEBEOptik\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>
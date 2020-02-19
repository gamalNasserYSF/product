<?php $__env->startSection('body'); ?>

    <input type="hidden" id="url" value="<?php echo e(url('/')); ?>">

    <!-- products section -->
    <section class="products-section">
        <div class="container">
            <div class="row justify-content-center">

                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- product -->
                    <div class="col-11 col-md-6 col-xl-4">
                        <div class="product">
                            <div class="d-flex flex-wrap">
                                <div id="<?php echo e($product->id); ?>" onclick="getProductInfo(this.id)"  class="product-image col-sm-5 p-0"
                                    style="background-image: url('<?php echo e($product->image); ?>')">
                                    <a href="#"></a>
                                </div>
                                <div class="content col-sm-7">
                                    <h2 class="product-name" id="<?php echo e($product->id); ?>" onclick="getProductInfo(this.id)" ><?php echo e($product->title); ?></h2>
                                    <span class="date" id="<?php echo e($product->id); ?>" onclick="getProductInfo(this.id)" > <?php echo e(date('M d, Y', strtotime($product->created_at))); ?></span>
                                    <p class="text" id="<?php echo e($product->id); ?>" onclick="getProductInfo(this.id)" ><?php echo e($product->description); ?></p>
                                    <div class="more-info">
                                        <a href="<?php echo e(url('/product/'.$product->id)); ?>">More Info</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end product -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>

        <?php echo $__env->make('product-info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </section>
    <!-- end products section -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
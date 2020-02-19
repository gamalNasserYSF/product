<?php $__env->startSection('body'); ?>

    <div class="card">
        <img src="<?php echo e($product->image); ?>" alt="John" style="margin: auto;text-align: center;width:50%">
        <h1> <?php echo e($product->title); ?></h1>
        <p class="title"> <?php echo e(date('M d, Y', strtotime($product->created_at))); ?> </p>

        <p class="title">Attributes:
            <br>
            <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                Price: <?php echo e($attr->price); ?> <br>
                Color: <?php echo e($attr->color); ?> <br>
                Size:  <?php echo e($attr->size); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </p>

        <p><?php echo e($product->description); ?></p>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
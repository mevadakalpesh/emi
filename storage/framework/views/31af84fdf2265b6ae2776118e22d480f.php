<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
              <a  href="<?php echo e(route('emi-details')); ?>" class="btn btn-info">
                process
              </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Clientid</th>
                            <th scope="col">Num of Payment</th>
                            <th scope="col">First Payment Date</th>
                            <th scope="col">Last Payment Date</th>
                            <th scope="col">Load Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->clientid); ?></td>
                                <td><?php echo e($item->num_of_payment); ?></td>
                                <td><?php echo e($item->first_payment_date); ?></td>
                                <td><?php echo e($item->last_payment_date); ?></td>
                                <td><?php echo e(number_format($item->load_amount,2)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /data/data/com.termux/files/home/emi/resources/views/load/load-details.blade.php ENDPATH**/ ?>
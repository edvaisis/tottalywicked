<?php $__currentLoopData = $character['episode']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episodeUrl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $episodeResponse = Http::get($episodeUrl);
        $episodeName = $episodeResponse->json()['name'];
    ?>
    <p><strong>Movie:</strong> <?php echo e($episodeName); ?></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\Eds pc\Documents\totallywicked_test_23\totallywicked\resources\views/other-movies.blade.php ENDPATH**/ ?>
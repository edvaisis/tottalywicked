<?php $__env->startSection('header'); ?>
    <h1 style="margin:10rem;">Rick and Morty Api</h1>
    <?php echo $__env->make('components.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .truncate-text {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 150px; /* Adjust the value as needed */
        }

    </style>
    <div class="row">

        <?php $__currentLoopData = $characters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $character): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <div class="media">
                    <img src="<?php echo e($character['image']); ?>" class="mr-3 character-img" alt="<?php echo e($character['name']); ?>">
                    <div class="media-body">
                        <h5 class="card-title mt-4"><?php echo e($character['name']); ?></h5>
                        <p class="card-text"><strong>Species:</strong> <?php echo e($character['species']); ?></p>
                        <p class="card-text"><strong>Origin:</strong> <?php echo e($character['origin']['name']); ?></p>
                        <div class="info">
                            <?php
                                $firstEpisodeResponse = Http::get($character['episode'][0]);
                                $firstEpisodeName = $firstEpisodeResponse->json()['name'];
                            ?>

                                <!-- Display the first episode name in a <p> tag -->
                            <a><strong>Movies:</strong> <?php echo e($firstEpisodeName); ?></a>

                            <!-- Display the other episodes as collapsed hyperlinks -->
                            <div class="accordion" id="characterAccordion<?php echo e($loop->index); ?>">
                                <?php $__currentLoopData = $character['episode']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $episodeUrl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key > 0): ?>
                                        <?php
                                            $episodeResponse = Http::get($episodeUrl);
                                            $episodeName = $episodeResponse->json()['name'];
                                        ?>
                                        <div class="card">
                                            <div class="card-header" id="heading<?php echo e($loop->parent->index); ?><?php echo e($key); ?>">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($loop->parent->index); ?><?php echo e($key); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($loop->parent->index); ?><?php echo e($key); ?>">
                                                        <?php echo e($episodeName); ?>

                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapse<?php echo e($loop->parent->index); ?><?php echo e($key); ?>" class="collapse" aria-labelledby="heading<?php echo e($loop->parent->index); ?><?php echo e($key); ?>" data-parent="#characterAccordion<?php echo e($loop->index); ?>">
                                                <div class="card-body">
                                                    <!-- Additional information or details about the movie can be added here -->
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




    </div>

    <?php echo e($characters->appends(request()->except('page'))->links('pagination.links')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Eds pc\Documents\totallywicked_test_23\totallywicked\resources\views/index.blade.php ENDPATH**/ ?>
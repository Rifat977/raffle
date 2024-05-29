<style>
    .custom-card {
        background-color: #20204e;
        color: #fff;
        border: none;
        border-bottom-left-radius: 15px; /* Set the bottom-left border radius */
        overflow: hidden; /* Ensure content respects the border radius */
    }

    .custom-card img {
        width: 100%;
        height: auto;
        position: relative; /* Set position relative for absolute positioning */
    }

    .draw-date {
        position: absolute;
        bottom: -12px;
        left: 35%;
        transform: translateX(-60%);
        background-color: #d9a131;
        padding: 3px 20px;
        border-radius: 6px;
        font-size: 14px;
    }

    .custom-card .card-body {
        background-color: #20204e;
        color: #fff;
        padding: 10px;
    }

    .sold-percent {
        font-size: 12px; /* Decrease font size for sold percentage */
    }

    .full-width-btn {
        width: 100%;
        font-weight: 900;
    }
</style>

<div class="row">
    <?php $__empty_1 = true; $__currentLoopData = $phases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-3 mb-4">
            <div class="card custom-card shadow">
                <div class="position-relative">
                    <img class="card-img-top" src="https://cdn.pristinecompetitions.co.uk/wp-content/uploads/2024/05/large-Blade-Moretti-Starter-Pack-768x768.jpg" alt="image">
                    <div class="draw-date">DRAW <?php echo e(date('D d M', strtotime($phase->draw_date))); ?></div>
                </div>
                <div class="card-body p-3">
                    <h5 class="card-title mt-4"><?php echo e(__($phase->lottery->name)); ?></h5>
                    <p class="card-text">
                        <span class="sold-percent">Sold: <?php echo e(getAmount(($phase->sold / $phase->quantity) * 100)); ?>%</span>
                    </p>
                    <div class="progress lottery--progress mb-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?php echo e(($phase->sold / $phase->quantity) * 100); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e(($phase->sold / $phase->quantity) * 100); ?>%"></div>
                    </div>
                    <h5 class="mt-3"><?php echo e($general->cur_sym); ?><?php echo e(showAmount($phase->lottery->price)); ?> <span class="sold-percent">per entry</span></h5>
                    <div class="mt-2">
                        <?php  echo $phase->DrawBadge; ?>
                    </div>
                    <a class="btn btn-sm btn-outline--primary mt-3 btn--capsule full-width-btn" href="<?php if(request()->routeIs('user.*')): ?> <?php echo e(route('user.lottery.details', $phase->id)); ?> <?php else: ?> <?php echo e(route('lottery.details', $phase->id)); ?> <?php endif; ?>">
                        <?php if(@request()->routeIs('user.home')): ?>
                            <?php echo app('translator')->get('Play Now'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->get('Enter Now'); ?>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12">
            <div class="alert alert-warning text-center">
                <?php echo e(__($emptyMessage)); ?>

            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /srv/http/Files/core/resources/views/templates/basic/partials/lotteries.blade.php ENDPATH**/ ?>
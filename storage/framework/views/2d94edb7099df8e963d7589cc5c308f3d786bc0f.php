

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('main'); ?>

<div class="main-content">
    <section class="section">
        
            <div class="card">
                <div class="card-header">
                    <?php echo e(__('Dashboard')); ?>

                    <br/>
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(__('You are logged in as ')); ?> 
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Manage Siswa</h4>
                                    </div>
                                    <div class="card-body">
                                        <a href="<?php echo e(route('reports.index')); ?>">
                                            <button class="btn btn-warning">Input Report Siswa</button>
                                        </a>
                                        <a href="<?php echo e(route('reports.wali-index')); ?>">
                                            <button class="btn btn-warning">View Siswa</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>

                <div class="card-footer">
                    <form action="<?php echo e(route("logout")); ?>" method="GET">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-danger" style="cursor:pointer">Sign Out</button>
                       </form>
                </div>
            </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.wali-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/Wali/dashboard.blade.php ENDPATH**/ ?>


<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('main'); ?>

<div class="main-content">
    <section class="section">

                <div class="section-header">
                    <h1>Dashboard</h1>
                </div>

                <div class="section-body">
                    <h2 class="section-title">Wali Kelas Dashboard</h2>
                
                    <div class="row">

                        <div class="col-12 mb-4">
                            <div class="hero bg-warning text-white">
                                <div class="hero-inner">
                                    <h2>Lapor Pelanggaran</h2>
                                    <p class="lead">Laporkan pelanggaran yang dilakukan siswa-siswi melalui form.</p>
                                    <div class="mt-4">
                                        <a href="<?php echo e(route('reports.index')); ?>"
                                            class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-pen"></i>
                                            Lapor</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="hero bg-success text-white">
                                <div class="hero-inner">
                                    <h2>Verifikasi Siswa</h2>
                                    <p class="lead">Verifikasi laporan pelanggaran siswa-siswi.</p>
                                    <div class="mt-4">
                                        <a href="<?php echo e(route('verification.index')); ?>"
                                            class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-user-check"></i>
                                            Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="hero bg-info text-white">
                                <div class="hero-inner">
                                    <h2>Lihat Laporan Siswa</h2>
                                    <p class="lead">Melihat daftar rincian laporan pelanggaran siswa-siswi.</p>
                                    <div class="mt-4">
                                        <a href="<?php echo e(route('reports.wali-index')); ?>"
                                            class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i>
                                            Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="hero bg-primary text-white">
                                <div class="hero-inner">
                                    <h2>Lihat Daftar Surat Peringatan</h2>
                                    <p class="lead">Melihat daftar siswa-siswi yang berstatus SP.</p>
                                    <div class="mt-4">
                                        <a href="<?php echo e(route('suratPeringatan.wali-index')); ?>"
                                            class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-envelope-open"></i>
                                            Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                </div>

                <div class="section-footer">
                    <form action="<?php echo e(route("logout")); ?>" method="GET">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-danger" style="cursor:pointer">Sign Out</button>
                       </form>
                </div>
            </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.wali-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/wali/dashboard.blade.php ENDPATH**/ ?>
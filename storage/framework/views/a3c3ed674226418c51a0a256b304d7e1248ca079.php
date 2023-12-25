

<?php $__env->startSection("title"); ?> Create Student <?php $__env->stopSection(); ?>

<?php $__env->startSection("main"); ?>
    
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Manage Siswa</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">Create new siswa</h2>
            <p class="section-lead">Silahkan isi form untuk menambah siswa baru.</p>

            <div class="row">
                <div class="col-12 col-lg-15">
                    <div class="card">
            
                        <div class="card-header">
                            <h4>Siswa Form</h4>
                            
                        </div>

                        <div class="card-body">
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <form 
                                enctype="multipart/form-data" class="bg-white shadow-sm p-3"
                                action="<?php echo e(route('reports.store')); ?>" method="POST">
                                
                                <?php echo csrf_field(); ?>

                                <label for="nis">NIS</label>
                                <input
                                value="<?php echo e(old('nis')); ?>" 
                                class="form-control <?php echo e($errors->first('nis') ? "is-invalid": ""); ?>"
                                placeholder="NIS"
                                type="text"
                                name="nis"
                                id="nis"/>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('nis')); ?>

                                </div>
                                <br>

                                <label for="name">Nama</label>
                                <input
                                value="<?php echo e(old('name')); ?>" 
                                class="form-control <?php echo e($errors->first('name') ? "is-invalid": ""); ?>"
                                placeholder="Name"
                                type="text"
                                name="name"
                                id="name"/>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('name')); ?>

                                </div>
                                <br>

                                <label for="kelas">Kelas</label>
                                <input
                                value="<?php echo e(old('kelas')); ?>" 
                                class="form-control <?php echo e($errors->first('kelas') ? "is-invalid": ""); ?>"
                                placeholder="Kelas"
                                type="text"
                                name="kelas"
                                id="kelas"/>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('kelas')); ?>

                                </div>
                                <br>

                                <button type="submit" name="action" value="cancel" class="btn btn-danger me-3">Cancel</button>
                                <button type="submit" name="action" value="save" class="btn btn-primary">Save</button>

                            </form>
                            
                        </div>
            </div>
        </div>
    </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/reports/create.blade.php ENDPATH**/ ?>
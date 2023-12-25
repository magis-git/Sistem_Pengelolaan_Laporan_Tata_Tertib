

<?php $__env->startSection("title"); ?> Create Kelas <?php $__env->stopSection(); ?>

<?php $__env->startSection("main"); ?>
    
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Manage Kelas</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">Create new kelas</h2>
            <p class="section-lead">Silahkan isi form untuk menambah kelas baru.</p>

            <div class="row">
                <div class="col-12 col-lg-15">
                    <div class="card">
            
                        <div class="card-header">
                            <h4>Kelas Form</h4>
                            
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
                                action="<?php echo e(route('kelas.store')); ?>" method="POST">
                                
                                <?php echo csrf_field(); ?>

                                <label for="kelas_number">Kelas</label>
                                <input
                                value="<?php echo e(old('kelas_number')); ?>" 
                                class="form-control <?php echo e($errors->first('kelas_number') ? "is-invalid": ""); ?>"
                                placeholder="Kelas"
                                type="text"
                                name="kelas_number"
                                id="kelas_number"/>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('kelas_number')); ?>

                                </div>
                                <br>

                                <label for="kelas_name">Nama Kelas</label>
                                <input
                                value="<?php echo e(old('kelas_name')); ?>" 
                                class="form-control <?php echo e($errors->first('kelas_name') ? "is-invalid": ""); ?>"
                                placeholder="Nama Kelas"
                                type="text"
                                name="kelas_name"
                                id="kelas_name"/>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('kelas_name')); ?>

                                </div>
                                <br>

                                <label for="walikelas_1">Wali Kelas</label>
                                <input
                                value="<?php echo e(old('walikelas_1')); ?>" 
                                class="form-control <?php echo e($errors->first('walikelas_1') ? "is-invalid": ""); ?>"
                                placeholder="Wali Kelas"
                                type="text"
                                name="walikelas_1"
                                id="walikelas_1"/>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('walikelas_1')); ?>

                                </div>
                                <br>

                                <label for="walikelas_2">Wali Kelas</label>
                                <input
                                value="<?php echo e(old('walikelas_2')); ?>" 
                                class="form-control <?php echo e($errors->first('walikelas_2') ? "is-invalid": ""); ?>"
                                placeholder="Wali Kelas"
                                type="text"
                                name="walikelas_2"
                                id="walikelas_2"/>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('walikelas_2')); ?>

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
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/kelas/create.blade.php ENDPATH**/ ?>
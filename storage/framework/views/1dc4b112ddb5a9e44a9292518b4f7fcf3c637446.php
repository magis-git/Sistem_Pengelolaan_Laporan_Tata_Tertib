

<?php $__env->startSection('title'); ?> Edit Surat Peringatan <?php $__env->stopSection(); ?> 

<?php $__env->startSection('main'); ?>
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Manage Surat Peringatan</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Surat Peringatan</h2>
            <p class="section-lead">Silahkan isi form untuk mengubah elemen Surat Peringatan.</p>

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

                            <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="<?php echo e(route('suratPeringatan.update', [$suratPeringatan->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="PUT" name="_method">
                                
                                <label for="no_sp">Nomor Surat Peringatan</label>
                                <input
                                value="<?php echo e($suratPeringatan->no_sp); ?>" 
                                class="form-control <?php echo e($errors->first('no_sp') ? "is-invalid": ""); ?>"
                                placeholder="Nomor Surat Peringatan"
                                type="text"
                                name="no_sp"
                                id="no_sp"/>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('no_sp')); ?>

                                </div>
                                <br>

                                

                                <label for="sp_desc">Deskripsi Pelanggaran</label>
                                <textarea class="form-control <?php echo e($errors->first('sp_desc') ? "is-invalid": ""); ?>" 
                                    id="sp_desc" name="sp_desc" placeholder="Masukkan deskripsi pelanggaran" rows="3">
                                    <?php echo e($suratPeringatan->sp_desc); ?></textarea>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('sp_desc')); ?>

                                </div>
                                <br>
                                
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/suratPeringatan/edit.blade.php ENDPATH**/ ?>


<?php $__env->startSection("title"); ?> Create Surat Peringatan <?php $__env->stopSection(); ?>

<?php $__env->startSection("main"); ?>
    
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Manage Surat Peringatan</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">Create new Surat Peringatan</h2>
            <p class="section-lead">Silahkan isi form untuk menambah surat peringatan baru.</p>

            <div class="row">
                <div class="col-12 col-lg-15">
                    <div class="card">
            
                        <div class="card-header">
                            <h4>Surat Peringatan Form</h4>
                            
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
                                action="<?php echo e(route('suratPeringatan.store')); ?>" method="POST">
                                
                                <?php echo csrf_field(); ?>

                                <label for="no_sp">Nomor Surat Peringatan</label>
                                <input
                                value="<?php echo e(old('no_sp')); ?>" 
                                class="form-control <?php echo e($errors->first('no_sp') ? "is-invalid": ""); ?>"
                                placeholder="Nomor Surat Peringatan"
                                type="text"
                                name="no_sp"
                                id="no_sp"/>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('no_sp')); ?>

                                </div>
                                <br>

                                <div class="section-title">Pilih Siswa</div>
                                <label for="selected_students">Pilih siswa:</label><br>
                                <div class="form-group">
                                    <label>List Siswa</label>
                                    <select class="form-control select2"
                                        name="selected_students[]"
                                    >
                                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($student->id); ?>"><?php echo e($student->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                

                                <label for="sp_desc">Deskripsi Pelanggaran</label>
                                <textarea class="form-control <?php echo e($errors->first('sp_desc') ? "is-invalid": ""); ?>" 
                                    id="sp_desc" name="sp_desc" placeholder="Masukkan deskripsi pelanggaran" rows="3"></textarea>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('sp_desc')); ?>

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
<?php echo $__env->make("layouts.global", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/suratPeringatan/create.blade.php ENDPATH**/ ?>
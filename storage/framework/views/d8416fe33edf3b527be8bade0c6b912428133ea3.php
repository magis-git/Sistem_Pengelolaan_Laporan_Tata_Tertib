

<?php $__env->startSection('title'); ?> Edit Pelanggaran <?php $__env->stopSection(); ?> 

<?php $__env->startSection('main'); ?>
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Manage Pelanggaran</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Pelanggaran</h2>
            <p class="section-lead">Silahkan isi form untuk mengubah elemen pelanggaran.</p>

            <div class="row">
                <div class="col-12 col-lg-15">
                    <div class="card">
            
                        <div class="card-header">
                            <h4>Pelanggaran Form</h4>
                            
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

                            <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="<?php echo e(route('violation.update', [$violation->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="PUT" name="_method">
                                <label for="violation_name">Nama Pelanggaran</label>
                                <input
                                value="<?php echo e($violation->violation_name); ?>" 
                                class="form-control <?php echo e($errors->first('violation_name') ? "is-invalid": ""); ?>"
                                placeholder="Violation"
                                type="text"
                                name="violation_name"
                                id="violation_name"/>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('violation_name')); ?>

                                </div>
                                <br>


                                <label for="violation_level">
                                    <span class=""> Tingkat Pelanggaran: </span>
                                    <select class="block w-full mt-1" name="violation_level">
                                        <option value=" " class="form-control <?php echo e($errors->first('violation_level') ? "is-invalid": ""); ?>">Select User Level</option>
                                        <option value="p1" class="form-control <?php echo e($errors->first('violation_level') ? "is-invalid": ""); ?>">Pelanggaran Tingkat-1</option>
                                        <option value="p2" class="form-control <?php echo e($errors->first('violation_level') ? "is-invalid": ""); ?>">Pelanggaran Tingkat-2</option>
                                        <option value="p3" class="form-control <?php echo e($errors->first('violation_level') ? "is-invalid": ""); ?>">Pelanggaran Tingkat-3</option>
                                        <option value="p4" class="form-control <?php echo e($errors->first('violation_level') ? "is-invalid": ""); ?>">Pelanggaran Tingkat-4</option>
                                        <option value="p5" class="form-control <?php echo e($errors->first('violation_level') ? "is-invalid": ""); ?>">Pelanggaran Tingkat-5</option>
                                    </select>
                                </label>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('violation_level')); ?>

                                </div>
                                <br/>
                                
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/violation/edit.blade.php ENDPATH**/ ?>
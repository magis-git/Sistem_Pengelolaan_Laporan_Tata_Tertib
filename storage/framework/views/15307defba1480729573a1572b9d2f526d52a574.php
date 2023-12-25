

<?php $__env->startSection('title'); ?> Edit Student Report <?php $__env->stopSection(); ?> 

<?php $__env->startSection('main'); ?>
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Lapor Pelanggaran</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">Create new laporan</h2>
            <p class="section-lead">Silahkan isi form untuk menambah laporan baru.</p>

            <div class="row">
                <div class="col-12 col-lg-15">
                    <div class="card">
            
                        <div class="card-header">
                            <h4>Laporan Form</h4>
                        </div>

                <div class="card-body">
                    <div class="card-header">
                        <h4>Description Form</h4>
                    </div>

                    <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="<?php echo e(route('reports.update', [$report->id])); ?>" method="POST"
                        onsubmit="return confirmSubmit()">
                        <?php echo csrf_field(); ?>

                        <label for="report_desc">Deskripsi Laporan</label>
                        <input class="form-control <?php echo e($errors->first('report_desc') ? "is-invalid": ""); ?>" 
                            type="text"
                            id="report_desc" 
                            name="report_desc"
                            value="<?php echo e($report->report_desc); ?>"
                            />
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('report_desc')); ?>

                        </div>
                        <br>
                        
                        <label for="reporter_name">Nama Pelapor</label>
                        <input
                        
                        value="<?php echo e(old('reporter_name', $report->reporter_name)); ?>" 
                        class="form-control <?php echo e($errors->first('reporter_name') ? "is-invalid": ""); ?>" 
                        type="text"
                        name="reporter_name"
                        id="reporter_name"/>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('reporter_name')); ?>

                        </div>
            
                    <div class="card-header">
                        <h4>Siswa Form</h4>
                    </div>
    
                        <input type="hidden" value="PUT" name="_method">
                        <label for="name">Nama Siswa</label>
                        <input
                            disabled 
                            value="<?php echo e(old('name') ? old('name') : $student->name); ?>" 
                            class="form-control <?php echo e($errors->first('name') ? "is-invalid" : ""); ?>" 
                            placeholder="Full Name" 
                            type="text" 
                            name="name" 
                            id="name"/>
                        <br>

                        <label for="p1">Pelanggaran Tingkat-1</label>
                        <input
                        type="number" id="p1" name="p1" 
                        class="form-control <?php echo e($errors->first('p1') ? "is-invalid" : ""); ?>"
                        value="<?php echo e(old('p1', $report->p1)); ?>"
                        />
                        <div class="invalid-feedback">
                           <?php echo e($errors->first('p1')); ?>

                        </div>
                        <br>

                        <label for="p2">Pelanggaran Tingkat-2</label>
                        <input
                        type="number" id="p2" name="p2" 
                        class="form-control <?php echo e($errors->first('p2') ? "is-invalid" : ""); ?>"
                        value="<?php echo e(old('p2', $report->p2)); ?>"
                        />
                        <div class="invalid-feedback">
                           <?php echo e($errors->first('p2')); ?>

                        </div>
                        <br>

                        <label for="p3">Pelanggaran Tingkat-3</label>
                        <input
                        type="number" id="p3" name="p3" 
                        class="form-control <?php echo e($errors->first('p3') ? "is-invalid" : ""); ?>"
                        value="<?php echo e(old('p3',$report->p3)); ?>"
                        />
                        <div class="invalid-feedback">
                           <?php echo e($errors->first('p3')); ?>

                        </div>
                        <br>

                        <label for="p4">Pelanggaran Tingkat-4</label>
                        <input
                        type="number" id="p4" name="p4" 
                        class="form-control <?php echo e($errors->first('p4') ? "is-invalid" : ""); ?>"
                        value="<?php echo e(old('p4', $report->p4)); ?>"
                        />
                        <div class="invalid-feedback">
                           <?php echo e($errors->first('p4')); ?>

                        </div>
                        <br>

                        <label for="p5">Pelanggaran Tingkat-5</label>
                        <input
                        type="number" id="p5" name="p5" 
                        class="form-control <?php echo e($errors->first('p5') ? "is-invalid" : ""); ?>"
                        value="<?php echo e(old('p5',$report->p5)); ?>"
                        />
                        <div class="invalid-feedback">
                           <?php echo e($errors->first('p5')); ?>

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

<script>
    function confirmSubmit() {
        var agree = confirm("Are you sure you want to submit the report?");
        if (agree) {
            document.forms[0].submit();
        }
        else {
            return false;
        }
    }
</script>

<?php $__env->stopSection(); ?> 

<?php echo $__env->make('layouts.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/reports/edit.blade.php ENDPATH**/ ?>
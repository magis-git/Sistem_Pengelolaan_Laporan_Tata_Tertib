

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


                    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="<?php echo e(route('report2.update', [$violation->id])); ?>" method="POST"
                        onsubmit="return confirmSubmit()">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" value="PUT" name="_method">
    
                        <label for="report_desc">Deskripsi Laporan</label>
                        <input class="form-control <?php echo e($errors->first('report_desc') ? "is-invalid": ""); ?>" 
                            type="text"
                            id="report_desc" 
                            name="report_desc"
                            value="<?php echo e($violation->violation_name); ?>"
                            />
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('report_desc')); ?>

                        </div>
                        <br>
                        
                        <label for="reporter_name">Nama Pelapor</label>
                        <input
                        value="<?php echo e($username); ?>" 
                        class="form-control <?php echo e($errors->first('reporter_name') ? "is-invalid": ""); ?>" 
                        type="text"
                        name="reporter_name"
                        id="reporter_name"/>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('reporter_name')); ?>

                        </div>

                        
                        <div class="section-title">Pilih Siswa</div>
                                
                                <div class="form-group">
                                    <label>List Siswa</label>
                                    <select class="form-control select2"
                                        name="selected_students[]" 
                                        multiple>
                                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option student="<?php echo e($student->id); ?>"><?php echo e($student->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
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

<?php echo $__env->make('layouts.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/report2/edit.blade.php ENDPATH**/ ?>
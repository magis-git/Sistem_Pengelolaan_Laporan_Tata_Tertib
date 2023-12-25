

<?php $__env->startSection("title"); ?> Violation List <?php $__env->stopSection(); ?>

<?php $__env->startSection("main"); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manage Pelanggaran</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">List Pelanggaran </h2>
            <p class="section-lead">Silahkan cari pelanggaran melalui kolom pencarian.</p>

            <div class="row">
                <div class="col-12 col-lg-15">
                    
                    <div class="card">
                        <div class="card-header">
                            <a href="<?php echo e(route('admin.dashboard')); ?>"><button type="submit" name="action" 
                                class="btn btn-primary me-3"><i class="fas fa-home"></i> Home</button></a>    
                            <a href="<?php echo e(route('violation.create')); ?>">
                                <button class="btn btn-primary"><i class="fas fa-plus"></i> Create Pelanggaran</button>
                            </a>    
                        </div>

                            <div class="card-body">

                                <table id="violation-table" class="table table-bordered">
                                    <thead>
                                        <th><b>Nama Pelanggaran</b></th>
                                        <th><b>Tingkat Pelanggaran</b></th>
                                        
                                        <th><b>Action</b></th>
                                    </thead>

                                    <tbody>
                                        <?php $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <td><?php echo e($violation->violation_name); ?></td>
                                                <td><?php echo e($violation->violation_level); ?></td>
                                                
                                                <td>
                                                    <a 
                                                    class="btn btn-primary text-white btn-sm" 
                                                    href="<?php echo e(route('violation.edit', [$violation->id])); ?>">Edit</a>
                                                    
                                                    <form 
                                                        onsubmit="return confirm('Delete this pelanggaran permanently?')" 
                                                        class="d-inline" 
                                                        action="<?php echo e(route('violation.destroy', [$violation->id ])); ?>" 
                                                        method="POST">

                                                        <?php echo csrf_field(); ?>

                                                        <input 
                                                        type="hidden" 
                                                        name="_method" 
                                                        value="DELETE">
                                                        
                                                        <input 
                                                        type="submit" 
                                                        value="Delete" 
                                                        class="btn btn-danger btn-sm">
                                                    </form>
                                                    
                                                </td>
                                            </tr>
                                    
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>

                                </table>
                
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function(){
                $('#violation-table').DataTable();
            });

        </script>    

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/violation/index.blade.php ENDPATH**/ ?>
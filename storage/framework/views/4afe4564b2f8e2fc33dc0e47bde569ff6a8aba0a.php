

<?php $__env->startSection("title"); ?> Students List <?php $__env->stopSection(); ?>

<?php $__env->startSection("main"); ?>

<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Laporan Pelanggaran</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">List Siswa </h2>
            <p class="section-lead">Silahkan cari siswa melalui kolom pencarian lalu tekan tombol detail.</p>

                    <div class="row">
                        <div class="col-12 col-lg-15">
                            <div class="card">
                                <div class="card-header">
                                   <a href="<?php echo e(route('wali.dashboard')); ?>"><button type="submit" name="action" 
                                    class="btn btn-primary me-3"><i class="fas fa-home"></i> Home</button></a> 
                                                                                
                                </div>
                                <div class="card-body">
        
                                    <table id="students-table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                
                                                <th>Nama Siswa</th>
                                                
                                                <th>Pelapor</th>
                                                
                                                <th>Deskripsi Laporan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            
                                            <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    
                                                    <td><?php echo e($report->student_name); ?></td>
                                                    
                                                    <td><?php echo e($report->reporter_name); ?></td>
                                                    
                                                    <td><?php echo e($report->report_desc); ?></td>
                                                    <td>
                                                                                
                                                        <a 
                                                        class="btn btn-info text-white btn-sm" 
                                                        href="<?php echo e(route('reports.edit', [$report->id])); ?>">Review</a>
                                                        
                                                        <form 
                                                        onsubmit="return confirm('Delete this report permanently?')" 
                                                        class="d-inline" 
                                                        action="<?php echo e(route('verification.destroy', [$report->id ])); ?>" 
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

                    </div>

                </div>
            </section>
        </div>

        
        <script>
            $(document).ready(function(){
                $('#students-table').DataTable();
            });

        </script>    

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.wali-app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/verification/index.blade.php ENDPATH**/ ?>
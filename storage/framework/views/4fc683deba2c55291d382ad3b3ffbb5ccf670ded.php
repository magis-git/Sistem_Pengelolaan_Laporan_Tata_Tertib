

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
                                                                       
                                    <a href="<?php echo e(route('export')); ?>" class="btn btn-success">
                                        <i class="fas fa-print"></i>Export to Excel</a>
                                </div>
                                <div class="card-body">
        
                                    <table id="students-table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Total Poin</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    
                                                    <td><?php echo e($student->nis); ?></td>
                                                    <td><?php echo e($student->name); ?></td>
                                                    <td><?php echo e($student->kelas); ?></td>
                                                    <td><?php echo e($student->total_poin); ?></td>
                                                    <td>
                                                                                
                                                        <a 
                                                        href="<?php echo e(route('reports.show', [$student->id])); ?>" 
                                                        class="btn btn-primary btn-sm">Detail</a>
                                        
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
<?php echo $__env->make("layouts.wali-app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/reports/wali-index.blade.php ENDPATH**/ ?>


<?php $__env->startSection("title"); ?> Student Details <?php $__env->stopSection(); ?>

<?php $__env->startSection("main"); ?>

<div class="main-content">
    <section class="section">
        
        

            <div class="section-header">
                <h1>Laporan Pelanggaran</h1>
                
            </div>

            <div class="section-body">
                <h2 class="section-title">Rincian Laporan </h2>
                
    
                    <div class="row">
                        <div class="col-12 col-lg-15">
                            <div class="card">
                                <div class="card-header">
                                
                                    <button class="btn btn-primary" onclick="window.history.back()">
                                        <i class="fas fa-home"></i> Home</button>

                                        <a href="<?php echo e(route('export2' , [$student->id])); ?>" class="btn btn-success">
                                            <i class="fas fa-print"></i>Export to Excel</a>

                                </div>
                     
                        <div class="card-body">
                            <h4><?php echo e($student->name); ?></h4>
                            
                            <h6><?php echo e($student->nis); ?></h6>
                            
                            <br/> 
                            <table id="student-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th>Pelanggaran Tingkat-1</th>
                                        <th>Pelanggaran Tingkat-2</th>
                                        <th>Pelanggaran Tingkat-3</th>
                                        <th>Pelanggaran Tingkat-4</th>
                                        <th>Pelanggaran Tingkat-5</th>
                                        <th>Total Poin</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                                                                       
                                            <td><?php echo e($student->p1); ?></td>
                                            <td><?php echo e($student->p2); ?></td>
                                            <td><?php echo e($student->p3); ?></td>
                                            <td><?php echo e($student->p4); ?></td>
                                            <td><?php echo e($student->p5); ?></td>
                                            <td><?php echo e($student->total_poin); ?></td>
                                            
                                            
                                        </tr>
                                
                                </tbody>

                            </table>
                            <br>

                            <table id="reports-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        
                                        <th>Tanggal Lapor</th>
                                        <th>Deskripsi Pelanggaran</th>
                                        <th>Nama Pelapor</th>
                                                                        
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td><?php echo e($report->created_at); ?></td>
                                            <td><?php echo e($report->report_desc); ?></td>
                                            <td><?php echo e($report->reporter_name); ?></td>
                                            
                                            
                                            
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                                </table>
                                
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
                

        <script>
            $(document).ready(function(){
                $('#reports-table').DataTable();
                $('#student-table').DataTable();
            });

        </script>    


<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.global", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/reports/show.blade.php ENDPATH**/ ?>
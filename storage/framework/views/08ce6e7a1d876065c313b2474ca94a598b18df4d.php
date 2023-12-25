

<?php $__env->startSection("title"); ?> Students List <?php $__env->stopSection(); ?>

<?php $__env->startSection("main"); ?>

<div class="main-content">
    <section class="section">
        
        
            

            <div class="section-header">
                <h1>Lapor Pelanggaran</h1>
                
            </div>

            <div class="section-body">
                <h2 class="section-title">List Pelanggaran</h2>
                <p class="section-lead">Silahkan cari pelanggaran melalui kolom pencarian lalu tekan tombol report.</p>
                
                    <div class="row">
                        <div class="col-12 col-lg-15">
                            <div class="card">
                                <div class="card-header">
                                    <form>
                                        <button type="submit" name="action" 
                                            value="home" class="btn btn-primary me-3"><i class="fas fa-home"></i> Home</button>
                                        
                                        </form>
                                </div>
                                <div class="card-body">
                                    <table id="students-table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                
                                                <th>Nama Pelanggaran</th>
                                                                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($violation->violation_name); ?></td>
                                                                                                        
                                                    <td>
                                                        <a 
                                                        class="btn btn-info text-white btn-sm" 
                                                        href="<?php echo e(route('verification.edit', [$violation->id])); ?>">Report</a>
                                        
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
<?php echo $__env->make("layouts.global", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/reports/index.blade.php ENDPATH**/ ?>
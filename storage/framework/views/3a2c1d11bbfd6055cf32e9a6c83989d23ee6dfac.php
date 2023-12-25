

<?php $__env->startSection("title"); ?> Surat Peringatan Wali <?php $__env->stopSection(); ?>

<?php $__env->startSection("main"); ?>

<div class="main-content">
    <section class="section">
        
       
            <div class="section-header">
                <h1>Surat Peringatan</h1>
                
            </div>

            <div class="section-body">
                <h2 class="section-title">List Surat Peringatan</h2>
                <p class="section-lead">Silahkan cari siswa melalui kolom pencarian.</p>
                
                    <div class="row">
                        <div class="col-12 col-lg-15">
                            <div class="card">
                                <div class="card-header">
                                    <a href="<?php echo e(route('wali.dashboard')); ?>"><button type="submit" name="action" 
                                        class="btn btn-primary me-3"><i class="fas fa-home"></i> Home</button>
                                    </a>
                                    <a href="<?php echo e(route('suratPeringatan.create')); ?>">
                                        <button class="btn btn-success"><i class="fas fa-plus"></i> Add Surat Peringatan</button>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <table id="students-table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No Surat Peringatan</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Deskripsi Pelanggaran</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $suratPeringatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suratPeringatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    
                                                    <td><?php echo e($suratPeringatan->no_sp); ?></td>
                                                    <td><?php echo e($suratPeringatan->student_nis); ?></td>
                                                    <td><?php echo e($suratPeringatan->student_name); ?></td>
                                                    <td><?php echo e($suratPeringatan->student_kelas); ?></td>
                                                    <td><?php echo e($suratPeringatan->sp_desc); ?></td>
                                                    
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
<?php echo $__env->make("layouts.global", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/suratPeringatan/wali-index.blade.php ENDPATH**/ ?>
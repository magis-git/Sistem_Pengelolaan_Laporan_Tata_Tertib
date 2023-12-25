

<?php $__env->startSection("title"); ?> Students List <?php $__env->stopSection(); ?>

<?php $__env->startSection("main"); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manage Siswa</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">List Siswa </h2>
            <p class="section-lead">Silahkan cari siswa melalui kolom pencarian lalu tekan tombol detail.</p>

            <div class="row">
                <div class="col-12 col-lg-15">
                    <div class="card">
        
                    <div class="card-header">

                        <a href="<?php echo e(route('admin.dashboard')); ?>"><button type="submit" name="action" 
                            class="btn btn-primary me-3"><i class="fas fa-home"></i> Home</button></a>
                            
                        <a href="<?php echo e(route('reports.create')); ?>">
                            <button class="btn btn-primary"><i class="fas fa-plus"></i> Create Siswa</button>
                        </a>

                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#resetModal">
                            <i class="fas fa-sync"></i> Reset Laporan
                        </button>   
                        
                    </div>

                    <div class="card-header">

                        <form action="/import" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="file" name="file" class="btn btn-primary">
                            <button type="submit" class="btn btn-primary">Import Siswa</button>
                        </form>
                    
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
                                                class="btn btn-primary text-white btn-sm" 
                                                href="<?php echo e(route('editStudent.edit', [$student->id])); ?>">Edit</a>
                                
                                                <a 
                                                href="<?php echo e(route('reports.show', [$student->id])); ?>" 
                                                class="btn btn-primary btn-sm">Detail</a>
                                
                                                <form 
                                                onsubmit="return confirm('Delete this user permanently?')" 
                                                class="d-inline" 
                                                action="<?php echo e(route('reports.destroy', [$student->id ])); ?>" 
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


        <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="resetModalLabel">Reset All Poin Siswa</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <p>Apakah Anda yakin untuk me-reset poin semua siswa?</p>
                  </div>
                  <div class="modal-footer">
                     <form action="<?php echo e(route('reports.reset')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger">Reset All</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>

        <script>
            $(document).ready(function(){
                $('#students-table').DataTable();
            });

        </script>    

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/reports/admin-index.blade.php ENDPATH**/ ?>
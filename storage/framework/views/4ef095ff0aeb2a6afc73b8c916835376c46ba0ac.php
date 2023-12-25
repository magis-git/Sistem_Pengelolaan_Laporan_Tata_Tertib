

<?php $__env->startSection("title"); ?> Kelas List <?php $__env->stopSection(); ?>

<?php $__env->startSection("main"); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manage Kelas</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">List Kelas </h2>
            <p class="section-lead">Silahkan cari kelas melalui kolom pencarian.</p>

            <div class="row">
                <div class="col-12 col-lg-15">
                    
                    <div class="card">
                        <div class="card-header">
                            <a href="<?php echo e(route('admin.dashboard')); ?>"><button type="submit" name="action" 
                                class="btn btn-primary me-3"><i class="fas fa-home"></i> Home</button></a>    
                            <a href="<?php echo e(route('kelas.create')); ?>">
                                <button class="btn btn-primary"><i class="fas fa-plus"></i> Create Kelas</button>
                            </a>    
                        </div>

                            <div class="card-body">

                                <table id="kelas-table" class="table table-bordered">
                                    <thead>
                                        <th><b>Kelas</b></th>
                                        <th><b>Nama Kelas</b></th>
                                        <th><b>Walikelas</b></th>
                                        <th><b>Action</b></th>
                                    </thead>

                                    <tbody>
                                        <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <td><?php echo e($kelas->kelas_number); ?></td>
                                                <td><?php echo e($kelas->kelas_name); ?></td>
                                                <td><?php echo e($kelas->walikelas_1); ?> <br> <?php echo e($kelas->walikelas_2); ?></td>
                                                <td>
                                                    <a 
                                                    class="btn btn-primary text-white btn-sm" 
                                                    href="<?php echo e(route('kelas.edit', [$kelas->id])); ?>">Edit</a>
                                                    
                                                    <form 
                                                        onsubmit="return confirm('Delete this kelas permanently?')" 
                                                        class="d-inline" 
                                                        action="<?php echo e(route('kelas.destroy', [$kelas->id ])); ?>" 
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
                $('#kelas-table').DataTable();
            });

        </script>    

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/kelas/index.blade.php ENDPATH**/ ?>
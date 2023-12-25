

<?php $__env->startSection('title'); ?> Edit User <?php $__env->stopSection(); ?> 

<?php $__env->startSection('main'); ?>
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Manage Users</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit user</h2>
            <p class="section-lead">Silahkan isi form untuk mengubah elemen user.</p>

            <div class="row">
                <div class="col-12 col-lg-15">
                    <div class="card">
            
                        <div class="card-header">
                            <h4>User Form</h4>
                            
                        </div>
                        
                        <div class="card-body">
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="<?php echo e(route('users.update', [$user->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="PUT" name="_method">
                                <label for="name">Name</label>
                                <input 
                                    value="<?php echo e(old('name') ? old('name') : $user->name); ?>" 
                                    class="form-control <?php echo e($errors->first('name') ? "is-invalid" : ""); ?>" 
                                    placeholder="Full Name" 
                                    type="text" 
                                    name="name" 
                                    id="name"/>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('name')); ?>

                                </div>
                                <br>
                                
                                <label for="level">
                                    <span class=""> User Level: </span>
                                    <select class="block w-full mt-1" name="level">
                                        <option value=" " class="form-control <?php echo e($errors->first('level') ? "is-invalid": ""); ?>">Select User Level</option>
                                        <option value="admin" class="form-control <?php echo e($errors->first('level') ? "is-invalid": ""); ?>">Admin</option>
                                        <option value="tu" class="form-control <?php echo e($errors->first('level') ? "is-invalid": ""); ?>">Tata Usaha</option>
                                        <option value="bk" class="form-control <?php echo e($errors->first('level') ? "is-invalid": ""); ?>">Guru BK</option>
                                        <option value="wali" class="form-control <?php echo e($errors->first('level') ? "is-invalid": ""); ?>">Wali Kelas/Wali Asrama</option>
                                        <option value="guru" class="form-control <?php echo e($errors->first('level') ? "is-invalid": ""); ?>">Guru/Staff</option>
                                    </select>
                                </label>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('level')); ?>

                                </div>
                                <br/>
                            
                                <label for="email">Email</label>
                                <input value="<?php echo e($user->email); ?>" disabled class="form-control <?php echo e($errors->first('email') ? "is-invalid" : ""); ?> " placeholder="user@mail.com" type="text" name="email" id="email"/>
                                
                                <br>
                            
                                <button type="submit" name="action" value="cancel" class="btn btn-danger me-3">Cancel</button>
                                <button type="submit" name="action" value="save" class="btn btn-primary">Save</button>

                            </form>
                        </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?> 

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/users/edit.blade.php ENDPATH**/ ?>


<?php $__env->startSection('title', 'Sistem Tata Tertib'); ?>

<?php $__env->startSection('main'); ?>
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            
            <?php if(session('fail')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('fail')); ?>

                    </div>
                <?php endif; ?>

            <form method="POST" action="<?php echo e(route('login')); ?>" aria-label="<?php echo e(__('Login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="email" class="col-sm-12 col-form-label pl-0"><?php echo e(__('E-Mail Address')); ?></label>
                        <br>
                        <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                        <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    

                    <div class="col-md-12">
                        <label for="password" class="col-md-4 col-form-label text-md-left pl-0"><?php echo e(__('Password')); ?></label>
                        <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                        <?php if($errors->has('password')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn-block btn btn-primary">
                            <?php echo e(__('Login')); ?>

                        </button>
                        <br>

                    </div>
                </div>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/login.blade.php ENDPATH**/ ?>
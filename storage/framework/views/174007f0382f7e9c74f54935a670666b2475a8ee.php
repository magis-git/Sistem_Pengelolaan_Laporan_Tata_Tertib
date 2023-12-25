<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Tata-Tertib-Bina-Amal')); ?></title>

     <!-- General CSS Files -->
    <link rel="stylesheet"
    href="<?php echo e(asset('library/bootstrap/dist/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    <?php echo $__env->yieldPushContent('style'); ?>

    <!-- Template CSS -->
    <link rel="stylesheet"
        href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('css/components.css')); ?>">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Start GA -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- END GA -->
    
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
                
                <?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('components.wali-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->yieldContent('main'); ?> 

                <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    </div>


      <!-- General JS Scripts -->
    <script src="<?php echo e(asset('library/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('library/popper.js/dist/umd/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('library/tooltip.js/dist/umd/tooltip.js')); ?>"></script>
    <script src="<?php echo e(asset('library/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('library/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/stisla.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>

    <!-- Template JS File -->
    <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    
 

</body>
</html>
<?php /**PATH D:\Kurumi\SMPIT-Bina-Amal\resources\views/layouts/wali-app.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title','Login'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid vh-100">

    <div class="row h-100 justify-content-center align-items-center">

        <div class="col-lg-4 col-md-6">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-body p-5">

                    <div class="text-center mb-4">

                        <i class="bi bi-shop fs-1 text-primary"></i>

                        <h2 class="fw-bold mt-3">
                            POS System
                        </h2>

                        <p class="text-muted">
                            Login untuk melanjutkan
                        </p>

                    </div>

                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('login.post')); ?>">

                        <?php echo csrf_field(); ?>

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="<?php echo e(old('email')); ?>"
                                required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required>

                        </div>

                        <button class="btn btn-primary w-100">

                            Login

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_faiq\resources\views/login.blade.php ENDPATH**/ ?>
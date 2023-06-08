<style>
    body {
    align-items: center;
    background-color: #000;
    display: flex;
    justify-content: center;
    height: 100vh;
    }

    .form {
    background-color: #15172b;
    border-radius: 20px;
    box-sizing: border-box;
    height: 500px;
    padding: 20px;
    width: 320px;
    }
    .title {
    color: #eee;
    font-family: sans-serif;
    font-size: 36px;
    font-weight: 600;
    margin-top: 30px;
    text-align: center;   
    }

    .subtitle {
    color: #eee;
    font-family: sans-serif;
    font-size: 16px;
    font-weight: 600;
    margin-top: 10px;
    }

    .input-container {
    height: 50px;
    position: relative;
    width: 100%;
    }

    .ic1 {
    margin-top: 40px;
    }

    .ic2 {
    margin-top: 30px;
    }

    .input {
    background-color: #303245;
    border-radius: 12px;
    border: 0;
    box-sizing: border-box;
    color: #eee;
    font-size: 18px;
    height: 100%;
    outline: 0;
    padding: 4px 20px 0;
    width: 100%;
    }

    .cut {
    background-color: #15172b;
    border-radius: 10px;
    height: 20px;
    left: 20px;
    position: absolute;
    top: -20px;
    transform: translateY(0);
    transition: transform 200ms;
    width: 76px;
    }

    .cut-short {
    width: 50px;
    }

    .input:focus ~ .cut,
    .input:not(:placeholder-shown) ~ .cut {
    transform: translateY(8px);
    }

    .placeholder {
    color: #65657b;
    font-family: sans-serif;
    left: 20px;
    line-height: 14px;
    pointer-events: none;
    position: absolute;
    transform-origin: 0 50%;
    transition: transform 200ms, color 200ms;
    top: 20px;
    }

    .input:focus ~ .placeholder,
    .input:not(:placeholder-shown) ~ .placeholder {
    transform: translateY(-30px) translateX(10px) scale(0.75);
    }

    .input:not(:placeholder-shown) ~ .placeholder {
    color: #808097;
    }

    .input:focus ~ .placeholder {
    color: #dc2f55;
    }

    .submit {
    background-color: #08d;
    border-radius: 12px;
    border: 0;
    box-sizing: border-box;
    color: #eee;
    cursor: pointer;
    font-size: 18px;
    height: 50px;
    margin-top: 38px;
    // outline: 0;
    text-align: center;
    width: 100%;
    }

    .submit:active {
    background-color: #06b;
    }
</style> 
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="title" class="title">Login</h3>
                    <div class="card-body">
                        <form class="formd" method="POST" action="<?php echo e(route('login.custom')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="input-container ic1">
                                <input type="text" placeholder="Email" id="email" class="input" name="email" required
                                    autofocus>
                                <?php if($errors->has('email')): ?>
                                <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                <?php endif; ?>
                            </div>
 
                            <div class="input-container ic1">
                                <input type="password" placeholder="Password" id="password" class="input" name="password" required>
                                <?php if($errors->has('password')): ?>
                                <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                <?php endif; ?>
                            </div>
 
                            <div class="d-grid mx-auto">
                                <button type="submit" class="submit">Sign In</button>
                            </div>
                        </form>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php /**PATH C:\xampp\htdocs\AuthQr\resources\views/auth/login.blade.php ENDPATH**/ ?>
<?php  
    require_once './header.php';
    use App\Authentication;
    if(isset($_POST['signUp'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        Authentication::signUp(name: $name, email: $email, password: $password, cpassword: $cpassword);   
    }
?>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-4 border rounded shadow p-4 mx-auto">
                <h1>Sign Up</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?= $name ?? null ?>">
                        <div class="text-danger small"><?= Authentication::$errName ?? null ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?= $email ?? null ?>">
                        <div class="text-danger small"><?= Authentication::$errEmail ?? null ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="<?= $password ?? null ?>">
                        <div class="text-danger small"><?= Authentication::$errPassword ?? null ?>
                    </div>
                    <div class="mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control" value="<?= $cpassword ?? null ?>">
                        <div class="text-danger small"><?= Authentication::$errCpassword ?? null ?>
                    </div>
                    <div class="mb-3">
                        <label for="showPass" class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="showPass">
                            Show Password
                        </label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="signUp">Sign Up</button>
                    </div>
                </form>
                <div class="small">Already have account? <a href="./sign-in.php">Sign in Here</a></div>
            </div>
        </div>
    </div>

    <script>
        const showPass = document.getElementById('showPass');
        const password = document.getElementById('password');
        const cpassword = document.getElementById('cpassword');

        showPass.addEventListener('change', () => {
            if(showPass.checked) {
                password.setAttribute('type', 'text');
                cpassword.setAttribute('type', 'text');
            } else {
                password.setAttribute('type', 'password');
                cpassword.setAttribute('type', 'password');
            }
        })
    </script>
<?php  
    require_once './footer.php';
?>
<?php
require_once './header.php';
use App\Authentication;

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    Authentication::signIn($email, $password);
}
?>
<div class="container">
    <div class="row py-5">
        <div class="col-md-4 border rounded shadow p-4 mx-auto">
            <h1>Sign In</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="m-3">
                    <label for="showPass" class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="showPass">
                        Show Password
                    </label>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="signIn">Sign In</button>
                </div>
            </form>
            <div class="small">don't have account? <a href="./sign-up.php">Sign up Here</a></div>
        </div>
    </div>
</div>

<script>
    const showPass = document.getElementById('showPass');
    const password = document.getElementById('password');

    showPass.addEventListener('change', () => {
        if (showPass.checked) {
            password.setAttribute('type', 'text');
        } else {
            password.setAttribute('type', 'password');
        }
    })
</script>
<?php
require_once './footer.php';
?>
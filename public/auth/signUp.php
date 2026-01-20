<?php
require_once __DIR__ . '/../../includes/functions.php';
require_once __DIR__ . '/../../includes/header.php';
?>

<main class="auth-page">
    <div class="auth-card">
        <h2>Create Account</h2>

        <form method="POST" action="" class="auth-form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" required>
            </div>

            <button type="submit" class="btn-primary">Register</button>
        </form>

        <p class="auth-footer">Already have an account?
            <a class="auth-link-btn" href="login.php">Login</a>
        </p>
    </div>
</main>

<?php require_once __DIR__ . '/../../includes/footer.php' ?>
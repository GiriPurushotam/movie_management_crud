<?php
require_once __DIR__ . '/../../includes/functions.php';
require_once __DIR__ . '/../../includes/header.php';
?>

<main class="auth-page">
    <div class="auth-card">
        <h2>Login</h2>
        <form method="POST" class="auth-form">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="emial" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn-primary">Login</button>
        </form>

        <p class="auth-footer">
            Don't have an account?
            <a class="auth-link-btn" href="signUp.php">Register</a>
        </p>
    </div>
</main>

<?php require_once __DIR__ . '/../../includes/footer.php' ?>
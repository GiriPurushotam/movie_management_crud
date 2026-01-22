<?php
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../includes/functions.php';
require_once __DIR__ . '/../../includes/header.php';

?>
<?php if ($flash = flashMessage()): ?>
    <div class="<?= $flash['type'] === 'error' ? 'error-flash-msg' : 'flash-msg' ?>"><?= htmlspecialchars($flash['message']) ?></div>
<?php endif; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if ($email === '' || $password === '') {
        setFlashMessage('All fields require', 'error');
        header('Location: login.php');
        exit;
    }

    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email =? ");
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if (!$user || !password_verify($password, $user['password'])) {
        setFlashMessage('Invalid email or Password', 'error');
        header('Location: login.php');
        exit;
    }

    authUser($user);

    setFlashMessage('Welcome ' . $user['name']);
    header('Location: /movie_project/public/index.php');
    exit;
}
?>

<main class=" auth-page">
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
<?php
require_once __DIR__ . '/../../includes/functions.php';
require_once __DIR__ . '/../../includes/header.php';

?>

<?php if ($flash = flashMessage()): ?>
    <div class="<?= $flash['type'] === 'error' ? 'error-flash-msg' : 'flash-msg' ?>"><?= htmlspecialchars($flash['message']) ?></div>
<?php endif; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($name === '' || $email === '' || $password === '' || $confirmPassword === '') {
        setFlashMessage('All fields required', 'error');
        header('Location: signUp.php');
        exit;
    }

    if ($password !== $confirmPassword) {
        setFlashMessage('Password do not matched', 'error');
        header('Location: signUp.php');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setFlashMessage('Invalid email format', 'error');
        header('Location: signUp.php');
        exit;
    }

    $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        setFlashMessage('Email already exists', 'error');
        header('Location:signUp.php');
        exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare($conn, "INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $hash);
    mysqli_stmt_execute($stmt);

    setFlashMessage('Account created successfully. Please login');
    header('Location: login.php');
    exit;
}
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
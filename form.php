<!DOCTYPE html>
<html>
<head>
    <title>Example Form</title>
</head>
<body>
    <!-- Login Form -->
    <form action="process_form.php" method="post">
        <!-- Your form inputs for login -->
        <input type="text" name="login_username" placeholder="Username">
        <input type="password" name="login_password" placeholder="Password">
        <input type="hidden" name="form_action" value="login">
        <button type="submit">Login</button>
    </form>

    <!-- Register Form -->
    <form action="process_form.php" method="post">
        <!-- Your form inputs for registration -->
        <input type="text" name="register_username" placeholder="Username">
        <input type="password" name="register_password" placeholder="Password">
        <input type="hidden" name="form_action" value="register">
        <button type="submit">Register</button>
    </form>
</body>
</html>

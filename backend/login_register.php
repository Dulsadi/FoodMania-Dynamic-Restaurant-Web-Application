<?php

	// Pre requeisits
	include('functions.php');

    // Directory path
	$site = getSiteUrl();

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Login/Register</title>

    <?php include('header.php'); ?>

    <body id="log-reg-body">

        <div id="log-reg-form">
            <div class="tabs">
                <button class="tablinks" onclick="openTab(event, 'login')" id="defaultOpen"><i class="fa fa-sign-in"></i> Login</button>
                <button class="tablinks" onclick="openTab(event, 'register')"><i class="fa fa-user-plus"></i> Register</button>
            </div>

            <!-- Login Hint -->
            <div class="icon">
                <i class="fa fa-info-circle"></i>
            </div>

            <!-- Hint Popup -->
            <div class="popup">
                <div class="popup-content">
                <span class="close">&times;</span>
                <h4>Owner Hints</h4>
                <div class="testimonial-image" id="imageUrlInput0010">
                    <img src="/img/upload/testimonials-1.jpg" alt="Naji Saravanabavan" id="uploadImage0010">
                </div>
                <ul>
                    <li><strong>Email:</strong> smith@gmail.com</li>
                    <li><strong>Password:</strong> smith@123</li>
                </ul>
                </div>
            </div>

            <div id="login" class="tabcontent">
                <!-- Login Form -->
                <form action="auth/login_process.php" method="POST">
                    <h1>Welcome...!</h1>
                    <p><strong class="active" onclick="openTab(event, 'resetPassword')">The Foodmania Backend is here</strong></p>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" name="login" value="Login">
                    <p id="forgot-msg"><a onclick="openTab(event, 'forgotPassword')">Forgot</a> password?</p>
                </form>
            </div>

            <div id="register" class="tabcontent grid-responsive admin" style="display:none;">
                <!-- Register Form -->
                <form action="auth/register_process.php" method="POST" id="registerForm">
                    <div class="testimonial-image" id="imageUrlInput001">
                        <img src="<?php echo $site . "/img/icons/placeholder-image-dark.jpg"; ?>" alt="About Image" id="uploadImage001">
                        <input type="file" id="fileInput001" style="display: none;" accept="image/*">
                    </div>
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" name="register" value="Register">
                </form>
            </div>

            <div id="forgotPassword" class="tabcontent" style="display:none;">
                <!-- Forgot Password Form -->
                <form action="auth/forgot_password.php" method="POST">
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="submit" name="reset-link" value="Send a Reset Link">
                </form>
            </div>

            <div id="resetPassword" class="tabcontent" style="display:none;">
                <!-- Reset Password Form -->
                <?php include('auth/reset_password.php'); ?>
            </div>
        <div>

        <p class="credit">Powered by <a href="<?php echo $site ?>" target="_blank">FOODMANIA</a></p>

    </body>

<?php include('footer.php'); ?>

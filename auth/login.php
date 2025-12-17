<?php
    session_start();
    require_once '../config.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($connection, $sql);
        
        if(mysqli_num_rows($result) > 0){
            $user = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: ../index.php");
            exit();
        }
    }
    require_once '../header.php'
?>



<!-- Hero Section -->
<section class="hero" style="padding: 1.5rem 0; min-height: auto; height: 17vh;">
    <div class="container">
        <h1>Connexion</h1>
        <p>Accédez à votre espace d'apprentissage</p>
    </div>
</section>

<!-- Login Form -->
<div class="container">
    <div class="courses-section" style="max-width: 500px; margin: 2rem auto;">
        
        <!-- Error Alert (if needed) -->
        <!-- <div style="background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%); border-left: 4px solid #ef4444; padding: 1.2rem; margin-bottom: 1.5rem; border-radius: 12px;">
            <p style="color: #991b1b; margin: 0;"><i class="fas fa-exclamation-circle"></i> Email ou mot de passe incorrect</p>
        </div> -->

        <!-- Form Card -->
        <div >

            <form method="POST" action="" class="course-form">
                
                <!-- Email -->
                <div class="form-group">
                    <label for="email">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <input type="email" id="email" name="email" 
                           placeholder="Votre email" required>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-lock"></i> Mot de passe
                    </label>
                    <input type="password" id="password" name="password" 
                           placeholder="Votre mot de passe" required>
                </div>

                <!-- Buttons -->
                <div class="form-actions">
                    <button type="submit" class="btn-primary" style="width: 100%;">
                        <i class="fas fa-sign-in-alt"></i> Se connecter
                    </button>
                </div>

                <!-- Register Link -->
                <div style="text-align: center; margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid #e5e7eb;">
                    <p style="color: #64748b; margin: 0;">
                        Pas encore de compte ? 
                        <a href="register.php" style="color: #667eea; font-weight: 600; text-decoration: none;">
                            Créer un compte
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
    require_once '../footer.php'


?>
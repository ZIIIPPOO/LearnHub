<!-- Hero Section -->
<section class="hero">
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
        <div class="course-card">
            <div style="text-align: center; margin-bottom: 2rem;">
                <i class="fas fa-user-circle" style="font-size: 4rem; color: #667eea;"></i>
            </div>

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

                <!-- Remember Me -->
                <div style="margin: 1rem 0;">
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                        <input type="checkbox" name="remember" style="width: auto;">
                        <span style="color: #64748b; font-size: 0.9rem;">Se souvenir de moi</span>
                    </label>
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
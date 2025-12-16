<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h1>Créer un Compte</h1>
        <p>Rejoignez LearnHub et commencez votre parcours d'apprentissage</p>
    </div>
</section>

<!-- Registration Form -->
<div class="container">
    <div class="courses-section" style="max-width: 550px; margin: 2rem auto;">
        
        <!-- Error Alert (if needed) -->
        <!-- <div style="background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%); border-left: 4px solid #ef4444; padding: 1.2rem; margin-bottom: 1.5rem; border-radius: 12px;">
            <p style="color: #991b1b; margin: 0;"><i class="fas fa-exclamation-circle"></i> Error message here</p>
        </div> -->

        <!-- Success Alert (if needed) -->
        <!-- <div style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); border-left: 4px solid #10b981; padding: 1.5rem; margin-bottom: 1.5rem; border-radius: 12px;">
            <p style="color: #065f46; margin: 0 0 1rem 0;"><i class="fas fa-check-circle"></i> Success message</p>
            <a href="login.php" class="filter-btn active"><i class="fas fa-sign-in-alt"></i> Se connecter</a>
        </div> -->

        <!-- Form Card -->
        <div class="course-card">
            <form method="POST" action="" class="course-form">
                
                <!-- Full Name -->
                <div class="form-group">
                    <label for="full_name">
                        <i class="fas fa-user"></i> Nom Complet *
                    </label>
                    <input type="text" id="full_name" name="full_name" 
                           placeholder="Ex: Ahmed Bennani" required>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">
                        <i class="fas fa-envelope"></i> Email *
                    </label>
                    <input type="email" id="email" name="email" 
                           placeholder="Ex: ahmed@example.com" required>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-lock"></i> Mot de passe *
                    </label>
                    <input type="password" id="password" name="password" 
                           placeholder="Minimum 6 caractères" required>
                    <small style="color: #64748b; font-size: 0.875rem; display: block; margin-top: 0.5rem;">
                        <i class="fas fa-shield-alt"></i> Votre mot de passe sera crypté
                    </small>
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="confirm_password">
                        <i class="fas fa-lock"></i> Confirmer le mot de passe *
                    </label>
                    <input type="password" id="confirm_password" name="confirm_password" 
                           placeholder="Répétez le mot de passe" required>
                </div>

                <!-- Buttons -->
                <div class="form-actions">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-user-plus"></i> Créer mon compte
                    </button>
                    <a href="../index.php" class="btn-secondary">
                        <i class="fas fa-times"></i> Annuler
                    </a>
                </div>

                <!-- Login Link -->
                <div style="text-align: center; margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid #e5e7eb;">
                    <p style="color: #64748b; margin: 0;">
                        Vous avez déjà un compte ? 
                        <a href="login.php" style="color: #667eea; font-weight: 600; text-decoration: none;">
                            Se connecter
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
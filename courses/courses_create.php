<?php
    require_once '../config.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $course_level = $_POST['course_level'];

        $sql = "INSERT INTO courses (title, description, course_level, created_at) 
        VALUES('$title', '$description', '$course_level', CURRENT_TIMESTAMP)"; 

        
        mysqli_query($connection, $sql);
        header("Location: ../index.php");     
        exit();
    }

    require_once '../header.php';
?>

<div class="container">
    <div class="courses-section" style="margin-top: 2rem;">
        <div class="section-header">
            <h2><i class="fas fa-plus-circle"></i> Créer un Nouveau Cours</h2>
        </div>

        <form method="POST" action="" class="course-form">
            <div class="form-group">
                <label for="title">
                    <i class="fas fa-book"></i> Titre du cours *
                </label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    placeholder="Ex: Introduction au Python"
                    required
                >
            </div>

            <div class="form-group">
                <label for="description">
                    <i class="fas fa-align-left"></i> Description
                </label>
                <textarea 
                    id="description" 
                    name="description" 
                    rows="5"
                    placeholder="Décrivez le contenu de ce cours..."
                ></textarea>
            </div>

            <div class="form-group">
                <label for="course_level">
                    <i class="fas fa-layer-group"></i> Niveau *
                </label>
                <select id="course_level" name="course_level" required>
                    <option value="">-- Choisir un niveau --</option>
                    <option value="Débutant">Débutant</option>
                    <option value="Intermédiaire">Intermédiaire</option>
                    <option value="Avancé">Avancé</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-check"></i> Créer le cours
                </button>
                <a href="courses_list.php" class="btn-secondary">
                    <i class="fas fa-times"></i> Annuler
                </a>
            </div>
        </form>
    </div>
</div>

<?php
    require_once '../footer.php';
?>
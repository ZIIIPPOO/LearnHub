<?php
    require_once '../config.php';

    $course_id = $_GET['course_id'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = $_POST['title'];
        $content = $_POST['content'];

        $result = mysqli_query($connection, "SELECT * FROM sections WHERE course_id = $course_id");
        $position = mysqli_num_rows($result) + 1;

        $sql = "INSERT INTO sections (course_id, title, content, position) VALUES ('$course_id','$title','$content', '$position')";
        mysqli_query($connection, $sql);

        

        header("Location: ../index.php");
        exit();
    }

    require_once '../header.php';
?>

<div class="container">
    <div class="courses-section" style="margin-top: 2rem;">
        <div class="section-header">
            <h2><i class="fas fa-plus-circle"></i> Créer une Nouvelle Section</h2>
        </div>

        <form method="POST" action="" class="course-form">
            
            <!-- Section Title -->
            <div class="form-group">
                <label for="title">
                    <i class="fas fa-heading"></i> Titre de la section *
                </label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    placeholder="Ex: Introduction aux Variables"
                    required
                >
            </div>

            <!-- Section Content -->
            <div class="form-group">
                <label for="content">
                    <i class="fas fa-align-left"></i> Contenu
                </label>
                <textarea 
                    id="content" 
                    name="content" 
                    rows="8"
                    placeholder="Décrivez le contenu de cette section..."
                ></textarea>
            </div>

            <!-- Hidden field for course_id (will come from URL) -->
            <input type="hidden" name="course_id" value="<?php echo $_GET['course_id']; ?>">

            <!-- Form Actions -->
            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-check"></i> Créer la section
                </button>
                <a href="../index.php" class="btn-secondary">
                    <i class="fas fa-times"></i> Annuler
                </a>
            </div>
        </form>
    </div>
</div>

<?php
    require_once '../footer.php';
?>
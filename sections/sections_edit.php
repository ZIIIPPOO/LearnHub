<?php
    require_once '../config.php';

    $id = $_GET['id'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = $_POST['title'];
        $content = $_POST['content'];

        $sql = "UPDATE sections
        SET title = '$title', content = '$content'
        WHERE id = $id";

        mysqli_query($connection, $sql);
        header("location: ../index.php");
        exit();
    }
    $sqll = "SELECT * FROM sections WHERE id = $id";
    $result = mysqli_query($connection, $sqll);
    $section = mysqli_fetch_assoc($result);

    $ex_title = $section['title'];
    $ex_content = $section['content'];

    require_once '../header.php';
?>

<div class="container">
    <div class="courses-section" style="margin-top: 2rem;">
        <div class="section-header">
            <h2><i class="fas fa-edit"></i> Modifier la Section</h2>
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
                    value="<?php echo $ex_title; ?>"
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
                ><?php echo $ex_content; ?></textarea>
            </div>

            <!-- Hidden field for course_id -->
            <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">

            <!-- Form Actions -->
            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i> Enregistrer les modifications
                </button>
                <a href="../index.php" class="btn-secondary">
                    <i class="fas fa-times"></i> Annuler
                </a>
            </div>
        </form>
    </div>
</div>

<?php
    require_once '../footer.php'
?>
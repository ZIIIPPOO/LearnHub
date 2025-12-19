<?php
session_start();
require_once '../config.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM courses 
    INNER JOIN enrollments ON courses.id = enrollments.course_id
    WHERE enrollments.user_id = $user_id ";
$res = mysqli_query($connection, $sql);
// $content = mysqli_fetch_assoc($res);
// var_dump($content);

require_once '../header.php';
?>

<section class="hero" style="padding: 2rem 0; min-height: auto; height: 20vh;">
    <div class="container">
        <h1><i class="fas fa-book-reader"></i> Mes Cours</h1>
        <p>Tous les cours auxquels vous êtes inscrit</p>
    </div>
</section>

<div class="container">
    <div class="courses-section">
        <div class="section-header">
            <h2>Mes Cours Inscrits</h2>
            <a href="../index.php" class="filter-btn">
                <i class="fas fa-plus"></i> Découvrir plus de cours
            </a>
        </div>

        <!-- Empty State (show when no enrollments) -->
        <?php if (mysqli_num_rows($res) == 0) { ?>
            <div style="text-align: center; padding: 4rem 2rem;">
                <i class="fas fa-inbox" style="font-size: 5rem; color: #cbd5e1; margin-bottom: 1rem;"></i>
                <h3 style="color: #64748b; margin: 1rem 0;">Aucun cours inscrit</h3>
                <p style="color: #94a3b8; margin-bottom: 2rem;">
                    Commencez votre parcours d'apprentissage
                </p>
                <a href="../index.php" class="btn-primary">
                    <i class="fas fa-search"></i> Explorer les cours
                </a>
            </div>
        <?php } else { ?>
            <!-- Courses Grid -->
            <div class="courses-grid">

                <?php while ($course = mysqli_fetch_assoc($res)) { ?>
                    <!-- EXACT SAME CARD from courses_list.php -->
                    <div class="course-card">
                        <div class="course-header">
                            <div class="course-actions">
                                <a href="courses/courses_edit.php?id=1"
                                    class="action-btn edit-btn"
                                    title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="courses/courses_delete.php?id=1"
                                    class="action-btn delete-btn"
                                    title="Supprimer"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours et toutes ses sections ?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                            <div class="course-header-left">
                                <i class="fas fa-graduation-cap course-icon"></i>
                                <span class="course-level level-<?php echo $course['course_level']; ?>">
                                    <?= $course['course_level'] ?>
                                </span>
                            </div>
                        </div>

                        <div class="course-body">
                            <h3 class="course-title">
                                <?= $course['title'] ?>
                            </h3>

                            <p class="course-description">
                                <?= $course['description'] ?>
                            </p>

                            <div class="course-meta">
                                <span>
                                <i class="fas fa-calendar-alt"></i>
                                   <?=  $course['created_at']?> 
                                </span>
                            </div>

                            <div class="sections-preview">
                                <?php
                                $id = $course['id'];
                                $sqll = "SELECT * FROM sections WHERE course_id = $id ORDER BY position";
                                $result = mysqli_query($connection, $sqll);
                                ?>
                                <h4><i class="fas fa-tasks"></i> Sections</h4>
                                <?php while ($section = mysqli_fetch_assoc($result)) { ?>
                                    <div class="section-item" style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                                        <div style="flex: 1;">
                                            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.3rem;">
                                                <span class="section-number"><?= $section['position'] ?></span>
                                                <span class="section-name"><?= $section['title'] ?></span>
                                            </div>

                                            <p style="margin: 0; padding-left: 2.5rem; color: #666; font-size: 0.9rem;">
                                                <?= $section['content'] ?>
                                            </p>
                                        </div>

                                        <div style="display: flex; gap: 0.5rem; margin-left: 1rem;">
                                            <a href="/sections/sections_edit.php?id=1"
                                                style="color: #667eea; text-decoration: none;" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="/sections/sections_delete.php?id=1&course_id=1"
                                                style="color: #ef4444; text-decoration: none;" title="Supprimer"
                                                onclick="return confirm('Tu veut supprimer cette section ?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>

                                <a href="/sections/sections_create.php?course_id=1" class="filter-btn active">
                                    <i class="fas fa-plus"></i> Ajouter une Section
                                </a>
                            </div>

                        </div>
                    </div>

    <?php
                }
            } ?>

    </div>
    </div>
</div>

<?php require_once '../footer.php'; ?>
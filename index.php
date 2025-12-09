<?php
    require_once 'header.php';
    $sql = "SELECT * FROM courses;";
    $result = mysqli_query($connection, $sql);
?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Plateforme d'Apprentissage en Ligne</h1>
            <p>Découvrez des cours de qualité pour développer vos compétences</p>
        </div>
    </section>

    <!-- Stats Section -->
    <div class="container">
        <div class="stats">
            <div class="stat-card">
                <i class="fas fa-book"></i>
                <h3>4</h3>
                <p>Cours Disponibles</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-list"></i>
                <h3>18</h3>
                <p>Sections au Total</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-users"></i>
                <h3>1,250+</h3>
                <p>Étudiants Actifs</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-certificate"></i>
                <h3>98%</h3>
                <p>Taux de Satisfaction</p>
            </div>
        </div>

        <!-- Courses Section -->
        <div class="courses-section" id="courses">
            <div class="section-header">
                <h2>Nos Cours</h2>
                <div class="filter-tabs">
    <a href="/courses/courses_create.php" class="filter-btn">
        <i class="fas fa-plus"></i> Add New Course
    </a>
</div>
            </div>

            <div class="courses-grid" id="coursesGrid">
                <?php
                    require_once 'courses/courses_list.php'
                ?>
            </div>
        </div>
    </div>

<?php
    require_once 'footer.php'
?>
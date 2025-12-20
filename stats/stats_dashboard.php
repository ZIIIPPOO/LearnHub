<?php
session_start();
require_once '../config.php';

$sql = "SELECT * FROM courses";
$res = mysqli_query($connection, $sql);
$courses_nb = mysqli_num_rows($res);

$sql_inscrit = "SELECT * FROM users";
$res_inscrit = mysqli_query($connection, $sql_inscrit);
$users_nb = mysqli_num_rows($res_inscrit);

$sql_enrollements = "SELECT * FROM enrollments";
$res_enrollements = mysqli_query($connection, $sql_enrollements);
$enrollements_nb = mysqli_num_rows($res_enrollements);

$sql_sections = "SELECT * FROM sections";
$res_sections = mysqli_query($connection, $sql_sections);
$sections_nb = mysqli_num_rows($res_sections);
$sections_avg = $sections_nb / $courses_nb;

$sql_most_popular = "SELECT 
                    courses.*,
                    COUNT(enrollments.id) as total_enrollments
                    FROM courses
                    INNER JOIN enrollments ON courses.id = enrollments.course_id
                    GROUP BY courses.id
                    ORDER BY total_enrollments DESC
                    LIMIT 1";
$res_most_popular = mysqli_query($connection, $sql_most_popular);
$most_popular = mysqli_fetch_assoc($res_most_popular);

$sql_plus_five_sections = "SELECT courses.title ,COUNT(sections.title) AS total_sections 
FROM courses
JOIN sections ON courses.id = sections.course_id
GROUP BY courses.id 
HAVING total_sections > 4";
$res_plus_five_sections = mysqli_query($connection, $sql_plus_five_sections);

$sql_this_year = "SELECT * FROM users
WHERE  YEAR(created_at) = 2025";
$res_this_year = mysqli_query($connection, $sql_this_year);


require_once '../header.php';
?>

<!-- Hero Sect -->
<section class="hero" style="padding: 2rem 0; min-height: auto;">
    <div class="container">
        <h1><i class="fas fa-chart-line"></i> Tableau de Bord Statistiques</h1>
        <p>Analyse complète des performances de la plateforme</p>
    </div>
</section>

<div class="container">

    <!-- Main Stats Cards -->
    <div class="stats">
        <!-- Card 1: Total Courses -->
        <div class="stat-card">
            <i class="fas fa-book"></i>
            <h3><?= $courses_nb ?></h3>
            <p>Cours Disponibles</p>
        </div>

        <!-- Card 2: Total Users -->
        <div class="stat-card">
            <i class="fas fa-users"></i>
            <h3><?= $users_nb ?></h3>
            <p>Utilisateurs Inscrits</p>
        </div>

        <!-- Card 3: Total Enrollments -->
        <div class="stat-card">
            <i class="fas fa-user-graduate"></i>
            <h3><?= $enrollements_nb ?></h3>
            <p>Inscriptions Totales</p>
        </div>

        <!-- Card 4: Average Sections -->
        <div class="stat-card">
            <i class="fas fa-list-ul"></i>
            <h3><?=$sections_avg?></h3>
            <p>Sections par Cours</p>
        </div>
    </div>

    <!-- Most Popular Course Card -->
    <div class="courses-section">
        <div class="section-header">
            <h2><i class="fas fa-fire"></i> Cours le Plus Populaire</h2>
        </div>

        <div class="popular-course-card">
            <div class="popular-badge">
                <i class="fas fa-trophy"></i> #1 Populaire
            </div>
            <div class="course-info">
                <h3><?= $most_popular['title'] ?></h3>
                <p><?= $most_popular['description'] ?></p>
                <div class="popular-stats">
                    <span><i class="fas fa-users"></i><?= $most_popular['total_enrollments'] ?> étudiants</span>
                    <span><i class="fas fa-star"></i><?= $most_popular['course_level'] ?></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses with 5+ Sections -->
    <!-- Courses with 5+ Sections -->
<div class="courses-section">
    <div class="section-header">
        <h2><i class="fas fa-layer-group"></i> Cours avec Plus de 5 Sections</h2>
        <span class="badge-count"><?= mysqli_num_rows($res_plus_five_sections); ?> cours</span>
    </div>
    
    <div class="table-card">
        <?php if(mysqli_num_rows($res_plus_five_sections) > 0): ?>
            <table class="stats-table">
                <thead>
                    <tr>
                        <th>Titre du Cours</th>
                        <th>Nombre de Sections</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($courses_plus_five_sections = mysqli_fetch_assoc($res_plus_five_sections)): ?>
                        <tr>
                            <td>
                                <div class="course-cell">
                                    <i class="fas fa-book"></i>
                                    <span><?=$courses_plus_five_sections ['title']; ?></span>
                                </div>
                            </td>
                            <td>
                                <span class="number-highlight">
                                    <?=  $courses_plus_five_sections['total_sections']; ?>
                                </span>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="empty-state">
                <i class="fas fa-inbox"></i>
                <h3>Aucun cours trouvé</h3>
                <p>Il n'y a pas de cours avec plus de 4 sections</p>
            </div>
        <?php endif; ?>
    </div>
</div>

    <!-- Users Enrolled This Year -->
    <div class="courses-section">
        <div class="section-header">
            <h2><i class="fas fa-user-clock"></i> Utilisateurs Inscrits cette Année</h2>
            <span class="badge-count">847 utilisateurs</span>
        </div>

        <div class="table-card">
            <table class="stats-table">
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Email</th>
                        <th>Date d'inscription</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($userrr = mysqli_fetch_assoc($res_this_year)) {?>
                    <tr>
                        <td>
                            <div class="user-cell">
                                <i class="fas fa-user-circle"></i>
                                <span><?= $userrr['username'] ?></span>
                            </div>
                        </td>
                        <td><?= $userrr['email'] ?></td>
                        <td><?= $userrr['created_at'] ?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Courses Without Enrollments -->
    <div class="courses-section">
        <div class="section-header">
            <h2><i class="fas fa-exclamation-triangle"></i> Cours Sans Inscription</h2>
            <span class="badge-count badge-warning">2 cours</span>
        </div>

        <div class="table-card">
            <table class="stats-table">
                <thead>
                    <tr>
                        <th>Cours</th>
                        <th>Niveau</th>
                        <th>Date de création</th>
                        <th>Sections</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="warning-row">
                        <td>
                            <div class="course-cell">
                                <i class="fas fa-robot"></i>
                                <span>Intelligence Artificielle</span>
                            </div>
                        </td>
                        <td><span class="level-badge level-avancé">Avancé</span></td>
                        <td>01/12/2024</td>
                        <td><span class="number-highlight">4</span></td>
                    </tr>
                    <tr class="warning-row">
                        <td>
                            <div class="course-cell">
                                <i class="fas fa-mobile-alt"></i>
                                <span>Développement Mobile</span>
                            </div>
                        </td>
                        <td><span class="level-badge level-intermédiaire">Intermédiaire</span></td>
                        <td>28/11/2024</td>
                        <td><span class="number-highlight">3</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Latest Enrollments -->
    <div class="courses-section">
        <div class="section-header">
            <h2><i class="fas fa-clock"></i> Dernières Inscriptions</h2>
        </div>

        <div class="table-card">
            <table class="stats-table">
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Cours</th>
                        <th>Niveau</th>
                        <th>Date d'inscription</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="user-cell">
                                <i class="fas fa-user-circle"></i>
                                <span>Mohammed Tazi</span>
                            </div>
                        </td>
                        <td>
                            <div class="course-cell">
                                <i class="fas fa-code"></i>
                                <span>JavaScript Avancé</span>
                            </div>
                        </td>
                        <td><span class="level-badge level-avancé">Avancé</span></td>
                        <td>
                            <span class="recent-badge">
                                <i class="fas fa-clock"></i> Il y a 2h
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="user-cell">
                                <i class="fas fa-user-circle"></i>
                                <span>Fatima Zahra</span>
                            </div>
                        </td>
                        <td>
                            <div class="course-cell">
                                <i class="fas fa-python"></i>
                                <span>Introduction au Python</span>
                            </div>
                        </td>
                        <td><span class="level-badge level-débutant">Débutant</span></td>
                        <td>
                            <span class="recent-badge">
                                <i class="fas fa-clock"></i> Il y a 5h
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="user-cell">
                                <i class="fas fa-user-circle"></i>
                                <span>Karim Bennani</span>
                            </div>
                        </td>
                        <td>
                            <div class="course-cell">
                                <i class="fas fa-database"></i>
                                <span>Base de données SQL</span>
                            </div>
                        </td>
                        <td><span class="level-badge level-intermédiaire">Intermédiaire</span></td>
                        <td>
                            <span class="recent-badge">
                                <i class="fas fa-clock"></i> Il y a 1 jour
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Enrollments per Course Chart -->
    <div class="courses-section">
        <div class="section-header">
            <h2><i class="fas fa-chart-bar"></i> Inscriptions par Cours</h2>
        </div>

        <div class="chart-card">
            <div class="chart-bar">
                <div class="bar-item">
                    <div class="bar-label">
                        <i class="fas fa-python"></i>
                        <span>Introduction Python</span>
                    </div>
                    <div class="bar-container">
                        <div class="bar-fill" style="width: 92%;"></div>
                        <span class="bar-value">456</span>
                    </div>
                </div>

                <div class="bar-item">
                    <div class="bar-label">
                        <i class="fas fa-code"></i>
                        <span>JavaScript Avancé</span>
                    </div>
                    <div class="bar-container">
                        <div class="bar-fill" style="width: 47%;"></div>
                        <span class="bar-value">234</span>
                    </div>
                </div>

                <div class="bar-item">
                    <div class="bar-label">
                        <i class="fas fa-database"></i>
                        <span>SQL Database</span>
                    </div>
                    <div class="bar-container">
                        <div class="bar-fill" style="width: 38%;"></div>
                        <span class="bar-value">189</span>
                    </div>
                </div>

                <div class="bar-item">
                    <div class="bar-label">
                        <i class="fas fa-palette"></i>
                        <span>HTML & CSS</span>
                    </div>
                    <div class="bar-container">
                        <div class="bar-fill" style="width: 31%;"></div>
                        <span class="bar-value">156</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require_once '../footer.php' ?>
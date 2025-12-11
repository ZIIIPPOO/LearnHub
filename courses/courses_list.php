<?php

    $sql = "SELECT * FROM courses;";
    $result = mysqli_query($connection, $sql);
?>

<?php while($course = mysqli_fetch_assoc($result)) {?>
<div class="course-card">
    
    <div class="course-header">
        <div class="course-actions">
            <a href="courses/courses_edit.php?id=<?php echo $course['id']; ?>" 
               class="action-btn edit-btn" 
               title="Modifier">
                <i class="fas fa-edit"></i>
            </a>
            <a href="courses/courses_delete.php?id=<?php echo $course['id']; ?>" 
               class="action-btn delete-btn" 
               title="Supprimer"
               onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours et toutes ses sections ?');">
                <i class="fas fa-trash-alt"></i>
            </a>
        </div>
        <div class="course-header-left">
            <i class="fas fa-graduation-cap course-icon"></i>
            <span class="course-level level-<?php echo $course['course_level']; ?>">
                <?php echo $course['course_level']?>
            </span>
        </div>
    </div>
    
    <div class="course-body">
        <h3 class="course-title">
            <?php echo $course['title']?>
        </h3>
        
        <p class="course-description">
            <?php echo $course['description']?>
        </p>
        
        <div class="course-meta">
            <span>
                <i class="fas fa-calendar-alt"></i>
                <?php echo $course['created_at']?>
            </span>
        </div>

        <div class="sections-preview">
            <h4><i class="fas fa-tasks"></i> Sections</h4>
            <?php 
                $id = $course['id'];
                $sqll = "SELECT * FROM sections WHERE course_id = $id ORDER BY position";
                $res = mysqli_query($connection, $sqll);
                $section_count = mysqli_num_rows($res);
                
                if($section_count > 0) {
                    while($section = mysqli_fetch_assoc($res)) {
            ?>
            <div class="section-item" style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
    <div style="flex: 1;">
        <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.3rem;">
            <span class="section-number"><?php echo $section['position']?></span>
            <span class="section-name"><?php echo $section['title']?></span>
        </div>
        
        <p style="margin: 0; padding-left: 2.5rem; color: #666; font-size: 0.9rem;">
            <?php echo $section['content']?>
        </p>
    </div>
    
    <div style="display: flex; gap: 0.5rem; margin-left: 1rem;">
        <a href="/sections/sections_edit.php?id=<?php echo $section['id']; ?>" 
           style="color: #667eea; text-decoration: none;" title="Modifier">
            <i class="fas fa-edit"></i>
        </a>
        <a href="/sections/sections_delete.php?id=<?php echo $section['id']; ?>&course_id=<?php echo $course['id']; ?>" 
           style="color: #ef4444; text-decoration: none;" title="Supprimer"
           onclick="return confirm('Supprimer cette section ?');">
            <i class="fas fa-trash-alt"></i>
        </a>
    </div>
</div>
            
            <?php 
                    }
                } else {
                    echo '<p style="color: #666; font-size: 0.9rem; margin: 0.5rem 0;">Aucune section pour le moment</p>';
                }
            ?>
            <a href="/sections/sections_create.php?course_id=<?php echo $course['id']; ?>" class="filter-btn active">
                <i class="fas fa-plus"></i> Ajouter une Section
            </a>
        </div>
    </div>
</div>
<?php }?>
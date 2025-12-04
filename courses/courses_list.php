<?php
    $sql = "SELECT * FROM courses;";
    $result = mysqli_query($connection, $sql);
?>

<?php while($course = mysqli_fetch_assoc($result)) {?>
<div class="course-card">
    
    <div class="course-header">
        
        <i class="fas fa-graduation-cap course-icon"></i>
        <span class="course-level level-<?php echo $course['course_level']; ?>">
            <?php echo $course['course_level']?>
        </span>
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
                $sqll = "SELECT * FROM sections WHERE course_id = $id";
                $res = mysqli_query($connection, $sqll);
                while($section = mysqli_fetch_assoc($res)) {
            ?>
            <div class="section-item">
                <span class="section-number"><?php echo $section['position']?></span>
                <span class="section-name"><?php echo $section['title']?></span>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<?php }?>
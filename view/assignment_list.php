 <?php include('view/header.php');?>
<section id="list" class="list">
    <header class="list_row list_header">
        <h1>Assignments</h1>
        <form action="." method="get" id= "list_header_select">
            <input type ="hidden" name="action" value="list_assignments">
            <select name="course_id" required>
                <option value="0">View All</option>
                <?php foreach($courses as $course):?>
                <?php if($course_id==$course['courseID']){
                 ?>
                 <option value="<?= $course['courseID']?>" selected>
                 <?php } else {?>
                    <option value="<?= $course['courseID']?>">
                    <?php }?>
                    <?= $course['courseName']?>
                    </option>
                    <?php endforeach; ?>
            </select>
            <button class="add-button bold">GO</button>
        </form>
    </header>
    
    <?php //To display all assignments for particular course or to display no assignment exist ?>
    
    <?php if($assignments){ ?>
        
        <?php foreach ($assignments as $assignment) : ?>
            <div class="list_row">
                <div class="list_item">
                    <P class="bold"><?= $assignment['courseName'] ?></P>
                    <p><?= $assignment['Description']?></p>
                </div>
                
                <div class="list_removeItem">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_assignment">
                        <input type="hidden" name="assignment_id" value="<?= $assignment["ID"] ?>">
                        <button class="remove-button">delete</button>
                    </form>
                </div>
        </div>
        </div>
        <?php endforeach; ?>

        <?php } else { ?>
            <br>
            <?php if($course_id) { ?>
                <p>NO assignments exist for this course yet.</P>
                <?php } else {?>
                    <p>No assignment exist yet.</P>
                <?php } ?>
                <br>
                <?php } ?>
</section>


<section id="add" class="add">
    <h2>Add Assignment </h2>
    <form action="." method="post" id="add_form" class="add_form">
        <input type="hidden" name="action" value= "add_assignment">
        <div class="add_inputs">
            <label>Course: </label>
            <select name="course_id" required>
                <option value="">Please Select</option>
                <?php foreach($courses as $course): ?>
                    <option value="<?= $course['courseID'];?>">
                    <?= $course['courseName']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <label>Description: </label>
                <input type="text" name="description" maxlength="120" placeholder="description" required>
                </div>
            <div class="add_addItem">
                <button class="add-button bold">Add</button>
                </div>
                </form>


</section>
<br>
<p><a href=".?action=list_courses">View/Edit Courses</a></p>

<?php include('view/footer.php');?>

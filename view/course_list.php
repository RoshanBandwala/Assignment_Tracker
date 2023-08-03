<?php include('view/header.php')?>

<?php if($courses){ ?>
    <section id="list" class="list">
        <header class="list_row list_header">
            <h1>Course List </h1>
</header>
 <?php foreach($courses as $course) : ?>
    <div class="list_row">
        <div class="list_item">
            <p class="bold"><?= $course['courseName'] ?> </p>
 </div>
 <div class="list_removeItem">
    <form action="." method="post">
        <input type="hidden" name="action" value="delete_course">
        <?php 
        //When the user submits the form, the server-side script, which processes the form data, will check the value of the "action" input to determine the specific action requested by the user. In this case, it will recognize that the user wants to delete a course and will proceed with the appropriate code to handle the course deletion process.

        //when X button is clicked thn action and course id will be sent to particular server or page to process the action on given id

        //Using action="." is a common practice when the form data is processed by the same page where the form is displayed.
?>
        <input type="hidden" name="course_id" value="<?= $course['courseID']?>">
        <button class="remove-button">delete</button>
    </form>
 </div>
    </div>
    <?php endforeach;?>
    </section>



<?php } else { ?>
    <p>No Courses Exist Yet </p>
    <?php } ?>

    <section id="add" class="add">
        <h2>Add Course </h2>
        <form action="." method="post" id="add_form" class="add_form">
            <input type="hidden" name="action" value="add_course">
            <div class="add_inputs">
                <label>Name: </label>
                <input type="text" name="course_name" maxlength="50" placeholder="Name" autofocus required>
</div>

<div class="add_addItem">
    <button class="add-button bold">Add</button>
</div>
        </form>
    </section>
    <br>
    <p><a href=".">View &amp; Add Assignments </a></p>
    







<?php include('view/footer.php');?>

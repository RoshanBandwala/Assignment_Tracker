<?php
//it will fetch/include data from this files if any error it wont execute further code
 require('model/database.php');
 require('model/assignment_db.php');
 require('model/course_db.php');

 $assignment_id=filter_input(INPUT_POST,'assignment_id',FILTER_VALIDATE_INT);
 //function to retrieve and sanitize data submitted via a POST request.
 //param1=specifies that we want to access a variable from the POST array (i.e., data submitted via an HTML form with the POST method).
 //pram2=name of parameter we want to retrieve..corresponds to name att of form
 //param3=This is the filter type used to validate the input value as an integer. It will attempt to convert the value to an integer and return it if it is a valid integer. If the input is not a valid integer, it will return false.
 $description=filter_input(INPUT_POST,'description',FILTER_SANITIZE_STRING);
  
 $course_name=filter_input(INPUT_POST,'course_name',FILTER_SANITIZE_STRING);
 //When you use FILTER_SANITIZE_STRING, PHP will remove or escape characters that are not allowed or could be misinterpreted in certain contexts.
 $course_id=filter_input(INPUT_POST,'course_id',FILTER_VALIDATE_INT);

 if(!$course_id){
 $course_id=filter_input(INPUT_GET,'course_id',FILTER_VALIDATE_INT);


 }
 
 $action=filter_input(INPUT_POST,'action',FILTER_SANITIZE_STRING);

 if(!$action){
 $action=filter_input(INPUT_GET,'action',FILTER_SANITIZE_STRING);

 if(!$action){
    $action="list_assignments";
}
    }
    switch($action){
        case "list_courses":
            $courses=get_courses();
            include('view/course_list.php');
            break;
        case "add_course":
            add_course($course_name);
            header("Location: .?action=list_courses");
            break;

        case "add_assignment":
            if( $course_id &&$description){
                add_assignment($course_id,$description);
                header("Location: .?course_id=$course_id");
            
        }else{
            $error="Invalid Assignment data check all fields and try again";
            include('view/error.php');
            exit();

        }
        break;
        case "delete_course":
            if($course_id){
                try{
                    delete_course($course_id);
                }catch(PDOException $e){
                    $error="You cannot delete a course if assignments exists in the course ";
                    include('view/error.php');
            exit();



                }
                header("Location: .?action=list_courses");
            }
            break;
            case "delete_assignment":
                if($assignment_id){
                    delete_assignment($assignment_id);
                    header("Location: .?course_id=$course_id");
                }
                else{
                    $error="missing or incorrect assignment id";
                    include('view/error.php');
    }
                break;







        default:
        $course_name=get_course_name($course_id);
        $courses=get_courses();
        // ...
        if ($course_id !== null) {
    $assignments = get_assignments_by_course($course_id);
} else {
    // Handle the case when $course_id is null (e.g., show all assignments)
    $assignments = array(); // Set an empty array or null depending on the desired behavior

}
// ...

       // $assignments=get_assignments_by_course($course_id);
        include('view/assignment_list.php');


    }
//In this example, when the form is submitted, the "action" parameter is retrieved from the POST request. If it is not provided or is not valid, the code tries to retrieve it from the GET request. If it is still not provided or valid, the default action is set to "list assignments." The switch statement then determines the appropriate code block to execute based on the value of $action. Each case within the switch corresponds to a different action that the script can handle, and the default case handles the "list assignments" action or other unspecified actions
 
 





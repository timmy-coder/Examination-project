<?php 
$exmneId = $_SESSION['examineeSession']['exmne_id'];

// Select Data sa nilogin nga examinee
$selExmneeData = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
$exmneCourse =  $selExmneeData['exmne_course'];
#$exmneCourse1 =  $selExmneeData['exmne_course_1'];


        
// Select and tanang exam depende sa course nga ni login 
$selExam = $conn->query("SELECT * FROM exam_tbl WHERE cou_id='$exmneCourse' ORDER BY ex_title DESC ");
#$selExam2 = $conn->query("SELECT * FROM exam_tbl WHERE cou_id='$exmneCourse1' ORDER BY ex_title DESC ");


//

 ?>
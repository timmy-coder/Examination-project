<?php 

$conn = mysqli_connect("localhost", "root", "", "firstgenius");
 
$sel = "SELECT * FROM course_tbl WHERE cou_name LIKE '%".$_POST['name']."%'";
$result = mysqli_query($conn, $sel);
if(mysqli_num_rows($result) > 0){
    $selCourse = $result;
    while ($selCourseRow = mysqli_fetch_assoc($selCourse)){
        echo " <tr>
        <td class='pl-4'>
            ".$selCourseRow['cou_name']."
        </td>
        <td class='text-center'>
            <a rel='facebox' style='text-decoration: none;' class='btn btn-primary btn-sm' href='facebox_modal/updateCourse.php?id=".$selCourseRow['cou_id']."' id='updateCourse'>Update</a>
         <button type='button' id='deleteCourse' data-id='".$selCourseRow['cou_id']."'  class='btn btn-danger btn-sm'>Delete</button>
        </td></tr>";
    }
  }
  else{
    echo " <tr><td>0 results found</td></tr>";
}
 ?>
 <script type="text/javascript" src="js/myjs.js"></script>
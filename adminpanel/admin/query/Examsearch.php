<?php 
$conn = mysqli_connect("localhost", "root", "", "firstgenius");
 
$sel = "SELECT * FROM exam_tbl WHERE ex_title LIKE '%".$_POST['name']."%'";
$result = mysqli_query($conn, $sel);
if(mysqli_num_rows($result) > 0){
    $selExam = $result;
    while ($selExamRow = mysqli_fetch_assoc($selExam)){
        echo " <tr>
        <td class='pl-4'>
            ".$selExamRow['ex_title']."
        </td>
        <td>

        </td>
        <td>".$selExamRow['ex_description']."</td>
                                            <td>".$selExamRow['ex_time_limit']."</td>
                                            <td>".$selExamRow['ex_questlimit_display']."</td>
        <td class='text-center'>
        <a href='manage-exam.php?id=".$selExamRow['ex_id']."' type='button' class='btn btn-primary btn-sm'>Manage</a>
        <button type='button' id='deleteExam' data-id=".$selExamRow['ex_id']."  class='btn btn-danger btn-sm'>Delete</button>
        </td></tr>";
    }
  }
  else{
    echo " <tr><td>0 results found</td></tr>";
}
 ?>
 <script type="text/javascript" src="js/myjs.js"></script>
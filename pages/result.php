<?php 
    $examId = $_GET['id'];
    $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);
extract($_POST);
$selExmne = $conn->query("SELECT * FROM examinee_tbl et INNER JOIN exam_attempt ea ON et.exmne_id = ea.exmne_id ORDER BY ea.examat_id DESC ");
if($selExmne->rowCount() > 0)
{
    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)){
        $name = $selExmneRow['exmne_fullname'];
        $eid = $selExmneRow['exmne_id'];
        $selExName = $conn->query("SELECT * FROM exam_tbl et INNER JOIN exam_attempt ea ON et.ex_id=ea.exam_id WHERE  ea.exmne_id='$eid' ")->fetch(PDO::FETCH_ASSOC);
        $exam_id = $selExName['ex_id'];
        $title = $selExName['ex_title'];
        $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answer ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$eid' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ");
        $Score = $selScore->rowCount(); 
        $over  = $selExName['ex_questlimit_display'];
        $insData = $conn->query("INSERT INTO result_tbl(result_name,result_title,result_score,result_over) VALUES('$name','$title',$Score','$over')  ");
    }   
}

 ?>

<div class="app-main__outer">
<div class="app-main__inner">
    <div id="refreshData">
            
    <div class="col-md-12">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <?php echo $selExam['ex_title']; ?>
                          <div class="page-title-subheading">
                            <?php echo $selExam['ex_description']; ?>
                          </div>

                    </div>
                </div>
            </div>
        </div>  
        <div class="row col-md-12">
            <div class='main-card mb-3 card p-4 d-flex align-items'>
                <h3 class="text-primary">You are done with your exam</h3>
            </div>
        	
        </div>
</div>

       
</div>

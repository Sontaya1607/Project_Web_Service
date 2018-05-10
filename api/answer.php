<?php
function getAnswerByID($request, $response) {
    $member_id = 0;
    $member_id = $request->getAttribute('id1');

    try {
        $db = getConnection();
        $sql = "SELECT DISTINCT ma.member_id , e.quiz_id , q.quiz_name , e.exam_number , e.exam_question , e.exam_answer1 , e.exam_answer2 , e.exam_answer3 , e.exam_answer4 ,e.exam_correct
        FROM exam e
        LEFT JOIN quiz q
        ON e.quiz_id = q.quiz_id
        RIGHT JOIN member_answer ma
        ON ma.member_id =:member_id
        AND e.quiz_id IN (SELECT DISTINCT quiz_id
        FROM member_answer
        WHERE member_id =:member_id);";

        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $values = array(
            ':member_id' => $member_id,
        );
        $stmt->execute($values);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        if($result){
            return $response->withJson(array('status' => 'true','result'=>$result),200);
        }else{
            return $response->withJson(array('status' => 'Member Answer Not Found'),422);
        }
        $db=null;

    } catch(\PDOException $ex) {
      return $response->withJson(array('error' => $ex->getMessage()),422);
    }
}
?>
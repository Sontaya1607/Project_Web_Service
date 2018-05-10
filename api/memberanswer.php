<?php
function getMemAnswers($request, $response) {
    $sql = "SELECT * FROM member_answer";
    try {
        $db = getConnection();

        $result = null;

        $stmt = $db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if($result){
            return $response->withJson(array('status' => 'true','result'=>$result),200);
        }else{
            return $response->withJson(array('status' => 'Member Answer Not Found'),422);
        }
        $db=null;
               
    }
    catch(\PDOException $ex){
        return $response->withJson(array('error' => $ex->getMessage()),422);
    }
}

function getMemAnswer($request, $response) {
    $mamember_id = 0;
    $maquiz_id = 0;
    $mamember_id = $request->getAttribute('id1');
    $maquiz_id =  $request->getAttribute('id2');

    try {
        $db = getConnection();
        $sql = "SELECT * FROM member_answer WHERE member_id=:mamember_id AND quiz_id=:maquiz_id";
        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $values = array(
            ':mamember_id' => $mamember_id,
            ':maquiz_id' => $maquiz_id
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

function addMemAnswer($request, $response) {
    $mamember_id = 0;
    $maquiz_id = 0;
    $mamember_id = $request->getAttribute('id1');
    $maquiz_id =  $request->getAttribute('id2');

    $sql = "INSERT INTO member_answer VALUES (
        :ma_member_id,
        :ma_quiz_id,
        :ma_exam_number,
        :ma_member_answer,
        :ma_exam_correct,
        :mb_score
    )";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $values = array(
            ':ma_member_id' => $mamember_id,
            ':ma_quiz_id' => $maquiz_id,
            ':ma_exam_number' => $request->getParam('exam_number'),
            ':ma_member_answer' => $request->getParam('member_answer'),
            ':ma_exam_correct' => $request->getParam('exam_correct'),
            ':mb_score' => $request->getParam('score')
        );
        $result = $stmt->execute($values);
        return $response->withJson(array('status' => 'Member Answer Created'),200);
        $db=null;
        }
        catch(\PDOException $ex){
                return $response->withJson(array('error' => $ex->getMessage()),422);
        }
}

function updateMemAnswer($request, $response) {
    $mamember_id = 0;
    $maquiz_id = 0;
    $mamember_id = $request->getAttribute('id1');
    $maquiz_id =  $request->getAttribute('id2');

    // UPDATE students SET stu_fullname=:stu_fullname WHERE stu_id=:stu_id
    $sql = "UPDATE member_answer
                SET exam_number=:ma_exam_number,
                    member_answer=:ma_member_answer,
                    exam_correct=:ma_exam_correct,
                    score=:mb_score 
                WHERE member_id=:ma_member_id AND quiz_id=:ma_quiz_id";
    // $sql = "INSERT INTO member_answer VALUES (
    //     :ma_member_id,
    //     :ma_quiz_id,
    //     :ma_exam_number,
    //     :ma_member_answer,
    //     :ma_exam_correct,
    //     :mb_score
    // )";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $values = array(
            ':ma_exam_number' => $request->getParam('exam_number'),
            ':ma_member_answer' => $request->getParam('member_answer'),
            ':ma_exam_correct' => $request->getParam('exam_correct'),
            ':mb_score' => $request->getParam('score'),
            ':ma_member_id' => $mamember_id,
            ':ma_quiz_id' => $maquiz_id
        );
        $result = $stmt->execute($values);
        if($result){
            return $response->withJson(array('status' => 'Member Answer Updated'),200);
        }else{
            return $response->withJson(array('status' => 'Member Answer Not Found'),422);
        }
        $db=null;
        }
        catch(\PDOException $ex){
                return $response->withJson(array('error' => $ex->getMessage()),422);
        }
}
?>
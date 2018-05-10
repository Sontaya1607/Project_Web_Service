<?php
function getQuizs($request, $response) {
    $sql = "SELECT * FROM quiz";
    try {
        $db = getConnection();

        $result = null;

        $stmt = $db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if($result){
            return $response->withJson(array('status' => 'true','result'=>$result),200);
        }else{
            return $response->withJson(array('status' => 'Quiz Not Found'),422);
        }
        $db=null;
               
    }
    catch(\PDOException $ex){
        return $response->withJson(array('error' => $ex->getMessage()),422);
    }
}

function getQuizsBySubjID($request, $response) {
    $subj_id = 0;
    $subj_id =  $request->getAttribute('id');
    try {
        $db = getConnection();
        $sql = "SELECT * FROM quiz WHERE subject_id=:subj_id";
        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $values = array(
            ':subj_id' => $subj_id
        );
        $stmt->execute($values);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        if($result){
            return $response->withJson(array('status' => 'true','result'=>$result),200);
        }else{
            return $response->withJson(array('status' => 'Quiz Not Found'),422);
        }
        $db=null;

    } catch(\PDOException $ex) {
      return $response->withJson(array('error' => $ex->getMessage()),422);
    }
}
?>
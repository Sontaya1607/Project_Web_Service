<?php
function getExams($request, $response) {
    $sql = "SELECT * FROM exam";
    try {
        $db = getConnection();

        $result = null;

        $stmt = $db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if($result){
            return $response->withJson(array('status' => 'true','result'=>$result),200);
        }else{
            return $response->withJson(array('status' => 'Example Not Found'),422);
        }
        $db=null;
               
    }
    catch(\PDOException $ex){
        return $response->withJson(array('error' => $ex->getMessage()),422);
    }
}

function getExamsByQuizID($request, $response) {
    $quiz_id = 0;
    $quiz_id =  $request->getAttribute('id');
    try {
        $db = getConnection();
        $sql = "SELECT * FROM exam WHERE quiz_id=:quiz_id";
        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $values = array(
            ':quiz_id' => $quiz_id
        );
        $stmt->execute($values);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        if($result){
            return $response->withJson(array('status' => 'true','result'=>$result),200);
        }else{
            return $response->withJson(array('status' => 'Example Not Found'),422);
        }
        $db=null;

    } catch(\PDOException $ex) {
      return $response->withJson(array('error' => $ex->getMessage()),422);
    }
}
?>
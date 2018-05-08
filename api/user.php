<?php
function getUsers($request, $response) {
    $sql = "SELECT * FROM user";
    try {
        $db = getConnection();

        $result = null;

        $stmt = $db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if($result){
            return $response->withJson(array('status' => 'true','result'=>$result),200);
        }else{
            return $response->withJson(array('status' => 'User Not Found'),422);
        }
        $db=null;
               
    }
    catch(\PDOException $ex){
        return $response->withJson(array('error' => $ex->getMessage()),422);
    }
}

function getUserByID($request, $response) {
    $user_id = 0;
    $user_id =  $request->getAttribute('id');

    try {
        $db = getConnection();
        $sql = "SELECT * FROM user WHERE user_id=:user_id";
        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $values = array(
            ':user_id' => $user_id
        );
        $stmt->execute($values);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        if($result){
            return $response->withJson(array('status' => 'true','result'=>$result),200);
        }else{
            return $response->withJson(array('status' => 'User Not Found'),422);
        }
        $db=null;

    } catch(\PDOException $ex) {
      return $response->withJson(array('error' => $ex->getMessage()),422);
    }
}

function getUserByQuizID($request, $response) {
    $quiz_id = 0;
    $quiz_id = $request->getAttribute('id');

    $sql = "INSERT INTO user VALUES (
        :user_id,
        :quiz_id,
        :score
    )";

    try {
        $db = getConnection();
        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $values = array(
            ':user_id' => NULL,
            ':quiz_id' => $quiz_id,
            ':score' => $request->getParam('score')

        );
        $result = $stmt->execute($values);
        return $response->withJson(array('status' => 'User Created'),200);
        
        $db=null;
        }
        catch(\PDOException $ex){
                return $response->withJson(array('error' => $ex->getMessage()),422);
        }
}
?>
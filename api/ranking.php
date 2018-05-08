<?php
function getRankings($request, $response) {
    $sql = "SELECT m.member_id, m.member_username, q.quiz_id, q.quiz_name, r.score
              FROM ranking r
                    INNER JOIN member m
                      ON r.member_id = m.member_id
                    INNER JOIN quiz q
                      ON r.quiz_id = q.quiz_id";
    try {
        $db = getConnection();

        $result = null;

        $stmt = $db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if($result){
            return $response->withJson(array('status' => 'true','result'=>$result),200);
        }else{
            return $response->withJson(array('status' => 'Ranking Not Found'),422);
        }
        $db=null;
               
    }
    catch(\PDOException $ex){
        return $response->withJson(array('error' => $ex->getMessage()),422);
    }
}

function getRankingByID($request, $response) {
    $rmember_id = 0;
    $rquiz_id = 0;
    $rmember_id = $request->getAttribute('id1');
    $rquiz_id =  $request->getAttribute('id2');

    try {
        $db = getConnection();
        $sql = "SELECT m.member_id, m.member_username, q.quiz_id, q.quiz_name, r.score
	                FROM ranking r
                    INNER JOIN member m
                      ON r.member_id = m.member_id
                    INNER JOIN quiz q
                      ON r.quiz_id = q.quiz_id
                  WHERE r.member_id=:rmember_id AND r.quiz_id=:rquiz_id";
        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $values = array(
            ':rmember_id' => $rmember_id,
            ':rquiz_id' => $rquiz_id
        );
        $stmt->execute($values);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        if($result){
            return $response->withJson(array('status' => 'true','result'=>$result),200);
        }else{
            return $response->withJson(array('status' => 'Ranking Not Found'),422);
        }
        $db=null;

    } catch(\PDOException $ex) {
      return $response->withJson(array('error' => $ex->getMessage()),422);
    }
}

function addRankingByID($request, $response) {
    $rmember_id = 0;
    $rquiz_id = 0;
    $rmember_id = $request->getAttribute('id1');
    $rquiz_id =  $request->getAttribute('id2');

    $sql = "INSERT INTO ranking VALUES (
        :rmember_id,
        :rquiz_id,
        :rranking
    )";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $values = array(
            ':rmember_id' => $rmember_id,
            ':rquiz_id' => $rquiz_id,
            ':rranking' => $request->getParam('ranking')
        );
        $result = $stmt->execute($values);
        return $response->withJson(array('status' => 'Ranking Created'),200);
        $db=null;
        }
        catch(\PDOException $ex){
                return $response->withJson(array('error' => $ex->getMessage()),422);
        }
}
?>
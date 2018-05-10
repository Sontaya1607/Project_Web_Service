<?php
function getMembers($request, $response) {
    $sql = "SELECT * FROM member";
    try {
        $db = getConnection();

        $result = null;

        $stmt = $db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if($result){
            return $response->withJson(array('status' => 'true','result'=>$result),200);
        }else{
            return $response->withJson(array('status' => 'Member Not Found'),422);
        }
        $db=null;
               
    }
    catch(\PDOException $ex){
        return $response->withJson(array('error' => $ex->getMessage()),422);
    }
}

function getMember($request, $response) {
    $mb_id = 0;
    $mb_id =  $request->getAttribute('id');
    try {
        $db = getConnection();
        $sql = "SELECT * FROM member WHERE member_id=:mb_id";
        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $values = array(
            ':mb_id' => $mb_id
        );
        $stmt->execute($values);
        $result = $stmt->fetchObject();

        if($result){
            return $response->withJson(array('status' => 'true','result'=>$result),200);
        }else{
            return $response->withJson(array('status' => 'Member Not Found'),422);
        }
        $db=null;

    } catch(\PDOException $ex) {
      return $response->withJson(array('error' => $ex->getMessage()),422);
    }
}

function addMember($request, $response) {
    $sql = "INSERT INTO member VALUES (
        :mb_id,
        :mb_username,
        :mb_email,
        :mb_fname,
        :mb_lname,
        :mb_password
    )";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $salt = 'sfretb470gjnbdvv8gout8rod4waqxbd';
        $password = $request->getParam('password');
        $hash_password = hash_hmac('sha256',$password,$salt);

        $values = array(
            ':mb_id' => NULL,
            ':mb_username' => $request->getParam('username'),
            ':mb_email' => $request->getParam('email'),
            ':mb_fname' => $request->getParam('fname'),
            ':mb_lname' => $request->getParam('lname'),
            ':mb_password' => $hash_password
        );
        $result = $stmt->execute($values);
        // return $response->withJson(array('status' => 'Member Created'),200);
        return $response->withJson(array('status' => 'Member Created'),200)->withHeader('Location', 'http://ec2-13-229-115-177.ap-southeast-1.compute.amazonaws.com/web-service/index.php/user_authentication/login');

        $db=null;
        }
        catch(\PDOException $ex){
                return $response->withJson(array('error' => $ex->getMessage()),422);
        }
}
?>
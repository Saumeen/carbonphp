<?php
include 'connection.php';

        $email = filter_input(INPUT_POST,"email");
        $pass = filter_input(INPUT_POST,"password");
		//$email= $_POST['email'];
		//$pass = $_POST['password'];
        
		$sql="select * from user_data where email='".$email."' and password='".$pass."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $userid= $row["userid"];
        $sqlsession =" select * from session where userid='".$userid."' ";
        $result1 =$conn->query($sqlsession);
        $row1 = $result1->fetch_assoc();
        $sessionid  = $row1["sessionid"];

        function getToken(){
                 $token = "";
                 $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                 $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
                 $codeAlphabet.= "0123456789";
                 $max = strlen($codeAlphabet); // edited
                 $timestamp = round(microtime(true) * 1000);

                for ($i=0; $i < 15; $i++) {
                    $token .= $codeAlphabet[random_int(0, $max-1)];
                }
                
                return $token.$timestamp;
            }
            
            if($userid){
                    session_start();
                    $_SESSION['email']=$email;
                    $_SESSION['password']=$pass;
                    $_SESSION['userid']=$userid;
                    if($sessionid){
                        $session_id = $sessionid;
                        $_SESSION['session_id']=$session_id;
                    }
                    else{
                    $session_id= getToken();
                    $_SESSION['session_id']=$session_id;
                    $session_entry= "INSERT INTO session(userid,sessionid) values('$userid','$session_id')";
                    $conn->query($session_entry);
                    }
                    echo '{"status": "true", "session_id":'.$session_id.',"userid":'.$userid.'}';
                }
            else{
                    echo '{"status": "false"}';
                }
?>
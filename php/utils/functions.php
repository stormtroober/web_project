<?php
function sec_session_start() {
    $session_name = 'sec_session_id';
    $secure = false;
    $httponly = true;
    ini_set('session.use_only_cookies', 1);
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
    session_name($session_name);
    session_start();
    session_regenerate_id();
}

function login($email, $password, $mysqli) {
    if ($stmt = $mysqli->prepare("SELECT Email, Nome, Password, Salt FROM UTENTI WHERE Email = ? LIMIT 1")) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user_id, $username, $db_password, $salt);
        $stmt->fetch();
        $password = hash('sha512', $password.$salt);
        if($stmt->num_rows == 1) {
            if(checkbrute($user_id, $mysqli) == true) { 
                // Account disabilitato
                // Invia un e-mail all'utente avvisandolo che il suo account è stato disabilitato.
                return false;
            } else {
            if($db_password == $password) {
                $user_browser = $_SERVER['HTTP_USER_AGENT'];

                $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                $_SESSION['user_id'] = $user_id; 
                $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
                $_SESSION['username'] = $username;
                $_SESSION['login_string'] = hash('sha512', $password.$user_browser);
                return true;    
            } else {
                $now = time();
                $mysqli->query("INSERT INTO LOGIN_ATTEMPTS (id, time) VALUES ('$user_id', '$now')");
                return false;
            }
            }
       } else {
          // L'utente inserito non esiste.
          return false;
       }
    }
 }

 function checkbrute($user_id, $mysqli) {
    $now = time();
    $valid_attempts = $now - (2 * 60 * 60); 
    if ($stmt = $mysqli->prepare("SELECT time FROM LOGIN_ATTEMPTS WHERE Email = ? AND time > '$valid_attempts'")) { 
       $stmt->bind_param('i', $user_id); 
       $stmt->execute();
       $stmt->store_result();
       // Verifico l'esistenza di più di 5 tentativi di login falliti.
       if($stmt->num_rows > 5) {
          return true;
       } else {
          return false;
       }
    }
 }

 function login_check($mysqli) {
    if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
      $user_id = $_SESSION['user_id'];
      $login_string = $_SESSION['login_string'];
      $username = $_SESSION['username'];     
      $user_browser = $_SERVER['HTTP_USER_AGENT'];
      if ($stmt = $mysqli->prepare("SELECT Password FROM UTENTI WHERE Email = ? LIMIT 1")) { 
         $stmt->bind_param('i', $user_id);
         $stmt->execute();
         $stmt->store_result();
  
         if($stmt->num_rows == 1) {
            $stmt->bind_result($password);
            $stmt->fetch();
            $login_check = hash('sha512', $password.$user_browser);
            echo $login_check."<br/>";
            echo $login_string;
            if($login_check == $login_string) {
               echo "ehi";
               // Login eseguito!!!!
               return true;
            } else {
               echo "ehi1";
               //  Login non eseguito
               return false;
            }
         } else {
            echo "ehi2";
             // Login non eseguito
             return false;
         }
      } else {
         echo "ehi3";
         // Login non eseguito
         return false;
      }
    } else {
      echo "ehi4";
      // Login non eseguito
      return false;
    }
 }

?>
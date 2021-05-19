<?php session_start(); ?>
<?php require_once('../includes/db.php'); ?>
<?php
echo $_SESSION['cpage'];
 
                                    if(isset($_POST['submit'])) {
                                        $email = trim($_POST['email']);
                                        $password = trim($_POST['password']);

                                        $sql = "SELECT * FROM users WHERE user_email = :email";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute([
                                            ':email' => $email
                                        ]);
                                        $count = $stmt->rowCount();
                                        if($count == 0) {
                                            $error = "Wrong credentials!";
                                        } else if($count > 1) {
                                            $error = "Wrong credentials!";
                                        } else if($count == 1) {
                                            $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                            $user_password_hash = $user['user_password'];
                                            $user_name = $user['user_name'];
                                            $user_role = $user['user_role'];
                                            if(password_verify($password, $user_password_hash)) {
                                                $success = "Sign in successful!";
                                                    $user_id = $user['user_id'];
                                                    $user_nickname = $user['user_nickname'];
                                                    $d_user_id = base64_encode($user_id);
                                                    $d_user_nickname = base64_encode($user_nickname);
                                                    // userid
                                                    setcookie('_uid_', $d_user_id, time() + 60 * 60 * 24, '/', '', '', true);
                                                    // user nickname
                                                    setcookie('_uiid_', $d_user_nickname, time() + 60 * 60 * 24, '/', '', '', true);
                                                
                                                $_SESSION['user_name'] = $user_name;
                                                $_SESSION['user_role'] = $user_role;
                                                $_SESSION['login'] = 'success';
                                                
                                                header('Location: http://localhost/lalit_fashion_website/'.$_SESSION['cpage']);
                                                
                                            } else {
                                                $error_password = "Wrong password!";
                                            }
                                        }
                                    }
                                ?>
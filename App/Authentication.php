<?php

namespace App;

use App\Db;
use App\Session;

class Authentication
{
    public static string $errName;
    public static string $errEmail;
    public static string $errPassword;
    public static string $errCpassword;
    private function __construct()
    {
        return;
    }

    public static function signIn($email, $password): void
    {
        if (empty($email)) {
            echo '<script>
                toastr.error("Email is required", "", {
                    "toastClass": "bg-danger",
                });
            </script>';
        } else {
            $crrEmail = Db::conn()->real_escape_string(Authentication::safeData($email));
        }
        if (empty($password)) {
            echo '<script>
                toastr.error("Password is required", "", {
                    "toastClass": "bg-danger",
                });
            </script>';
        } else {
            $crrPassword = Db::conn()->real_escape_string(Authentication::safeData(data: $password));
        }

        if (isset($crrEmail, $crrPassword)) {
            $sql = "SELECT * FROM users WHERE `email` = '$email'";
            $CheckEmail = Db::conn()->query($sql);
            $user = mysqli_fetch_assoc($CheckEmail);
            if ($user) {
                if (password_verify(password: $password, hash: $user['password'])) {
                    Session::set(key: 'user', value: $user);
                    echo '<script>
                    toastr.success("Login Successful", "", {
                        "toastClass": "bg-success",
                    });
                    setTimeout(() => {
                        window.location.href = "./";
                    }, 2000);
                </script>';
                } else {
                    echo '<script>
                    toastr.error("Invalid Email or Password", "", {
                        "toastClass": "bg-danger",
                    });
                </script>';
                }
            } else {
                echo '<script>
                toastr.error("Invalid Email or Password", "", {
                    "toastClass": "bg-danger",
                });
            </script>';
            }
        }
    }

    public static function signUp(string $name, string $email, string $password, string $cpassword): void
    {
        if (empty($name)) {
            Authentication::$errName = "Name is required";
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", subject: $name)) {
            Authentication::$errName = "Only letters and white space allowed";
        } else {
            $crrName = Db::conn()->real_escape_string(Authentication::safeData(data: $name));
        }

        if (empty($email)) {
            Authentication::$errEmail = "Email is required";
        } elseif (!filter_var(value: $email, filter: FILTER_VALIDATE_EMAIL)) {
            Authentication::$errEmail = "Invalid Email Format";
        } else {
            $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
            $CheckEmail = Db::conn()->query($sql);
            if (mysqli_num_rows($CheckEmail) > 0) {
                Authentication::$errEmail = "Email already exists";
            } else {
                $crrEmail = Db::conn()->real_escape_string(Authentication::safeData(data: $email));
            }
        }

        if (empty($password)) {
            Authentication::$errPassword = "Password is required";
        } elseif (strlen(string: $password) < 8) {
            Authentication::$errPassword = "Password must be at least 8 characters";
        } else {
            $crrPassword = Db::conn()->real_escape_string(Authentication::safeData(data: $password));
        }

        if (empty($cpassword)) {
            Authentication::$errCpassword = "Confirm Password is required";
        } elseif ($cpassword !== $password) {
            Authentication::$errCpassword = "Password does not match";
        } else {
            $crrCpassword = Db::conn()->real_escape_string(Authentication::safeData(data: $cpassword));
        }

        if (isset($crrName, $crrEmail, $crrPassword, $crrCpassword)) {
            $crrPassword = password_hash(password: $crrPassword, algo: PASSWORD_BCRYPT);
            $sql = "INSERT INTO users (`name`, `email`, `password`) VALUES ('$crrName', '$crrEmail', '$crrPassword')";
            if (Db::conn()->query($sql)) {
                echo '<script>
                    toastr.success("Registration Successful", "", {
                        "toastClass": "bg-success",
                    });
                    setTimeout(() => {
                        window.location.href = "./sign-in.php";
                    }, 2000);
                </script>';
            } else {
                echo '<script>
                    toastr.error("Registration Failed", "", {
                        "toastClass": "bg-danger",
                    });
                </script>';
            }
        }
    }

    public static function safeData($data): string
    {
        $data = htmlspecialchars(string: $data);
        $data = stripslashes(string: $data);
        $data = trim(string: $data);
        return $data;
    }
}

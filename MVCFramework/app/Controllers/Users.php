<?php

class Users extends Controller{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    
    public function index()
    {
        echo "somtehias";
    }
    public function userLogin()
    {
        $data = [
            'title' => 'Login Page', 
            'username' => '',
            'password' => '' ,         
            'userNameError' => '',
            'passwordError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),         
                'userNameError' => '',
                'passwordError' => ''
            ];

            //Username Kontrolleri
            if(empty($data['username']))
                $data['userNameError'] = 'Kullanıcı adı kısmı boş geçilemez.';
            
            //Password Kontrolleri
            if(empty($data['password']))
                $data['passwordError'] = 'Parola kısmı boş geçilemez.';

            //Tüm hataların boş olduğu kontrolünü yapıyoruz
            if (empty($data['userNameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->userLogin($data['username'], $data['password']); 
            }

            if($loggedInUser)
               $this->createUserSession($loggedInUser);
            else
            {
                $data['passwordError'] = 'Parola ya da kullanıcı adı hatalı , lütfen tekrar deneyiniz';
                $this->view('userLogin',$data);
            }
        }else{
            $data = [
                'username' => '',
                'password' => '' ,         
                'userNameError' => '',
                'passwordError' => ''
            ];
        }
        $this->view('userLogin',$data);
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->userID;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;

    }

    public function userLogout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        header('location: ' . URLROOT . '/Users/userLogin');
    }

    public function userRegister()
    {
        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'userNameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'userNameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];
            //Name sadece harf ve rakamlardan oluşabilir 
            $nameValidation = "/^[a-zA-Z0-9]*$/";
            //Password yazım kuralı
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
             
            //Kullanıcı adı doğrulaması
            if(empty($data['username']))
                $data['userNameError'] = 'Lütfen kullanıcı adı giriniz.';
            else if(!preg_match($nameValidation , $data['username']))
                $data['userNameError'] = 'Kullanıcı adı sadece harf ve rakamlardan oluşabilir!';

            //Email doğrulaması 
            if(empty($data['email']))
                $data['emailError'] = 'Eposta kısmı boş geçilemez!';
            else if(!filter_var($data['email'] , FILTER_VALIDATE_EMAIL))
                $data['emailError'] = 'Eposta yazım kurallarına uyunuz!';
            else{
                if($this->userModel->findUserByEmail($data['email']))
                    $data['emailError'] = 'Eposta daha önceden kullanılmış!';
            }     
            
            //Şifre doğrulaması
            if(empty($data['password']))
                $data['passwordError'] = 'Şifre kısmı boş geçilemez!';
            else if(strlen($data['password']) < 6)
                $data['passwordError'] = 'Şifre 6 haneden kısa olamaz.';
            else if(preg_match($passwordValidation,$data['password']))
                $data['passwordError'] = 'Şifre en az 1 adet rakam içermek zorundadır!';

            //ConfirmPassword Doğrulaması
            if(empty($data['confirmPassword']))
                $data['confirmPasswordError'] = 'Lütfen parolanızı doğrulayınız.';
            else{
                if($data['password'] != $data['confirmPassword'])
                    $data['confirmPasswordError'] = 'Şifreler eşleşmiyor , lütfen tekrar giriniz.';
            }

            //Tüm hataların boş olduğundan emin oluyoruz.
            if(empty($data['userNameError']) && empty($data['passwordError']) && 
            empty($data['emailError']) && empty($data['confirmPasswordError']))
            {
                //Parola hashleme kısmı
                $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
                            //Her şey olumluysa yönlendirme yapıyoruz.

                if($this->userModel->userRegister($data))            
                    header('location: '. URLROOT . '/users/userLogin');
                else
                    die('Bir takım hatalar oluştu!');
            }                       
        }
        $this->view('userRegister',$data);
    }
}
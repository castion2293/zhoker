<?php

namespace App\Presenters\Lang;

class LangPresenter_zh_tw implements LangPresenterInterface
{
    public function desktop()
    {
        return [
            'header' => [
                'zhoker' => '作客',
                'signin' => '登入',
                'signup' => '註冊',
                'help' => '協助',
                'chef' => '廚師',
                'logout' => '登出',
                'setting' => '設定',
                'image' => '圖像',
                'create' => '新增',
                'menu' => '餐單',
                'order' => '訂單',
                'shopping_cart' => '購物車',
                'profile' => '資料',

                'sign_in_form_title' => '登入',
                'sign_in_form_email' => '電子郵件',
                'sign_in_form_email_enter' => '輸入電子郵件',
                'sign_in_form_password' => '密碼',
                'sign_in_form_password_enter' => '輸入密碼',
                'sign_in_form_forgetpassword' => '忘記密碼',
                'sign_in_form_sign_in_with' => '登入由',
                'sign_in_form_not_a_member' => '還不是會員',
                'sign_in_form_sign_up' => '註冊',

                'forgot_form_title' => '忘記密碼',
                'forgot_form_description' => '為了重新設定密碼，請輸入你之前所註冊的電子郵件',
                'forgot_form_email' => '電子郵件',
                'forgot_form_send' => '寄出',
                'forgot_form_back_sign_in' => '回到登入頁面',

                'sign_up_form_title' => '註冊',
                'sign_up_form_description' => '請註冊並且開始使用我們提供的服務',
                'sign_up_form_first_name' => '名子',
                'sign_up_form_last_name' => '姓氏',
                'sign_up_form_email' => '電子郵件',
                'sign_up_form_phone_number' => '電話號碼',
                'sign_up_form_password' => '密碼',
                'sign_up_form_verify_password' => '密碼驗證',
                'sign_up_form_acception' => '在註冊前, 我接受zhoker.com的',
                'sign_up_form_term_use' => '規則與使用方法',
                'sign_up_form_sign_up_with' => '註冊由',
                'sign_up_form_sign_in' => '登入',
                'sign_up_form_member' => '如果你已經是會員',

                'chef_sign_in_form_title' => '廚師登入',
                'chef_sign_in_form_email' => '電子郵件',
                'chef_sign_in_form_email_enter' => '輸入電子郵件',
                'chef_sign_in_form_user_password' => '使用者密碼',
                'chef_sign_in_form_chef_password' => '廚師密碼',
                'chef_sign_in_form_password_enter' => '輸入密碼',
                'chef_sign_in_form_forgot_password' => '忘記密碼',
                'chef_sign_in_form_forgot_chef_password' => '忘記廚師密碼',
                'chef_sign_in_form_sign_in' => '登入',
                'chef_sign_in_form_not_chef' => '還不是廚師',
                'chef_sign_in_form_become_a_chef' => '成為一名廚師',
            ],

            'index' => [
                'title1' => '享受',
                'title2' => '美味及健康',
                'order' => '開始預購',
            ],
            
        ];
    }
}
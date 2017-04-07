<?php

namespace App\Presenters\Lang;

class LangPresenter_en implements LangPresenterInterface
{
    public function desktop()
    {
        return [
            'header' => [
                'zhoker' => 'zhoker',
                'signin' => 'SignIn',
                'signup' => 'SignUp',
                'help' => 'Help',
                'chef' => 'Chef',
                'logout' => 'LogOut',
                'setting' => 'Setting',
                'image' => 'Image',
                'create' => 'Create',
                'menu' => 'Menu',
                'order' => 'Order',
                'shopping_cart' => 'Shopping Cart',
                'profile' => 'Profile',

                'sign_in_form_title' => 'Sign In',
                'sign_in_form_email' => 'Email',
                'sign_in_form_email_enter' => 'Enter Email',
                'sign_in_form_password' => 'Password',
                'sign_in_form_password_enter' => 'Enter Password',
                'sign_in_form_forgetpassword' => 'Forgot Password',
                'sign_in_form_sign_in_with' => 'Sign in with',
                'sign_in_form_not_a_member' => 'Not a member',
                'sign_in_form_sign_up' => 'Sign Up',

                'forgot_form_title' => 'Forgot Password',
                'forgot_form_description' => 'To reset your password, please enter the email address you sign in before',
                'forgot_form_email' => 'Email Address',
                'forgot_form_send' => 'Send',
                'forgot_form_back_sign_in' => 'Back to Sign in',

                'sign_up_form_title' => 'Sign up',
                'sign_up_form_description' => 'Please sign up to keep track of your favorites and saved searches',
                'sign_up_form_first_name' => 'First Name',
                'sign_up_form_last_name' => 'Last Name',
                'sign_up_form_email' => 'Email Address',
                'sign_up_form_phone_number' => 'Phone Number',
                'sign_up_form_password' => 'Password',
                'sign_up_form_verify_password' => 'Verify Password',
                'sign_up_form_acception' => 'By registering, I accept the zhoker.com',
                'sign_up_form_term_use' => 'Term of Use',
                'sign_up_form_sign_up_with' => 'Sign up with',
                'sign_up_form_sign_in' => 'Sign in',
                'sign_up_form_member' => 'if you are already a member',

                'chef_sign_in_form_title' => 'Chef Sign In',
                'chef_sign_in_form_email' => 'Email',
                'chef_sign_in_form_email_enter' => 'Enter Email',
                'chef_sign_in_form_user_password' => 'User Password',
                'chef_sign_in_form_chef_password' => 'Chef Password',
                'chef_sign_in_form_password_enter' => 'Enter Password',
                'chef_sign_in_form_forgot_password' => 'Forgot Password',
                'chef_sign_in_form_forgot_chef_password' => 'Forgot Chef Password',
                'chef_sign_in_form_sign_in' => 'Sign In',
                'chef_sign_in_form_not_chef' => 'Not a Chef',
                'chef_sign_in_form_become_a_chef' => 'Become a Chef',
            ],

            'index' => [
                'title1' => 'Eating',
                'title2' => 'Tasty and Fresh',
                'order' => 'Order Now',
            ],
            
        ];
    }
}
<?php

namespace App\Presenters\Lang;

class LangPresenter_zh_tw implements LangPresenterInterface
{
    /**
     * @return array
     */
    public function desktop()
    {
        return [
            'language' => 'zh_tw',

            'header' => [
                'zhoker' => 'Zhoker',
                'signin' => '登入',
                'signup' => '註冊',
                'help' => '協助',
                'chef' => '廚師',
                'logout' => '登出',
                'setting' => '設定',
                'image' => '相簿',
                'create' => '新增',
                'menu' => '菜單',
                'order' => '訂單',
                'shopping_cart' => '購物車',
                'profile' => '資料',
                'home' => '首頁',

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

            'footer' => [
                'company' => '公司',
                'about' => '關於',
                'press' => '媒體',
                'blog' => '部落格',
                'contact_us' => '與我們聯絡',

                'cus_chef' => '顧客與廚師',
                'policy' => '政策',
                'career' => '工作',
                'help' => '協助',

                'follow' => '追蹤我們',
            ],

            'index' => [
                'title1' => '享受',
                'title2' => '美味及健康',
                'order' => '開始預購',

                'search_city' => '台中市',
                'search_all' => '全部',
                'search_dinner' => '晚餐',
                'search_lunch' => '午餐',
                'search_brunch' => '早午餐',
                'search_breakfast' => '早餐',
                'search_teatime' => '下午茶',
                'search_date' => '日期',

                'about_description' => 'Zhoker.com 是第一個美食共享經濟的品牌，作為一個家庭廚房及食物分享平台的領導者，我們致力於找出那些出色的廚師與我們一起合作，
                                        我們的目標是幫助每一個人可以享受到美食且分享給大家，我們保證會嚴格審查每一位廚師家中的廚房衛生及整潔且以最高規格的標準來要求，
                                        所以請放心品嘗每一樣我們為你提供的美食餐點，我們有提供外送及外帶的服務甚至你可以至美崙美奐的廚師家中用餐，這些讓你有更多的機會認識跟你一樣志同道合且喜歡品嘗美食的朋友
                                        我們也樂於幫助那些生活中忙忙碌碌的上班族朋友們，你們不用在下班後又要花時間下廚，或是隨便以簡單的外食就結束一餐，zhoker.com 為你的健康著想，
                                        只要有隻手機就可以訂購你想要品嘗及健康均衡的餐點，別再猶豫了，趕快來下定吧!',

                'work_title' => '如何訂餐',
                'work_description' => '只需要三個步驟就可以在Zhoker.com訂餐',
                'work_search' => '線上搜尋',
                'work_pay' => '線上繳費',
                'work_enjoy' => '享用美食',

                'chef_title' => '我們的廚師',
                'chef_description' => '我們的廚師都廚藝精湛，讓你食之有位，讚不絕口!',

                'serve_title' => '我們的服務',
                'serve_description' => '我們提供各式各樣的餐點食物，每一位饕客都可以找到他所喜愛',
                'serve_chinese' => '中式',
                'serve_french' => '法式',
                'serve_barbecu' => '烤肉',
                'serve_seafood' => '海鮮',
                'serve_japanese' => '日式',
                'serve_korean' => '韓式',

            ],

            'chef_profile' => [
                'nav_top' => '至頂',
                'nav_profile' => '基本資料',
                'nav_menu' => '菜單',
                'nav_order' => '訂單',
                'nav_account' => '帳戶',

                'profile' => '廚師基本資料',
                'edit_profile' => '編輯基本資料',

                'menu' => '菜單',
                'go_menu' => '餐單主頁',

                'order' => '訂單',
                'no_order' => '對不起，你現在還沒有訂單!',
                'order_meal' => '餐點',
                'order_item' => '項目',
                'order_total' => '總額',
                'order_contact' => '聯絡人',
                'order_action' => '訂購狀態',
                'people_order' => '人訂購',
                'order_approved' => '確認',
                'order_pending' => '未確認',
                'order_pay' => '已付款',
                'order_not_pay' => '未付款',
                'go_order' => '訂單主頁',

                'account' => '帳戶',
            ],

            'chef_create' => [
                'title' => '新增菜單',
                'meal_name' => '餐點名稱',
                'cover_image' => '餐點封面照片',
                'meal_price' => '餐點價格',
                'time' => '供餐時段',
                'category' => '餐點分類',
                'method' => '供餐方式',
                'photo' => '餐點內容相片',
                'meal_image' => '餐點照片',
                'meal_description' => '餐點詳述',
                'create_meal' => '新增餐點',

                'create_cover_img' => '選擇餐點封面照片',

                'select_img' => '選擇照片',
                'select' => '選擇',
            ],

            'chef_index' => [
                'title' => '菜單列表',
                'new_meal' => '新菜色',
                'view' => '瀏覽',
                'edit' => '修改',
                'date_time' => '日期/時間',
                'mobile_date' => '日期',
            ],

            'chef_show' => [
                'method' => '供餐方式',
                'time' => '供餐時段',
                'type' => '餐點分類',
                'evaluation' => '評分',
                'new_meal' => '新菜色',
                'date' => '日期',
                'people_left' => '剩餘人數',
                'people_order' => '訂餐人數',
                'date_time' => '日期/時間',
                'edit' => '修改',
                'delete' => '刪除',
            ],

            'chef_edit' => [
                'title' => '修改菜單',
                'meal_name' => '餐點名稱',
                'cover_image' => '餐點封面照片',
                'meal_price' => '餐點價格',
                'time' => '供餐時段',
                'category' => '餐點分類',
                'method' => '供餐方式',
                'meal_image' => '餐點照片',
                'photo' => '餐點內容相片',
                'meal_description' => '餐點詳述',
                'save_meal' => '儲存餐點',

                'select_img' => '選擇照片',
                'select' => '選擇',
            ],

            'chef_datetimepeople' => [
                'title' => '日期/時間/人數',
                'method' => '供餐方式',
                'time' => '供餐時段',
                'type' => '餐點分類',
                'confirm' => '確認',
                'prop_title' => '人數',
                'prop_message' => '此餐點可供訂餐的人數',
                'prop_confirm' => '確認',
                'people' => '位',
                'cancel_meal' => '你確定要刪除嗎?'
            ],

            'chef_order' => [
                'title' => '餐點訂單',
                'type_search' => '分類搜尋',
                'type_all' => '全部',
                'type_approved' => '已確認',
                'type_reject' => '已拒絕',
                'type_pending' => '待確認',
                'type_cancel' => '已取消',
                'type_overdue' => '已過期',
                'no_order' => '對不起，在此分類，你現在還沒有任何訂單紀錄',
                'order_calendar' => '行事曆',
                'order_list' => '清單',

                'meal' => '餐點',
                'item' => '項目',
                'total' => '總額',
                'contact' => '聯絡人',
                'action' => '狀態',
                'people_order' => '位訂購',
                'not_approve' => '待確認',
                'rejected' => '已拒絕',
                'canceled' => '已取消',
                'approved' => '已確認',
                'overdue' => '已過期',
                'accept' => '接受訂單',
                'reject' => '拒絕訂單',
                'order_pay' => '已付款',
                'order_not_pay' => '未付款',
            ],

            'chef_image' => [
                'title' => '編輯相簿',
                'image_upload' => '上傳',
                'image_remove' => '刪除',
                'more' => '更多...',
                'modal_title' => '上傳相片',
                'modal_photos' => '上傳相片(最多10張)',
                'modal_finish' => '完成',
                'modal_upload' => '上傳'
            ],

            'chef_edit_profile' => [
                'title' => '廚師個人資料',
                'address' => '地址',
                'city' => '城市',
                'state' => '國家',
                'zip_code' => '郵遞區號',
                'store_name' => '店名',
                'photo' => '上傳一張圖像',
                'store_description' => '介紹',
                'save_profile' => '儲存個人資料',
            ],

            'user_profile' => [
                'top' => '至頂',
                'profile' => '基本資料',
                'shopping_cart' => '購物車',
                'order_history' => '訂購紀錄',

                'profile_title' => '使用者基本資料',
                'profile_hello' => '你好',
                'profile_member_since' => '會員起始日期',
                'profile_email' => '電子郵件',
                'profile_phone_number' => '電話號碼',
                'profile_edit' => '編輯基本資料',

                'cart_title' => '購物車',
                'cart_no_cart' => '對不起，請先加入你的商品至購物車',
                'cart_meal' => '餐點',
                'cart_item' => '項目',
                'cart_total' => '總額',
                'go_cart' => '購物車主頁',

                'order_title' => '訂購紀錄',
                'order_no_order' => '對不起，目前你還未有任何訂購紀錄',
                'order_number' => '訂單號碼',
                'order_price' => '總額',
                'order_pay' => '付款方式',
                'order_date' => '訂購日期',
                'order_detail' => '訂單明細',
                'order_meal' => '餐點',
                'order_item' => '項目',
                'order_total' => '組額',
                'order_status' => '狀態',
                'order_people' => '人訂購',
                'order_approved' => '已確認',
                'order_pending' => '待確認',
                'order_rejected' => '已拒絕',
                'go_order' => '訂單主頁',
            ],

            'user_order' => [
                'title' => '訂單',
                'type_search' => '分類搜尋',
                'type_all' => '全部',
                'type_approved' => '已確認',
                'type_reject' => '已拒絕',
                'type_pending' => '待確認',
                'type_cancel' => '已取消',
                'type_overdue' => '已過期',
                'type_evaluation' => '未評分',
                'type_evaluated' => '已評分',
                'no_order' => '對不起!在此分類，你目前還未有任何訂單!',
                'calendar' => '行事曆',
                'list' => '清單',

                'order_number' => '訂單編號',
                'total_price' => '全部總額',
                'pay_way' => '付款方式',
                'order_date' => '訂單日期',
                'order_detail' => '訂單明細',
                'meal' => '餐點',
                'item' => '項目',
                'total' => '總額',
                'status' => '狀態',
                'people_order' => '位訂購',
                'rejected' => '已拒絕',
                'canceled' => '已取消',
                'approved' => '已確認',
                'evaluated' => '已評分',
                'evaluate' => '未評分',
                'overdue' => '已過期',
                'pending' => '待確認',
                'cancel' => '取消訂單',
            ],

            'user_edit_profile' => [
                'title' => '使用者基本資料設定',
                'public_info' => '一般資料',
                'first_name' => '名子',
                'last_name' => '姓氏',
                'email' => '電子郵件',
                'phone_number' => '電話號碼',
                'photo' => '上傳一張圖像',
                'save_profile' => '儲存個人資料',

                'reset_password' => '重設密碼',
                'old_password' => '舊密碼',
                'new_password' => '新密碼',
                'verify_password' => '驗證密碼',
                'change_password' => '重設密碼',

                'payment_title' => '使用者付款設定',
                'card_number' => '信用卡號碼',
                'exp_date' => '日期',
                'exp_year' => '年分' ,
                'cvc' => 'CVC',
                'holder_name' => '信用卡持有人姓名',
                'confirm' => '確認設定',
                'edit' => '修改',
                'delete' => '刪除該張信用卡',
                'modal_title' => '換張信用卡',
            ],

            'maplist_search' => [
                'title' => '餐點搜尋',
                'city' => '城市',
                'date' => '日期',
                'price_range' => '價格範圍',
                'min' => '最低',
                'max' => '最高',
                'time' => '供餐時段',
                'all' => '全部',
                'dinner' => '晚餐',
                'lunch' => '午餐',
                'brunch' => '早午餐',
                'breakfast' => '早餐',
                'tea_time' => '下午茶',
                'people_left' => '剩餘人數',
                'person' => '位',
                'people' => '位',
                'method' => '供餐方式',
                'house' => '家中',
                'to_go' => '外帶',
                'deliever' => '外送',
                'sorting' => '排序',
                'price_low' => '價格 低->高',
                'price_high' => '價格 高->低',
                'type' => '餐點分類',
                'american' => '美式料理',
                'brazilian' => '巴西式料理',
                'french' => '法式料理',
                'korean' => '韓式料理',
                'mexican' => '墨西哥菜',
                'asian' => '亞洲料理',
                'chinese' => '中式料理',
                'indian' => '印度式料理',
                'hawaiian' => '夏威夷料理',
                'japanese' => '日式料理',
                'barbecue' => '烤肉',
                'european' => '歐式料理',
                'italian' => '義式料理',
                'indonesian' => '印尼式料理',
                'thai' => '泰式料理',
                'mediterr' => '地中海料理',
                'seafood' => '海鮮',
                'vegatarian' => '素食',
                'middle_east' => '中東式料理',
                'search' => '搜尋',
                'detail_title' => '進階搜尋',
            ],

            'maplist_header' => [
                'filter' => '過濾篩選',
            ],

            'product' => [
                'people_left' => '位剩餘',
                'people_eaten' => '人吃過',
                'read_more' => '了解更多',

                'buy_next_time' => '下次再買',
                'evaluation' => '評分',
                'new_meal' => '新餐點',
                'eaten' => '吃過人數',
                'person' => '位',
                'type' => '餐點分類',
                'date_time' => '日期/時間',
                'how_many' => '幾位',
                'people' => '位',
                'method' => '供餐方式',
                'add_to_cart' => '加至購物車',
                'reserve_meal' => '預購餐點',
                'other_day' => '選其他天',
                'meal_description' => '餐點詳述',
                'share' => '分享',
                'comment' => '評論',
                'more' => '更多',
            ],

            'shopping_cart' => [
                'top' => '至頂',
                'cart' => '購物車',
                'buy_next_time' => '下次再買',
                'reserve_meal' => '預購餐點',

                'keep_shopping' => '繼續購物',
                'in_shopping_cart' => '購物車內清單',
                'no_cart' => '對不起! 你目前還未有任何餐點在購物車',
                'meal' => '餐點',
                'item' => '項目',
                'quantity' => '數量',
                'total' => '總額',
                'people_order' => '人訂購',
                'remove_item' => '移除',
                'subtotal' => '全部總額',
                'checkout' => '結帳',

                'buy_next_time_item' => '下次再買清單',
                'no_next_time' => '對不起! 你目前沒有任何的下次再買清單!',
                'action' => '狀態',
                'people_left' => '人剩餘',
                'add_to_cart' => '加入購物車',


                'reserve_item' => '預購項目清單',
                'no_reserve' => '對不起! 你目前沒有任何的預購項目!',
                'cancel' => '取消',
                'other_day' => '選其他天'
            ],

            'checkout' => [
                'title' => '結帳',
                'meal' => '餐點',
                'item' => '項目',
                'total' => '總額',
                'people' => '位',
                'subtotal' => '全部總額',
                'back_cart' => '回到購物車',
                'payment' => '付款',
                'using_binding_card' => '使用綁定信用卡',
                'one_time' => '不使用綁定信用卡',
                'no_binding_card' => '對不起! 你還未有綁定信用卡!',
                'binding_card_link' => '你可以使用下面的連結來綁定你的信用卡',
                'binding_card' => '綁定信用卡',
                'confirm' => '確認付款',
            ],

            'other_day' => [
                'evaluation' => '評分',
                'new_meal' => '新餐點',
                'type' => '餐點分類',
                'method' => '供餐方式',
                'time' => '供餐時間',
                'date' => '日期',
                'people_left' => '剩餘人數',
                'action' => '狀態',
                'add_to_cart' => '加入購物車',
            ],

            'evaluation' => [
                'title' => '評分',
                'chef' => '廚師',
                'give_score' => '給此餐點評個分',
                'comment' => '留下你的評論',
                'submit' => '送出',
            ],

            'contact' => [
                'title' => '與我們聯絡',
                'name' => '姓名',
                'email' => '電子郵件',
                'subject' => '主題',
                'submit' => '送出',
            ],

            'reset_password' => [
                'title' => '重設密碼',
                'email' => '電子郵件',
                'password' => '新密碼',
                'password_confirm' => '驗證密碼',
            ],

            'send_contact_email' => [
                'title' => '你的詢問信件已寄出',
                'home' => '首頁',
            ],

            'contact_customer_mail' =>  [
                'title' => '我們已經收到你的詢問信，我也會盡快答覆你',
                'p1' => '我們再次謝謝你使用 Zhoker.com 的服務',
                'p2' => '這是系統信. 請不要回覆',

                'title2' => '你有一封新的詢問信',
            ],

            'send_email' => [
                'title' => '確認你的信箱',
                'congraduate' => '恭喜你成功地註冊了',
                'link' => 'Zhoker.com',
                'account' => '的帳號',
                'p1' => '我們已經寄出了一封確認信. 請點擊信件內的連結來啟動你的帳號',
                'p2' => '這個連結會在幾個星期後過期, 所以請盡快啟動',
                'p3' => '如果你沒有看到確認信,可能會在你的垃圾郵件箱裡',
                'shop' => '繼續購物',
            ],

            'flash' => [
                'success' => '成功',
                'error' => '錯誤',

                'are_you_sure' => '你確定嗎?',

                'product_remove_warn' => '移除後，你將無法再次恢復此餐點，需重新訂購',
                'image_remove_warn' => '移除後，你將無法恢復照片!',
                'meal_remove_warn' => '移除後，你將無法恢復此餐點',
                'reject_order_warn' => '移除後，你將無法接受此餐點!',
                'cancel_order_warn' => '移除後，你將無法恢復此訂單!',
                'delete_card_warn' => '刪除後，你將無法使用此信用卡！',
                'product_remove' => '你的項目已經成功地從購物車中移除!',
                'select_order' => '請選擇訂單！',
                'create_order' => '你的訂單已新增成功！',
                'create_meal' => '新增餐點成功！',
                'update_meal' => '修改餐點成功！',
                'delete_meal' => '刪除餐點成功！',
                'update_datetimepeople' => '日期/時間/人數 修改成功!',
                'update_user_profile' => '使用者基本資料修改成功!',
                'reset_password' => '重設密碼成功!',
                'not_match_password' => '此密碼與原始密碼不一樣!',
                'bind_card' => '綁定信用卡成功!',
                'update_card' => '修改信用卡成功!',
                'delete_card' => '刪除信用卡成功!',
                'submit_evaluation' => '此評分已送出!',
                'accept_order' => '接受訂單成功!',
                'reject_order' => '拒絕訂單成功!',
                'cancel_order' => '取消訂單成功!',
                'login' => '登入成功!!',

                'cancel_confirm_btn' => '確認刪除!',
                'delete_confirm_btn' => '確認刪除!',
                'reject_confirm_btn' => '確認拒絕!',
                'cancel_btn' => '取消',
            ],

            'notification' => [
                'ResetPassword_title' => '因為你需要重設密碼，所以我們發了此郵件給你',
                'ResetPassword_action' => '重設密碼',
                'ResetPassword_footer' => '如果你不需要重設密碼，你可以不用在乎此郵件',

                'Accountactive_title' => '電子郵件註冊確認信',
                'Accountactive_p1' => '請點選下面的連結來啟動你的帳號',
                'Accountactive_action' => '啟動',
                'Accountactive_p2' => '感謝你使用我們的服務!',

                'chefcancel_title' => 'Zhoker.com 餐點取消通知',
                'chefcancel_p1' => '以下是取消餐點訊息:',
                'chefcancel_p2' => '此餐點已被取消且費用將會退回',
                'chefcancel_p3' => '感謝使用 Zhoker.com 如有任何的問題，請向我們聯絡',

                'cheforder_title' => 'Zhoker.com 餐點訂單通知',
                'cheforder_p1' => '你目前有幾個餐點需要確認，請點選下面的連結來確認這些餐點',
                'cheforder_action' => '確認',
                'cheforder_p2' => '感謝使用 Zhoker.com 如有任何的問題，請向我們聯絡',

                'usercancel_title' => 'Zhoker.com 餐點取消通知',
                'usercancel_p1' => '以下是取消餐點訊息:',
                'usercancel_p2' => '你已經取消此餐點，費用會在幾個工作天後退還',
                'usercancel_p3' => '感謝使用 Zhoker.com 如有任何的問題，請向我們聯絡',

                'userconfirm_title' => 'Zhoker.com 餐點訂單通知',
                'userconfirm_p1' => '歡迎使用 Zhoker.com',
                'userconfirm_p2' => '這是你的訂單: ',
                'userconfirm_confirm' => ' 已被確認',
                'userconfirm_p3' => '而且我們已經扣款了 $',
                'userconfirm_success' => ' 成功了',
                'userconfirm_p4' => '請準時取餐，再次感謝你使用 Zhoker.com 的服務!!',

                'userorder_title' => 'Zhoker.com 餐點訂單通知',
                'userorder_p1' => '歡迎使用 Zhoker.com',
                'userorder_p2' => '這是你的訂單:',
                'userorder_p3' => '這些訂單需要由廚師先確認，在訂單確認前我們不會向你收取任何費用',
                'userorder_p4' => '在訂單被確認後，我們會再向你通知',
                'userorder_p5' => '感謝使用 Zhoker.com 如有任何的問題，請向我們聯絡',

                'userreject_title' => 'Zhoker.com 餐點訂單通知',
                'userreject_p1' => '歡迎使用 Zhoker.com',
                'userreject_p2' => '不好意思, 你的訂單: ',
                'userreject_reject' => ' 被拒絕了',
                'userreject_p3' => '不需要擔心，我們沒有向你索取此餐點的任何費用且你還是可以訂購其他餐點',
                'userreject_p4' => '感謝使用 Zhoker.com 如有任何的問題，請向我們聯絡!',

                'welcome_title' => '歡迎來到 Zhoker.com',
                'welcome_p1' => '歡迎使用 Zhoker.com',
                'welcome_p2' => '感謝你使用我們的服務!',

                'meal_name' => '餐點',
                'unite_price' => '單價',
                'people_order' => '訂購人數',
                'total_price' => '總額',
                'in' => '供餐方式 ',
                'on' => '在 ',
                'at' => '在 ',
                'chef_name' => '廚師名子是 '
            ],
        ];
    }
}
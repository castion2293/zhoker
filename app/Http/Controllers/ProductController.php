<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ProductService;
use App\Services\AgentService;
use App\Services\GateService;

class ProductController extends Controller
{
    protected $productService;
    protected $agentService;
    protected $gateService;


    /**
     * ProductController constructor.
     * @param ProductService $productService
     * @param AgentService $agentService
     * @param GateService $gateService
     */
    public function __construct(ProductService $productService, AgentService $agentService, GateService $gateService)
    {
        $this->middleware('auth', ['except' => ['getProductShow']]);

        $this->productService = $productService;
        $this->agentService = $agentService;
        $this->gateService = $gateService;

        parent::boot();
    }

    /**
     * @param $id
     * @param $datetime_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProductShow($id, $datetime_id) 
    {   
        $meal = $this->productService->findMeal($id)->getMeal();
        $datetimepeople = $this->productService->getDateTimePeople($meal, $datetime_id);
        $methods = $this->productService->getMethod($meal);
    
        $agent = $this->agentService->agent();
        return view($agent . '.products.products', ['meal' => $meal, 'datetimepeople' => $datetimepeople, 'methods' => $methods]);
    }

    /**
     * @param Request $request
     * @param $id
     * @param $datetime_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postAddToCart(Request $request, $id, $datetime_id)
    {
        $user = $this->productService->findUser()->getUser();
        $meal = $this->productService->findMeal($id)->getMeal();
        $datetime = $this->productService->getDateTimePeople($meal, $datetime_id);
        $method = $this->productService->getMethod($meal, $request->method_way);
        
        $cart = $this->productService->createCart($user, $meal, $datetime, $method, $request);

        if (count($this->productService->getBuyNextTimeItems($user, $datetime_id)))
            $this->productService->buyNextTimeCancel($user, $datetime_id);

        $url = '/product/cart/show/' . $cart->user_id . '#shoppingcart';
        return redirect($url);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCartShow($id)
    {
        $this->gateService->userIdCheck($id);

        $user = $this->productService->findUser($id)->getUser();
        $carts = $this->productService->findCartByUser($user)->getCart();
        $cartQtyArray = $this->productService->getCartQtyArray($carts);
        $totalPrice = $this->productService->getTotalPrice($carts);

        $buyNextTimeItems = $this->productService->getBuyNextTimeItems($user);
        $reserveItems = $this->productService->getReserveItems($user);
        
        $agent = $this->agentService->agent();
        return view($agent . '.products.shoppingCart', ['carts' => $carts, 
                                                        'Qtys' => $cartQtyArray, 
                                                        'totalPrice' => $totalPrice, 
                                                        'buyNextTimeItems' => $buyNextTimeItems,
                                                        'reserveItems' => $reserveItems,
                                                       ]);
    }

    /**
     * @param Request $request
     */
    public function postCartRemove(Request $request)
    {
        $this->productService->findUser()->findCartByUser()->updateEachCart($request);
        $this->productService->findCartById($request->id)->deleteCart();

        flash()->success(self::$lang->desktop()['flash']['success'], self::$lang->desktop()['flash']['product_remove']);
    }

    public function postCartStore(Request $request)
    {
        $this->productService->findUser()->findCartByUser()->updateEachCart($request);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCheckout($id)
    {
        $this->gateService->userIdCheck($id);
       
        $user = $this->productService->findUser($id)->getUser();
        $carts = $this->productService->findCartByUser($user)->getCart();

        if ($carts->isEmpty()) {
            dd("empty");
        }

        $totalPrice = $this->productService->getTotalPrice($carts);

        $agent = $this->agentService->agent();
        return view($agent . '.products.checkout', ['user' => $user, 'carts'=> $carts, 'totalPrice' => $totalPrice] );
    }

    /**
     * @param Request $request
     */
    public function postAddToBuyNextTime(Request $request)
    {
        $user = $this->productService->findUser($request->user_id)->getUser();
        $this->productService->buyNextTimeToggle($user, $request->datetimepeople_id);
    }

    /**
     * @param Request $request
     */
    public function postAddReserveMeal(Request $request)
    {
        $user = $this->productService->findUser($request->user_id)->getUser();
        $this->productService->reserveMealAdd($user, $request->meal_id);
    }

    /**
     * @param Request $request
     */
    public function postCancelReserveMeal(Request $request)
    {
        $user = $this->productService->findUser($request->user_id)->getUser();
        $this->productService->reserveMealCancel($user, $request->meal_id);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOtherDays($id)
    {
        $meal = $this->productService->findMeal($id)->getMeal();
        $datetimepeoples = $this->productService->getDateTimePeopleOthers($meal);

        $agent = $this->agentService->agent();
        return view($agent . '.products.otherdays', ['meal' => $meal, 'datetimepeoples' => $datetimepeoples] );
    }
}

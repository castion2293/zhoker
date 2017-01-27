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

    public function __construct(ProductService $productService, AgentService $agentService, GateService $gateService) 
    {
        $this->middleware('auth', ['except' => ['getProductShow']]);

        $this->productService = $productService;
        $this->agentService = $agentService;
        $this->gateService = $gateService;
    }

    public function getProductShow($id, $datetime_id) 
    {   
        $id = $this->gateService->decrypt($id)->getId();
        $datetime_id = $this->gateService->decrypt($datetime_id)->getId();

        $meal = $this->productService->getMeal($id);
        $datetimepeople = $this->productService->getDateTimePeople($meal, $datetime_id);
        $methods = $this->productService->getMethod($meal);
    
        $agent = $this->agentService->agent();
        return view($agent . '.products.products', ['meal' => $meal, 'datetimepeople' => $datetimepeople, 'methods' => $methods]);
    }

    public function postAddToCart(Request $request, $id, $datetime_id)
    {
        $user = $this->productService->getUser();
        $meal = $this->productService->getMeal($id);
        $datetime = $this->productService->getDateTimePeople($meal, $datetime_id);
        $method = $this->productService->getMethod($meal, $request->method_way);
        
        $cart = $this->productService->createCart($user, $meal, $datetime, $method, $request);

        if (count($this->productService->getBuyNextTimeItems($user, $datetime_id)))
            $this->productService->buyNextTimeCancel($user, $datetime_id);
        
        return redirect()->route('product.cart.show', encrypt($cart->user_id));
    }

    public function getCartShow($id)
    {
        $id = $this->gateService->decrypt($id)->userIdCheck()->getId();

        $user = $this->productService->getUser($id);
        $carts = $this->productService->getCart($user);
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

    public function postCartRemove(Request $request)
    {
        $user = $this->productService->getUser();
        $carts = $this->productService->getCart($user);
        $this->productService->updateEachCart($carts, $request);
        
        $item = $this->productService->getCartById($request->id);
        $this->productService->deleteCart($item);

        flash()->success('Success', 'Your item has been removed from your shopping cart!');
    }

    public function postCartStore(Request $request)
    {
        $user = $this->productService->getUser();
        $carts = $this->productService->getCart($user);
        $this->productService->updateEachCart($carts, $request);
    }

    public function getCheckout($id)
    {
        $id = $this->gateService->decrypt($id)->userIdCheck()->getId();
       
        $user = $this->productService->getUser($id);
        $carts = $this->productService->getCart($user);

        if ($carts->isEmpty()) {
            dd("empty");
        }

        $totalPrice = $this->productService->getTotalPrice($carts);

        $agent = $this->agentService->agent();
        return view($agent . '.products.checkout', ['user' => $user, 'carts'=> $carts, 'totalPrice' => $totalPrice] );
    }

    public function postAddToBuyNextTime(Request $request)
    {
        $user = $this->productService->getUser($request->user_id);
        $this->productService->buyNextTimeToggle($user, $request->datetimepeople_id);
    }

    public function postAddReserveMeal(Request $request)
    {
        $user = $this->productService->getUser($request->user_id);
        $this->productService->reserveMealAdd($user, $request->meal_id);
    }

    public function postCancelReserveMeal(Request $request)
    {
        $user = $this->productService->getUser($request->user_id);
        $this->productService->reserveMealCancel($user, $request->meal_id);
    }
}

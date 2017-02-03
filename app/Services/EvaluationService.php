<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\MealRepository;
use App\Repositories\CartRepository;
use App\Repositories\CommentRepository;

class EvaluationService
{
    protected $userRepo;
    protected $mealRepo;
    protected $cartRepo;
    protected $commentRepo;

    protected $user;
    protected $meal;
    protected $cart;

    public function __construct(UserRepository $userRepo, MealRepository $mealRepo, CartRepository $cartRepo, CommentRepository $commentRepo)
    {
        $this->userRepo = $userRepo;
        $this->mealRepo = $mealRepo;
        $this->cartRepo = $cartRepo;
        $this->commentRepo = $commentRepo;
    }

     /**
     * @param 
     * @return $this
     */
    public function findUser()
    {
        $this->user = $this->userRepo->findUserById();

        return $this;
    }

    /**
     * @param 
     * @return $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param $id
     * @return $this
     */
    public function findMeal($id)
    {
        $this->meal = $this->mealRepo->findMealById($id);

        return $this;
    }

    /**
     * @param 
     * @return $meal
     */
    public function getMeal()
    {
        return $this->meal;
    }

     /**
     * @param $id
     * @return $this
     */
    public function findCart($id)
    {
        $this->cart = $this->cartRepo->findCartById($id);

        return $this;
    }

    /**
     * @param 
     * @return $cart
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * @param $user_id, $meal_id, $request
     * @return $this
     */
    public function createComment($user_id, $meal_id, $request)
    {
        $this->commentRepo->createComment($user_id, $meal_id, $request);

        return $this;
    }

    /**
     * @param $meal, $score
     * @return $this
     */
    public function updateMealEvaluate($meal, $score)
    {
        $this->mealRepo->updateEvaluate($meal, $score);

        return $this;
    }

    /**
     * @param $cart
     * @return $this
     */
    public function updateCartEvaluated($cart)
    {
        $this->cartRepo->updateEvaluated($cart);

        return $this;
    }
}
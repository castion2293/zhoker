<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteImageRequest;

use App\Services\ImageService;
use App\Services\AgentService;
use App\Services\GateService;

class ImageController extends Controller
{
    protected $imageService;
    protected $agentService;
    protected $gateService;

    /**
     * ImageController constructor.
     * @param ImageService $imageService
     * @param AgentService $agentService
     * @param GateService $gateService
     */
    public function __construct(ImageService $imageService, AgentService $agentService, GateService $gateService) 
    {
        $this->middleware('chef');

        $this->imageService =$imageService;
        $this->agentService = $agentService;
        $this->gateService = $gateService;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $this->gateService->chefIdCheck($id);

        $chef = $this->imageService->findChef($id)->getChef();
        $images = $this->imageService->findImageByChef($chef, 20)->getImage();

        $agent = $this->agentService->agent();
        return view($agent . '.chef.image', ['chef' => $chef, 'images' => $images]);
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function upload(Request $request, $id)
    {        
        $this->gateService->chefIdCheck($id);

        $chef = $this->imageService->findChef($id)->uploadImage($request);
    }

    /**
     * @param DeleteImageRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(DeleteImageRequest $request, $id)
    {
        $this->gateService->chefIdCheck($id);
        
        $this->imageService->deleteImage($request->input('image'));

        $url = "image/index/" . $id . "#title";
        return redirect($url);
    }
}

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

    public function __construct(ImageService $imageService, AgentService $agentService, GateService $gateService) 
    {
        $this->middleware('chef');

        $this->imageService =$imageService;
        $this->agentService = $agentService;
        $this->gateService = $gateService;
    }

    public function index($id)
    {
        $this->gateService->chefIdCheck($id);

        $chef = $this->imageService->findChef($id)->getChef();
        $images = $this->imageService->findImageByChef($chef, 20)->getImage();

        $agent = $this->agentService->agent();
        return view($agent . '.chef.image', ['chef' => $chef, 'images' => $images]);
    }

    public function upload(Request $request, $id)
    {
        $this->gateService->chefIdCheck($id);

        $chef = $this->imageService->findChef($id)->uploadImage($request);
    }

    public function delete(DeleteImageRequest $request, $id)
    {
        $this->gateService->chefIdCheck($id);
        
        $this->imageService->deleteImage($request->input('image'));

        $url = "image/index/" . $id . "#title";
        return redirect($url);
    }
}

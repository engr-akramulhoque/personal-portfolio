<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;
use App\Http\Resources\ServiceResource;
use App\Models\About;
use App\Models\Service;
use App\Traits\ApiResponsesTrait;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ApiResponsesTrait;
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //  Get all landing page data
        $data = [
            'about' => new AboutResource(About::first()),
            'services'  => ServiceResource::collection(Service::all()),
        ];

        return $this->dataResponse($data);
    }
}

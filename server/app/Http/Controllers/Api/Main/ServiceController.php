<?php

namespace App\Http\Controllers\Api\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Traits\ApiResponsesTrait;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use LaravelPulse\LockLink\Contrib\Traits\LockLink;

class ServiceController extends Controller
{
    use ApiResponsesTrait, ImageTrait, LockLink;
    // get all services
    public function index()
    {
        return ServiceResource::collection(Service::latest()->paginate(10));
    }

    // get service by id
    public function show($id)
    {
        $service = Service::find($this->Unlock($id));
        return $this->dataResponse(new ServiceResource($service));
    }

    //  create new service
    public function store(ServiceRequest $request)
    {
        $service = Service::create(array_merge($request->validated(), ['icon' => $this->imageUpload($request, 'image', "uploads/services/icons/")]));
        return $this->successResponse(new ServiceResource($service), "New service created successfully");
    }

    // update single service
    public function update(ServiceRequest $request, $id)
    {
        $service = Service::find($this->Unlock($id));
        if (!$service) {
            return $this->notFoundResponse("Service not found");
        }

        $service->update(array_merge($request->validated(), ['icon' => $this->imageUpdate($request, 'image', $service->icon, "uploads/services/icons")]));

        return $this->successResponse($service, "Service successfully updated");
    }

    //  delete a service
    public function destroy($id)
    {
        $service = Service::find($this->Unlock($id));
        if (!$service) {
            return $this->errorResponse('This service does not exist');
        }
        $this->deleteImage($service->icon);
        $service->delete();
        return $this->successResponse([], 'The service has been deleted');
    }
}

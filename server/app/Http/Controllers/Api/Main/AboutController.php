<?php

namespace App\Http\Controllers\Api\Main;

use LaravelPulse\LockLink\Contrib\Traits\LockLink;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Http\Resources\AboutResource;
use App\Models\About;
use App\Traits\ApiResponsesTrait;
use App\Traits\ImageTrait;

class AboutController extends Controller
{
    use LockLink, ImageTrait, ApiResponsesTrait;

    /** protected functions */
    // get about info
    public function index()
    {
        $about = new AboutResource(About::first());
        return $this->dataResponse($about);
    }


    // update about info
    public function update(AboutRequest $request, $id)
    {
        // Find the resource in the database by its id.
        $aboutInfo = About::find($this->Unlock($id));
        if (!$aboutInfo) {
            return $this->notFoundResponse("Information not found");
        }

        // Update about info fields
        $aboutInfo->update(array_merge($request->validated(), ['avatar' => $this->imageUpdate($request, 'avatar', $aboutInfo->avatar, "uploads/profile/")]));
        // success response with the updated data in json format.
        return $this->successResponse($aboutInfo, "About information updated successfully");
    }
}

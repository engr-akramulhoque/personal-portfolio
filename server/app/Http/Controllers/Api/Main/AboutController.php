<?php

namespace App\Http\Controllers\Api\Main;

use LaravelPulse\LockLink\Contrib\Traits\LockLink;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Http\Resources\AboutResource;
use App\Models\About;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    use LockLink, ImageTrait;

    // get about info
    public function index()
    {
        return response(new AboutResource(About::first(), 200));
    }

    // update about info
    public function update(AboutRequest $request, $id)
    {
        $aboutInfo = About::find($this->Unlock($id));
        if (!$aboutInfo) {
            return response()->json([
                'status' => false,
                'message' => 'Information not found'
            ], 404);
        }

        // Update other fields
        $aboutInfo->update(array_merge($request->validated(), ['avatar' => $this->imageUpdate($request, 'avatar', $aboutInfo->avatar, "uploads/profile/")]));

        return response()->json([
            'status' => true,
            'message' => 'About info updated successfully',
        ]);
    }
}

<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait ImageHandling
{
    /**
     * Validate the image.
     */
    private function validateImage(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|max:2048',
        ]);
    }

    /**
     * Process the image.
     */
    private function processImage($request)
    {
        if ($request->hasFile('image')) {
            return $request->file('image')->store('images/uploads/layouts', 'public');
        }
        return null;
    }


    /**
     * Update the image.
     */
    private function updateImage($model, $request)
    {
        $imagePath = $this->processImage($request);

        if ( $imagePath ) {
            if ( $model->image ) {
                Storage::disk('public')->delete( $model->image );
            }

            $imagePath = $model->update([
                'image' => $imagePath
            ]);
        }
    }
}

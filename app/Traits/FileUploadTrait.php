<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait FileUploadTrait
{
    public function uploadFile(Request $request, string $inputName, ?string $oldPath = null, string $path = '/uploads'): string
    {
        if ($request->hasFile($inputName)) {

            // Delete old file if it exists
            if ($oldPath && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            $file = $request->file($inputName);
            $ext = $file->getClientOriginalExtension();
            $fileName = 'media_' . uniqid() . '.' . $ext;

            $file->move(public_path($path), $fileName);

            return $path . '/' . $fileName;
        }

        // Return old path if exists, otherwise empty string
        return $oldPath ?? '';
    }
}

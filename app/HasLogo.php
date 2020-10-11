<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasLogo
{
    protected function getLogoAttribute($logo_path): string
    {
        return $logo_path ?
            Storage::url($logo_path) :
            "https://picsum.photos/seed/" . $this->id . '/100/100';
    }

    protected function setLogoAttribute(UploadedFile $file)
    {
        $this->attributes['logo'] = $file->store($this->logoStoragePath);
    }

    public function getLogoStoragePathAttribute()
    {
        return 'logos';
    }
}

<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasLogo
{
    public function logoUrl()
    {
        return $this->logo ?
            $this->url() :
            "https://picsum.photos/seed/" . $this->id . '/100/100';
    }

    protected function setLogoAttribute(UploadedFile $file)
    {
        $this->attributes['logo'] = $file->storePublicly($this->logoStoragePath);
    }

    public function getLogoStoragePathAttribute()
    {
        return 'logos';
    }

    private function url()
    {
        return Storage::url($this->logo);
    }
}

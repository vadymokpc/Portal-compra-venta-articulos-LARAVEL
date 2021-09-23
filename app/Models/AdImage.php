<?php namespace App\Models;

use App\Models\Ad;
use App\Models\AdImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdImage extends Model 
{
    use HasFactory;

    public function ad() 
    {
        return $this->belongsTo(Ad::class);
    }
/*--------------------------------------22---------------------------------------------*/
    static public function getUrlByFilePath($filePath, $w = null, $h = null)
    {
        if (!$w && !$h)
        return Storage::url($filePath);

        $path = dirname($filePath);
        $fileName = basename($filePath);

        $file = "{$path}/crop{$w}x{$h}_{$fileName}";

        return Storage::url($file);

    }
/*--------------------------------------22---------------------------------------------*/
/*--------------------------------------3 Recorte de las imagenes---------------------------------------------*/
public function getUrl($w , $h )
    {
        return AdImage::getUrlByFilePath($this->file, $w, $h);
    }
/*--------------------------------------3 Recorte de las imagenes---------------------------------------------*/
}
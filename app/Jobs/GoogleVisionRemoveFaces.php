<?php namespace App\Jobs;

use App\Models\AdImage;
use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionRemoveFaces implements ShouldQueue {
    use Dispatchable,InteractsWithQueue, Queueable,SerializesModels;

    private $ad_image_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    /*     --------------------------------------8 googleVisionRemoveFaces---------------------------------*/
    public function __construct($ad_image_id) 
    {
        $this->ad_image_id=$ad_image_id;
    }

    /*     --------------------------------------8 googleVisionRemoveFaces---------------------------------*/

    /**
     * Execute the job.
     *
     * @return void
     */
    /*--------------------------------------8 googleVisionRemoveFaces---------------------------------*/
    public function handle() {

        $i=AdImage::findOrFail($this->ad_image_id);
        $srcPath = storage_path('/app/'.$i->file);
        $image=file_get_contents($srcPath);
        putenv('GOOGLE_APPLICATION_CREDENTIALS='.base_path('google_credentials.json'));

        $imageAnnotator=new ImageAnnotatorClient();

        /* ---------------8 detectar las caras------------------*/
        $response=$imageAnnotator->faceDetection($image);
        $imageAnnotator->close();
        /* ---------------8 detectar las caras------------------*/
        /* ---------------8 recuperar la información de cada cara------------------*/
        $faces=$response->getFaceAnnotations();
        foreach ($faces as $face) {
            /* ---------------8 recuperar los vertices del poligono de la cara------------------*/
            $vertices=$face->getBoundingPoly()->getVertices();
            $bounds=[];

            /* ---------------8 recuperar los vertices del poligono de la cara------------------*/
            foreach ($vertices as $vertex) {
                $bounds[]=[$vertex->getX(),
                $vertex->getY()];
            }

            /* ---------------8 recuperar los vertices del poligono de la cara------------------*/
            /* ---------------8 calcular altura y anchura------------------*/
            $w=$bounds[2][0] - $bounds[0][0];
            $h=$bounds[2][1] - $bounds[0][1];
            /* ---------------8 calcular altura y anchura------------------*/
            /* ---------------8 cargar la imagen------------------*/
            $image=Image::load($srcPath);
            /* ---------------8 cargar la imagen------------------*/
            /* ---------------8 modificar la imagen con Spatie Image------------------*/
            $image->watermark(base_path('resources/images/smile.png')) 
            ->watermarkPosition('top-left') 
            ->watermarkPadding($bounds[0][0], $bounds[0][1]) 
            ->watermarkWidth($w, Manipulations::UNIT_PIXELS) 
            ->watermarkHeight($h, Manipulations::UNIT_PIXELS) 
            ->watermarkFit(Manipulations::FIT_STRETCH);
            $image->save($srcPath);
            /* ---------------8 ∏modificar la imagen con Spatie Image------------------*/

        }
    }
}

/*--------------------------------------8 googleVisionRemoveFaces---------------------------------*/
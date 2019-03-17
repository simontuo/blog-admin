<?php
/**
 * Created by SimonTuo.
 * User: simontuo
 * Date: 2019/3/17
 * Time: 6:10 PM
 */

namespace App\Services;

use Storage;

class UploadService
{
    public function avatar($fileName, $file)
    {
        Storage::disk('qiniu')->writeStream($fileName, fopen($file->getRealPath(), 'r'));

        return 'http://' . config('filesystems.disks.qiniu.domain') . $fileName;
    }
}
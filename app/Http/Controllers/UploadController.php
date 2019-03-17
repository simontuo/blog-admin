<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadImageRequest;
use App\Services\UploadService;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    protected $uploadService;

    private $uploadType = [
        'avatar'
    ];

    /**
     * UploadController constructor.
     * @param UploadService $uploadService
     */
    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    /**
     * 上存
     *
     * author SimonTuo
     * @param UploadImageRequest $request
     * @param $type
     * @return mixed
     * @throws \Exception
     */
    public function upload(UploadImageRequest $request, $type)
    {
        if (!in_array($type, $this->uploadType)) {
            throw new \Exception('不存在的上存类型');
        }
        $file = $request->file('file');

        $fileName = '/' . $type . '/' . md5(time() . user()->name) . '.' . $file->getClientOriginalExtension();

        return response()->json([
            'status' => 'finished',
            'name'   => $fileName,
            'url'    => $this->uploadService->{$type}($fileName, $file)
        ], 200);
    }
}

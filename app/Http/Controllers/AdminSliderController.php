<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class AdminSliderController extends Controller
{
    private $slider;
    use StorageImageTrait;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.add');
    }

    public function store(SliderAddRequest $request)
    {
        try {
            $request->validate(
                ['name' => [
                    'required',
                    'max:255',
                    Rule::unique('sliders', 'name')
                ]]
            );
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($dataImageSlider)) {
                $dataInsert['image_name'] = $dataImageSlider['file_name'];
                $dataInsert['image_path'] = $dataImageSlider['file_path'];
            }
            $this->slider->create($dataInsert);
            return redirect(route('slider.index'));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Messages:' .$exception->getMessage(). '. Line: ' . $exception->getLine());
        }
    }

    public function edit($id) {
        $slider = $this->slider->find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderAddRequest $request, $id)
    {
        $request->validate(
            ['name' => [
                'required',
                'max:255',
                Rule::unique('sliders', 'name')->ignore($id)
            ]]
        );
        $dataUptdate = [
            'name' => $request->name,
            'description' => $request->description,
        ];
        $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
        if (!empty($dataImageSlider)) {
            $dataInsert['image_name'] = $dataImageSlider['file_name'];
            $dataInsert['image_path'] = $dataImageSlider['file_path'];
        }
        $this->slider->find($id)->update($dataUptdate);
    }

    public function delete($id) {
        try {
            $slider = $this->slider->find($id);
            $slider->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Messages:' .$exception->getMessage(). '. Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'failed'
            ], 500);
        }
    }
}

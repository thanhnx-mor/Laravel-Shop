<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminSettingController extends Controller
{
    private $setting;
    public function __construct(
        Setting $setting
    )
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $settings = $this->setting->latest()->paginate(5);
        return view('admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.setting.add');
    }

    public function store(SettingAddRequest $request)
    {
        $dataInsert = [
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type
        ];
        $this->setting->create($dataInsert);

        return redirect(route('setting.index'));
    }

    public function edit($id)
    {
        $setting = $this->setting->find($id);
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(SettingAddRequest $request, $id)
    {
        $setting = $this->setting->find($id);
        $setting->config_key = $request->config_key;
        $setting->config_value = $request->config_value;
        $setting->save();
        return redirect(route('setting.index'));
    }

    public function delete($id) {
        try {
            $setting = $this->setting->find($id);
            $setting->delete();
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

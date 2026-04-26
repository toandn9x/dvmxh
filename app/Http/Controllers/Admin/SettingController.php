<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class SettingController extends Controller
{
    public function general()
    {
        return view('admin.settings.general');
    }

    public function notifications()
    {
        return view('admin.settings.notifications');
    }

    public function deposit()
    {
        return view('admin.settings.deposit');
    }

    public function smm()
    {
        return view('admin.settings.smm');
    }

    public function levels()
    {
        return view('admin.settings.levels');
    }

    public function store(Request $request)
    {
        $request->merge(['tsr_enabled' => $request->has('tsr_enabled') ? 1 : 0]);

        foreach ($request->file() as $key => $file) {
            if ($file) {
                $fileName = $key.'.'.$file->getClientOriginalExtension();
                $file->storeAs('public/images', $fileName);
                setting([$key => $fileName])->save();
            }
        }

        $settings = $request->except('_token', 'site_logo', 'site_favicon');
        
        // Chuyển đổi các giá trị null thành chuỗi rỗng để tránh lỗi database
        foreach ($settings as $key => $value) {
            if (is_null($value)) {
                $settings[$key] = '';
            }
        }

        setting($settings)->save();

        return back()->with('success', 'Cập nhật cài đặt thành công');
    }

    public function syncSmm(Request $request)
    {
        $provider = $request->provider;
        $profitMember = $request->profit_member ?: 50;
        $profitVip = $request->profit_vip ?: 40;
        $profitCollab = $request->profit_collaborator ?: 30;

        try {
            Artisan::call('smm:sync-services', [
                'provider' => $provider,
                'profit_member' => $profitMember,
                'profit_vip' => $profitVip,
                'profit_collaborator' => $profitCollab
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Đồng bộ dịch vụ thành công với mức lợi nhuận ' . $profit . '%'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Lỗi: ' . $e->getMessage()
            ], 500);
        }
    }
}

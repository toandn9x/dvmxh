<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Artisan;

class QueueController extends Controller
{
    public function index()
    {
        // Đếm số lượng đơn đang chờ trong Redis
        $pendingCount = 0;
        try {
            $pendingCount = Queue::size();
        } catch (\Exception $e) {
            // Redis might be down or not configured
        }

        // Lấy danh sách đơn lỗi từ bảng failed_jobs
        $failedJobs = DB::table('failed_jobs')->orderBy('failed_at', 'desc')->get();

        return view('admin.queue.index', compact('pendingCount', 'failedJobs'));
    }

    public function retry($id)
    {
        Artisan::call('queue:retry', ['id' => [$id]]);
        return back()->with('success', 'Đã đẩy đơn vào hàng chờ để xử lý lại.');
    }

    public function deleteFailed($id)
    {
        DB::table('failed_jobs')->where('id', $id)->delete();
        return back()->with('success', 'Đã xóa lỗi.');
    }

    public function flush()
    {
        Artisan::call('queue:flush');
        return back()->with('success', 'Đã xóa toàn bộ đơn lỗi.');
    }
}

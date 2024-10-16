<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

class ToolController extends Controller
{
    public function getFacebookId()
    {
        return view('tools.get-facebook-id');
    }

    public function postFacebookId(Request $request)
    {
        $request->validate([
            'url_facebook' => 'required|url',
        ]);

        $response = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36',
        ])
            ->asForm()
            ->post('https://findidfb.com', [
                'url_facebook' => $request->url_facebook,
            ]);

        $body = $response->body();
        preg_match('/Numeric ID: <b>(.*?)<\/b>/', $body, $matches);

        return back()
            ->with('success', 'Lấy ID Facebook thành công')
            ->with('facebook_id', $matches ? $matches[1] : 'Không lấy được ID Facebook');
    }

    public function getFacebookIdV2()
    {
        return view('tools.get-facebook-id-v2');
    }

    public function postFacebookIdV2(Request $request)
    {
        $request->validate([
            'url_facebook' => 'required|url',
        ]);
        $client = new Client();
        $response = $client->request('POST', "https://app.likeqq.vn/api/get-uid", [
            'json' => ["link" => $request->url_facebook],
        ]);
        $body = $response->getBody()->getContents();
        $arr = json_decode($body, true);
        $str = "\n UID: " . $arr["data"]["objectId"] . "----------------- URL: " . $arr["data"]["objectUrl"];
        return back()
            ->with('success', 'Lấy ID Facebook thành công')
            ->with('facebook_id', $str);

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()->latest()->paginate();

        return view('admin.orders.index', compact('orders'));
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $user = $request->user();
        DB::transaction(function () use ($request, $order, $user) {
            $order->update($request->all());

            if ($request->status == Order::CANCELLED) {
                $user->update(['balance' => $user->balance + $order->total]);
            }
        });

        return to_route('admin.orders.index')->with('success', 'Cập nhật đơn hàng thành công');
    }

    public function getFreeLike(Request $request) {
        $order_info = Order::find($request->id);
        if (!$order_info) return to_route('admin.orders.index')->with('error', 'Không tìm thấy thông tin đơn hàng!');
        else {
            $result = $this->buffv2($order_info->input);
            $mess = $result["mess"][0]["message"];
//            if (strstr($mess, "hãy nhập link bài viết khác")) {
//                $order_info->status = 2;
//            }
//            else $order_info->status = 3;

            echo "<pre>";
            print_r($mess);
            echo "</pre>";
        }
    }

    public function buffv2($link_fb) {
        $link = $link_fb;
        $list_sever = ["https://100like.vn/api/auth/fb/liketrial", "https://abclike.xyz/post.php"];
        foreach ($list_sever as $key => $value) {
            $client = new Client();
            $jar = new CookieJar();
            if ($key == 0) {
                continue;
                // register
                $random = $this->randomString(20);
                $user_name = $random;
                $password =  $random;
                $response = $client->request('POST', "https://100like.vn/api/auth/register?username=$user_name&password=$password");
                $body = $response->getBody()->getContents();

                // login
                $response = $client->request('POST', "https://100like.vn/api/auth/login?username=$user_name&password=$password", [
                    'cookies' => $jar,
                ]);
                $cookies = $jar->getIterator();
                $auth = $response->getHeaderLine('Authorization');
                if (!empty($auth)) {
                    $auth = "Bearer " . $auth;
                }
                else {
                    $mess[] = ["key" => 0, "message" => "Login false, không lấy được thông tin auth. site = " . $value];
                    continue;
                }
                // end login
                $arr_param = [
                    "amount" => 20,
                    "link" => $link,
                    "disable" => false
                ];
                try {
                    $response = $client->request('POST', $value, [
                        'cookies' => $jar,
                        'json' => $arr_param,
                        'headers' => [
                            "Authorization" => $auth,
                            "DNT" => 1,
                            "Origin" => "https://100like.vn",
                            "Referer" => "https://100like.vn/fb/liketrial",
                            'User-Agent' => $this->getRandomUserAgent()
                        ],
                    ]);
                } catch (Exception $e) {
                    $body = $e->getResponse()->getBody()->getContents();
                }

                $body = $response->getBody()->getContents();
                $data = json_decode($body, true);
                $decodedMessage = html_entity_decode($data['messages'], ENT_QUOTES, 'UTF-8');
                $mess[] = ["key" => 0, "message" => $decodedMessage, "user" => $user_name, "password" => $password];
            }
            if ($key == 1) {

                // get uid
                $response = $client->request('POST', "https://app.likeqq.vn/api/get-uid", [
                    'json' => ["link" => $link],
                ]);
                $body = $response->getBody()->getContents();
                $res = json_decode($body, true);
                // echo "<pre>";
                // print_r($res);
                // echo "</pre>";
                $uid = $res["data"]["objectId"];
                $full_link = $res["data"]["objectUrl"];

                $arr_param_2 = [
                    "id" => $uid,
                    "linkfull" => $full_link
                ];

                $response = $client->request('POST', $value, [
                    'form_params' => $arr_param_2,
                    'headers' => [
                        'User-Agent' => $this->getRandomUserAgent(),
                        'X-Requested-With' => 'XMLHttpRequest', // Cần thiết nếu request là AJAX
                    ]
                ]);
                $body = $response->getBody()->getContents();
                $mess[] = ["key" => 1, "message" => $body];

            }
            $jar->clear();
        }
        return ["status" => 1, "mess" => $mess];
    }

    function randomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Tập hợp có ký tự đặc biệt
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1); // Lấy ngẫu nhiên chỉ mục từ tập hợp
            $randomString .= $characters[$randomIndex]; // Thêm ký tự ngẫu nhiên vào chuỗi
        }

        return $randomString; // Trả về chuỗi ngẫu nhiên
    }

    function getRandomUserAgent() {
        $userAgents = [
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:79.0) Gecko/20100101 Firefox/79.0',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36',
            'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Safari/605.1.15',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 14_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0 Mobile/15E148 Safari/604.1',
            'Mozilla/5.0 (iPad; CPU OS 14_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0 Mobile/15E148 Safari/604.1',
            'Mozilla/5.0 (Linux; Android 10; SM-A505F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.101 Mobile Safari/537.36',
            'Mozilla/5.0 (Linux; Android 9; SAMSUNG SM-A920F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Mobile Safari/537.36',
            'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; AS; rv:11.0) like Gecko',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:78.0) Gecko/20100101 Firefox/78.0',
            'Mozilla/5.0 (X11; CrOS x86_64 12871.102.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.141 Safari/537.36',
            'Mozilla/5.0 (Linux; Android 11; SM-G970U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Mobile Safari/537.36',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0',
            'Mozilla/5.0 (Linux; U; Android 4.2.2; en-us; SM-T210R Build/JDQ39) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
            'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36',
            'Mozilla/5.0 (Windows NT 6.1; Trident/7.0; rv:11.0) like Gecko',
            'Mozilla/5.0 (Linux; Android 9; SAMSUNG SM-N960F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Mobile Safari/537.36',
            'Mozilla/5.0 (Linux; U; Android 2.3.6; en-us; GT-S5830 Build/GINGERBREAD) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 12_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.0 Mobile/16A366 Safari/604.1',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:77.0) Gecko/20100101 Firefox/77.0',
            'Mozilla/5.0 (Linux; Android 10; SM-N986U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.101 Mobile Safari/537.36',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64; Trident/7.0; AS; rv:11.0) like Gecko',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.1 Safari/605.1.15',
            'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:86.0) Gecko/20100101 Firefox/86.0',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 13_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15E148 Safari/604.1',
            'Mozilla/5.0 (Linux; Android 10; SM-A207F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36',
            'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; AS; rv:11.0) like Gecko',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36',
            'Mozilla/5.0 (Linux; Android 9; SM-G960F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Mobile Safari/537.36',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 13_1_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0 Mobile/15E148 Safari/604.1',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 14_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0 Mobile/15E148 Safari/604.1',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36',
            'Mozilla/5.0 (Linux; Android 9; SAMSUNG SM-G973U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Mobile Safari/537.36',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0',
            'Mozilla/5.0 (Linux; Android 11; Pixel 5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Mobile Safari/537.36',
            'Mozilla/5.0 (iPad; CPU OS 14_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0 Mobile/15E148 Safari/604.1',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 11_2_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36',
            'Mozilla/5.0 (Linux; Android 10; SM-N986B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Mobile Safari/537.36',
            'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0 Safari/605.1.15',
            'Mozilla/5.0 (Linux; Android 10; SM-N975U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.72 Mobile Safari/537.36',
            'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36',
            'Mozilla/5.0 (Linux; Android 11; SM-G998B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.105 Mobile Safari/537.36'
        ];

        // Lấy ngẫu nhiên một User-Agent từ mảng
        return $userAgents[array_rand($userAgents)];
    }
}

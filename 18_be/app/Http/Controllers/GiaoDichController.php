<?php

namespace App\Http\Controllers;

use App\Mail\MasterMail;
use App\Models\DonHang;
use App\Models\GiaoDich;
use App\Models\KhachHang;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GiaoDichController extends Controller
{
    public function index()
    {
        $payload = [
            "USERNAME" => "THANHTRUONG2311",
            "PASSWORD" => "TruongMaiLinh2603",
            "DAY_BEGIN" => Carbon::today()->format('d/m/Y'),
            "DAY_END" => Carbon::today()->format('d/m/Y'),
            "NUMBER_MB" => "1910061030119"
        ];
        $client = new Client();
        $respone = $client->post("http://103.173.254.8:2603/mb", [
            'json' => $payload
        ]);
        $data = json_decode($respone->getBody(), true)['data'];
        // dd($data);

        foreach ($data as $key => $value) {
            if ($value['creditAmount'] > 0) {
                $check = GiaoDich::where('pos', $value['pos'])->first();
                if (!$check) {
                    $id_don_hang  = $this->convertToId($value['description']);

                    $donHang = DonHang::where('id', $id_don_hang)->first();
                    // dd($donHang);
                    if ($donHang) {
                        GiaoDich::create([
                            'creditAmount'          => $value['creditAmount'],
                            'description'           => $value['description'],
                            'pos'                   => $value['pos'],
                            'id_don_hang'           => $id_don_hang,
                        ]);

                        if ($donHang->so_tien_thanh_toan <= $value['creditAmount']) {
                            $donHang->is_thanh_toan = true;
                            $donHang->save();

                            $khachHang = KhachHang::where('id', $donHang->id_khach_hang)->first();
                            $x['ho_ten']                 = $khachHang->ho_va_ten;
                            $x['id_don_hang']            = $id_don_hang;
                            $x['so_tien_chuyen_khoan']   = $value['creditAmount'];

                            Mail::to($khachHang->email)->send(new MasterMail('Xác Nhận Thanh Toán', 'mail_thanh_toan', $x));
                        } else {
                            $khachHang = KhachHang::where('id', $donHang->id_khach_hang)->first();
                            $x['ho_ten']                 = $khachHang->ho_va_ten;
                            $x['id_don_hang']            = $id_don_hang;
                            $x['so_tien_chuyen_khoan']   = $value['creditAmount'];
                            $x['so_tien_can_thanh_toan']   = $donHang->so_tien_thanh_toan;
                            $x['tien_thieu']   = $donHang->so_tien_can_thanh_toan - $value['creditAmount'];

                            Mail::to($khachHang->email)->send(new MasterMail('Thanh Toán Nhưng Thiếu', 'mail_thieu_tien', $x));
                        }
                    }
                }
            }
        };
    }
    public function convertToId($input)
    {
        preg_match('/DZ(\d+)/', $input, $matches);
        if (isset($matches[1])) {
            $dzNumber = $matches[1];
            return $dzNumber;
        } else {
            return 0;
        }
    }
}

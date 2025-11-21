<?php

namespace App\Http\Controllers;

use App\Models\ChiTietPhanQuyen;
use App\Models\ChucNang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChucNangController extends Controller
{
    public function getData()
    {
        $id_chuc_nang = 42;
        $login = Auth::guard('sanctum')->user();
        $id_quyen = $login->$id_chuc_nang;
        $check_quyen = ChiTietPhanQuyen::where('id_quyen', $id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();
        if ($check_quyen) {
            return response()->json([
                'data' => false,
                'message' => "bạn không có quyền thực hiện chức năng này!"
            ]);
        }
        $data = ChucNang::get();
        
        return response()->json([
            'data' => $data
        ]);
    }
}

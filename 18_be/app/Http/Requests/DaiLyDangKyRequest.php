<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DaiLyDangKyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ho_va_ten' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:dai_lys,email',
            'so_dien_thoai' => 'required|digits:10',
            'ngay_sinh' => 'required|date',
            'password' => 'required|min:6',
            're_password' => 'required|min:6|same:password',
            'ten_doanh_nghiep' => 'required|min:3|max:255',
            'ma_so_thue' => 'required|min:10|max:14',
            'dia_chi_kinh_doanh' => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'ho_va_ten.required' => 'Họ và tên không được để trống',
            'ho_va_ten.min' => 'Họ và tên phải có ít nhất 3 ký tự',
            'ho_va_ten.max' => 'Họ và tên không được vượt quá 255 ký tự',

            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email không được vượt quá 255 ký tự',
            'email.unique' => 'Email đã tồn tại',

            'so_dien_thoai.required' => 'Số điện thoại không được để trống',
            'so_dien_thoai.digits' => 'Số điện thoại phải đủ 10 ký tự',

            'ngay_sinh.required' => 'Ngày sinh không được để trống',
            'ngay_sinh.date' => 'Ngày sinh không đúng định dạng',

            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',

            're_password.required' => 'Nhập lại mật khẩu không được để trống',
            're_password.min' => 'Nhập lại mật khẩu phải có ít nhất 6 ký tự',
            're_password.same' => 'Nhập lại mật khẩu phải giống mật khẩu',

            'ten_doanh_nghiep.required' => 'Tên doanh nghiệp không được để trống',
            'ten_doanh_nghiep.min' => 'Tên doanh nghiệp phải có ít nhất 3 ký tự',
            'ten_doanh_nghiep.max' => 'Tên doanh nghiệp không được vượt quá 255 ký tự',

            'ma_so_thue.required' => 'Mã số thuế không được để trống',
            'ma_so_thue.min' => 'Mã số thuế phải có ít nhất 10 ký tự',
            'ma_so_thue.max' => 'Mã số thuế không được vượt quá 14 ký tự',

            'dia_chi_kinh_doanh.required' => 'Địa chỉ kinh doanh không được để trống',
            'dia_chi_kinh_doanh.max' => 'Địa chỉ kinh doanh không được vượt quá 255 ký tự',
        ];
    }
}

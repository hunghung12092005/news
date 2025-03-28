<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\coupon_email;
use App\Models\CouponEmail;
use Illuminate\Http\Request;
//    use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $email = $request->input('email');
        $name = $request->input('name');

        //Kiểm tra xem email đã tồn tại trong bảng coupon_email chưa
        $existingEmail = coupon_email::where('email', $email)->first();

        if ($existingEmail) {
            // Nếu email đã tồn tại, trả về thông báo
            return redirect()->route('news-index')->with('error', 'Email này đã được gửi mail trước đó!')->withInput();
        }

        // Nếu email chưa tồn tại, tiếp tục gửi email
        $data = [
            'name' => $name, // Lấy tên từ request
            'email' => $email
        ];

        Mail::to($email)->send(new SendMail($data)); // Gửi email

        // Thêm bản ghi mới vào bảng coupon_email
        coupon_email::create([
            'email' => $email,
            'name' => $name,
            'check_status' => 0, // Mặc định là 0
        ]);

        return redirect()->route('news-index')->with('success', 'Email đã được gửi thành công!');
    }
    public function confirmEmail(Request $request)
    {
        $email = $request->input('email');

        // Cập nhật hoặc tạo mới bản ghi trong bảng coupon_email
        coupon_email::updateOrCreate(
            ['email' => $email], // Điều kiện tìm kiếm
            ['check_status' => 1] // Cập nhật check_status thành 1
        );

        return redirect()->route('news-index')->with('success', 'Xác nhận thành công!');
    }
}

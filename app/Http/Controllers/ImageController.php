<?php 
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    
    class ImageController extends Controller
    {
        public function create()
        {
            return view('upload.upload'); // Trả về view chứa biểu mẫu
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
    
                // Lưu ảnh vào thư mục 'public/images'
                $image->move(public_path('images'), $imageName);
    
                return back()->with('success', 'Ảnh đã được tải lên thành công!');
            }
    
            return back()->with('error', 'Vui lòng tải lên một ảnh.');
        }
    }
?>
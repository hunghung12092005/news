<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class TinController extends Controller
{
    public function index(Request $request)
    {
        // Lấy số lượng sản phẩm mỗi trang từ request, mặc định là 3
        $perPage = $request->input('per_page', 3);
        $categoryId = $request->input('category_id'); // Lấy category_id từ request
        //dd($categoryId);
        // Truy vấn bài viết với điều kiện category_id
        $articleModel = Article::with(['category', 'images'])
            ->when($categoryId, function ($query) use ($categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->orderBy('id', 'asc')
            ->paginate($perPage);
        //dd($articleModel);
        // Lấy sản phẩm với phân trang và thông tin danh mục
        //$articleModel = Article::with('category')->orderBy('id', 'DESC')->paginate($perPage);
        // Lấy 3 bài viết có lượt xem cao nhất
        $topArticles = Article::with(['category', 'images'])->orderBy('views', 'DESC')->take(3)->get();
        // Lấy số lượng bài viết từ người dùng, mặc định là 3
        $count = $request->input('count', 3);

        // Lấy bài viết mới nhất theo số lượng được chỉ định
        $latestArticles = Article::with(['category', 'images'])->orderBy('created_at', 'DESC')->take($count)->get();
        // Trả về view với dữ liệu
        return view('welcome', compact('articleModel', 'topArticles', 'latestArticles'));
    }
    public function about()
    {
        return view('about');
    }
    public function detailNews($id)
    {
        // Lấy bài viết cùng với danh mục và hình ảnh
        $detailNew = Article::with(['category', 'images'])->find($id);

        // Lấy hình ảnh mới nhất nếu có
        $latestImage = $detailNew->images->isNotEmpty() ? $detailNew->images->first() : null;
       // dd( $detailNew);
        //dd( $detailNew);
        $data = [
            'id' => $id,
            'detailNew' => $detailNew,
            'latestImage' => $latestImage, // Thêm hình ảnh mới nhất vào data
            'test' => 'Test dữ liệu truyền vào'
        ];

        return view('detailNews', $data);
    }
}

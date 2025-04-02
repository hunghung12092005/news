<?php
//php artisan make:controller Admin/AdminController
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->input('search'); // Lấy dữ liệu tìm kiếm

            // Tìm kiếm trong bảng articles
            $articles = Article::where('title', 'like', '%' . $search . '%')->take(5)->get();

            $output = '';
            foreach ($articles as $article) {
                $output .= '<div class="suggestion-item">' . $article->title . '</div>'; // Tạo HTML cho gợi ý
            }

            // Trả về gợi ý dưới dạng JSON
            return response()->json($output);
        }
        //
        $perPage = $request->input('per_page', 15);
        $searchContent = $request->input('search'); // Lấy dữ liệu từ input của người dùng

        $articles = Article::with(['category', 'images'])
            ->where('title', 'like', '%' . $searchContent . '%')
            ->paginate($perPage);

        return view('admin.dashboard', compact('articles'));
    }
    public function addNews()
    {
        return view('admin.addNews');
    }

    public function storeNews(Request $request)
    {
        //cách 1: làm với db::table
        // DB::table('products')->insert(
        //     [
        //         'name' => 'prod1',
        //         'price' => '10000',
        //     ]
        // );
        $request->validate([
            'name' => 'required|string|max:255', // Tên sản phẩm là bắt buộc, kiểu chuỗi, tối đa 255 ký tự
            'price' => 'required|numeric|min:0', // Giá sản phẩm là bắt buộc, kiểu số và không âm
            'description' => 'nullable|string|max:1000', // Mô tả sản phẩm có thể để trống, tối đa 1000 ký tự
        ]);
        //cách 2 dùng model
        $product = new Article();
        //$productUpdate = Product::find($findID);//đây là cách update
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();
        return redirect()->route('admin.index')->with('success', 'Bạn đã thêm thành công');
    }

    public function editNews($id)
    {
        $product = Article::findOrFail($id); // Tìm sản phẩm theo ID
        return view('product-update', compact('product')); // Trả về view với thông tin sản phẩm
    }
    public function updateNews(Request $request, $productID)
    {
        //$productUpdate = new Product();
        $productUpdate = Article::find($productID); //đây là cách update
        $productUpdate->name = $request->input('name');
        $productUpdate->price = $request->input('price');
        $productUpdate->description = $request->input('description');
        $productUpdate->save();
        return redirect()->route('product.index');
    }
    public function destroyNews($id)
    {
        $product = Article::findOrFail($id);// Tìm sản phẩm theo ID
        //dd($product);
        $product->delete();

        return redirect()->route('admin.index')->with('success', 'Product deleted successfully.');
    }
}

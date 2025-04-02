@extends('layouts.admin')
@section('title', 'Admin - Quản trị website')
@section('content')
<button class="btn btn-success"><a href="{{ route('adminnews.add') }}">Thêm Bài viết</a></button>

    <form id="search-form" action="{{ route('admin.index') }}" method="GET">
        <input type="text" id="search" name="search" placeholder="Tìm kiếm with ajax..." autocomplete="off">
        <div id="suggestions" style="border: 1px solid #ccc; display: none;"></div>
        <button class="btn btn-success">Tìm kiếm</button>
    </form>

    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>Tiêu đề</th>
                <th>content</th>
                <th>Danh mục</th>
                <th>View</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>
                        {{ Str::limit($article->content, 50, '...') }}
                    </td>
                    <td>{{ $article->category->name }}</td>
                    <td>{{ $article->views }}</td>
                    <td>
                        <a href="{{ route('news.edit', $article->id) }}" class="btn btn-warning">Sửa </a>
                    </td>
                    <td>
                        <form action="{{ route('news.delete', $article->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa sản phẩm</button>
                        </form>
                    </td>


                </tr>
            @endforeach

            <!-- Hiển thị phân trang với Bootstrap -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    {{ $articles->appends(['category_id' => request('category_id'), 'per_page' => request('per_page')])->links('pagination::bootstrap-4') }}
                </ul>
            </nav>


        </tbody>

    </table>
    <form id="personForm" method="GET" action="{{ route('admin.index') }}#personForm">
        <label for="per_page">Số bài viết mỗi trang:</label>
        <select name="per_page" id="per_page" onchange="this.form.submit()">
            <option value="5" {{ request('per_page', 5) == 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
            <option value="15" {{ request('per_page', 15) == 15 ? 'selected' : '' }}>15</option>
        </select>
        {{-- <input type="hidden" name="category_id" value="{{ request('category_id') }}"> --}}
    </form>
@endsection

@push('scripts')
<style>
    .suggestion-item {
    padding: 10px;
    cursor: pointer;
}

.suggestion-item.active {
    background-color: #007bff; /* Màu nền khi hover hoặc chọn */
    color: white; /* Màu chữ */
}
</style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                let query = $(this).val();

                if (query.length >= 4 && (query.length - 4) % 2 === 0) { // Kiểm tra điều kiện
                    $.ajax({
                        url: '{{ route('admin.index') }}',
                        method: 'GET',
                        data: {
                            search: query
                        },
                        success: function(output) {
                            if (output.trim() === '') {
                                $('#suggestions').html(
                                        '<div class="alert alert-danger">Không tìm thấy kết quả.</div>'
                                        )
                                    .show();
                            } else {
                                $('#suggestions').html(output).show(); // Hiển thị gợi ý
                            }
                        }
                    });
                }
                // if(query.length = 0){
                //     $('#suggestions').hide(); // Ẩn gợi ý nếu không đủ ký tự
                // }
                else {
                    $('#suggestions').hide(); // Ẩn gợi ý nếu không đủ ký tự
                }
            });
        // xử lý người dùng tác động tới gợi ý
            $(document).on('mouseover', '.suggestion-item', function() {
                $('.suggestion-item').removeClass('active'); // Gỡ bỏ lớp active
                $(this).addClass('active'); // Thêm lớp active cho gợi ý đang hover
            });

            $(document).on('click', '.suggestion-item', function() {
                $('#search').val($(this).text()); // Đặt giá trị vào ô tìm kiếm
                $('#suggestions').hide(); // Ẩn gợi ý
            });

            $('#search').on('keydown', function(e) {
                let suggestions = $('.suggestion-item');
                if (e.which === 40) { // Phím xuống
                    currentIndex++;
                    if (currentIndex >= suggestions.length) currentIndex = 0; // Vòng lại
                } else if (e.which === 38) { // Phím lên
                    currentIndex--;
                    if (currentIndex < 0) currentIndex = suggestions.length - 1; // Vòng lại
                } else if (e.which === 13) { // Nhấn Enter
                    if (currentIndex > -1 && currentIndex < suggestions.length) {
                        $('#search').val($(suggestions[currentIndex]).text()); // Đặt giá trị vào ô tìm kiếm
                        $('#suggestions').hide(); // Ẩn gợi ý
                    }
                    return; // Ngăn chặn hành động mặc định
                }

                // Đánh dấu gợi ý hiện tại
                suggestions.removeClass('active');
                if (currentIndex > -1) {
                    $(suggestions[currentIndex]).addClass('active');
                }
            });
        });
        // Gửi dữ liệu tìm kiếm khi nhấn Enter
        // $('#searchInput').on('keypress', function(e) {
        //     if (e.which === 13) { // Kiểm tra xem có phải phím Enter
        //         e.preventDefault(); // Ngăn chặn hành động mặc định

        //         var query = $(this).val();
        //         if (query.length > 2) {
        //             // Gửi dữ liệu tìm kiếm tới server
        //             $.ajax({
        //                 url: '{{ route('admin.index') }}',
        //                 method: 'GET',
        //                 data: {
        //                     search: query
        //                 },
        //                 success: function(output) {
        //                     // Xử lý phản hồi nếu cần
        //                     console.log('Dữ liệu đã được gửi:', output);
        //                 }
        //             });
        //         }
        //     }
        // });
    </script>
@endpush

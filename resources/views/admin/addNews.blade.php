@extends('layouts.admin')

@section('title', 'news add')
@section('content')
<form action="{{ route('news.store') }}" method="post">
    @csrf {{-- csrf phòng chống đẩy những mã hack lên server --}}
    
    <label for="">Tên sản phẩm</label>
    <input type="text" name="name" >
    <label for="">Giá sản phẩm</label>
    <input type="number" name="price">
    <label for="">Mô tả sản phẩm</label>
    <input type="text" name="description">
    <button class="btn btn-success">Thêm</button>
</form>
@endsection
@extends('app')

@section('title', 'welcome')

@section('content')
<h1>đây là news</h1>

<a href="{{ route('news-detail', ['id' => '1']) }}">Xem chi tiết</a>
@endsection

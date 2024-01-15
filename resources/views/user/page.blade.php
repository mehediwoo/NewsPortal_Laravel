@extends('user.layout.app')
@section('title',$data->page_title_bn)
@section('content')

<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            @if (session()->get('lan')=='english')
            {!! $data->page_content_en !!}
            @else
            {!! $data->page_content_bn !!}
            @endif
        </div>
    </div>
</section>
@endsection

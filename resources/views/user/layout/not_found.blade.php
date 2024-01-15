
@extends('user.layout.app')
@section('title','Not Found 404')
@section('content')
<section class="four-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div align="center">
                   <h2 class="four-title"><i class="fa fa-blind"></i> Ooops... Error 404 </h2>
                   @if (session()->get('lan')=='english')
                   <h3>Sorry, we are not found your data! </h3>
                   @else
                   <h3>দুঃখিত! আপনার কাঙ্খিত তথ্যটি খুঁজে পাওয়া যায়নি ! </h3>
                   @endif

                </div>

            </div>
        </div>
    </div>
</section>
@endsection

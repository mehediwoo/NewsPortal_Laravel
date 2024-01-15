@php
    $footer = App\Models\footer::first();
    $social = App\Models\social::first();
@endphp
<!-- top-footer-start -->
<section>
    <div class="container-fluid">
        <div class="top-footer">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="foot-logo">
                        <img src="{{ asset('storage/'.$footer->website_logo) }}" style="height: 50px;" />
                    </div>
                </div>
                <div class="col-md-6 col-sm-4">
                     <div class="social">
                        <ul>

                            <li>
                                @if (!empty($social->facebook))
                                <a href="{{ $social->facebook }}" target="_blank" class="facebook"> <i class="fa fa-facebook"></i></a>
                                @endif
                            </li>
                            <li>
                                @if (!empty($social->twitter))
                                <a href="{{ $social->twitter }}" target="_blank" class="twitter"> <i class="fa fa-twitter"></i></a>
                                @endif
                            </li>
                            <li>
                                @if (!empty($social->instagram))
                                <a href="{{ $social->instagram }}" target="_blank" class="instagram"> <i class="fa fa-instagram"></i></a>
                                @endif
                            </li>
                            <li>
                                @if (!empty($social->linkdin))
                                <a href="{{ $social->linkdin }}" target="_blank" class="linkedin"> <i class="fa fa-linkedin"></i></a>
                                @endif
                            </li>
                            <li>
                                @if (!empty($social->youtube))
                                <a href="{{ $social->youtube }}" target="_blank" class="youtube"> <i class="fa fa-youtube"></i></a>
                                @endif
                            </li>

                        </ul>
                    </div>
                </div>
                {{-- <div class="col-md-3 col-sm-4">
                    <div class="apps-img">
                        <ul>
                            <li><a href="#"><img src="{{ asset('user/assets/img/apps-01.png') }}" alt="" /></a></li>
                            <li><a href="#"><img src="{{ asset('user/assets/img/apps-02.png') }}" alt="" /></a></li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section><!-- /.top-footer-close -->

<!-- middle-footer-start -->
<section class="middle-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="editor-one">
                    @if (session()->get('lan')=='english')
                    {!! $footer->address_en !!}
                    @else
                    {!! $footer->address_bn !!}
                    @endif
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <ul>
                    <li style="list-style:none;color:white">{{ $footer->phone }}</li>
                    <li style="list-style:none;color:white">{{ $footer->telephone }}</li>
                    <li style="list-style:none;color:white">{{ $footer->email }}</li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="editor-three">
                    @php
                        $page = App\Models\page::orderBy('id','ASC')->limit(5)->get();
                    @endphp
                    <ul>
                        <li style="list-style: none;">
                            @if (session()->get('lan')=='english')
                            <a href="{{ route('home') }}" style="color:white">Home</a>
                            @else
                            <a href="{{ route('home') }}" style="color:white">হোম</a>
                            @endif
                        </li>
                        @if (!empty($page))
                            @foreach($page as $page)
                            <li style="list-style: none;">
                                @if (session()->get('lan')=='english')
                                <a href="{{ route('front.page',$page->slug) }}" style="color:white">{{ $page->page_title_en }}</a>
                                @else
                                <a href="{{ route('front.page',$page->slug) }}" style="color:white">{{ $page->page_title_bn }}</a>
                                @endif
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.middle-footer-close -->

<!-- bottom-footer-start -->
<section class="bottom-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="copyright text-center">
                    All rights reserved © <span id="year"></span> National Bangla News
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const d = new Date();
    let year = d.getFullYear();
    document.getElementById("year").innerHTML=year;
</script>

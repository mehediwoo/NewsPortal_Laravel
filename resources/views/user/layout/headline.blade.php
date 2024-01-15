@php
    $headline = App\Models\Post::orderBy('id','DESC')->where('headline','on')->get();
@endphp
<section>
    <div class="container-fluid">
        <div class="row scroll">
            @if (session()->get('lan')=='english')
            <div class="col-md-2 col-sm-3 scroll_01 ">
                Headline :
            </div>
            <div class="col-md-10 col-sm-9 scroll_02">
                @if (!empty($headline) && $headline->count() > 0)

                    <marquee>
                        @foreach ($headline as $iteam)
                       <a href="{{ route('view.post',$iteam->id) }}" style="color:azure"> {{ $iteam->title_en }}</a> *
                        @endforeach
                    </marquee>

                @endif
            </div>
            @else
            <div class="col-md-2 col-sm-3 scroll_01 ">
                শিরোনাম :
            </div>
            <div class="col-md-10 col-sm-9 scroll_02">
                @if (!empty($headline) && $headline->count() > 0)

                    <marquee>
                        @foreach ($headline as $iteam)
                        <a href="{{ route('view.post',$iteam->id) }}" style="color:azure"> {{ $iteam->title_bn }}</a> *
                        @endforeach
                    </marquee>

                @endif

            </div>
            @endif
        </div>
    </div>
</section>

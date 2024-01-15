@php
    $notice = App\Models\notice::where('status',1)->first();
@endphp
@if (!empty($notice) && $notice->status ==1)
<section>
    <div class="container-fluid">
        <div class="row scroll">
            @if (session()->get('lan')=='english')
            <div class="col-md-2 col-sm-3 scroll_01 " style="background:green">
                Notice :
            </div>
            <div class="col-md-10 col-sm-9 scroll_02" style="background: rgb(39, 39, 2)">
                    <marquee>
                        {{ $notice->notice_en }}
                    </marquee>
            </div>
            @else
            <div class="col-md-2 col-sm-3 scroll_01 " style="background:green">
                নোটিস:
            </div>
            <div class="col-md-10 col-sm-9 scroll_02" style="background: rgb(19, 19, 1)">
                <marquee>
                    {{ $notice->notice_bn }}
                </marquee>

            </div>
            @endif
        </div>
    </div>
</section>
@endif

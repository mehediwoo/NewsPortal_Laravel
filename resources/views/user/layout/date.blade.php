@php
function bn_date($str)
    {
     $en = array(1,2,3,4,5,6,7,8,9,0);
    $bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
    $str = str_replace($en, $bn, $str);
    $en = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
    $en_short = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
    $bn = array( 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর' );
    $str = str_replace( $en, $bn, $str );
    $str = str_replace( $en_short, $bn, $str );
    $en = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
    $en_short = array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
    $bn_short = array('শনি', 'রবি','সোম','মঙ্গল','বুধ','বৃহঃ','শুক্র');
    $bn = array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
    $str = str_replace( $en, $bn, $str );
    $str = str_replace( $en_short, $bn_short, $str );
    $en = array( 'am', 'pm' );
    $bn = array( 'পূর্বাহ্ন', 'অপরাহ্ন' );
    $str = str_replace( $en, $bn, $str );
    $str = str_replace( $en_short, $bn_short, $str );
    $en = array( '১২', '২৪' );
    $bn = array( '৬', '১২' );
    $str = str_replace( $en, $bn, $str );
     return $str;
    }
@endphp
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="date">
                    <ul>
                        <script type="text/javascript" src="http://bangladate.appspot.com/index2.php"></script>

                        @if (session()->get('lan')=='english')
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>  Dhaka </li>
                        <li><i class="fa fa-calendar" aria-hidden="true"></i> {{ date('d M Y,l') }}</li>
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> Update every 5 minutes</li>
                        @else
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>  ঢাকা </li>
                        <li><i class="fa fa-calendar" aria-hidden="true"></i> {{ bn_date(date('d M Y,l')) }}</li>
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> আপডেট ৫ মিনিট আগে</li>
                        @endif

                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>

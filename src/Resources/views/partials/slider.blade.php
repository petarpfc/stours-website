@section('head')
<link rel="stylesheet" href="{{URL::asset('st-assets/js/swiper/css/swiper.min.css')}}">
@stop
@if(count($featured_images)>=1)
    <!-- SWIPER SLIDER -->
    <div id="banner">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($featured_images as $img)
                <div class="swiper-slide" style="background-image:url({{$img->path.'/full_size/'.$img->filename}})">
                    <div class="title" data-swiper-parallax="-100">{!!$img->h1!!}</div>
                </div>
                @endforeach
            </div>
            @if(count($featured_images)>1)
            <div class="swiper-pagination swiper-pagination-white"></div>
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
            @endif
        </div>
    </div>
@endif
@section('slider')
<script src="{{URL::asset('st-assets/js/swiper/js/swiper.min.js')}}"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        parallax: true,
        speed: 600,
        spaceBetween: 30,
        effect: 'fade'
    });
</script>
@stop

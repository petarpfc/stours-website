@extends('site::layouts.master')
@section('scripts_js')
    <script>
        var $url_load_more = "{{route('posts.load-more')}}"
        var token = "{{ csrf_token() }}";
    </script>
    <script src="{{URL::asset('st-assets/js/ajax-functions.js')}}"></script>
@endsection
@section('content')
    @if(strtolower($title) == 'home')
        <!-- Slider, full width or not -->
        @if($user['banner_content']['banner_full_width'] != 1)
            <div class="container">
        @endif
            @include('site::partials.slider')
        @if($user['banner_content']['banner_full_width'] != 1)
            </div>
        @endif
        <!-- Page content, full width or not -->
        <section class="<? if($user['banner_content']['content_full_width'] != 1) echo "container ";?> page-content">
            {!! $product->content !!}
            <!-- Botoom gallery -->
            @include('site::partials.bottom_gallery')
        </section>
    @else
        <!-- Slider, full width or not -->
        @if($user['banner_content']['banner_full_width'] != 1)
            <div class="container">
        @endif
            @include('site::partials.slider')
        @if($user['banner_content']['banner_full_width'] != 1)
            </div>
        @endif
        @if(isset($menuMiddle))
            <!-- Middle menu -->
            @include('site::partials.middle-menu')
            <!-- . -->
        @endif
        <!-- Posts or html content (full width or not) -->
        <section class="<? if($user['banner_content']['content_full_width'] != 1) echo "container ";?> page-content">
            @if(isset($posts))
                @if(count($posts)>0)
                    <section>
                        @if($page_list == true)
                            @include('site::partials.page_list')
                        @else
                            @include('site::partials.posts')
                        @endif
                    </section>
                @endif
            @else
            {!! $product->content !!}
            <!-- Botoom gallery -->
            @include('site::partials.bottom_gallery')
            @endif
        </section>

        <!-- . -->
    @endif
    <!-- Google Map -->
    @if(isset($product->maps) and $product->maps->show_on_product)
        @include('site::partials.map')
    @endif
    <!-- . -->
    <!-- Contact form -->
    @if(isset($product->settingsContact) and $product->settingsContact->show_on_product)
        @include('site::forms.contactForm')
    @endif
    <!-- . -->
@endsection
@extends('layouts.app')
@section('content')
<img src="" itemprop="thumbnail" alt="Image description">
<img src="http://127.0.0.1:8000/storage/app/public/image/M85ex54bkmR1JMM5k3wFW76IGLCGPuPu4G41ffs7.jpeg" class="img-responsive">

<div  style="padding-left: :20px;" class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><img src ={{URL::asset('/uploads/avatars/1463283738.jpeg')}}  width="100" ></div>





<div id="gallery" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div><div class="pswp__scroll-wrap">
        <div class="pswp__container">
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
          </div>
          <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
				<div class="pswp__counter"></div>
				<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
				<button class="pswp__button pswp__button--share" title="Share"></button>
				<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
				<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
				<div class="pswp__preloader">
					<div class="pswp__preloader__icn">
					  <div class="pswp__preloader__cut">
					    <div class="pswp__preloader__donut"></div>
					  </div>
					</div>
				</div>
            </div>
			<!-- <div class="pswp__loading-indicator"><div class="pswp__loading-indicator__line"></div></div> -->
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
	            <div class="pswp__share-tooltip">
					<!-- <a href="#" class="pswp__share--facebook"></a>
					<a href="#" class="pswp__share--twitter"></a>
					<a href="#" class="pswp__share--pinterest"></a>
					<a href="#" download class="pswp__share--download"></a> -->
	            </div>
	        </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
              <div class="pswp__caption__center">
              </div>
            </div>
          </div>
        </div>
    </div>
<!-- end -->
<style>
.my-gallery { width: 100%;float: left;}
.my-gallery img { width: 100%;height: auto;}
.my-gallery figure {display: block;}
.my-gallery figcaption {display: none;}
</style>


  <div class="container">
   <h1>  {{$data->title}}</h1>
  
 <h4>  {{$data->content}}</h4>
 </div>
 
  <div class="my-gallery container" itemscope itemtype="http://schema.org/ImageGallery">
@foreach ($medias as $media)  


{{URL::asset('/uploads/image')}}/{{$media->data_link}}
@if ($media->media_type == 'video')
    @isset($media->local_data_link)
        <figure  class="col-xs-12 col-sm-12 col-md-12 col-lg-12"    itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
        <a  href="{{URL::asset('/uploads/videos/')}}/{{$media->local_data_link}}" itemprop="contentUrl" data-size="1024x1024">
            <video style="margin-top: 5px;max-width: 100%;height: auto;"  controls>  
            <source src="{{URL::asset('/uploads/videos/')}}/{{$media->local_data_link}}" type="video/mp4">  
            </video>
        </a> 
                <figcaption itemprop="caption description">Image caption  1</figcaption>
        </figure>
    @endisset

    @isset($media->data_link)
        <figure     class="col-xs-12 col-sm-12 col-md-12 col-lg-12"     itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
        <a  href="{{URL::asset('/uploads/videos/')}}/{{$media->data_link}}" itemprop="contentUrl" data-size="1024x1024">
            <video style="margin-top: 5px;max-width: 100%;height: auto;"  controls>  
            <source src="{{URL::asset('/uploads/videos/')}}/{{$media->data_link}}" type="video/mp4">  
            </video>
        </a> 

                <figcaption itemprop="caption description">Image caption  1</figcaption>
        </figure>
    @endisset

@endif
 
 @endforeach
 @foreach ($medias as $media)  
<!-- end videos -->
<!-- start photos -->
@if ($media->media_type == 'image')
    @isset($media->local_data_link)
    xxxxxxxxxxxxx
        <figure   class="col-xs-4 col-sm-4 col-md-4 col-lg-4"   itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a  href="{{URL::asset('/uploads/image')}}/{{$media->local_data_link}}" itemprop="contentUrl" data-size="1024x1024">
                <img   src="{{URL::asset('/uploads/image')}}/{{$media->local_data_link}}" itemprop="thumbnail" alt="Image description" />
                5555  <img src ={{URL::asset('/uploads/avatars/1463283738.jpeg')}}  width="100" >55555
                

                </a>
                <figcaption itemprop="caption description">Image caption  1</figcaption>
        </figure>
    @endisset

    @isset($media->data_link)xxxxxxxxxxxxx
        <figure   class="col-xs-4 col-sm-4 col-md-4 col-lg-4"  itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href= "{{URL::asset('/uploads/image')}}/{{$media->data_link}}" itemprop="contentUrl" data-size="1024x1024">
                <img src="{{URL::asset('/uploads/image')}}/{{$media->data_link}}" itemprop="thumbnail" alt="Image description" />
                </a>
                <figcaption itemprop="caption description">Image caption  1</figcaption>
        </figure>
    @endisset

@endif


@endforeach
 
  </div>
{!! Html::script('website/to/photoswipe-page.js') !!}
<br><br><br><br><br>
@endsection






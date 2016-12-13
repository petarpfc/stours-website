@if(count($non_featured_images)>=1)
<h3>Gallery</h3>
<div class="col-lg-12 no-padding">
    @foreach($non_featured_images as $img)
    <div class="col-lg-3 col-md-4 col-xs-6 thumb no-padding">
        <a class="thumbnail" href="#" data-image-id="{{$img->id}}" data-toggle="modal" data-title="{{$img->caption}}" data-caption="{{$img->caption}}" data-image='{{$img->path."/full_size/".$img->filename}}' data-target="#image-gallery">
            <img class="img-responsive" src='{{$img->path."/full_size/".$img->filename}}' alt="{{$img->alt}}" >
        </a>
    </div>
    @endforeach
</div>
@endif


<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="image-gallery-title"></h4>
            </div>
            <div class="modal-body">
                <img id="image-gallery-image" class="img-responsive" src="">
            </div>
            <div class="modal-footer">

                <div class="col-md-2 pull-left">
                    <button type="button" class="btn btn-primary" id="show-previous-image"><i class="fa fa-arrow-left"></i></button>
                </div>

                <div class="col-md-6 pull-left" id="image-gallery-caption">
                    This text will be overwritten by jQuery
                </div>

                <div class="col-md-2 pull-right">
                    <button type="button" id="show-next-image" class="btn btn-default"><i class="fa fa-arrow-right"></i></button>
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php  
        $postsDecode = json_decode(json_encode($posts, true), true);
?>


<?php $counter = 1;?>
<div class="st-marketing-box text-center">
	<h2 class="text-center">Page list</h2>
	@if(is_array($postsDecode))
    <div class="row st-two-col-marketing-box">
    @foreach($postsDecode as $p)
        @if($counter%2 == 1)
        <div class="col-sm-3 col-sm-offset-3">
        @else
        <div class="col-sm-3">
        @endif
            <a href="<?php echo $p['permalink'];?>"><img class="img-rounded img-responsive st-img-center" src="<?php if(isset($p['gallery'][0]['path'])) echo $p['gallery'][0]['path'].'/full_size/'.$p['gallery'][0]['filename']; else echo "http://placehold.it/120x120";?>" alt="" /> </a>
            <h3><a class="no-decoration" href="<?php echo $p['permalink'];?>"><?php echo $p['title'];?></a></h3>
        </div>
      <?php $counter++;?>      
      @endforeach
      </div>
      </div>
    @endif
</div>



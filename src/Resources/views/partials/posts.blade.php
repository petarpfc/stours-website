<?php   $counter = 1;
        $postsDecode = json_decode(json_encode($posts, true), true);
        $end = end($postsDecode);
        $idEnd = $end['id'];
        $category_id;
?>
@if(!isset($ajax))
<div class="st-marketing-box text-center" id="posts-content">
@endif
    @if(is_array($postsDecode))
    @foreach($postsDecode as $p)
    <?php $category_id = $p['category_id'];?>
    @if(($counter % $settings->columns_per_page) == 1 && $counter>$settings->columns_per_page)
    <div class="row st-three-col-marketing-box text-center">
    @endif
        <div class="col-sm-<?php echo 12/$settings->columns_per_page;?>">
            <a href="<?php echo $p['permalink'];?>">
            <img class="img-rounded img-responsive st-img-center" src="<?php if(isset($p['gallery'][0]['path'])) echo $p['gallery'][0]['path'].'/full_size/'.$p['gallery'][0]['filename']; else echo "http://placehold.it/120x120";?>" alt="" /></a>
            <h3><a class="no-decoration" href="<?php echo $p['permalink'];?>"><?php echo $p['title'];?></a></h3>
            <p><?php echo strip_tags(substr($p['content'], 0, 200));?></p>
        </div>
    @if(($counter % $settings->columns_per_page) == 0 || ($p['id'] == $idEnd && ($counter < $settings->columns_per_page)))
        </div>
    @endif
    @endforeach
    @endif
@if(!isset($ajax))
</div>
@endif

@if(!isset($ajax))
	@if(count($totalPosts) > $settings->posts_per_page)
		<div class="row text-center"> 
			<button style="margin-bottom:30px; margin-top: 30px;" class="btn btn-sm st-cta-small"  onclick="loadMore(<?php echo $category_id;?>, <?php echo $settings->posts_per_page;?>)">Load more</button>
		</div>
	@endif
@endif

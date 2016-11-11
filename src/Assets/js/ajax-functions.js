var $counter = 1;


function loadMore($category_id, $numPosts){
	 
	$num = $counter*$numPosts;
	$counter++;
	$.ajax({
        type:'POST',
    	url: $url_load_more,
    	data: {id: $category_id, _token: token, counter: $num},
        success: function(data) {
        	$('#posts-content').append(data.html);
        }
    });
}

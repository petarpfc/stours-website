<div class="st-marketing-box text-center footer-content" >
	
	@if(isset($custom_footer) && $custom_footer != null)
		<?php  echo $custom_footer;?>
	@else
	    		<div class="row">
		    		@if(is_array($footerArray))
		    		<?php foreach ($footerArray as $f):?>
		    		<div class="col-md-3 st-portfolio-item" >
		    			<h3><?php echo $f['name']?></h3>
		    			<ul class="footer-ul" style="list-style: none; width: 100%;">
		    			<?php echo $f['sub_menu']['menu'];?>
		    			</ul>
		    		</div>
		    		<?php endforeach;?>
		    		@endif
	    		</div>
	    
	@endif
</div>


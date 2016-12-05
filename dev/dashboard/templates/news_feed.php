<div class="dashboard_newsfeed dbox">
	<div class="dboxheader dbox_head_newsfeed">
		<div class="dboxtitle">
			News Feed / Activity Feed
		</div>
		<div class="newsfeed_content">
			<?php 
				function random_color_part() {
				    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
				}

				function random_color() {
				    return random_color_part() . random_color_part() . random_color_part();
				}
				
				for ($x = 0; $x <= 40; $x++) {
					$color = random_color();
				    include('newsfeed_item.php');
				} 
			
			?>

		</div>		
	</div>
</div>

<div class="pagination">
				<?php
				$i = 0;
				while($i <$total_pages):
					$i+=1;
					if($i==$current_page):
							echo "<span>".$i."</span>";
						else:
							echo "<a href=./?pg=".$i.">".$i."</a>";
					endif;
				endwhile
				?>

			</div>
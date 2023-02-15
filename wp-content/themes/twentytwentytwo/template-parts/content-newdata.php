<?php 
// for new data filter

?>

<div class="col-md-12">
   <div class="news-box">
      <div class="img"><img src="<?php //echo $image[0]; 
         ?>" alt=""></div>
      <?php //endif; 
         ?>
      <div class="info">
         <?php
            if (get_field('news_source', get_the_ID())) {
            	echo '<div class="news-name">';
            	echo get_field('news_source', get_the_ID());
            	echo '</div>';
            }
            
            $newLink     = get_field("news_link", get_the_ID());
            ?>
         <div class="news-title"><a href="<?php echo $newLink; ?>" class="" target="_blank"><?php echo get_the_title(); ?> </a></div>
         <div class="post-col">
            <?php
               the_time('M j, Y');
               echo ' | ';
               
               if (get_field('news_channel', get_the_ID())) {
               	echo get_field('news_channel', get_the_ID());
               }
               ?>
         </div>
      </div>
   </div>
</div>
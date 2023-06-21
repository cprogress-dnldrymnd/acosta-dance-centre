<?php
function doro_pagination($pages = '', $range = 2)
{ 
 $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<ul class='doro-pagination-wrap align-center'>";
          echo "<li><a class='prevposts-link' href='".get_pagenum_link(1)."'><i class='ti-arrow-left'></i></a></li>";
         
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo esc_attr(($paged == $i))? "<li><a class='current-page active'>".$i."</a></li>":"<li><a class='blog-page' href='".get_pagenum_link($i)."'>".$i."</a></li>";
             }
         }

          echo "<li><a class='nextposts-link' href='".get_pagenum_link($pages)."'><i class='ti-arrow-right'></i></a></li>";
         echo "</ul>\n";
     }
}
?>
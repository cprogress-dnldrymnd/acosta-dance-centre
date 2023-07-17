<?php
$term_id = get_queried_object()->term_id;
echo $term_id;
?>

<pre>
  <?php
  var_dump(list_terms());
  ?>
</pre>
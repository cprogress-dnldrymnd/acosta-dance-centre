<?php
get_header();
$name = get_queried_object()->name;
?>

<nav class="woocommerce-breadcrumb">
    <a href="https://acostadancecentre.com">Home</a>&nbsp;/&nbsp;Studio&nbsp;/&nbsp;<?= $name ?>
</nav>

<?php
get_footer();
?>
<?php
// Load the header.php file for the theme
get_header();

// Output the value of the 'rewrite_value' query variable
var_dump( get_query_var( 'rewrite_value' ) );
?>

<div class="content">
    something page content
    <br>
</div>

<?php
// Load the footer.php file for the theme
get_footer();
?>

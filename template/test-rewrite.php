<?php
// Load the header.php file for the theme
get_header();
var_dump( get_query_var( 'something_value' ) )

?>

<div class="content">
    something page content
    <br>
</div>

<?php
// Example usage of preg_match() to extract a part of the URL
// Uncomment the code if you want to use it

// preg_match(
//     '/http:\/\/sourov-training\.site\/([^\/]+)/', // Regex pattern
//     'http://sourov-training.site/something/sfds/', // Target URL
//     $matches // Stores the matched results
// );
//
// if (isset($matches[1])) {
//     echo 'Matched part of URL: ' . $matches[1]; // Outputs the matched part of the URL
// }

// Load the footer.php file for the theme
get_footer();
?>

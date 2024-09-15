<?php
$term_html = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_SPECIAL_CHARS);
$term_url = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_ENCODED);

?>

<form action="example.php" method="get">
    <label for="term">Search</label>
    <input type="search" name="term" id="term" value="<?php echo $term_html; ?>">
    <input type="submit" value="Search">
</form>

<?php

if(null !== $term_html) {
    echo "The serch retult for <mark> $term_html </mark>\n";
}

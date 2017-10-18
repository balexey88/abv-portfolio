<?php
add_filter('the_content', 'abv_add_ids');

function abv_add_ids($content) {
  return $content;
}

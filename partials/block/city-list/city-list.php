<?php

$terms = get_terms( array(
    'taxonomy'      => 'city',
    'hide_empty'    => true,
) );
?>
    <ul>
        <?php foreach ($terms as $term){ ?>
        <li><a href="<?php echo get_term_link( $term->slug, $term->taxonomy ); ?>"><?php echo $term->name; ?></a></li>
        <?php } ?>
    </ul>
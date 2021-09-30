<?php

$terms = get_terms( array(
    'taxonomy'      => 'city',
    'hide_empty'    => false,
) );
?>
<div class="canadacities">
    <div class="canadacities__wrap">
        <ul class="canadacities__list">
            <?php foreach ($terms as $term){ ?>
            <li class="canadacities__item"><a class="canadacities__link" href="<?php echo get_term_link( $term->slug, $term->taxonomy ); ?>"><?php echo $term->name; ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>
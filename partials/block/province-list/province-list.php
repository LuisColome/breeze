<?php

$terms = get_terms( array(
    'taxonomy' => 'province',
    'hide_empty' => false,
) );
?>
<div class="canadaprovinces">
    <div class="canadaprovinces__wrap">
        <ul class="canadaprovinces__list">
            <?php foreach ($terms as $term){ ?>
            <li class="canadaprovinces__item"><a class="canadaprovinces__link"href="<?php echo get_term_link( $term->slug, $term->taxonomy ); ?>"><?php echo $term->name; ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>
    
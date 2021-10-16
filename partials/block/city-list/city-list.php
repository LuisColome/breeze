<?php

$citiesurl = site_url( '/cities/', 'http' );
$fields = get_field('br_city_list');

if( $fields ) :
?>
<div class="canadacities">
    <div class="canadacities__wrap">
        <ul class="canadacities__list">
            <?php foreach ($fields as $field){ ?>
            <li class="canadacities__item"><a class="canadacities__link" href="<?php echo $citiesurl ?><?php echo $field['value']; ?>"><?php echo $field['label']; ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>
<?php endif;
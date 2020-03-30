<?php get_header(); ?>

<?php 
    $pagina_blog = get_option( 'page_for_posts' );
    $imagen = get_post_thumbnail_id( $pagina_blog );
    $imagen_src = wp_get_attachment_image_src ( $imagen, 'full' )[0];
?>

<div class="hero" style="background-image: url( <?php echo $imagen_src; ?>);">
    <div class="contenido-hero">
        <h1><?php echo get_the_title($pagina_blog); ?></h1> 
    </div>
</div>

<div class="seccion contenedor">
    <main class="contenido-principal">
        <?php while(have_posts()): the_post(); ?>
        
            <h1><?php the_title(); ?></h1>
        
        <?php endwhile; ?>
    </main>

</div>



<?php get_footer(); ?>
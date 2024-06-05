<!--Pagina search per visualizzare i dati ricercati-->

<?php get_header(); ?>

  <main class="search">
    <section class="intest-page">
      <div class="text-intest-page">
        <!--the_search_query(); visualizza la parola ricercata-->
        <h1><?php esc_html_e('Hai cercato: ', 'name-theme'); ?><span class="upper">   <?php the_search_query(); ?></span></h1>

        <!--breadcrumb gestite con Yoast Seo-->
        <div class="breadcrumb">
          <?php get_template_part('inc/breadcrumbs'); ?>
        </div> <!--end breadcrumb-->
      </div> <!--end text-intest-page-->
    </section> <!--Section con img-->

    <!--Corpo centrale della pagina-->
    <!--Gestito nella formattazione per visualizzare i risultati di ricerca-->

      <div class="content spacer">

        <!-- inizio ciclo -->
        <?php if ( have_posts() ) : ?>
          <div class="flex-search">
        
        <?php while ( have_posts() ) : the_post(); ?>

        <div class="col-3">
          <a href="<?php the_permalink(); ?>" title="vai a <?php the_permalink(); ?>">
            <div class="search-card">
              <h2><?php the_title(); ?></h2>
              <p><?php the_excerpt(); ?></p>
            </div> <!--end search-card-->
          </a>
        </div> <!--end col-3-->

        <?php endwhile; ?>
      </div> <!--end flex-search-->
        
      <!--paginazione-->
      <div class="center">
        <?php the_posts_pagination( array (
          'mid_size' => 2,
          'prev_text' => __( '<i class="fa-solid fa-chevron-left"></i>', 'name-theme' ),
          'next_text' => __( '<i class="fa-solid fa-chevron-right"></i>', 'name-theme' ),
        ));
        ?>
      </div>
      
      <?php else: ?>

      <div class="format-search">
        <h3 class="search-not-found"><?php esc_html_e('Attenzione, nessun risultato trovato!', 'time-massage'); ?></h3>
      </div> 

      <?php endif; ?>
      <!-- fine ciclo -->

        
      </div> <!--end content-->
    </section>

    <section>
      <div class="content-light center-flex spacer not-found">
       
        <!-- Form di ricerca manuale -->
        <!-- importante lasciare / sulla action -->
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" >
          <label for="s"><?php esc_html_e('Cosa stavi cercando? Cerca nel nostro sito Web', 'name-theme'); ?></label>
          <input type="search" name="s" id="s" value="Hai cercato: '<?php the_search_query(); ?>'" required>

          <input type="submit" value="Ricerca" id="searchsubmit" name="submit" class="button-hero">
        </form>
      </div> <!-- end content-light center-flex spacer not-found-->
  </main>


<?php get_footer(); ?> 
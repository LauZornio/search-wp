<!--Pagina 404 con form per la ricerca dentro il sito-->


<?php get_header(); ?>

  <main class="page-default">
    <section class="intest-page">
      <div class="text-intest-page">
        <!--esc_html_e('testo predisposto per la traduzione', 'name-theme');-->
        <h1><?php esc_html_e('404', 'name-theme'); ?></h1>
        
        <!--breadcrumb gestite con Yoast Seo-->
        <div class="breadcrumb">
          <?php get_template_part('inc/breadcrumbs'); ?>
        </div> <!--end breadcrumb-->
      </div> <!--end text-intest-page-->
    </section> <!--Section con img-->

    <div class="content-light center-flex spacer not-found">

      <?php
        // Ottieni e sanifica l'URL della richiesta
        $requested_url = esc_html($_SERVER['REQUEST_URI']);
        
        // Estrai l'ultima parte del percorso
        $search_query = esc_html(basename($requested_url));
      ?>
      
      <p>
        <?php printf(
            /* %s prende la parola ricercata nella barra degli indirizzi presa dalla variabile $search_query*/
            esc_html__('"%s", questo contenuto non è presente. Può essere perché l\'indirizzo è sbagliato o che il contenuto stesso non sia più presente.', 'name-theme'),
            $search_query);
          ?>
      </p>

      <!-- Form di ricerca manuale -->
      <!-- importante lasciare / sulla action -->
      <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" >
        <label for="s"><?php esc_html_e('Cosa stavi cercando? Cerca nel nostro sito Web', 'name-theme'); ?></label>
        <input type="search" name="s" id="s" placeholder="Esempio: come donare, progetti, contatti ecc." required>

        <input type="submit" value="Ricerca" id="searchsubmit" name="submit" class="button-hero">
      </form>
    </div>
  

    <div class="divider"></div>
  </main>

<?php get_footer(); ?> 
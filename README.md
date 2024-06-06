# search-wp - Ricerca nel sito web Wordpress 🔍
Il funzionamento del search in WordPress si basa su diversi componenti:
- 📄 Template di ricerca (search.php)
- 🔎 La query di ricerca
- 🔁 Il loop di WordPress per mostrare i risultati

## Pagina 404 con form di ricerca 🚫
Questa pagina viene visualizzata quando un utente tenta di accedere a una pagina che non esiste. In questo template, viene offerto un modulo di ricerca per aiutare l'utente a trovare ciò che stava cercando.

### Requested URL 🌐
Viene ottenuta l'URL della richiesta e viene estratta l'ultima parte del percorso per usarla come query di ricerca:
- $requested_url = esc_html($_SERVER['REQUEST_URI']);
- $search_query = esc_html(basename($requested_url));

### Messaggio di Errore ⚠️
Viene visualizzato un messaggio di errore che include il termine di ricerca estratto:

esc_html__('"%s", questo contenuto non è presente. Può essere perché l\'indirizzo è sbagliato o che il contenuto stesso non sia più presente.', 'name-theme'),
            $search_query);

### Form di Ricerca 🔍
Un modulo di ricerca che permette all'utente di effettuare una nuova ricerca:

<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" >
        <label for="s"><?php esc_html_e('Cosa stavi cercando? Cerca nel nostro sito Web', 'name-theme'); ?></label>
        <input type="search" name="s" id="s" placeholder="Esempio: come donare, progetti, contatti ecc." required>

        <input type="submit" value="Ricerca" id="searchsubmit" name="submit" class="button-hero">
</form>

## Pagina di ricerca 🔎
Questa pagina visualizza i risultati della ricerca effettuata dall'utente.
Mostra il termine di ricerca usato dall'utente:

<div class="text-intest-page">
        <!--the_search_query(); visualizza la parola ricercata-->
        <h1><?php esc_html_e('Hai cercato: ', 'name-theme'); ?><span class="upper">   <?php the_search_query(); ?></span></h1>

### Contenuto Principale 📄
Una struttura che gestisce i risultati della ricerca

<?php if ( have_posts() ) : ?>
    <div class="flex-search">
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="col-3">
            <a href="<?php the_permalink(); ?>" title="vai a <?php the_permalink(); ?>">
                <div class="search-card">
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_excerpt(); ?></p>
                </div>
            </a>
        </div>
    <?php endwhile; ?>
    </div>
<?php else: ?>
    <div class="format-search">
        <h3 class="search-not-found"><?php esc_html_e('Attenzione, nessun risultato trovato!', 'time-massage'); ?></h3>
    </div>
<?php endif; ?>

### Paginazione 🔄
Se ci sono molti risultati, viene mostrata la paginazione:

<?php the_posts_pagination( array (
          'mid_size' => 2,
          'prev_text' => __( '<i class="fa-solid fa-chevron-left"></i>', 'name-theme' ),
          'next_text' => __( '<i class="fa-solid fa-chevron-right"></i>', 'name-theme' ),
        ));
?>


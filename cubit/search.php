<?php
get_header();

$fields = [
  'title' => 'Search',
  'background_image' => get_field('search_page', 'option')['background_image']
];

include get_page_component_path('banner-generic');
global $wp_query;
?>

<section id="search">
  <div class="container py-10 sm:py-20">
    <div class="max-w-5xl mx-auto">
      <form action="<?= home_url() ?>" method="GET">
        <div class="relative max-w-xs">
          <input type="text" name="s"
            class="block w-full pl-4 pr-10 py-2 text-base text-gray-dark border-gray-dark focus:ring-black focus:border-black sm:text-sm bg-transparent placeholder:text-opacity-50 placeholder:text-gray-dark"
            placeholder="Type your search here ..." value="<?= isset($_GET['s']) ? $_GET['s'] : '' ?>">
          <div class="absolute right-2.5 top-1/2 -translate-y-1/2 w-4 h-4 text-charcoal">
            <?= get_svg('search') ?>
          </div>
        </div>
      </form>

      <?php if (have_posts()) : ?>
      <div class="mt-4 divide-y divide-black divide-opacity-20">
        <p class="py-4 text-xs">
          Search results for: “<?= $_GET['s'] ?>”
        </p>
        <?php while (have_posts()) : the_post(); ?>
        <a href=" <?= get_the_permalink() ?>" class="relative block py-4 pr-9 hover:font-medium group">
          <?= get_the_title(); ?>
          <div
            class="absolute w-5 h-5 right-2 top-1/2 -translate-y-1/2 transition-opacity opacity-100 sm:opacity-0 sm:group-hover:opacity-100">
            <?= get_icon('chevron-right', 'solid') ?>
          </div>
        </a>
        <?php endwhile; ?>
      </div>
      <?php set_query_var('max_num_pages', $wp_query->max_num_pages); ?>
      <?php set_query_var('url_append', '#search'); ?>
      <?php get_template_part('components/global/pagination/pagination'); ?>
      <?php wp_reset_postdata(); ?>
      <?php else : ?>
      <h2 class="mt-6 sm:mt-12 text-2xl sm:text-3xl font-heading">
        No search results found for: “<?= $_GET['s'] ?>”
      </h2>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php
get_footer();
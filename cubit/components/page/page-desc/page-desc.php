<section id="page-desc" class="bg-gray-100 py-20 page-description">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-6"><?php get_field('subtitle'); ?></h1>
        <h1 class="text-4xl font-bold text-gray-800 mb-6"><?php get_field('title'); ?></h1>
        <p class="text-xl text-gray-600"><?php the_field('content'); ?></p>
    </div>
</section>
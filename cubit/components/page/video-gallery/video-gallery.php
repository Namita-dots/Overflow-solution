  <?php
  
  //print_r($videos);
  $post_id = get_the_ID();
  $categories = get_the_terms(get_the_ID(), 'service-type');
  $category_names = [];
  if (!empty($categories) && !is_wp_error($categories)) {
    foreach ($categories as $category) {
      $category_names[] = $category->name;
    }
  }

  $videos = get_query_var('videos', []);
  $fields = [
    'video' => [
      [
        'youtube_video_url' => 'https://www.youtube.com/watch?v=AttTbHVdCso',
        'video_thumbnail' => '156'
      ],
      [
        'youtube_video_url' => 'https://www.youtube.com/watch?v=bpjG60H1U2E',
        'video_thumbnail' => '156'
      ],
      [
        'youtube_video_url' => 'https://www.youtube.com/watch?v=AttTbHVdCso',
        'video_thumbnail' => '156'
      ]
    ]
  ];

  $info = [
    'subtitle' => $category_names,
    'title' => get_the_title($post_id),
    'content' => get_field('short_description'),
  ];
  ?>

  <?php include get_component_inner_path('text-content-stacked-center'); ?>

  <section id="video-gallery">
    <?php include get_component_path('global/video-content/video-content'); ?>
    <div class="container my-8 text-center">
      <div class="md:mx-96">
        <div class="text-left">
          <?= get_field('description'); ?>
        </div>
        <?php
        if (get_field('listings')) : ?>
          <ul class="mt-8 text-left list-disc list-inside marker:text-grey-500">
            <?php foreach (get_field('listings') as $list) : ?>
              <li class="text-sm font-normal ">
                <?php echo $list['list']; ?>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </section>
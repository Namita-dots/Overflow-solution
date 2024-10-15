<?php
$id = $info['post_id'];
$fields = get_field('info', $id);
$image_id = get_field('image', $id);
$description = get_field('description', $id);
$link = get_field('social_links', $id);
$designation = get_field('designation', $id);
$image = get_img($image_id, '(max-width: 750px) 750w, 464px', ['class' => 'object-cover w-full h-full group-hover transition-transform duration-300']);

$member = [
  'image' => $image,
  'designation' => $designation,
  'name' => get_the_title($id),
  'description' => $description,
  'linkedin_profile' => $link,
]
?>
<div class="cursor-pointer swiper-slide group max-w-[480px] w-full md:block" x-data="{hover:false}">
  <div class="relative" @mouseover="hover = true" @mouseover.away="hover = false" @click="$dispatch('open-member-modal', <?= json_encode_alpine($member) ?>)">
    <div class="relative">
      <div class="relative aspect-[0.7] overflow-hidden">
        <?= get_img($image_id, '(max-width: 500px) 100vw,(max-width:1024px)50vw,(max-width:1556px) 40vw,40vw', ['class' => 'object-cover w-full h-full group-hover transition-transform group-hover:scale-110 duration-300']) ?>
        <div class="absolute inset-0 flex items-end w-full" style="background: linear-gradient(180deg, rgba(168, 162, 158, 0) 0%, rgba(2, 2, 2, 0.8) 100%);">
          <div class="flex flex-col gap-2 mx-8 mb-10 font-medium leading-4 text-white">
            <div class="text-xl">
              <?= get_the_title($id); ?>
            </div>
            <div class="text-xs uppercase">
              <?= $designation ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
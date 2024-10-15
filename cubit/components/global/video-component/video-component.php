<?php 
  $overlay_field = get_field('video_overlay','option');
  if($overlay_field['show_overlay'] == true){
    $men_img_url = get_img($overlay_field['overlay_image']['for_men'],'(max-width : 1024px) 100vw,50vw',['class' => 'h-full w-full object-cover m-0']);
    $women_img_url = get_img($overlay_field['overlay_image']['for_women'],'(max-width : 1024px) 100vw,50vw',['class' => 'h-full w-full object-cover m-0']);
    $rest_img_url = get_img($overlay_field['overlay_image']['for_rest'],'(max-width : 1024px) 100vw,50vw',['class' => 'h-full w-full object-cover m-0']);
    $for_men = get_field('for_men');
    $for_women = get_field('for_women');
    $img_url = $rest_img_url;
    if(isset($for_men) && $for_men == true && isset($for_women) && $for_women == false){
      $img_url = $men_img_url;
    }else if($for_men ==false && $for_women == true){
      $img_url = $women_img_url;
    }
  }
?>
<?php if($overlay_field['show_overlay'] == true): ?>
  <div class="absolute w-full h-full text-center z-[1] hidden overlay-video-container">
  <?= $img_url ?>
  <div class="absolute w-full h-full z-10 bg-black bg-opacity-60 inset-0 flex justify-center items-center flex-col gap-2 text-skin-light border-2 border-solid !border-skin-light overlay-video-element overlay-elements">
    <div class="text-skin-light text-xl uppercase font-subheading">
      <?= $overlay_field['title'] ?>
    </div>
    <div class="text-skin-light font-body text-sm md:text-base">
      <?= $overlay_field['description'] ?>
    </div>
    <div class="inline-flex gap-4 py-6">
      <?=  $overlay_field['primary_button']['theme'] ?>
      <a class="<?= $overlay_field['primary_button']['call_to_action_button']['theme'] == 'outline' ? 'btn-primary-outline bg-transparent sm:w-auto hover:!text-black hover:bg-skin-light hover:border-transparent' : 'btn-primary sm:w-auto text-black bg-skin-light hover:text-skin-light hover:bg-black'?> inline-block"
        href="<?= $overlay_field['primary_button']['call_to_action_button']['type'] == 'internal' ?get_page_link($overlay_field['primary_button']['call_to_action_button']['post']):$overlay_field['primary_button']['call_to_action_button']['url'] ?>">
        <?= $overlay_field['primary_button']['call_to_action_button']['title'] ?>
      </a>
      <a  class="<?= $overlay_field['secondary_button']['call_to_action_button']['theme'] == 'outline' ? 'btn-primary-outline bg-transparent  sm:w-auto hover:!text-black hover:bg-skin-light hover:border-transparent' : 'btn-primary sm:w-auto text-black bg-skin-light hover:text-skin-light hover:bg-black'?> inline-block"
      href="<?= $overlay_field['secondary_button']['call_to_action_button']['type'] == 'internal' ?get_page_link($overlay_field['secondary_button']['call_to_action_button']['post']):$overlay_field['secondary_button']['call_to_action_button']['url'] ?>">
        <?= $overlay_field['secondary_button']['call_to_action_button']['title'] ?>
      </a>
    </div>
  </div>
</div>
<?php endif; ?>
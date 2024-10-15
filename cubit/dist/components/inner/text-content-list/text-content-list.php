<div class="max-w-screen-lg mx-auto py-2 mb-5 leading-5 prose list-dec-sec">
  <?= $content ?>
  

  <?php 
  $list_items = [];
  for ($i = 1; $i <= 7; $i++) {
      $key = 'list_item_data_' . $i;
      if (!empty($list[$key])) {
          $list_items[] = esc_html($list[$key]); // Add non-empty items to the list
      }
  }
  
  // Display the list items if there are any
  if (!empty($list_items)): ?>
      <ul class="pl-5 mx-auto inline-block">
          <?php foreach ($list_items as $item): ?>
              <li><?= $item ?></li>
          <?php endforeach; ?>
      </ul>
  <?php endif; ?>
</div>

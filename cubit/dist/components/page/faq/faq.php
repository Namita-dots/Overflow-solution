<?php $fields = get_field('faq', 'option'); ?>
<section id="faq" class="faq-sec ds-faq">
  <div class="py-10 sm:py-24">
    <div class="container max-w-2xl space-y-5 2xl:max-w-4xl">
      <h2 class="text-3xl leading-10 text-center sm:text-4xl 2xl:text-5xl font-heading">
        <?= $fields['title'] ?>
      </h2>
    </div>
    <div class="container max-w-5xl mt-10 2xl:max-w-6xl">
      <div x-data="Accordion({})">
        <?php
        foreach ($fields['faqs'] as $index => $qna) {
          (function () use ($index, $qna) {
            $fields = [
              'index' => $index,
              'title' => $qna['question'] ? $qna['question'] : 'What is the Question ?',
              'content' => $qna['answer'],
            ];
            include get_component_path('global/accordion/accordion');
          })();
        }
        ?>
      </div>
    </div>
  </div>
</section>
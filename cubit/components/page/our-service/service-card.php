<div class="flex flex-col flex-1 w-full !h-auto min-h-full pt-4 mb-5 text-white bg-shade-400 rounded-tr-3xl swiper-slide">
    <h4 class="px-10 mt-3 text-sm font-medium leading-5 sm:text-base lg:text-lg text-darkgrey">
        <?= $info['category_title']; ?>
    </h4>
    <h2 class="px-10 py-4 text-xl font-semibold leading-9 tracking-wider sm:text-2xl lg:text-3xl text-darkgrey">
        <?= $info['title']; ?>
    </h2>
    <div class="mt-3">
        <div class="w-40 border-b-4 rounded-r-lg border-teal-default"></div>
    </div>
    <div class="px-10 mt-5 mb-3 overflow-hidden text-base font-normal leading-6 prose text-white lg:py-4">
        <div class="line-clamp-3 text-ellipsis">
            <?= $info['short_description']; ?>
        </div>
    </div>
    <?php
    if ($info['listings']): ?>
        <div class="px-10 mb-5 listing-section">
            <?php foreach ($info['listings'] as $list): ?>
                <div class="prose listing">
                    <ul class="list-disc list-outside marker:text-grey-500">
                        <li class="text-sm font-normal text-white">
                            <?php echo $list['list']; ?>
                        </li>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="bottom-0 flex flex-row mt-auto">
        <?php include get_component_path('page/our-service/service-get-started-button') ?>
        <?php include get_component_path('page/our-service/service-more-info-button') ?>
    </div>
</div>
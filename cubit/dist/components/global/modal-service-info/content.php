<div class="flex items-center justify-center">
    <div class="relative w-full max-w-6xl overflow-hidden rounded-tr-3xl" @click.away="open = false">
        <template x-if="info">
            <div class="relative w-full bg-shade-400">
                <div class="relative flex flex-col gap-8 lg:flex-row lg:gap-8">
                    <button class="box-content absolute right-0 hidden w-6 h-6 p-4 text-white transition-transform -top-10 hover:scale-125 lg:block" @click="open = false">
                        <?= get_icon('x') ?>
                    </button>
                    <div class="flex-0 w-full lg:w-[475px]">
                        <div class="aspect-[0.6]" x-html="info?.image"></div>
                    </div>
                    <div class="flex flex-col flex-grow p-4 space-y-4 text-white lg:py-6">
                        <h5 x-text="info?.category_title" class="text-sm"></h5>
                        <h2 x-text="info?.title" class="text-2xl font-semibold lg:text-4xl"></h2>
                        <div class="overflow-y-auto prose prose-white lg:h-auto max-h-96 scroll-primary" x-html="sanitizeHTML(info?.description)">
                        </div>
                        <template x-if="info.listings">
                            <template x-for="(listing, index) in info.listings" :key="index">
                                <ul class="list-disc">
                                    <li x-text="listing.list ? listing.list : ''"></li>
                                </ul>
                            </template>
                        </template>
                    </div>
                    <div class="z-10 items-center justify-end flex-grow hidden w-full h-auto cursor-pointer flex-0 md:w-1/3 lg:flex">
                        <?php
                        $fields = get_field('our_service', 'option');
                        $button_text = $fields['card_button_text']['get_started'];
                        ?>
                        <a @click="$dispatch('service-get-started', info)" class="bg-teal-default hover:bg-teal-dark text-white py-4 px-4 transition duration-300 ease-out flex justify-center font-normal flex-0 overflow-hidden lg:text-xl sm:text-base text-nowrap !max-w-max !h-full items-center"><?= $button_text; ?></a>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>
<div class="flex justify-center items-center">
    <div class="max-w-6xl w-full relative" @click.away="open = false">

        <template x-if="member">
            <div class="p-4 lg;p-6 bg-background w-full relative">
                <!-- <button
                    class="box-content  text-black w-6 h-6 p-4 hover:scale-125 lg:hidden block transition-transform absolute -top-full right-0"
                    @click="open = false">
                    <?= get_icon('x') ?>
                </button> -->
                <div class="flex flex-col lg:flex-row gap-6 lg:gap-14 relative">
                    <button
                        class="box-content  text-black w-6 h-6 p-4 hover:scale-125 hidden lg:block transition-transform absolute top-0 right-0"
                        @click="open = false">
                        <?= get_icon('x') ?>
                    </button>
                    <div class="flex-0 w-full lg:w-[416px]">
                        <div class="aspect-[0.78]" x-html="member?.image">
                        </div>
                    </div>
                    <div class="flex justify-center flex-col lg:py-10 space-y-4 flex-grow">
                        <h5 x-text="member?.designation" class="text-sm text-shade-dark-gray"></h5>
                        <h2 x-text="member?.name" class="text-2xl lg:text-4xl font-semibold text-shade-dark-gray"></h2>
                        <div class="prose  h-20 overflow-auto lg:h-auto max-h-80 overflow-y-auto scroll-dark"
                            x-html="member?.description"></div>
                        <div class="">
                            <a :href="member?.linkedin_profile" target="_blank" class="inline-block">
                                <div class="w-10 h-10 text-black">
                                    <?= get_svg('linkedin') ?>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>
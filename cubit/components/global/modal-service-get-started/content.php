<?php
$choose_service_form = get_field('choose_service_form', 'option');
?>
<div class="flex items-center justify-center">
    <div class="relative w-full max-w-6xl rounded-tr-3xl">
        <div x-show="info ?true:false">
            <div x-data="{ step: 1,formSubmitted: false }" x-init="window.addEventListener('cf7-submitted', () => { formSubmitted = true; });">
                <button class="box-content absolute z-40 w-6 h-6 p-4 text-white transition-transform -right-4 md:-top-10 hover:scale-125 lg:block" @click="open = false; step = 1; formSubmitted = false; document.getElementById('reset').click();">
                    <?= get_icon('x') ?>
                </button>
                <div class="relative flex flex-col w-full h-[90vh] gap-8 pt-8 overflow-y-auto justify between bg-shade-dark-gray lg:gap-8 lg:h-auto min-h-96 lg:max-h-[90vh] scroll-primary-modal">
                    <div class="flex flex-row justify-between gap-4 p-4 text-gray-500 border-b-2 lg:py-6 border-b-gray-200">
                        <div class="flex flex-row justify-between w-full" :class="{'hidden md:flex':step !== 1}">
                            <div class="flex flex-row justify-between w-full md:flex-col text-shade-500" :class="{'hidden md:flex':step !== 1}">
                                <span class="text-shade-500" :class="{'text-shade-300':step > 1}">Step 1</span>
                                <span :class="{'text-wshade-off':step === 1}"><?= $choose_service_form['step_1']['title']; ?></span>
                            </div>
                            <span class="hidden md:block" :class="{'text-teal-default':step > 1}"><?= get_svg('active'); ?></span>
                        </div>
                        <div class="flex flex-row justify-between w-full pr-4" :class="{'hidden md:flex':step !== 2}">
                            <div class="flex flex-row justify-between w-full md:flex-col" :class="{'hidden md:flex':step !== 2}">
                                <span class="text-shade-500" :class="{'text-shade-300':step > 1}">Step 2</span>
                                <span :class="{'text-wshade-off':step === 2}"><?= $choose_service_form['step_2']['title']; ?></span>
                            </div>
                            <span class="hidden md:block" :class="{'text-teal-default':step > 2}"><?= get_svg('active'); ?></span>
                        </div>
                        <div class="flex flex-row justify-between w-full pr-4" :class="{'hidden md:flex flex-row':step !== 3}">
                            <div class="flex flex-row justify-between w-full md:flex-col" :class="{'hidden md:flex':step !== 3}">
                                <span class="text-shade-500" :class="{'text-shade-300':step > 1}">Step 3</span>
                                <span :class="{'text-wshade-off':step === 3}"><?= $choose_service_form['step_3']['title']; ?></span>
                            </div>
                            <span class="hidden md:block" :class="{'text-teal-default':step > 3}"><?= get_svg('active'); ?></span>
                        </div>
                        <div class="flex flex-row justify-between w-full pr-4" :class="{'hidden md:flex flex-row':step !== 4}">
                            <div class="flex flex-row justify-between w-full md:flex-col" :class="{'hidden md:flex':step !== 4}">
                                <span class="text-shade-500" :class="{'text-shade-300':step > 1}">Step 4</span>
                                <span :class="{'text-wshade-off':step === 4}"><?= $choose_service_form['step_4']['title']; ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- First Step -->
                    <div class="text-wshade-off" :class="{ 'hidden': step !== 1 }">
                        <div class="flex flex-col w-full px-4 md:flex-row">
                            <div class="flex flex-col w-full md:px-10 md:w-1/2">
                                <div class="text-4xl">
                                <?= $choose_service_form['step_1']['title']; ?>
                                </div>
                                <div class="py-4 text-xl text-shade-300"><?= $choose_service_form['step_1']['subtitle']; ?></div>
                            </div>
                            <div class="w-full md:w-1/2">
                                <div class="max-w-md px-10 pt-4 mb-5 text-white bg-shade-400 rounded-tr-3xl swiper-slide">
                                    <h4 class="mt-3 text-sm font-medium leading-5 sm:text-base lg:text-lg text-darkgrey" x-text="info && info.category_title">
                                    </h4>
                                    <h2 class="py-4 text-xl font-semibold leading-9 tracking-wider sm:text-2xl lg:text-3xl text-darkgrey" x-text="info && info.title"></h2>
                                    <div class="mt-3">
                                        <div class="w-40 border-b-4 rounded-r-lg border-teal-default"></div>
                                    </div>
                                    <div class="mt-5 mb-3 overflow-y-auto text-base font-normal leading-6 prose text-white lg:py-4 max-h-96 scroll-primary" x-html="sanitizeHTML(info?.description)"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Steps inbetween-->
                    <div :class="{ 'hidden': step < 2 }">
                        <?= do_shortcode($choose_service_form['form']['shortcode']) ?>
                    </div>
                    <!-- Last Step -->
                    <div x-show="step > 3 ? true : false" x-transition:enter="transition-enter" x-transition:enter-start="transition-enter-active" x-transition:leave="transition-leave" x-transition:leave-end="transition-leave-active" lass="mb-10">
                        <div class="group">
                            <div class="py-4 text-4xl ">
                                <?= $fields['step_4']['title']; ?>
                            </div>
                            <div class="py-4 text-base text-black-300">
                                <?= $fields['step_4']['content']; ?>
                            </div>
                        </div>
                        <div class="">
                            <!-- hubspot calendar -->
                            <!-- Start of Meetings Embed Script -->
                            <div class="meetings-iframe-container" data-src="https://meetings-eu1.hubspot.com/jstapels?embed=true">
                            </div>
                            <script type="text/javascript" src="https://static.hsappstatic.net/MeetingsEmbed/ex/MeetingsEmbedCode.js"></script>
                            <!-- End of Meetings Embed Script -->
                            <!-- end of hubspot calendar -->
                        </div>
                    </div>
                    <div class="group" x-show="formSubmitted">
                        <div class="py-4 text-xl text-center text-shade-300">
                            You can just close the popup once you have added the calendar.
                        </div>
                    </div>
                    <div class="flex flex-row footer">
                        <div class="z-10 items-center w-1/2 h-auto cursor-pointer flex-0 md:w-1/3 lg:flex">
                            <a x-bind:disabled="step < 2 || formSubmitted" @click="step > 1 && step--" :class="{ 'text-grey-500 cursor-default': step < 2, 'cursor-pointer': step >= 2 }" class="flex justify-center flex-initial w-32 px-4 py-2 mx-auto mt-3 mb-0 overflow-hidden text-base font-normal text-white transition duration-300 ease-out lg:py-4 lg:px-8 text-nowrap flex-0 lg:text-xl sm:text-base bg-shade-dark-gray">
                                Back
                            </a>
                        </div>
                        <div x-show="step < 3 ? true : false" class="w-1/2 cursor-pointer md:w-2/3">
                            <a @click="step < 4 && step++" :class="{ 'text-grey-500 cursor-not-allowed': step === 4, 'cursor-pointer': step < 4 }" class="flex justify-center flex-initial px-4 py-2 mt-3 mb-0 overflow-hidden text-base font-normal text-white transition duration-300 ease-out bg-teal-default hover:bg-teal-dark lg:py-4 lg:px-8 text-nowrap flex-0 lg:text-xl sm:text-base">
                                Next
                            </a>
                        </div>
                        <div x-show="step === 3 ? true : false" class="w-1/2 cursor-pointer md:w-2/3">
                            <a @click="submit();" class="flex justify-center flex-initial px-4 py-2 mt-3 mb-0 overflow-hidden text-base font-normal text-white transition duration-300 ease-out bg-teal-default hover:bg-teal-dark lg:py-4 lg:px-8 text-nowrap flex-0 lg:text-xl sm:text-base">
                                Book Now
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
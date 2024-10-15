<?php
$fields = get_field('choose_service_form', 'option');
?>
<div class="px-8 text-white">
    <!-- step 2 -->
    <div x-show="step === 2 ? true : false" x-transition:enter="transition-enter" x-transition:enter-start="transition-enter-active" x-transition:leave="transition-leave" x-transition:leave-end="transition-leave-active" class="mb-10">
        <div class="group">
            <div class="py-4 text-4xl">
                <?= $fields['step_2']['title']; ?>
            </div>
            <div class="py-4 text-base text-black-300">
                <?= $fields['step_2']['content']; ?>
            </div>
        </div>
        <div class="flex flex-col flex-wrap">
            <div class="my-5">
                <label> 1. Do you have an existing serviceM8 account? </label>
                <div class="mt-3 "> [radio existing-service-m8-account use_label_element default:1 "Yes" "No"] </div>
            </div>
            <div class="my-5">
                <label> 2. Do you need to migrate from an existing tool?</label>
                <div class="mt-3 "> [radio migrate-from-existing-tool use_label_element default:1 "Yes" "No"] </div>
            </div>
            <div class="my-5">
                [text list-of-exisiting-tools class:form-field placeholder "List your existing tools here"]</div>

            <div class="my-5">
                <label> 3. What is your business size?</label>
                <div class="mt-3 ">
                    [radio radio-625 use_label_element default:1 "Sole trader" "1-5 staff" "5-10 staff" "More than 10
                    staff"]
                </div>
            </div>
            <div class="my-5">
                <label> 4. Have you hired an inbound sales admin service before?</label>
                <div class="mt-3 "> [radio hired-sales-admin-before use_label_element default:1 "Yes" "No"] </div>
            </div>
        </div>
    </div>
    <!-- step 3 -->
    <div x-show="step === 3 ? true : false" x-transition:enter="transition-enter" x-transition:enter-start="transition-enter-active" x-transition:leave="transition-leave" x-transition:leave-end="transition-leave-active" lass="mb-10">
        <div class="group">
            <div class="py-4 text-4xl ">
                <?= $fields['step_3']['title']; ?>
            </div>
            <div class="my-5">
                <label> How would you like to have a meeting ?</label>
                <div class="mt-3 "> [radio radio-751 use_label_element default:1 "Face to face" "Virtual meeting" "Phone call"] </div>
            </div>
            <div class="py-4 text-base text-black-300">
                <?= $fields['step_3']['content']; ?>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2" :class="{ 'hidden': step !== 3 }">
            <div class="w-full">
                [text* firstName class:form-field placeholder "First name"]
            </div>
            <div class="w-full">
                [text* lastName class:form-field placeholder "Last name"]
            </div>
            <div class="w-full">
                [tel* PhoneNumber class:form-field placeholder "Contact Number"]
            </div>
            <div class="w-full">
                [email* Email class:form-field placeholder "Email"]
            </div>
            <div class="w-full">
                [text Business class:form-field placeholder "Business Name (optional)"]
            </div>
            <div class="w-full">
                [text* Location class:form-field placeholder "Location"]
            </div>
            <div class="hidden mt-3 mb-3">
                [submit id:default-contact-submit class:btn-primary "Book Now"]
            </div>
        </div>
        [hidden service_requested class:service-requested ]
        <input type="reset" id="reset" class="sr-only">
    </div>
</div>
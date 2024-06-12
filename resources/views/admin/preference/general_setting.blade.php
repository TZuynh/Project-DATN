<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{$title}}
    </x-slot:pageTitle>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->
        @vite(['resources/scss/light/assets/components/timeline.scss'])
        <!--  END CUSTOM STYLE FILE  -->

        <style>
            .toggle-code-snippet {
                margin-bottom: 0px;
            }

            body.dark .toggle-code-snippet {
                margin-bottom: 0px;
            }
        </style>
    </x-slot:headerFiles>
    <!-- END GLOBAL MANDATORY STYLES -->

    <x-custom.breadcrumb :breadcrumb-items="['Preferences' => '', $title => '']"/>

    <x-custom.stat-box :id="'general-settings-box'">
        <x-slot:boxTitle>
            {{ __('Edit General Settings') }}
        </x-slot:boxTitle>

        <div class="row">
            <x-form.form-layout :form-id="'general-settings'" :form-url="route('admin.preference.general_setting')">
                <x-form.form-input
                    :id="'example-input'"
                    :label="'Example Input'"
                    :name="'example-input'"
                    :placeholder="'Example Input'"
                />
                <x-buttons.submit :label="__('Save')"/>
            </x-form.form-layout>
        </div>
    </x-custom.stat-box>

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>

    </x-slot:footerFiles>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>

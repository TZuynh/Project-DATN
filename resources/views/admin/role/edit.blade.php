<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{ __('Manage Roles') }}
    </x-slot:pageTitle>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
    </x-slot:headerFiles>
    <!-- END GLOBAL MANDATORY STYLES -->

    <x-custom.breadcrumb
        :breadcrumb-items="[
            'Roles & Permissions' => '',
            'Manage Roles' => route('admin.user.authentication.role.index'),
            'Edit Role' => ''
        ]"/>

    <x-custom.stat-box :id="'role-management'" :custom-col="'col-lg-12'">
        <x-slot:boxTitle>
            {{  __('Edit Role :role', ['role' => $role->name]) }}
        </x-slot:boxTitle>

        <div class="row">
            <x-form.form-layout
                :form-id="'general-settings'"
                :form-url="route('admin.user.authentication.role.update', $role)"
                :form-method="'PUT'">
                <x-buttons.button-link
                    :label="__('Cancel')"
                    :url="route('admin.user.authentication.role.index')"
                    :type="'light-dark'"
                    class="mt-0 mb-4"/>
                <x-buttons.submit :label="__('Save')" class="mt-0 mb-4"/>
                <x-form.form-input
                    :id="'sRoleName'"
                    :label="__('Role name')"
                    :name="'name'"
                    :placeholder="__('Role name')"
                    :value="$role->name"
                />
                <x-form.form-multiple-checkbox
                    :data-source="$permissions"
                    :id="'sPermissionsCheckbox'"
                    :name="'permissions'"
                    :value-attribute="'name'"
                    :label="__('Permissions')"
                    :value="$role->permissions->pluck('name')->toArray()"/>
                <x-buttons.button-link
                    :label="__('Cancel')"
                    :url="route('admin.user.authentication.role.index')"
                    :type="'light-dark'"/>
                <x-buttons.submit :label="__('Save')"/>
            </x-form.form-layout>
        </div>
    </x-custom.stat-box>

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>
    </x-slot:footerFiles>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>

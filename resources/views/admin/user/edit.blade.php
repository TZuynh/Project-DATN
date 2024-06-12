<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{ __('Chỉnh sửa') }}
    </x-slot:pageTitle>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/tomSelect/tom-select.default.min.css')}}">
        @vite(['resources/scss/light/plugins/tomSelect/custom-tomSelect.scss'])
        @vite(['resources/scss/dark/plugins/tomSelect/custom-tomSelect.scss'])
    </x-slot:headerFiles>
    <!-- END GLOBAL MANDATORY STYLES -->

    <x-custom.breadcrumb
        :breadcrumb-items="[
            'Người dùng' => '',
            'Danh sách người dùng' => route('admin.user-management.user.index'),
            'Chỉnh sửa người dùng' => ''
        ]"/>

    <x-custom.stat-box :id="'role-management'" :custom-col="'col-lg-12'">
        <x-slot:boxTitle>
            Sửa
        </x-slot:boxTitle>

        <x-form.form-layout :form-id="'general-settings'"
                            :form-url="route('admin.user-management.user.update', $user)"
                            :form-method="'PUT'"
        >
            <x-form.form-input
                :id="'name'"
                :label="'Họ và tên người dùng'"
                :name="'name'"
                :placeholder="'Nhập họ và tên người dùng'"
                :value="$user->name"
                disabled
            />
            <x-form.form-input
                :id="'first_name'"
                :label="'Tên người dùng'"
                :name="'first_name'"
                :placeholder="'Nhập tên người dùng'"
                :value="$user->first_name"
            />
            <x-form.form-input
                :id="'last_name'"
                :label="'Tên người dùng'"
                :name="'last_name'"
                :placeholder="'Nhập tên người dùng'"
                :value="$user->last_name"
            />
            <x-form.form-input
                :id="'email'"
                :label="'Email'"
                :name="'email'"
                :placeholder="'Nhập Email người dùng'"
                :value="$user->email"
                disabled
            />
            <x-form.form-input
                :id="'phone_number'"
                :label="'Số điện thoại'"
                :name="'phone_number'"
                :placeholder="'Nhập số điện thoại'"
                :value="$user->phone_number"
            />
            <x-form.form-select
                :id="'sRoleSelect'"
                :label="'Vai trò trong hệ thống'"
                :data-values="$roles"
                :name="'roles'"
                :multiple="true"
                :placeholder="__('Chọn vai trò')"
                :values="$userRoles"
            />
            <x-buttons.submit :label="__('Hoàn tất')"/>
        </x-form.form-layout>
    </x-custom.stat-box>

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>
        <script src="{{asset('plugins/tomSelect/tom-select.base.js')}}"></script>
    </x-slot:footerFiles>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>

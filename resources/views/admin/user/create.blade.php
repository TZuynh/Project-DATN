<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{ __('Tạo mới') }}
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
            'Tạo mới người dùng' => ''
        ]"/>

    <x-custom.stat-box :id="'role-management'" :custom-col="'col-lg-12'">
        <x-slot:boxTitle>
            Thêm mới người dùng
        </x-slot:boxTitle>

        <x-form.form-layout :form-id="'general-settings'" :form-url="route('admin.user-management.user.store')">
            <x-form.form-input
                :id="'first_name'"
                :label="'Tên người dùng'"
                :name="'first_name'"
                :placeholder="'Nhập tên người dùng'"
            />
            <x-form.form-input
                :id="'last_name'"
                :label="'Họ người dùng'"
                :name="'last_name'"
                :placeholder="'Nhập họ người dùng'"
            />
            <x-form.form-input
                :id="'email'"
                :label="'Email'"
                :name="'email'"
                :placeholder="'Nhập Email'"
            />
            <x-form.form-input
                :id="'phone_number'"
                :label="'Số điện thoại'"
                :name="'phone_number'"
                :placeholder="'Số điện thoại'"
            />
            <x-form.form-input
                :id="'password'"
                :label="'Mật khẩu'"
                :name="'password'"
                :placeholder="'Mật khẩu'"
                :type="'password'"
            />
            <x-form.form-input
                :id="'password_confirmation'"
                :label="'Xác nhận mật khẩu'"
                :name="'password_confirmation'"
                :placeholder="'Xác nhận mật khẩu'"
                :type="'password'"
            />
            <x-form.form-select
                :id="'sRoleSelect'"
                :label="'Vai trò trong hệ thống'"
                :data-values="$roles"
                :name="'roles'"
                :multiple="true"
                :placeholder="__('Chọn vai trò')"
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

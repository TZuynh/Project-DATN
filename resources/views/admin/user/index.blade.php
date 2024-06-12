<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{ $title }}
    </x-slot:pageTitle>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->

        <!--  END CUSTOM STYLE FILE  -->
    </x-slot:headerFiles>
    <!-- END GLOBAL MANDATORY STYLES -->

    <x-custom.breadcrumb :breadcrumb-items="['Người dùng' => '', $title => '']"/>

    <x-custom.stat-box :id="'general-settings-box'" :custom-col="'col-lg-12'">
        <x-slot:boxTitle>
            {{ __('Quản lý người dùng') }}
        </x-slot:boxTitle>
        <x-slot:action>
            <div class="layout-top-spacing mx-3 col-12">
                <x-buttons.button-link :label="__('Tạo mới người dùng')"
                                       :url="route('admin.user-management.user.create')"/>
            </div>
        </x-slot:action>

        <x-table.datatable>
                            <x-slot:tableHeader>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>{{ __('Tên người dùng') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Số điện thoại') }}</th>
                                    <th>{{ __('Vai trò') }}</th>
                                    <th class="text-center dt-no-sorting">{{ __('Actions') }}</th>
                                </tr>
                            </x-slot:tableHeader>
                            <x-slot:tableBody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="checkbox-column text-center">
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            <span class="badge badge-pills badge-info">{{ $user->email }}</span>
                                        </td>
                                        <td>
                                            {{ $user->phone_number ?? "NA" }}
                                        </td>
                                        <td>
                                            @foreach ($user->getRoleNames() as $role)
                                                <span class="badge badge-warning">{{ $role }}</span>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            <ul class="table-controls d-flex">
                                                <x-table.actions.edit-action
                                                    :permission="Acl::PERMISSION_PERMISSION_MANAGE"
                                                    :url="route('admin.user-management.user.edit', $user)"/>
                                                <x-table.actions.delete-action
                                                    :permission="Acl::PERMISSION_PERMISSION_MANAGE"
                                                    :url="route('admin.user-management.user.destroy', $user)"/>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </x-slot:tableBody>
                        </x-table.datatable>
    </x-custom.stat-box>


    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>

    </x-slot:footerFiles>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>

<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{ __('Manage Roles') }}
    </x-slot:pageTitle>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
    </x-slot:headerFiles>
    <!-- END GLOBAL MANDATORY STYLES -->

    <x-custom.breadcrumb :breadcrumb-items="['Roles & Permissions' => '', 'Manage Roles' => '']"/>

    <x-custom.stat-box :id="'general-settings-box'" :custom-col="'col-lg-12'">
        <x-slot:action>
            <div class="layout-top-spacing mx-3 col-12">
                <x-buttons.button-link :label="__('Create new role')"
                                       :url="route('admin.user.authentication.role.create')"/>
            </div>
        </x-slot:action>

        <x-table.datatable>
            <x-slot:tableHeader>
                <tr>
                    <th class="text-center">No.</th>
                    <th>{{ __('Role Name') }}</th>
                    <th>{{ __('Permission Granted') }}</th>
                    <th class="text-center dt-no-sorting">{{ __('Actions') }}</th>
                </tr>
            </x-slot:tableHeader>
            <x-slot:tableBody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="checkbox-column text-center">
                            {{ $loop->index + 1 }}
                        </td>
                        <td>
                            {{ $role->name }}
                        </td>
                        <td>
                            <div class="row">
                                @foreach ($role->permissions->take(10) as $permission)
                                    <div class="col-lg-4 col-md-6 col-12 mb-2">
                                        <span class="badge badge-pills badge-info">{{ $permission->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        <td class="text-center">
                            <ul class="table-controls d-flex">
                                <x-table.actions.edit-action
                                    :permission="Acl::PERMISSION_PERMISSION_MANAGE"
                                    :url="route('admin.user.authentication.role.edit', $role)"/>
                                <x-table.actions.delete-action
                                    :permission="Acl::PERMISSION_PERMISSION_MANAGE"
                                    :url="route('admin.user.authentication.role.destroy', $role)"/>
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

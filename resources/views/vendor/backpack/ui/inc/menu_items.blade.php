{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-dropdown title="Gerenciamento" icon="la la-puzzle-piece">
    <x-backpack::menu-dropdown-header title="Autenticação" />
    <x-backpack::menu-dropdown-item title="Usuários" icon="la la-user" :link="backpack_url('user')" />
    <x-backpack::menu-dropdown-item title="Grupos" icon="la la-group" :link="backpack_url('role')" />
    <x-backpack::menu-dropdown-item title="Permissões" icon="la la-key" :link="backpack_url('permission')" />
</x-backpack::menu-dropdown>
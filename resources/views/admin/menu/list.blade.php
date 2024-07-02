@extends('admin.main')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Active</th>
            <th>Update</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
            function renderMenu($menus, $parent_id = 0, $char = '') {
                foreach ($menus as $menu) {
                    if ($menu->parent_id == $parent_id) {
                        $activeStatus = $menu->active ? 'Yes' : 'No';
                        
                        echo '
                        <tr>
                            <td>' . $menu->id . '</td>
                            <td>' . $char . $menu->name . '</td>
                            <td>' . $activeStatus . '</td>
                            <td>' . $menu->updated_at . '</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="/admin/menus/edit/' . $menu->id . '">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm" onclick="removeRow(' . $menu->id . ', \'/admin/menus/destroy\')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        ';
                        renderMenu($menus, $menu->id, $char . '--');
                    }
                }
            }
        @endphp

        @php renderMenu($menus); @endphp
    </tbody>
</table>

@endsection

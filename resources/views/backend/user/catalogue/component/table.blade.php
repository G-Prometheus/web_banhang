<table class="table table-bordered">
    <thead>
        <tr>
            <th><input type="checkbox" value="" id="checkAll" class="input-checkbox"></th>
            <th>Tên nhóm thành viên</th>
            <th>Số thành viên</th>
            <th>Mô tả</th>
            <th class="text-center">Hành động</th>

        </tr>
    </thead>
    <tbody>
        @if(@isset($userCatalogues) && is_object($userCatalogues))
            @foreach ($userCatalogues as $userCatalogue)
            <tr>
                <td><input type="checkbox" class="input-checkbox"></td>
                <td>{{ $userCatalogue->name }}</td>
                <td>{{ $userCatalogue->users_count }}</td>
                <td>{{ $userCatalogue->description }}</td>
                <td class="text-center"><input value="{{ $userCatalogue->status }}" type="checkbox" class="js-switch status" data-field="status" data-modelId = "{{ $userCatalogue->id }}" data-model="User" {{($userCatalogue->status == 1) ? 'checked' : ''}}/></td>
                <td class="text-center">
                    <a href="{{ route('user.catalogue.edit', $userCatalogue->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('user.catalogue.delete', $userCatalogue->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            
            @endforeach
        @endif
    </tbody>
</table>
{{ $userCatalogues->links('pagination::bootstrap-4') }}
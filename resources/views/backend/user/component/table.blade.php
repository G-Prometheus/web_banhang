<table class="table table-bordered">
    <thead>
        <tr>
            <th><input type="checkbox" value="" id="checkAll" class="input-checkbox"></th>
            <th>Ảnh</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Điện thoại</th>
            <th>Địa chỉ</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @if(@isset($users) && is_object($users))
            @foreach ($users as $user)
            <tr>
                <td><input type="checkbox" class="input-checkbox"></td>
                <td>...</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->address }}</td>
                <td class="text-center"><input value="{{ $user->status }}" type="checkbox" class="js-switch status" data-field="status" data-modelId = "{{ $user->id }}" data-model="User" {{($user->status == 1) ? 'checked' : ''}}/></td>
                <td class="text-center">
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            
            @endforeach
        @endif
    </tbody>
</table>
{{ $users->links('pagination::bootstrap-4') }}
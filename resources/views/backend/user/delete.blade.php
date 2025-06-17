@include('backend.dashboard.component.breadcumb',['title' => $config['seo']['create']['title']])


<form action="{{ route('user.destroy',$user->id) }}" method="post" class="box">
    @method('DELETE')
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">Nhập thông tin chung của người sử dụng</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông tin chung</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Email <span
                                            class="text-danger">(*)</span></label>
                                    <input type="text" name="email" class="form-control" value="{{ old('email',($user->email) ?? '') }}"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Họ tên <span
                                            class="text-danger">(*)</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name',($user->name) ?? '') }}"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        @php
                            $userCatalogue = [
                                '[Chọn nhóm thành viên]',
                                'Quản trị viên',
                                'Cộng tác viên',
                            ]
                        @endphp
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Nhóm thành viên <span
                                            class="text-danger">(*)</span></label>
                                    <select name="user_catalogue_id" id="" class="form-control">
                                        @foreach ($userCatalogue as $key => $item)
                                            <option {{ $key == old('user_catalogue_id',(isset($user->user_catalogue_id)) ? $user->user_catalogue_id : '' ) ? 'selected' : '' }} value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ngày sinh </label>
                                    <input type="date" name="birthday" class="form-control"
                                        value="{{ old('birthday',(isset($user->birthday)) ? date('Y-m-d', strtotime($user->birthday)) : '') }}" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ảnh đại diện</label>
                                    <input type="text" name="image" class="form-control" value="{{ old('image',($user->image) ?? '') }}"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin liên hệ</div>
                    <div class="panel-description">Nhập thông tin liên hệ của người sử dụng</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông tin chung</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Thành phố </label>
                                    <select name="province_id" id="" class="form-control select2 province location"
                                        data-target="districts">
                                        <option value="0">[Chọn Thành Phố]</option>
                                        @if (@isset($provinces))
                                        @foreach ($provinces as $province)
                                        <option @if(old('province_id')==$province->code) selected @endif value="{{
                                            $province->code }}">{{ $province->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Quận/Huyện</label>
                                    <select name="district_id" id="" class="form-control districts select2 location"
                                        data-target="wards">
                                        <option value="0">[Chọn quận/Huyện]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Phường/Xã</label>
                                    <select name="ward_id" id="" class="form-control wards select2">
                                        <option value="0">[Chọn Phường/Xã]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" value="{{ old('address',($user->address) ?? '') }}" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Điện thoại</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone',($user->phone) ?? '') }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ghi chú</label>
                                    <input type="text" name="discipction" class="form-control" value="{{ old('discipction',($user->discipction) ?? '') }}"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-right mb15">
            <button class="btn btn-primary" type="submit" name="send" value="send">Xoá</button>
        </div>
    </div>
</form>

<script>
    var province_id = '{{ (isset($user->province_id)) ? $user->province_id : old('province_id') }}'
    var district_id = '{{ (isset($user->district_id)) ? $user->district_id : old('district_id') }}'
    var ward_id = '{{ (isset($user->ward_id)) ? $user->ward_id : old('ward_id') }}'
</script>
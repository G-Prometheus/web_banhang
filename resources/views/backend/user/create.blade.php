@include('backend.dashboard.component.breadcumb',['title' => $config['seo']['create']['title']])

<form action="" method="" class="box">
    <div class="wrapper wrapper-content animated fadeInRight" >
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
                                    <label for="" class="control-label text-right">Email <span class="text-danger">(*)</span></label>
                                    <input type="text" name="email" class="form-control"  value="{{ old('email') }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Họ tên <span class="text-danger">(*)</span></label>
                                    <input type="text" name="name" class="form-control"  value="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Nhóm thành viên <span class="text-danger">(*)</span></label>
                                    <select name="user_catalogue_id" id="" class="form-control">
                                        <option value="0">[Chọn nhóm thành viên]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ngày sinh </label>
                                    <input type="text" name="name" class="form-control"  value="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Mật khẩu<span class="text-danger">(*)</span></label>
                                    <input type="password" name="password" class="form-control"  value="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Nhập lại mật khẩu<span class="text-danger">(*)</span></label>
                                    <input type="password" name="re_password" class="form-control"  value="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ảnh đại diện</label>
                                    <input type="password" name="image" class="form-control"  value="" autocomplete="off">
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
                                    <select name="province_id" id="" class="form-control select2 province location" data-target="districts">
                                        <option value="0">[Chọn Thành Phố]</option>
                                        @if (@isset($provinces))
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->code }}">{{ $province->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Quận/Huyện</label>
                                    <select name="district_id   " id="" class="form-control districts select2" data-target="wards">
                                        <option value="0">[Chọn quận/Huyện]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb10">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Phường/Xã</label>
                                    <select name="ward_id" id="" class="form-control">
                                        <option value="0">[Chọn Phường/Xã]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control"  value="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Điện thoại</label>
                                    <input type="text" name="phone" class="form-control"  value="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Ghi chú</label>
                                    <input type="text" name="discipction" class="form-control"  value="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-right mb15">
            <button class="btn btn-primary" type="submit" name= "send" value="send">Lưu lại</button>
        </div>
    </div>
</form>
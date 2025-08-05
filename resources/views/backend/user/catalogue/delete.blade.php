@include('backend.dashboard.component.breadcumb',['title' => $config['seo']['create']['title']])


<form action="{{ route('user.catalogue.destroy',$userCatalogues->id) }}" method="post" class="box">
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
                                    <label for="" class="control-label text-right">Tên nhóm thành viên <span
                                            class="text-danger">(*)</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name',($userCatalogues->name) ?? '') }}"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-right">Mô tả <span
                                            class="text-danger">(*)</span></label>
                                    <input type="text" name="description" class="form-control" value="{{ old('description',($userCatalogues->description) ?? '') }}"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                    </div>
                </div>

            </div>
        </div>
        <hr>
        
        <div class="text-right mb15">
            <button class="btn btn-primary" type="submit" name="send" value="send">Xoá</button>
        </div>
    </div>
</form>

<script>
    var province_id = '{{ (isset($userCatalogues->province_id)) ? $userCatalogues->province_id : old('province_id') }}'
    var district_id = '{{ (isset($userCatalogues->district_id)) ? $userCatalogues->district_id : old('district_id') }}'
    var ward_id = '{{ (isset($userCatalogues->ward_id)) ? $userCatalogues->ward_id : old('ward_id') }}'
</script>
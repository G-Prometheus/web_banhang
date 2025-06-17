(function ($) {
    "user strict";
    var HT = {}
    var _token = $('meta[name="csrf-token"]').attr('content')
    HT.switchery = () => {
        $('.js-switch').each(function () {
            var switchery = new Switchery(this, { color: '#1AB394' })
        })
    }
    HT.select2 = () => {
        if ($('.select2').length) {
            $('.select2').select2()
        }
    }
    HT.changeStatus = () => {

        $(document).on('change', '.status', function (e) {
            let _this = $(this)
            let option = {
                'data': {
                    'modelId': _this.attr('data-modelId'),
                    'model': _this.attr('data-model'),
                    'field': _this.attr('data-field'),
                    '_token': _token,
                },
            }
            $.ajax({
                url: 'ajax/dashboard/changeStatus',
                type: 'POST',
                data: option,
                dataType: 'json',
                success: function (res) {
                    console.log(res)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Lỗi' + textStatus + ': ' + errorThrown);
                }
            })
            console.log(option)
            e.preventDefault()
            //HT.sendDataToChangeStatus(option)
        })

    }
    $(document).ready(function () {
        HT.switchery()
        HT.select2()
        HT.changeStatus()
    })
})(jQuery)
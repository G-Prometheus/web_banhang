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

                'value': _this.val(),
                'modelId': _this.attr('data-modelId'),
                'model': _this.attr('data-model'),
                'field': _this.attr('data-field'),
                '_token': _token,

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
    HT.checkAll = () => {
        if ($('#checkAll').length) {
            $(document).on('click', '#checkAll', function (e) {
                let isChecked = $(this).prop('checked')
                $('.input-checkbox').prop('checked', isChecked)
                $('.input-checkbox').each(function () {
                    let _this = $(this)
                    HT.changeBackground(_this)
                })

                $('.input-checkbox').prop('checked', isChecked)
            })
        }
    }
    HT.InputCheckbox = () => {
        if ($('.input-checkbox').length) {
            $(document).on('click', '.input-checkbox', function (e) {
                let _this = $(this)
                HT.changeBackground(_this)
            })
        }
    }
    HT.changeBackground = (_this) => {
        let isChecked = _this.prop('checked')
        if (isChecked) {
            _this.closest('tr').addClass('active-bg')
        } else {
            _this.closest('tr').removeClass('active-bg')
        }
    }

    HT.allChecked = () => {
        let allChecked = $('.input-checkbox').length === $('.input-checkbox:checked').length
        $('#checkAll').prop('checked', allChecked)
    }
    $(document).ready(function () {
        HT.switchery()
        HT.select2()
        HT.changeStatus()
        HT.checkAll()
        HT.InputCheckbox()
        HT.allChecked()
    })
})(jQuery)
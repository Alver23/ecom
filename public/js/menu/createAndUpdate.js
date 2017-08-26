$(function () {
  var formMenu = $('#formMenu')
  var formMenuModal = $('#formMenuModal')
  var trans = window.trans.message
  var path = window.location.href

  formMenu.validate({
    rules: {
      name: {required: true},
      orden: {required: true},
    },
    messages: {
      name: {required: trans.validation.required},
      orden: {required: trans.validation.required},
    },
    highlight: function (element) {
      $(element).closest('.form-group').addClass('has-error')
    },
    unhighlight: function (element) {
      $(element).closest('.form-group').removeClass('has-error')
    },
    submitHandler: function (form) {
      var method = formMenu.find('input[name="_method"]').val()
      var url = path
      if (method === 'PUT') {
        var menuId = formMenu.find('input[name="id"]').val()
        url = path + '/' + menuId
      }

      $(form).ajaxSubmit({
        url: url,
        type: 'POST',
        dataType: 'json',
        beforeSubmit: function() {
          $('#buttonMenu').html('Cargando....')
        },
        success: function (obj) {
          $('#buttonMenu').html(trans.buttons.save)
          if (obj.code === 201 || obj.code === 200) {
            $('#table_menu').DataTable().clear().draw()
            formMenuModal.modal('hide')
          }
          resetForm(formMenu, ['_token', '_method'])
        }
      })
    }
  })
})
$(function () {
  var path = window.location.href
  var formRole = $('#formRole')
  var formRoleModal = $('#formRoleModal')
  var trans = window.trans.message
  formRole.validate({
    rules: {
      name: {required: true},
      display_name: {required: true},
      'permission_id[]': {required: true}
    },
    messages: {
      'name': {required: trans.validation.required},
      'display_name': {required: trans.validation.required},
      'permission_id[]': {required: trans.validation.required}
    },
    highlight: function (element) {
      $(element).closest('.form-group').addClass('has-error')
    },
    unhighlight: function (element) {
      $(element).closest('.form-group').removeClass('has-error')
    },
    submitHandler: function (form) {
      var method = formRole.find('input[name="_method"]').val()
      var url = path
      if (method === 'PUT') {
        var permissioId = formRole.find('input[name="id"]').val()
        url = path + '/' + permissioId
      }
      $(form).ajaxSubmit({
        url: url,
        type: 'POST',
        dataType: 'json',
        beforeSubmit: function (arr, $form, options) {
          console.info('Cargando...')
        },
        success: function (obj, statusText, xhr, $form) {
          console.log(obj)
          if (obj.code === 201 || obj.code === 200) {
            $("#table_permission").DataTable().clear().draw()
            formRoleModal.modal('hide')
          }
          //emptyForm()
        },
        error: function (context, xhr, status, errMsg) {
          if (context.status === 422) {
            var errors = context.responseText || {}
            errors = JSON.parse(errors)
            $.each(errors, function (index, value) {
              var input = formRole.find("input[name=" + index + "]")
              var parent = $(input).closest('.form-group')
              parent.addClass('has-error')
              parent.append("<label id=" + input.attr('id') + "-error class='error'>" + value[0] +"</label>")
            })
          }
        }
      })
    }
  })
})
/**
 * Created by agrisales on 18/07/17.
 */

var path = window.location.href

$(function () {
  var formPermission = $('#formPermission')

  formPermission.validate({
    rules: {
      'name': {required: true}
    },
    highlight: function (element) { // hightlight error inputs
      $(element).closest('.form-group').addClass('has-error') // set error class to the control group
    },
    unhighlight: function (element) { // revert the change done by hightlight
      $(element).closest('.form-group').removeClass('has-error') // set error class to the control group
    },
    submitHandler: function (form) {
      var method = formPermission.find('input[name="_method"]').val()
      var url = path
      if (method === 'PUT') {
        let permissionId = formPermission.find('input[name="permission_id"]').val()
        url = path + '/' + permissionId
      }
      $(form).ajaxSubmit({
        url: url,
        type: 'post',
        dataType: 'json',
        beforeSubmit: function (arr, $form, options) {
          console.log('cargando')
        },
        success: function (obj, statusText, xhr, $form) {
          console.log(obj)
          if (obj.code === 201) {
            console.log('entre')
            $('#table_permission').DataTable().clear().draw()
            $('#formPermissionModal').modal('hide')
          }
        },
        error: function (context, xhr, status, errMsg) {
          if (context.status === 422) {
            var errors = context.responseText || {}
            errors = JSON.parse(errors)
            $.each(errors, function (i, val) {
              var input = formPermission.find(`input[name="${i}"]`)
              var parent = $(input).closest('.form-group')
              parent.addClass('has-error')
              if (parent.find('label').length < 2) {
                parent.append("<label id="+ input.attr('id') +"-error class='error'></label>")
              }
            })
          }
        }
      })
    }
  })
})


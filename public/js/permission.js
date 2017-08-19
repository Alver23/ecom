$(function (){
  var path = window.location.href
  var formPermission = $('#formPermission')
  var formPermissionModal = $('#formPermissionModal')
  $("#table_permission").DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: 'permisos/lista',
    columns: [
      { data: 'name', name: 'name' },
      { data: 'display_name', name: 'display_name' },
      { data: 'description', name: 'description' },
      { data: 'action', name:'action', orderable:false, searchable:false}
    ]
  })

  $(document).on('click', '.deletepermission', function () {
    // data-id
    var id = $(this).data('id') || null
    var button = $(this)
    if (id && typeof (id) !== undefined) {
      button.html('Cargando....').attr('disabled', true)
      $.ajax({
        url: 'permisos/' + id,
        type: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': window.Laravel.csrfToken
        },
        success: function (obj) {
          console.log(obj)
          $("#table_permission").DataTable().clear().draw()
          button.html('Eliminar').removeAttr('disabled')
        }
      })
    }
  })

  $(document).on('click', '#formButtonPermission', function(ev) {
    ev.preventDefault()
    emptyForm()
    formPermissionModal.modal('show')
  })

  $(document).on('click', '.closePermissionModal', function(ev) {
    ev.preventDefault()
    formPermissionModal.modal('hide')
  })

  formPermission.validate({
    
    messages: {
      'name': {required: 'Este campo es obligatorio'}
    },
    highlight: function (element) {
      $(element).closest('.form-group').addClass('has-error')
    },
    unhighlight: function (element) {
      $(element).closest('.form-group').removeClass('has-error')
    },
    submitHandler: function (form) {
      var method = formPermission.find('input[name="_method"]').val()
      var url = path
      if (method === 'PUT') {
        var permissioId = formPermission.find('input[name="id"]').val()
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
            formPermissionModal.modal('hide')
          }
          emptyForm()
        },
        error: function (context, xhr, status, errMsg) {
          if (context.status === 422) {
            var errors = context.responseText || {}
            errors = JSON.parse(errors)
            $.each(errors, function (index, value) {
              var input = formPermission.find("input[name=" + index + "]")
              var parent = $(input).closest('.form-group')
              parent.addClass('has-error')
              parent.append("<label id=" + input.attr('id') + "-error class='error'>" + value[0] +"</label>")
            })
          }
        }
      })
    }
  })

  $(document).on('click', '.editpermission', function() {
    var id = $(this).data('id') || null
    if (id && typeof (id) !== undefined) {
      $.ajax({
        url: path + '/' + id + '/edit',
        type: 'GET',
        dataType: 'json'
      })
        .done(function (obj) {
          console.log(obj)
          if (obj.code === 200) {
            $.each(obj.data, function (i, value) {
              $("#formPermission *[name="+ i +"]").val(value)
            })
            formPermission.find('input[name="_method"]').val('PUT')
            formPermissionModal.modal('show')
          }
        })
    }
  })
})

function emptyForm() {
  var formPermission = $('#formPermission')
  formPermission.find('input[name="name"]').val('')
  formPermission.find('input[name="display_name"]').val('')
  formPermission.find('textarea[name="description"]').val('')
  formPermission.find('input[name="_method"]').val('POST')
  formPermission.find('input[name="id"]').val('')
}
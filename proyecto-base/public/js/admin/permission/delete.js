var path = window.location.href
$(function () {
  let formPermission = $('#formPermission')
  $(document).on('click', '.deletePermission', function (ev) {
    ev.preventDefault()
    var id = $(this).data('id') || null
    var button = $(this)
    button.html('Cargando....')
    if (id && typeof (id) !== 'undefined') {
      $.ajax({
        url: path + '/' + id,
        type: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': window.Laravel.csrfToken
        },
        success: function (obj) {
          $('#table_permission').DataTable().clear().draw()
          $('#formPermissionModal').modal('hide')
          button.html('Eliminar')
        },
        error: function (req, status, err) {
          console.log(req, status, err)
        }
      })
    }
  })
})
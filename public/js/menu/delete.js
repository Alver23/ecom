$(function () {
  $(document).on('click', '.deleteMenu', function () {
    // data-id
    var id = $(this).data('id') || null
    var button = $(this)
    if (id && typeof (id) !== undefined) {
      button.html('Cargando....').attr('disabled', true)
      $.ajax({
        url: 'menus/' + id,
        type: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': window.Laravel.csrfToken
        },
        success: function (obj) {
          $("#table_menu").DataTable().clear().draw()
          button.html('Eliminar').removeAttr('disabled')
        }
      })
    }
  })
})
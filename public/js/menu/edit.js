$(function () {
  var path = window.location.href
  var formMenu = $('#formMenu')
  var formMenuModal = $('#formMenuModal')
  $(document).on('click', '.editMenu', function() {
    var id = $(this).data('id') || null
    if (id && typeof (id) !== undefined) {
      $.ajax({
        url: path + '/' + id + '/edit',
        type: 'GET',
        dataType: 'json'
      })
        .done(function (obj) {
          resetForm(formMenu, ['_token', '_method'])
          if (obj.code === 200) {
            $.each(obj.data, function (i, value) {
              $("#formMenu *[name="+ i +"]").val(value)
            })
            formMenu.find('input[name="_method"]').val('PUT')
            formMenuModal.modal('show')
          }
        })
    }
  })
})
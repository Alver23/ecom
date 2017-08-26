$(function () {
  var formMenu = $('#formMenu')
  var formMenuModal = $('#formMenuModal')
  $(document).on('click', '#formButtonMenu', function () {
    formMenuModal.modal('show')
    resetForm(formMenu, ['_token', '_method'])
  })

  $(document).on('click', '.closeMenuModal', function () {
    formMenuModal.modal('hide')
    resetForm(formMenu, ['_token', '_method'])
  })
})
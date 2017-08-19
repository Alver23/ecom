$(function() {
  var formRoleModal = $('#formRoleModal')
  $(document).on('click', '#formButtonRole', function(ev) {
    ev.preventDefault()
    //emptyForm()
    formRoleModal.modal('show')
  })

  $(document).on('click', '.closeRoleModal', function(ev) {
    ev.preventDefault()
    formRoleModal.modal('hide')
  })
})
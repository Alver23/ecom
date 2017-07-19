/**
 * Created by agrisales on 18/07/17.
 */

$(function (){
  var modal = $('#formPermissionModal')
  $(document).on('click', '#buttonFormPermission', function (ev) {
    ev.preventDefault()
    modal.modal('show')
  })

  $(document).on('click', '.closePermissionModal', function (ev) {
    ev.preventDefault()
    modal.modal('hide')
  })
})

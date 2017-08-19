$(function () {
  $("#table_role").DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: 'roles/lista',
    language: {
      url: 'http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json'
    },
    columns: [
      { data: 'name', name: 'name' },
      { data: 'display_name', name: 'display_name' },
      { data: 'description', name: 'description' },
      { data: 'action', name:'action', orderable:false, searchable:false}
    ]
  })
})
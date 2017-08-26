$(function () {
  $('#table_menu').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    language: {
      url: 'http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json'
    },
    ajax: 'menus/lista',
    columns: [
      { data: 'parent_menu_id', name: 'parent_menu_id'},
      { data: 'name', name: 'name'},
      { data: 'url', name: 'url'},
      { data: 'orden', name: 'orden'},
      { data: 'action', name: 'action', orderable: false, searchable: false},
    ]
  })
})
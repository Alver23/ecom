$(function () {
  $('#table_permission').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: 'permissions/list',
    columns: [
      { data: 'name', name: 'name' },
      { data: 'display_name', name: 'display_name' },
      { data: 'description', name: 'description' }
      // {data: 'action', name: 'action', orderable: false, searchable: false}
    ]
  })
})


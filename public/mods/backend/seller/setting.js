if (typeof dtNoteTable == 'undefined') {
    let dtNoteTable
}

dtNoteTable = initTable('#noteTable', [{
        name: 'id',
        data: null,
        width: '1%',
        mRender: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }
    },
    {
        name: 'title',
        data: 'title',
        mRender: function (data) {
            return `<strong>${data}</strong>`
        }
    },
    {
        name: 'note',
        data: 'note',
    },
    {
        name: 'id',
        data: 'hashid',
        width: 150,
        sortable: false,
        mRender: function (data, type, row) {
            var render = ``
            render += `<button class="btn btn-outline-primary btn-sm" onclick="editData('${data}')"><i class="feather icon-edit"></i></button> `
            render += `<button class="btn btn-outline-danger btn-sm" data-toggle="delete" data-id="${data}"><i class="feather icon-trash-2"></i></button> `
            return render
        }
    }
]);

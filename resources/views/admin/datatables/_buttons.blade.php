{
    "extend": "copy",
    exportOptions: {
    columns: ':visible'
    },
    "text": "<i class='fa fa-copy'></i> <span class='hidden'>Copy to clipboard</span>",
    "className": "btn btn-white btn-primary square btn-bold mr-1"
},

{
    "extend": "excel",
    exportOptions: {
        columns: ':visible'
    },
    "text": "<i class='fa fa-file-excel-o'></i> <span class='hidden'>Export to Excel</span>",
    "className": "btn btn-white btn-primary square btn-bold mr-1"
},

{
    "extend": "print",
    exportOptions: {
        columns: ':visible'
    },
    "text": "<i class='fa fa-print'></i> <span class='hidden'>Print</span>",
    "className": "btn btn-white btn-primary square btn-bold mr-1",
    autoPrint: true,
    message: ''
},

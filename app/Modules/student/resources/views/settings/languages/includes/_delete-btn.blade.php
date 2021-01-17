{
    "text": "{{trans('local.delete')}}",
    "className": "btn btn-danger mr-1",
    action: function ( e, dt, node, config ) {
        var itemChecked = $('input[class="ace"]:checkbox').filter(':checked').length;
        if (itemChecked > 0) {
            var form_data = $('#formData').serialize();
            swal({
                    title: "{{trans('local.delete')}}",
                    text: "{{trans('student::local.ask_delete_language')}}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#D15B47",
                    confirmButtonText: "{{trans('local.yes')}}",
                    cancelButtonText: "{{trans('local.no')}}",
                    closeOnConfirm: false,
                },
                function() {
                    $.ajax({
                        url:"{{route('languages.destroy')}}",
                        method:"POST",
                        data:form_data,
                        dataType:"json",
                        // display succees message
                        success:function(data)
                        {
                            $('.data-table').DataTable().ajax.reload();
                        }
                    })
                    // display success confirm message
                    .done(function(data) {
                        if(data.status == true)
                        {
                            swal("{{trans('local.delete')}}", "{{trans('local.delete_successfully')}}", "success");
                        }else{
                            swal("{{trans('local.delete')}}", data.msg, "error");
                        }
                    });
                }
            );
        }	else{
            swal("{{trans('local.delete')}}", "{{trans('local.no_records_selected')}}", "info");
        }
    }
},

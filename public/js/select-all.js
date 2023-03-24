 $('#select_all').click(function(){
            $('input[name="permission[]"]').prop('checked', $(this).prop('checked'));
        });
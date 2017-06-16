$(".del-article").click(function(e){
        e.preventDefault();
        $('#deleteModal').modal('toggle');
        var _parentForm = $(this).parent('form');
        $('#deleteBtn').click(function(){
            _parentForm[0].submit();
        });
    });

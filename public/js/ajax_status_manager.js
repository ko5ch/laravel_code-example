const STATUS_DONE   = 1;
const STATUS_UNDONE = 0;

function toggleStatus(obj, $task_uid, $is_done) {
    var parent_block = $(obj).parent('td');

    $.ajax({
        url: '/tasks/'+$task_uid+'/status',
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            "uid": $task_uid,
            "status": $is_done ? STATUS_UNDONE : STATUS_DONE
        },
        success:function(data){
            parent_block.html(data.html);
        },
        error:function(){
            alert('No response from server');
        }
    });
}
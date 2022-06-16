$(document).on("click",".examstart",function(){
    var status = $(this).children("i").attr("status");
    var exam_id = $(this).attr("exam_id");
    $.ajax({
        type:'post',
        url :'/admin/cbt/examstart',
        data :{status:status,exam_id:exam_id},
        success:function (resp) {
            
            if (resp['status']==0) {
                $("#exam-"+exam_id).html("<i style'color: red;' class='fas fa-toggle-off' aria-hidden='true' status='Inactive'>Inactive</i>")
            }else if (resp['status']==1) {
                $("#exam-"+exam_id).html("<i style'color: green;' class='fas fa-toggle-on' aria-hidden='true' status='Active'>Active</i>")
            }
        },
        error:function () {
            alert("error");
        }
    });
});
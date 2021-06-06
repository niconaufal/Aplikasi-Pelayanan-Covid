//select edit data 
$(document).ready(function(){
    $('#lihat_jawaban').on('show.bs.modal', function (e) {
        var idx = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : 'reload/lihat_jawaban.php',
            data :  'idx='+ idx,
            success : function(data){
            $('.data-jawaban').html(data);//menampilkan data ke dalam modal
            }
        });
     });
});
//end select data 

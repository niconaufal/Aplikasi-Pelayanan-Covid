//select edit data 
$(document).ready(function(){
    $('#edit_soal').on('show.bs.modal', function (e) {
        var idx = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : 'reload/edit_soal.php',
            data :  'idx='+ idx,
            success : function(data){
            $('.data-soal').html(data);//menampilkan data ke dalam modal
            }
        });
     });
});
//end select data 

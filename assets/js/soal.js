
$('.pilih-sesi').click(function(e){
    e.preventDefault();
    var sesi = $(this).attr('sesi');
    var href = $(this).attr('href');
    $('#content-disini').load('sesi.php?sesi='+sesi, function() {
        /// can add another function here
        $.getScript("../assets/js/"+href+".js");
    });
});
$('#tambah-soal').click(function(e){
    e.preventDefault();
    var sesi = $(this).attr('sesi');
    var href = $(this).attr('sesi');
    $('#content-disini').load('buatsoal.php?sesi='+sesi, function() {
        /// can add another function here
        CKEDITOR.replace( 'editor1' );
    });
});
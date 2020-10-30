<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bagja College Try Out</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color:#f8f8f8">
<?php include '../header.php';?>
<?php 
if($_SESSION['role']=='admin'){
    $nama=$_SESSION['nama'];
    $ref=$_SESSION['ref'];
    $role=$_SESSION['role'];
}else{
    header('location:../intern/login.php');
}?>
    <!-- Custom styles for this template -->
    <link href="../assets/css/side_bar.css" rel="stylesheet"> 
    <!--<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script src="../assets/javascripts/ckeditor/ckeditor.js"></script>
    <script src="../assets/javascripts/ckeditor/config.js"></script>-->
    <script src="../assets/js/tinymce/tinymce.min.js"></script>-->
    <div class="d-flex" id="wrapper">
        <?php include 'sidebar.php';?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li>
                        <?php echo $nama;?>
                    </li>
                </ul>
                </div>
            </nav>
            <textarea id="mytextarea" name="mytextarea">
            Hello, World!
            </textarea>
            <div class="container-fluid" id="content-disini" style="padding-top:20px;">
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() { /// Wait till page is loaded
            tinymce.init({
                selector: '#mytextarea',
                images_upload_url: 'upload_img.php',
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                },
                paste_data_images: true,
                plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality image",
                "emoticons template paste textcolor colorpicker textpattern template"
                ],
                toolbar1: "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ",
                toolbar2: "template | link image | print preview media | forecolor backcolor emoticons | fontsizeselect | tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry tiny_mce_wiris_CAS" ,
                fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
                image_class_list: [
                {title: 'None', value: ''},
                {title: 'Full', value: 'img-fluid'},
                {title: 'Kecil', value: 'kecil'},
                {title: 'Sedang', value: 'sedang'},
                {title: 'Agak Besar', value: 'agak-besar'}
                ],
                image_advtab: true,
                file_picker_callback: function(callback, value, meta) {
                if (meta.filetype == 'image') {
                    $('#upload').trigger('click');
                    $('#upload').on('change', function() {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        callback(e.target.result, {
                        alt: ''
                        });
                    };
                    reader.readAsDataURL(file);
                    });
                }
                },
               
                templates: [{
                title: 'Test template 1',
                content: 'Test 1'
                }, {
                title: 'Test template 2',
                content: 'Test 2'
                }]
            });
           
            $('#content-disini').load('dashboard.php', function() {
                    /// can add another function here
                });
            $('.list-group-item-action').click(function(e){
                e.preventDefault();
                var href = $(this).attr('href');
                $('#content-disini').load(href+'.php', function() {
                    /// can add another function here
                    $.getScript("../assets/js/"+href+".js");
                });
            });
        }); //// End of Wait till page is loaded
    </script>
    <?php include '../footer.php';?>
</body>
</html>
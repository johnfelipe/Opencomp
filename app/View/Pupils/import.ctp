<div class="page-title">
    <h2><?php  echo __('Importer des élèves'); ?></h2>
</div>

<?php
$to = $this->Html->url(array(
    "controller" => "pupils",
    "action" => "import",
    "classroom_id" => $classroom_id,
    "step" => "muf"
));
?>

<form method="post" id="target" action="<?php echo $to ?>" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
    <span class="btn fileinput-button">
        <i class="icon-cloud-upload"></i>
        <span>Sélectionnez l'export .csv BE1D</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="file" type="file" name="files[]" />
    </span>
</form>

<p id="loading" style="display:none;"><i class="icon-spinner icon-spin icon-large"></i> Votre fichier est en cours de chargement ...</p>

<link rel="stylesheet" href="/js/jQuery-File-Upload/css/jquery.fileupload-ui.css">

<script type="text/javascript">
    $(document).ready(function() {
        $('#file').change(function() {
            $('#loading').toggle();
            $('#target').submit();
        });
    });
</script>
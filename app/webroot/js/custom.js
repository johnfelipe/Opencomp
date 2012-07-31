$(document).ready(function() {

    $(".alert").alert();
    
    $(".chzn-select").chosen();
    
    $('.datepicker').datepicker({
        weekStart: 1,
        format: 'yyyy-mm-dd'
    })
    
    $(".tab2").click(function (e) {
      e.preventDefault();
      $('#myTab a[href="#tab2"]').tab('show');
    })
    
    $(".tab1").click(function (e) {
      e.preventDefault();
      $('#myTab a[href="#tab1"]').tab('show');
    })
    
    $(".jstree-toggle").click(function (e) {
      e.preventDefault();
      $("#demo1").jstree("toggle_node",e.delegateTarget);
    })
    
     $(".selectPupils").click(function(event){
      event.preventDefault();
      var classe= $(event.delegateTarget).val(); 
      $('optgroup[label='+classe+']').children().attr('selected', 'selected');
      $("#PupilPupil").trigger("liszt:updated");
    })
    
    $(".unselectPupils").click(function(event){
      event.preventDefault();
      var classe= $(event.delegateTarget).val(); 
      $('optgroup[label='+classe+'] > option[selected=selected]').removeAttr('selected');
      $("#PupilPupil").trigger("liszt:updated");
    })    
    
    $("#demo1").jstree({ 
        "themes" : {
            "theme" : "apple",
            "dots" : true,
            "icons" : false
        },
		"plugins" : [ "themes", "html_data" ]
	});
    
});
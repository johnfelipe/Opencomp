$(document).ready(function() {

    $('.alert').alert();
    
    $('.info').tooltip();
    
    $('.chzn-select').chosen();
    
    $('.startdate').datepicker({
        weekStart: 1,
        format: 'yyyy-mm-dd',
        language: 'fr-FR',
        autoclose: true
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
      $("#PupilPupil").trigger("chosen:updated");
    })
    
    $(".unselectPupils").click(function(event){
      event.preventDefault();
      var classe= $(event.delegateTarget).val(); 
      $('optgroup[label='+classe+'] > option[selected=selected]').removeAttr('selected');
      $("#PupilPupil").trigger("chosen:updated");
    })
    
    $("#demo1").jstree({ 
        "themes" : {
            "dots" : true,
            "icons" : false
        },
		"plugins" : [ "themes", "html_data" ]
	});
	
	$('form').find('input[type=text],textarea,select').filter(':visible:first').focus();
	
	$('.send').change(function(event) {
		var pupil_id = $(event.delegateTarget).val();
		$(event.delegateTarget).val(pupil_id);
		$('#ResultSelectpupilForm').submit();
	});
	
	$('.send').focus(function(event) {
			$(event.delegateTarget).val('');
	});
	
	$('.focus').focus();
	
	$('.result').blur(function(event) {		
		if ($(event.delegateTarget).val() == 'AAA' || $(event.delegateTarget).val() == 'A' || $(event.delegateTarget).val() == 'a') { // Cette condition renvoie « true », le code est donc exécuté
		    $(event.delegateTarget).val('A');
		    $(event.delegateTarget).css("background-color", "#e4ffcb");
		} else if ($(event.delegateTarget).val() == 'BBB' || $(event.delegateTarget).val() == 'B' || $(event.delegateTarget).val() == 'b') {
			$(event.delegateTarget).val('B');
			$(event.delegateTarget).css("background-color", "#e4ffcb");
		} else if ($(event.delegateTarget).val() == 'CCC' || $(event.delegateTarget).val() == 'C' || $(event.delegateTarget).val() == 'c') {
			$(event.delegateTarget).val('C');
			$(event.delegateTarget).css("background-color", "#e4ffcb");
		} else if ($(event.delegateTarget).val() == 'DDD' || $(event.delegateTarget).val() == 'D' || $(event.delegateTarget).val() == 'd') {
			$(event.delegateTarget).val('D');
			$(event.delegateTarget).css("background-color", "#e4ffcb");
		} else if ($(event.delegateTarget).val() == 'NEV' || $(event.delegateTarget).val() == 'NE' || $(event.delegateTarget).val() == 'ne') {
			$(event.delegateTarget).val('NE');
			$(event.delegateTarget).css("background-color", "#e4ffcb");
		} else if ($(event.delegateTarget).val() == 'ABS' || $(event.delegateTarget).val() == 'abs') {
			$(event.delegateTarget).val('ABS');
			$(event.delegateTarget).css("background-color", "#e4ffcb");
		} else if ($(event.delegateTarget).val() == '') {
			$(event.delegateTarget).css("background-color", "#e4ffcb");
		} else {
			$(event.delegateTarget).val('Err.');
			$(event.delegateTarget).css("background-color", "#ffb9b9");
		}
		if($('form').find('input[type=text],textarea,select').filter(':visible:last').attr("id") == $(event.delegateTarget).attr("id")){
			$('#ResultsAddForm').submit();
		}
	});
    
});
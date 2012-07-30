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
        "crrm" : { 
			"move" : {
				"check_move" : function (m) { 
					var p = this._get_parent(m.o);
					if(!p) return false;
					p = p == -1 ? this.get_container() : p;
					if(p === m.np) return true;
					if(p[0] && m.np[0] && p[0] === m.np[0]) return true;
					return false;
				}
			}
		},
		"dnd" : {
		    "drag_check" : function (data) {
				if(data.r.attr("id") == "phtml_1") {
					return false;
				}
				return { 
					after : false, 
					before : false, 
					inside : true 
				};
			},
			"drag_finish" : function (data) { 
				alert("DRAG OK"); 
			},
		    "drop_finish" : function (data) { 
				console.log(data.o); 
			}
		},
        "themes" : {
            "theme" : "apple",
            "dots" : true,
            "icons" : false
        },
		"plugins" : [ "themes", "html_data", "crrm", "dnd" ]
	});
    
});
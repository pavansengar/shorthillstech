$(document).ready(function(){
	$('#dayClick').validate({
		onfocusout: function(element) {
            this.element(element)
        },
		rules: {
			title: {
                required: true
            }, 
            start: {
                required: true 
            }, 
            end: {
                required: true 
            }, 
            allDay: {
                required: true 
            } 
        },
        messages:{
        	title :{
                required: 'Title is required.'
            },
            start:{
                required: 'Start date is required.'
            },
            end:{
                required: 'End date is required.'
            },
            allDay:{
                required: 'All Day selection is required'
            }
        },
        highlight: function (element) {
            $(element).addClass('error')
        },
        unhighlight: function (element) {
            $(element).removeClass('error')
        }
    });
	
	function convertDateToMysqlDateTime(str){
		const d = new Date(str);
		let month = '' + (d.getMonth()+1);
		let day = '' + d.getDate();
		let year = '' + d.getFullYear();
		if(month.length < 2 ) month = '0' + month;
		if(day.length < 2 ) day = '0' + day;
		let hour = ''+d.getUTCHours();
		let minutes = ''+d.getUTCMinutes();
		let seconds = ''+d.getUTCSeconds();
		if(hour.length < 2 ) hour = '0' + hour;
		if(minutes.length < 2 ) minutes = '0' + minutes;
		if(seconds.length < 2 ) seconds = '0' + seconds;
		return [year,month,day].join('-')+' '+[hour,minutes,seconds].join(':');
	};
	var calendar = $('#calendar').fullCalendar({
		selectable:true,
		height: 550,
		width:500,
		showNonCurrentDates: false,
		editable: false,
		navLinks: true,
		defaultView: 'month',
		yearColumns: 3,
		header: {
	        left: 'prev,next today',
	        center: 'title',
	        right: 'year,month,basicWeek,basicDay'
	      },
      	events:"http://localhost/calendar/eventController",
      	dayClick:function(date,event,view){
            $('#title').val('');
            $('#start').val(convertDateToMysqlDateTime(date));
            $('#end').val(convertDateToMysqlDateTime(date));
            $('#color').val('');
            $('#textColor').val('');
            $('#eventId').val('');
            $('#btn_event').html('Add Event');

			$('#dialog').dialog({
				title:'Add Event',
				width:500,
				height:700,
				modal:true,
				show:{effect:'flip',duration:350},
				hide:{effect:'flip',duration:250}
			})
	      },
      	select:function(start,end){
      		$('#title').val('');
      		$('#start').val(convertDateToMysqlDateTime(start));
			$('#end').val(convertDateToMysqlDateTime(end));
            $('#color').val('');
            $('#textColor').val('');
            $('#eventId').val('');
            $('#btn_event').html('Add Event');
			$('#dialog').dialog({
				title:'Add Event',
				width:500,
				height:650,
				modal:true,
				show:{effect:'flip',duration:350},
				hide:{effect:'flip',duration:250}
			})
	      },
  		eventClick: function(event) {
	      	$('#title').val(event.title);
	      	$('#start').val(convertDateToMysqlDateTime(event.start));
	      	$('#end').val(convertDateToMysqlDateTime(event.end));
	      	$('#color').val(event.color);
	      	$('#textColor').val(event.textColor);
	      	$('#eventId').val(event.id);
	      	$('#btn_event').html('Update');
      		$('#dialog').dialog({
				title:'Edit Event',
				width:500,
				height:650,
				modal:true,
				show:{effect:'flip',duration:350},
				hide:{effect:'flip',duration:250}
			})
	  	}
	})
});
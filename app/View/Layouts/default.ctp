<?php 
	$cakeDescription = __d('cake_dev', 'Amader Daktar');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout ?>:
		
	</title>
  <script>
    var siteurl = "<?php echo $this->request->webroot;?>" 
    
  </script>
  
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	
	<?php
		echo $this->Html->css(array('bootstrap.min',
			'ionicons.min',
			'datepicker3',
			'all',
			'bootstrap-timepicker.min',
			'select2.min',
			'AdminLTE.min',
      'style',
      'jquery-ui',
			'_all-skins.min'));		
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<?php $userID = $this->Session->read('Auth.User.id');
	$uid = '';
	if($this->Session->read('Auth.User.role_id') == 2){		
			$uid = 'Doctor000'.$userID;
		}else if($this->Session->read('Auth.User.role_id') == 4){			
			$uid =  'RMP000'.$userID;
		}else{
			$uid = $userID;
		}
	?>
	
	

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<?php 	
	echo $this->element("menu/header");
	echo $this->element("menu/sidebar");
	echo $this->fetch('content'); 
	 ?>

	<footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy; 2014-2016 AID ACADEMY.</strong> All rights
    reserved.
  </footer>
<?php 
	echo $this->Html->script(array(				
			'jquery-2.2.3.min',			
			'bootstrap.min',
			'select2.full.min',
			'jquery.inputmask',
			'jquery.inputmask.date.extensions',
			'jquery.inputmask.extensions',			
			'moment.min',
			'daterangepicker',
			'bootstrap-datepicker',
			'bootstrap-timepicker.min',
			'jquery.slimscroll.min',
			'icheck.min',
			'fastclick',
      'jquery-ui',
      
			'app.min',
			
			
		));
?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    //$('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    /*$('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );*/

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

  

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
</body>
</html>
<script>

/**
* assesment section
*/
  $("#addPrescription").on("click",function(){  
  var day = $("#BatchBatchTimeDay option:selected").val();
  var startTime =  $("#startTime").val();
  var endTime =  $("#endTime").val();
  
    
    $("#prescription").append('<div>'+
      '<div  style="clear:both" class="rowss"> '+      
      '<div class="col-md-2">'+ 
          '<label>Day</label>'+
          '<input  type="text" name="day[]" readonly="true" value="'+day+'" class="form-control">'+ 
      '</div>'+
      '<div class="col-md-2">'+ 
          '<label>Start Time</label>'+
          '<input  type="text" name="start_time[]" readonly="true" value="'+startTime+'" class="form-control">'+ 
      '</div>'+
      '<div class="col-md-2">'+ 
          '<label>End Time</label>'+
          '<input  type="text" name="end_time[]" readonly="true" value="'+endTime+'" class="form-control">'+ 
      '</div>'+
      '<div class="col-md-1"><label>&nbsp;</label>'+
              '<button  type="button"'+
                'class="btn  btn-md remove">'+
                '<span class="glyphicon" aria-hidden="true">Delete</span></button>'+
            '</div>'+
      
      '</div>');
    
    
    
  
});

$(document).on('click','.remove', function(){
      $(this).parent().parent().remove();
    });

$("#addCourse").on("click",function(){
  var course = $("#BatchTimeCourseId option:selected").val();
  var batch = $("#BatchTimeBatchId option:selected").val();
  
  if(course == "" || batch == ""){
    return ;
  } 
    $("#prescription").append('<div>'+
      '<div  style="clear:both" class="rowss"> '+
      '<div class="col-md-4">'+ 
          '<label> &nbsp;</label>'+
          '<input  type="text" name="course[]" readonly="true" value="'+course+'" class="form-control">'+ 
      '</div>'+
      '<div class="col-md-4">'+ 
          '<label> &nbsp;</label>'+
          '<input  type="text" name="batch[]" readonly="true" value="'+batch+'" class="form-control">'+ 
      '</div>'+
      
      '<div class="col-md-1"><label>&nbsp;</label>'+
              '<button  type="button"'+
                'class="btn  btn-md remove">'+
                '<span class="glyphicon" aria-hidden="true">Delete</span></button>'+
            '</div>'+
      
      '</div>');
});


$("#addBatch").on("click",function(){
  var batch = $("#CourseBatchId option:selected").val();
    $("#prescription").append('<div>'+
      '<div  style="clear:both" class="rowss"> '+
      '<div class="col-md-2">'+ 
          '<label> &nbsp;</label>'+
          '<input  type="text" name="batch[]" readonly="true" value="'+batch+'" class="form-control">'+ 
      '</div>'+
      
      '<div class="col-md-1"><label>&nbsp;</label>'+
              '<button  type="button"'+
                'class="btn  btn-md remove">'+
                '<span class="glyphicon" aria-hidden="true">Delete</span></button>'+
            '</div>'+
      
      '</div>');
});



  $(document.body).on("change",'#BatchTimeCourseId', function (event) {
      var course = $("#BatchTimeCourseId option:selected").val();

      $.ajax({
          async:true,      
          dataType: "html",    
          url:siteurl+"Students/batch/"+course,
          success:function (data) {   
        $("#batch").html(data);
         
          },
          type:"get"            
      });     
      return false; 
    }); 


  </script>
  <script>
$(function() {
    $( ".due_date" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd' ,
      //minDate: 0
    });
  });
</script>
<script>
function readURL(input, name) {        
  var idd = name.split('_');
  var ids = idd[1];   
  var fileName = input.files[0].name;
  var Extension = fileName.substring(
                    fileName.lastIndexOf('.') + 1).toLowerCase(); 
  if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                      || Extension == "jpeg" || Extension == "jpg") {

    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
      $("#img")
        .attr('src', e.target.result)
        .width(100)
        .height(100);
      };
      reader.readAsDataURL(input.files[0]);         
    }
  }else{
     alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
      input.value = "";
      return false;
  }
}
</script>

<script>
  $(document.body).on("click",'#export', function (event) {    
      var start = $("#start").val();
      var end = $("#end").val(); 
      if(start =="" || end == ""){
        
        return ;
      }   
      $.ajax({
          async:true,      
          dataType: "html",    
          url:"",
          success:function (data) { 
          window.location = siteurl+"Students/export?start="+start+"&end="+end;
          },
          type:"get"            
      });     
      return false; 
    }); 
 
  </script>

  <script>

$(function(){
  
  
$("#role").autocomplete({
  minLength: 2,
  source: function( request, response ) {    
    $.ajax({          
      url: siteurl+"Students/students/",
      dataType: "json", 
      data: {
              q: request.term
            },     
      success: function( data ) {
        
        var patients = [];
        for(var i=0;i<data.length;i++){          
            patients.push(data[i].Student.name+" -"+data[i].Student.id_number); 
          }
          response( patients );
        }
      });
    },
  });   
});

</script>

<!-- jquery modal for student preview details-->
<script>
  $(document.body).on("click",'.view', function (event) {
    $.ajax({
      url: '',
      success: function(data) {
        $("#dialog").html("data").dialog({modal:true}).dialog('open');
      }
    });
    return false;
  });
</script>

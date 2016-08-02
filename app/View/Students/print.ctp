<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <b>Date: <?php echo $date?></b>
          <span style="position:absolute;left:424px;top:13px"><b> ADMISSION FORM</b></span>
          <small class="pull-right"></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-12 invoice-col">
        <strong>Student's Name (All Capital letter) : </strong> <span><?php echo $this->request->data['Student']['name']?>
      </div>
    </div>
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <strong>Student's Nick Name : </strong> <span><?php echo $this->request->data['Student']['nick_name']
        ?>
      </div>
       <div class="col-sm-4 invoice-col">
        <strong>Name in Bengali : </strong> <span><?php echo $this->request->data['Student']['name_bn']
        ?>
      </div>
      <div class="col-sm-4 invoice-col" style="position:absolute;left:1000px;top:68px">
        <?php echo $thumbnail= $this->Html->image('user/'.$this->request->data['Student']['picture'],array('class'=>'image-user','width'=>'100px','height'=>'100px')); ?>
      </div>


      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row invoice-info">
      <div class="col-sm-12 invoice-col">
        <strong>Father's Name : </strong> <span><?php echo $this->request->data['Student']['father_name']?>
      </div>
    </div>

    <div class="row invoice-info">
      <div class="col-sm-6 invoice-col">
        <strong>Father's Ocupation : </strong> <span><?php echo $this->request->data['Student']['father_occupation']
        ?>
      </div>
       <div class="col-sm-6 invoice-col">
        <strong>Mother's Name : </strong> <span><?php echo $this->request->data['Student']['mother_name']
        ?>
      </div>
      <!-- /.col -->
    </div>
    <div class="row invoice-info">
      <div class="col-sm-6 invoice-col">&nbsp;
      </div>
      <div class="col-sm-6 invoice-col">
        <strong>Mother's Ocupation : </strong> <span><?php echo $this->request->data['Student']['mother_occupation']?>
      </div>
    </div>

    <div class="row invoice-info">
      <div class="col-md-12">
        <strong>Present Address : </strong> <span><?php echo $this->request->data['Student']['present_address']?>
      </div>
    </div>

     <div class="row invoice-info">
      <div class="col-sm-6 invoice-col">
        <strong>Contact(Student) : </strong> <span><?php echo $this->request->data['Student']['contact_student']?>
      </div>
      <div class="col-sm-6 invoice-col">
        <strong>Contact(Guardian) : </strong> <span><?php echo $this->request->data['Student']['contact_guardian']?>
      </div>
    </div>
    <div class="row invoice-info">
      <div class="col-sm-12 invoice-col">
        <strong>College Name : </strong> <span><?php echo $this->request->data['Student']['college']?>
      </div>
    </div>
    <div class="row invoice-info">
      <div class="col-sm-6 invoice-col">
        <strong>Home District : </strong> <span><?php echo $this->request->data['Student']['district']?>
      </div>
      <div class="col-sm-6 invoice-col">
        <strong>Email : </strong> <span><?php echo $this->request->data['Student']['email']?>
      </div>
    </div>

    <hr />
   
    <div class="row invoice-info">
      <div class="col-sm-12 invoice-col">
        <div class="row  form-group">
          <div class="col-sm-4 invoice-col">
            <label>School</label>
            <div><?php echo $this->request->data['Student']['school']?></div>
            <label>Year of Passing</label>
            <div><?php echo $this->request->data['Student']['passing_year']?></div>
            <label>GPA</label>
            <div><?php echo $this->request->data['Student']['gpa']?></div>
            <label>Board</label>
            <div><?php echo $this->request->data['Student']['board']?></div>
               
          </div>
          <div class="col-sm-4 invoice-col">
            <label>Total Amount</label> 
            <div><?php echo $total_fees?></div>  
            <label>Paid on Admission</label> 
            <div><?php echo $total_payment?></div> 
            <label>Due Amount</label> 
            <div><?php echo $total_due?></div>               
          </div>
          <div class="col-sm-4 invoice-col">
            <label>Batch No</label>
            <div><?php echo $this->request->data['Batch']['name']?></div> 
            <label>Roll</label>
            <div><?php echo $this->request->data['Student']['roll']?></div> 
            <label>Branch</label>
            <div><?php echo $this->request->data['Student']['branch']?></div>               
          </div>             
        </div>
      </div>
    </div>
    
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <div> <br />
          --------------------------</br>
          Signature of Guradian
        </div>
      </div>
       <div class="col-sm-4 invoice-col">
        <div> <br />
          --------------------------</br>
          Signature of Authority
        </div>
      </div>
      <div class="col-sm-4 invoice-col">
        <div> <br />
          --------------------------</br>
          Signature of Student
        </div>
    </div>

  
  </section>
  <!-- /.content -->
</div>
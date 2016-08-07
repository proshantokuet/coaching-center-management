<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <b>Date: <?php echo $date?></b>
          <span style="position:absolute;left:424px;top:13px"><b> Student Summary </b></span>
          <small class="pull-right"></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-12 invoice-col">
        <strong>Student's Name : </strong> <span><?php echo $this->request->data['Student']['name']?>
      </div>
    </div>
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <strong>Roll No : </strong> <span><?php echo $this->request->data['Student']['id_number']
        ?>
      </div>
       <!-- <div class="col-sm-4 invoice-col">
        <strong>Name in Bengali : </strong> <span><?php echo $this->request->data['Student']['name_bn']
        ?>
      </div> -->
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
        <strong>Mother's Name : </strong> <span><?php echo $this->request->data['Student']['mother_name']
        ?>
      </div>
      <!-- /.col -->
    </div>
    <div class="row invoice-info">
      <div class="col-sm-6 invoice-col">
      </div>
     
    </div>

    <div class="row invoice-info">
      <div class="col-md-6">
        <strong>Present Address : </strong> <span><?php echo $this->request->data['Student']['present_address']?>
      </div>
      <div class="col-sm-6 invoice-col">
        <strong>Class : </strong> <span><?php echo $this->request->data['Student']['passing_year']?>
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
      <div class="col-sm-6 invoice-col">
        <strong>Institute : </strong> <span><?php echo $this->request->data['Institution']['name']?>
      </div>
      <div class="col-sm-6 invoice-col">
        <strong>Email : </strong> <span><?php echo $this->request->data['Student']['email']?>
      </div>
    </div>

    <hr />
   <div class="row invoice-info">
      <div class="col-sm-12 invoice-col">
        <strong> Student Payment Profile</strong>
      </div>
    </div>
    <hr />
     <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Serial #</th>
              <th>Course</th>
              <th>Fees</th>
              <th>Payment </th>
              <th>Due Amount</th>
              <th>Next Payment Date</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($this->request->data['Fee'])){ $i=0;?>      
            <?php foreach ($this->request->data['Fee'] as $key => $value) {  $i++;?> 
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $value['name'];?>(<?php echo $value['batch']?>)</td>
              <td><?php  echo $value['fees']; ?></td>
              <td><?php  echo $value['payment']; ?></td>
              <td><?php  echo $value['due']; ?></td>
              <td><?php  echo $value['due_date']; ?></td>
            </tr>
            <?php } } ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
    <hr />
     <div class="row invoice-info">
      <div class="col-sm-12 invoice-col">
        <strong> Latest Payment</strong>
        <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Serial #</th>
              <th>Course</th>
              <th>Payment Amount</th>              
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($last_payment)){ $i=0;?>      
            <?php foreach ($last_payment as $key => $value) {  $i++; //pr($value);?> 
            <tr>
              <td><?php echo $i;?></td>              
              <td><?php  echo $value['Course']['name']; ?>( 
                <?php echo $this->requestAction('batches/title/'.$value['LastPayment']['student_id'].'/'.$value['LastPayment']['course_id'])?> )</td>
              <td><?php  echo $value['LastPayment']['amount']; ?></td>
              
            </tr>
            <?php } } ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
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
           Signature of Student
        </div>
      </div>
      <div class="col-sm-4 invoice-col">
        <div> <br />
          --------------------------</br>
          Signature of Authority
         
        </div>
    </div>

  
  </section>
  <!-- /.content -->
</div>
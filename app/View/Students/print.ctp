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
    
   <!--  <div class="row invoice-info">
      <div class="col-sm-6 invoice-col">
           <strong>Student's Name : </strong> <span><?php echo $this->request->data['Student']['name']?>
       
      </div>
       <div class="col-sm-6 invoice-col">
        <strong>Roll No : <span><?php echo $this->request->data['Student']['id_number']
        ?></strong> 
         
       
      </div>
      
      <div class="col-sm-4 invoice-col" style="position:absolute;left:1000px;top:68px">
        <?php echo $thumbnail= $this->Html->image('user/'.$this->request->data['Student']['picture'],array('class'=>'image-user','width'=>'100px','height'=>'100px')); ?>
      </div>


      
    </div> -->
    <!-- /.row -->
    

   <!--  <div class="row invoice-info">
     
      <div class="col-sm-6 invoice-col">
       <strong>Father's Name : </strong> <span><?php echo $this->request->data['Student']['father_name']?>
      </div>
       <div class="col-sm-6 invoice-col">
         <strong>Mother's Name : </strong> <span><?php echo $this->request->data['Student']['mother_name']
        ?>          
      </div>

      
    </div>
    

    <div class="row invoice-info">
      
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
    </div> -->

     <div class="row invoice-info">
       <div class="col-sm-4 invoice-col">
        
        <?php echo $thumbnail= $this->Html->image('user/thumbnail/'.$this->request->data['Student']['thumbnail'],array('class'=>'image-user','width'=>'150px','height'=>'100px')); ?>
      
        <br />
        <strong>Student's Name : </strong> <span><?php echo $this->request->data['Student']['name']?></span>
        <br />
        <strong>Roll No : <span><?php echo $this->request->data['Student']['id_number']
        ?></strong> </span>

       </div>
       <div class="col-sm-4 invoice-col">
        <strong>Father's Name : </strong> <span><?php echo $this->request->data['Student']['father_name']?><br />
        <strong>Mother's Name : </strong> <span><?php echo $this->request->data['Student']['mother_name']
        ?> <br />
        <strong>Class : </strong> <span><?php echo $this->request->data['Student']['passing_year']?><br />
        <strong>Contact(Student) : </strong> <span><?php echo $this->request->data['Student']['contact_student']?><br />
         <strong>Contact(Guardian) : </strong> <span><?php echo $this->request->data['Student']['contact_guardian']?><br />
          <strong>Institute : </strong> <span><?php echo $this->request->data['Institution']['name']?><br />
           <strong>Email : </strong> <span><?php echo $this->request->data['Student']['email']?>

       </div>
       <div class="col-sm-4 invoice-col" >
        <img  src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=name:sohel roll no:123456&choe=UTF-8" title="Link to Google.com" />
       </div>


     </div>

    <hr />

    <strong> Student Payment Profile</strong>
      
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
     
        <strong> Latest Payment</strong>
        <div class="row">
        <div class="col-xs-12 table-responsive">
          
            <?php if(!empty($last_payment)){ $i=0;?>   
            <table class="table table-striped">
            <thead>
            <tr>
              <th>Serial #</th>
              <th>Course</th>
              <th>Payment Amount</th> 
              <th>Date</th>              
            </tr>
            </thead>
            <tbody>   
            <?php foreach ($last_payment as $key => $value) { 
              if($value['LastPayment']['amount'] !=""){
                 $i++; ?> 
                <tr>
                  <td><?php echo $i;?></td>              
                  <td><?php  echo $value['Course']['name']; ?>( 
                    <?php echo $this->requestAction('batches/title/'.$value['LastPayment']['student_id'].'/'.$value['LastPayment']['course_id'])?> )</td>
                  <td><?php  echo $value['LastPayment']['amount']; ?></td>
                  <td><?php  echo $value['LastPayment']['created']; ?></td>
                  
                </tr>
            <?php  
              }}


            } ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
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
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrappers" style="background-color: #ecf0f5">
    <!-- Content Header (Page header) -->
    <?php echo $this->element("menu/head"); ?>
    <?php echo $this->element("menu/menu"); ?>
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h3><?php echo $this->Session->flash();?></h3>
          <h2 class="page-header">
            <i class="fa fa-globe"></i> 
             <?php echo $this->Html->link('Edit Profile', array('controller' =>'Students', 'action' => 'update', $this->request->data['Student']['id']),array('class'=>'product-title','escape' => false,)); ?>

            <small class="pull-right"><?php echo $date ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <?php echo $thumbnail= $this->Html->image('user/thumbnail/'.$this->request->data['Student']['thumbnail'],array('class'=>'user-image')); ?><br />
          <?php echo $this->request->data['Student']['name']?> 
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">          
          <address>
            
            <p> Father Name: <?php echo $this->request->data['Student']['father_name']?></p>
            <p> Mother Name: <?php echo $this->request->data['Student']['mother_name']?></p>
            <p> Student Mobile: <?php echo $this->request->data['Student']['contact_student']?></p>
            <p> Guardian Mobile: <?php echo $this->request->data['Student']['contact_guardian']?></p>
            <p> Email: <?php echo $this->request->data['Student']['email']?></p>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <address>
            <p> Student ID: <?php echo $this->request->data['Student']['id_number']?></p>
            <p> Batch: <?php echo $this->request->data['Batch']['name']?></p>
            <p> School: <?php echo $this->request->data['Student']['school']?></p>
            <p> College: <?php echo $this->request->data['Student']['college']?></p>
            
            <p> Address: <?php echo $this->request->data['Student']['present_address']?></p>
            
          </address>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      
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
              <td><?php echo $value['name'];?></td>
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
      
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Student Summary</p>          
          <div class="table-responsive">
            <table class="table">
              <tr><th>Total Fees</th><td><?php echo $total_fees ?></td></tr>                
              <tr> <th>Total Payment</th><td><?php echo $total_payment ?></td></tr>
              <tr> <th>Total Due</th><td><?php echo $total_due ?></td></tr>
            </table>
          </div>
          

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  
<div class="content-wrappers" style="background-color: #ecf0f5">
    <!-- Content Header (Page header) -->
    <?php echo $this->element("menu/head"); ?>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
     <?php echo $this->element("menu/menu"); ?>
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">          
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">All Notice</h3>              
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Serial #</th>
                    <th>Title</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i= 0;if(!empty($values)){
                  foreach ($values AS $value) { $i++;?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php  echo $name = $this->Html->link($value['Notice']['name'], array('controller' =>'Notices', 'action' => 'view', $value['Notice']['id']),array('class'=>'product-title','escape' => false)); ?></td>
                                        
                  </tr>
                  <?php } }
                  ?>                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>            
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Notice Board</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
             <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php if(!empty($notices)){
                  foreach ($notices as $key => $value) {                 
                  ?>       
                <li class="item">                           
                  <div class="product-info">
                   <?php  echo $name = $this->Html->link($value['Notice']['name'], array('controller' =>'Notices', 'action' => 'view', $value['Notice']['id']),array('class'=>'product-title','escape' => false,)); ?>
                        <span class="product-description">
                          <?php echo $value['Notice']['created'];?>
                        </span>
                  </div>
                </li>
                <?php } } ?>                
                <!-- /.item -->
              </ul>
            </div>
            
            <!-- /.footer -->
          </div>
          <!-- /.box -->

          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> About Us</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <!-- <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Samsung TV
                      <span class="label label-warning pull-right">$1800</span></a>
                        <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                  </div>
                </li> -->
                <!-- /.item -->
                
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
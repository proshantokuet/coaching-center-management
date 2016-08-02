<div class="hero-unit">
<span class="titleLeft"><?php echo $title_for_layout ;?></span> 
<div class="gap"></div>

<?php 
$model =  Inflector::singularize($this->request->params['controller']);		  
		  
		  $v =ucfirst($model); ?>
		
		<?php echo $this->Form->create($v, array('type'=>'file'));?>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('name',array('class'=>'input-text'));				
			echo $this->Form->input('email',array('class'=>'input-text'));
			echo $this->Form->input('phone',array('class'=>'input-text'));
			echo $this->Form->input('available_time',array('class'=>'input-textarea'));
			echo $this->Form->input('speciality',array('placeholder'=>'Hearth , Brain','class'=>'input-text')); 
			echo $this->Form->input('doctor_identity',array('label'=>'Doctor Identity','class'=>'input-textarea'));			
			echo $this->Form->input('status');
			echo $this->Form->label('Signature'); ?>
			<input type="file" name="image"/>
			
			<?php echo $thumbnail= $this->Html->image('signature/thumbnail/'.$this->request->data['User']['thumbnail']); ?> <br />
			<br />
			<?php
			echo $this->Form->submit('Save', array('div'=> false,'class'=>'btn'));
			echo '&nbsp;'. $this->Html->link(__('Cancel'), array(
				'action' => 'userlists'
			), array( 'class' => 'btn pure-button pure-button-success',
			));
			echo $this->Form->end();
			?>
		
		
      </div>




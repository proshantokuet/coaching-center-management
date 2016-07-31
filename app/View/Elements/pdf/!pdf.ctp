<br /><br /><br /><br /><br /><br /><br />
<?php 	
	$data = json_decode($pdf, true);
	
	if($this->Session->read('Auth.User.image') !=''){
		$signatureImage = $this->Session->read('Auth.User.image');
		
	}else{
		$signatureImage = 'default.png';
	}
	$pulse= '';
	$bp = '';
	$temperature = '';
	$res ='';
	$arrhythmia ='';
	$appearance = '';
	$color = '';
	$consciousness  = '';
	$edema = '';
	$dehydration = '';
	$osat = '';
	$followup = '';
	if(!empty($data['Examination']['osat'])){
		$osat = '<strong>Oxygen saturation: </strong>'.$data['Examination']['osat'].' %<br />';
	}
	if(!empty($data['Examination']['pulse'])){
		$pulse = '<strong>Pulse: </strong>'.$data['Examination']['pulse'].'(Beats per min)<br />';
	}
	if(!empty($data['Examination']['bp'])){
		$bp = '<strong>BP: </strong>'.$data['Examination']['bp'].'(mm/hg)<br />';
	}
	if(!empty($data['Examination']['temperature'])){
		$temperature = '<strong>Temperature: </strong>'.$data['Examination']['temperature'].' F<br />';
	}
	if(!empty($data['Examination']['respiration'])){
		$res = '<strong>Respiration: </strong>'.$data['Examination']['respiration'].'<br />';
	}
	if(!empty($data['Examination']['arrhythmia'])){
		$arrhythmia = '<strong>Arrhythmia: </strong>'.$data['Examination']['arrhythmia'].'';
	}
	if(!empty($data['Examination']['appearance'])){
		$appearance = '<strong>Appearance: </strong>'.$data['Examination']['appearance'].'<br />';
	}
	if(!empty($data['Examination']['color'])){
		$color ='<strong>Color: </strong>'.$data['Examination']['color'].'<br />';
	}
	if(!empty($data['Examination']['consciousness'])){
		$consciousness = '<strong>State of Consciousness: </strong>'.$data['Examination']['consciousness'].'<br />';
	}
	if(!empty($data['Examination']['edema'])){
		$edema = '<strong>Edema: </strong>'.$data['Examination']['edema'].'<br />';
	}
	if(!empty($data['Examination']['dehydration'])){
		$dehydration = '<strong>Dehydration: </strong>'.$data['Examination']['dehydration'].'<br />';
	}
	if(!empty($data['Prescription']['followupDate'])){
		$followup = '<strong>Follow up date: </strong>'.$data['Prescription']['followupDate'].'<br />';
	}
	echo $html = '
		
		
		<table style="width:650px; margin-top:10px; margin-bottom:10px; padding-left:10px">
			<tr>
			<td >
				<strong>Appointment ID : </strong>'.$data['Prescription']['appointment_id'].' <br />
					<strong>MRP : </strong>'.$data['UnitCost']['amount'].' '.$currency.' <br />
					'.$followup.'
			</td>
			<td>
				<strong>Patient Name : </strong>'.$data['User']['name'].'<br />
				<strong>Age : </strong>'.$data['User']['age'] .'<br /> 
				<strong>RMP Name: : </strong>'.$data['User']['rmp'].'<br />
				<strong>RMP contact:</strong> '.$data['User']['rp'].'<br />
				<strong>Patient Contact : </strong>'.$data['User']['phone'].' <br />
				<strong>Date  : '. date("F j, Y, g:i a").'</strong>
			</td>
			</tr>
			
			<tr>
			<td style="width:650px">
				<table style="border-top:1px solid #66CCFF; padding:10px; text-align:center"><tr>
				<td><h3>On Examination</h3></td>
				
				</tr>
				</table>
			</td>
			</tr>
			
			<tr>
			<td style="width:650px">
				<table style="border-bottom:1px solid #66CCFF; padding-top:10px"><tr>
				<td>'.$pulse.'
						 '.$bp.'
						   '.$temperature.'
						 '.$res.'
					 '.$arrhythmia.'
				</td>
				<td>'.$appearance.'
					    '.$color.'
					 '.$consciousness .'
				 </td>
				<td>
					'.$edema.'
					    '.$dehydration.'
					'.$osat.'
			</td>
				
				</tr>
				</table>
			</td>
			</tr>
			
			<tr>
			<td style="width:650px">
				<table style=" padding:10px; text-align:center"><tr>
				<td><h3>Chief Complaints</h3></td>
				
				</tr>
				</table>
			</td>
			</tr>
			<tr>
			<td style="width:650px">
				<table style="border-bottom:1px solid #66CCFF; padding-bottom:5px; text-align:center"><tr>
				<td>
				'.nl2br($data['Prescription']['complain']).'
				</td>
				</tr>
				</table>
			</td>
			</tr>
		
			<tr>
			<td style="width:650px">
				<table style=" padding:10px; text-align:center"><tr>
				<td><h3>Diagnosis</h3></td>
				
				</tr>
				</table>
			</td>
			</tr>
			<tr>
			<td style="width:650px">
				<table style="border-bottom:1px solid #66CCFF; padding-bottom:5px; text-align:center"><tr>
				<td>
				'.nl2br(trim($data['Prescription']['diagnosis'])).'
				</td>
				</tr>
				</table>
			</td>
			</tr>
			
			<tr>
			<td style="width:650px">
				<table style="padding-top:10px; padding-bottom:50px; "><tr>
				<td>
					<strong>Rx</strong> <br />
						'.nl2br(trim($data['Prescription']['prescription'])).'
						   
				</td>
				<td>
					<strong>Investigations</strong> <br />
					    '.nl2br(trim($data['Prescription']['investigations'])).'
				 </td>
		
				
				</tr>
				</table>
			</td>
			</tr>
			
			<tr>
			<td style="width:650px">
				<table><tr>
				<td>
					<strong>Advice:</strong><br />'.nl2br(trim($data['Prescription']['advice'])).'
						
				</td>
				<td style="width:270px;">
			
			<img style="padding:0;margin:0; border-bottom:1px solid #f00" src="http://localhost'.$this->request->webroot.'img/signature/'.$signatureImage.'" >
			
			<br />
			'.@$this->Session->read('Auth.User.doctor_identity').'
		      
			</td>
		
				</tr>
				</table>
			</td>
			</tr>
			
			
			
			
			
			
		</table>';
		
?>		

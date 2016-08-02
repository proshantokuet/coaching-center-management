<?php  
echo '<div style="width:450px;height:300px;float:left;border: 1px solid #dc5f2b;border-radius:10px ;float:left;margin-bottom:5px;margin-left:5px;">
        <div style="border-radius:10px 10px 0px 0px;font-weight: bold; width:450px;height:35px;background-color: #dc5f2b !important;border-bottom:1px solid #e5e5e5;text-align: center;font-size: 15px;color: white;">
        <div style="padding-right:20px;padding-top:8px;font-size:20px;font-weight: bolder">ELECTRONIC IDENTITY CARD</div></div>
        <div style="width:450px;height:213px;float:left">
            <div style="width:150px;padding:0px;height:124px;float:left;border:0px solid #111">
            <div style="margin-left:20px;border:1px solid black;width:140px;height:40px;border-radius:0px 0px 10px 10px;background-color:black;text-align:center;font-weight:bold;font-size:20px;">
            <div style="margin-top:10px;color:white">Batch: '.$this->request->data['Batch']['name'].'</div></div>
            <div style="margin-left:10px;margin-top:20px;width:140px;text-align:right;padding-top:10px;border:0px solid black">
            <img width="120" height="120" src="/'. basename(dirname(APP)).'/img/aid_qr.png" alt="qr" />
            </div>
          </div>
          <div style="width:145px;height:163px;padding-left:0px;float:left;margin-left:5px;border:0px solid #111">
            <div style="margin-top:90px;text-align:right;font-weight:bold">
              <div style="font-size:18px;line-height:18px;color:#333;" >Roll# '.$this->request->data['Student']['id_number'].'</div>
              <div style="font-size:18px;line-height:18px;color:#333;">Name# '.$this->request->data['Student']['name'].' </div>
              <div  style="font-size:18px;line-height:18px;color:#333;"></div>
            </div>
            
          </div>
          <div style="width:140px;height:163px;float:right;border:0px solid #111;margin-right:3px;">
            <div style="width:100px;height:140px;float:left;padding:0px;border:1px solid #e5e5e5; margin-top:36px;"><img width="120" height="140" src="/'. basename(dirname(APP)).'/img/user/thumbnail/'.$this->request->data['Student']['thumbnail'].'" alt="" /></div>
          </div>
          
        </div>
        <div style="clear:both"></div>
        <div style="border-radius:0px 0px 10px 10px;background-color:black;width:450px;height:50px;background-image:url(/'. basename(dirname(APP)).'/img/card.png); background-repeat: no-repeat;"></div>
      </div>
      
      <div style="width:450px;height:300px;float:left;border: 1px solid #dc5f2b;border-radius:10px ;float:left;margin-bottom:5px;margin-left:5px;">
        <div style="text-align:center;font-size:15px;margin-top:20px;line-height:15px"><h4>If this card is found, please return to</h4> </div>
        <div style="text-align:center"><img width="300" height="80" src="/'. basename(dirname(APP)).'/img/logo.png" alt="lo" /></div>
        <div style="text-align:center;font-size:15px;margin-top:20px;line-height:15px"><h4>42-43,Shidheshwary Circular Road,3rd Floor,Dhaka</h3> </div>
        <div style="text-align:center;font-size:15px;margin-top:20px;line-height:15px;"><h4>Contact: 01978866001</h4> </div>
        <div style="text-align:center"><img width="400" height="60" src="/'. basename(dirname(APP)).'/img/barcode.png" alt="" /></div>
      </div>
      '; ?>
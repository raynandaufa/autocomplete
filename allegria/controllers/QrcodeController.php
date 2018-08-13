<?php

class QrcodeController extends Controller
{
	public function actionIndex()
	{
		//$this->layout='//layouts/blank';
		//

		if($_SERVER["REQUEST_METHOD"] == "GET") {
			
			$this->render('index');

		} elseif($_SERVER["REQUEST_METHOD"] == "POST") {
            
			$check = checkPostRequired($_POST);
			
			if($check['valid']) {
				$registered = ProAllegriaReg::model()->find("email=:email", array(':email'=>$_POST['inpEmail']));
			    
			    if(count($registered)){
			        
			        if(count($registered->qrcode)){
			            
			            $this->render('viewer', array('registered'=>$registered));
			           
			        } else {
			            
			            //Retry get qrcode
                        $registered = ProAllegriaReg::getQRCode($registered);
                        
                        if(count($registered->qrcode)){
                            $this->render('viewer', array('registered'=>$registered));
                        } else {
                            $check['status'] = 103;
                            $this->render('index', array('status'=>$check['status']));
                        }
			        }
			        
			    } else {
			        
			        $check['status'] = 102;
			        $this->render('index', array('status'=>$check['status']));
			    }
			    
			} else {
                
				$this->render('index', array('status'=>$check['status']));

			}

		}
	}
	
	public function actionGenerateQR(){
	    
	    $null = ProAllegriaReg::model()->findAll(array(
	        'condition' => 'qrcode is null',
            'limit' => 5));
	    
	    //die(var_dump($null));
	    foreach($null as $key=>$row){
	        
	        $table = ProAllegriaReg::model()->findByPk($row['reg_id']);
	        $update = ProAllegriaReg::getQRCode($table);
	        
	        echo $update->email.'<br />';
	        
	    }
	    
	}
	
}

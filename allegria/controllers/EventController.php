<?php

class EventController extends Controller
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
				$registered = ProAllegriaReg::model()->find("qrcode=:qrcode", array(':qrcode'=>$_POST['inpCode']));
			    
			    if(count($registered)){
			        //tambah number attended di table master
			        if($registered->is_attend < '1')
			        {
			            $master = ProMasterReg::model()->find("qrcode=:qrcode", array(':qrcode'=>$_POST['inpCode']));
			            $master-> number_attended += 1;
			            $master->update('number_attended');
			        }
			        
			        $registered->is_attend = '1';
			        $registered->update('is_attend');
			        
			        $check['status'] = 100;
			        $this->render('viewer', array('registered'=>$registered, 'status'=>$check['status']));
			        
			    } else {
			        
			        $check['status'] = 102;
			        $this->render('index', array('status'=>$check['status']));
			    }
			    
			} else {
                
				$this->render('index', array('status'=>$check['status']));

			}

		}
	}
	
    public function actionLogout() {
		
		# Clear Cookies
		Yii::app()->request->cookies->clear();
	
		$this->redirect('/');
		
	}
	
	/*
	public function actionCfstart()
	{
		// send a cookie
		$cookies=new CHttpCookie('access','cfstart');
		Yii::app()->request->cookies['access']=$cookies;
		$cookies->expire = time()+60*60*12;
		
		$this->redirect('/puri8/event/formcf');
	}
	*/

    /*
	public function actionPbstart()
	{
		// send a cookie
		$cookies=new CHttpCookie('access','pbstart');
		Yii::app()->request->cookies['access']=$cookies;
		$cookies->expire = time()+60*60*12;
		
		$this->redirect('/puri8/event/formpb');
	}
	*/

	/*
	public function actionFormcf()
	{
		$cookies = isset(Yii::app()->request->cookies['access']) ? Yii::app()->request->cookies['access']->value : '';

		if($cookies === 'cfstart') {

			if (isset($_POST['inpReg']) && isset($_POST['inpCF']) && $_POST['inpCF']!='' && $_POST['inpReg']!='') {
				
				$result = ProPuri8Reg::model()->findByPk($_POST['inpReg']);
				//die(var_dump($result));
				$amount = 250000 * $_POST['inpCF'];
				$amount = number_format($amount,2,',','.');
			
			} elseif (isset($_POST['inpName']) && $_POST['inpName']!='') {

				$result = ProPuri8Reg::model()->findAll('fname like :name or lname like :name', array(':name'=>'%'.$_POST['inpName'].'%'));
				$amount = 0;

			} else {

				$result = null;
				$amount = 0;

			}

			//die(var_dump($result));
			$this->render('formcf', array('result'=>$result, 'amount'=>$amount));
			
		} else {
			$this->redirect('/');
		}
	}
	*/
	
    /*
	public function actionBuycf()
	{
		$cookies = isset(Yii::app()->request->cookies['access']) ? Yii::app()->request->cookies['access']->value : '';
		
		if($cookies === 'cfstart') {

			if($_SERVER["REQUEST_METHOD"] == "GET") {

				$this->redirect('/puri8/event/formcf');
				
			} elseif($_SERVER["REQUEST_METHOD"] == "POST") {

				$check = checkPostRequired($_POST);

				if($check['valid']) {
					
					#update total booking
					$agent = ProPuri8Reg::model()->findByPk($_POST['reg']);
					$buycf = $agent->buy_cf + $_POST['num'];
					$agent->buy_cf = $buycf;
					$agent->update(array('buy_cf'));

					$return=true;

				} else {

					$return=false;

				}

				header('Content-type: application/json');
				echo json_encode( $return );
			}
		}
	}
	*/
	
    /*
	public function actionFormpb()
	{
		$cookies = isset(Yii::app()->request->cookies['access']) ? Yii::app()->request->cookies['access']->value : '';
		
		if($cookies === 'pbstart') {

			if (isset($_POST['inpReg'])) {
				
				$result = ProPuri8Reg::model()->findByPk($_POST['inpReg']);
				$unit = ProPuri8Unit::model()->findAll();

			} elseif (isset($_POST['inpName']) && $_POST['inpName']!='') {

				$result = ProPuri8Reg::model()->findAll('fname like :name or lname like :name', array(':name'=>'%'.$_POST['inpName'].'%'));

			} else {

				$result = null;

			}

			//die(var_dump($result));

			$this->render('formpb', array('result'=>$result, 'unit'=>$unit));

		} else {

			$this->redirect('/');
			
		}

	}
	*/
	
    /*
	public function actionBuypb()
	{
		$cookies = isset(Yii::app()->request->cookies['access']) ? Yii::app()->request->cookies['access']->value : '';
		
		if($cookies === 'pbstart') {

			if($_SERVER["REQUEST_METHOD"] == "GET") {

				$this->redirect('/puri8/event/formpb');
				
			} elseif($_SERVER["REQUEST_METHOD"] == "POST") {

				$check = checkPostRequired($_POST);

				if($check['valid']) {
					
					$booking = ProPuri8Booking::saveData($_POST);
					$errors = $booking->getErrors();

					if(count($errors)){
						
						die(var_dump($errors));
						
					} else {
						
						$result = ProPuri8Booking::getBooking($booking->booking_id);
                        
						$this->render('buypb', array('result'=>$result));
						
					}

				} else {

					$this->redirect('/puri8/event/formpb?status=failed');

				}
			}


		}
	}
	*/
	
    /*
	public function actionViewpb()
	{
		$cookies = isset(Yii::app()->request->cookies['access']) ? Yii::app()->request->cookies['access']->value : '';
		
		if($cookies === 'pbstart') {

			if($_SERVER["REQUEST_METHOD"] == "GET") {

				$this->redirect('/puri8/event/formpb');
				
			} elseif($_SERVER["REQUEST_METHOD"] == "POST") {

				$check = checkPostRequired($_POST);

				if($check['valid']) {
					
					$result = ProPuri8Booking::getBooking($_POST['inpBooking']);
                    
                    if(count($result)) {
					    $this->render('buypb', array('result'=>$result));
                    } else {
                        $this->redirect('/puri8/event/formpb?status=notfound');
                    }
				}
			}


		}
	}
	*/

}
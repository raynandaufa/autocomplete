<?php

class RegistrationController extends Controller
{
	public function actionIndex()
	{
		//$this->layout='//layouts/blank';
		//

		if($_SERVER["REQUEST_METHOD"] == "GET") {
			
			$this->render('index');

		} elseif($_SERVER["REQUEST_METHOD"] == "POST") {
            
            //die(var_dump($_POST));
			$check = checkPostRequired($_POST);
			//$responeCaptcha = verifyCaptcha($_POST['g-recaptcha-response']);
			
			if($check['valid']) {
				$email = ProAllegriaReg::model()->findAll("email=:email", array(':email'=>$_POST['inpEmail']));
				if(count($email)){
					$check['valid'] = false;
					$check['status'] = 102;
				}
			}
			
			if($check['valid']) {
				$phone = ProAllegriaReg::model()->findAll("mobile=:phone", array(':phone'=>$_POST['inpPhone']));
				if(count($phone)){
					$check['valid'] = false;
					$check['status'] = 103;
				}
			}
			
			//validasi data di table pro_master_reg
			if($check['valid']) {
				$email = ProMasterReg::model()->findAll("email=:email", array(':email'=>$_POST['inpEmail']));
				$phone = ProMasterReg::model()->findAll("mobile=:phone", array(':phone'=>$_POST['inpPhone'])); 
				if(count($email) || count($phone)){
					$check['status'] = 105;
				}
			}
			
			if($check['valid']) {
				
				$registered = ProAllegriaReg::saveData($_POST);
				
				//save ke table pro_master_reg
				if($check['status'] != '105')
				{
				    ProMasterReg::saveData ($_POST);
				}
				
				$errors = $registered->getErrors();

				if(count($errors)){
					
					die(var_dump($errors));
					
				} else {
					
					$this->render('registered', array('register'=>$registered));
					
				}

			} else {

				$this->render('index', array(
					'status'=>$check['status'],
				));

			}

		}
	}
	
	public function actionPromex()
	{
		//$this->layout='//layouts/blank';
		//

		if($_SERVER["REQUEST_METHOD"] == "GET") {
			
			$this->render('promex');

		} elseif($_SERVER["REQUEST_METHOD"] == "POST") {
            
            //die(var_dump($_POST));
			$check = checkPostRequired($_POST);
			//$responeCaptcha = verifyCaptcha($_POST['g-recaptcha-response']);
			
			if($check['valid']) {
				$email = ProAllegriaReg::model()->findAll("email=:email", array(':email'=>$_POST['inpEmail']));
				if(count($email)){
					$check['valid'] = false;
					$check['status'] = 102;
				}
			}
			
			if($check['valid']) {
				$phone = ProAllegriaReg::model()->findAll("mobile=:phone", array(':phone'=>$_POST['inpPhone']));
				if(count($phone)){
					$check['valid'] = false;
					$check['status'] = 103;
				}
			}
			
			//validasi data di table pro_master_reg
			if($check['valid']) {
				$email = ProMasterReg::model()->findAll("email=:email", array(':email'=>$_POST['inpEmail']));
				$phone = ProMasterReg::model()->findAll("mobile=:phone", array(':phone'=>$_POST['inpPhone'])); 
				if(count($email) || count($phone)){
					$check['status'] = 105;
				}
			}
			
			if($check['valid']) {
				
				$registered = ProAllegriaReg::saveData($_POST);
				
				//save ke table pro_master_reg
				if($check['status'] != '105')
				{
				    ProMasterReg::saveData ($_POST);
				}
				
				$errors = $registered->getErrors();

				if(count($errors)){
					
					die(var_dump($errors));
					
				} else {
					
					$this->render('registered', array('register'=>$registered));
					
				}

			} else {

				$this->render('promex', array(
					'status'=>$check['status'],
				));

			}

		}
	}
	
	public function actionEra()
	{
		//$this->layout='//layouts/blank';
		//

		if($_SERVER["REQUEST_METHOD"] == "GET") {
			
			$this->render('era');

		} elseif($_SERVER["REQUEST_METHOD"] == "POST") {
            
            //die(var_dump($_POST));
			$check = checkPostRequired($_POST);
			//$responeCaptcha = verifyCaptcha($_POST['g-recaptcha-response']);
			
			if($check['valid']) {
				$email = ProAllegriaReg::model()->findAll("email=:email", array(':email'=>$_POST['inpEmail']));
				if(count($email)){
					$check['valid'] = false;
					$check['status'] = 102;
				}
			}
			
			if($check['valid']) {
				$phone = ProAllegriaReg::model()->findAll("mobile=:phone", array(':phone'=>$_POST['inpPhone']));
				if(count($phone)){
					$check['valid'] = false;
					$check['status'] = 103;
				}
			}
			
			//validasi data di table pro_master_reg
			if($check['valid']) {
				$email = ProMasterReg::model()->findAll("email=:email", array(':email'=>$_POST['inpEmail']));
				$phone = ProMasterReg::model()->findAll("mobile=:phone", array(':phone'=>$_POST['inpPhone'])); 
				if(count($email) || count($phone)){
					$check['status'] = 105;
				}
			}
			
			if($check['valid']) {
				
				$registered = ProAllegriaReg::saveData($_POST);
				
				//save ke table pro_master_reg
				if($check['status'] != '105')
				{
				    ProMasterReg::saveData ($_POST);
				}
				
				$errors = $registered->getErrors();

				if(count($errors)){
					
					die(var_dump($errors));
					
				} else {
					
					$this->render('registered', array('register'=>$registered));
					
				}

			} else {

				$this->render('era', array(
					'status'=>$check['status'],
				));

			}

		}
	}
	
	public function actionRaywhite()
	{
		//$this->layout='//layouts/blank';
		//

		if($_SERVER["REQUEST_METHOD"] == "GET") {
			
			$this->render('raywhite');

		} elseif($_SERVER["REQUEST_METHOD"] == "POST") {
            
            //die(var_dump($_POST));
			$check = checkPostRequired($_POST);
			//$responeCaptcha = verifyCaptcha($_POST['g-recaptcha-response']);
			
			if($check['valid']) {
				$email = ProAllegriaReg::model()->findAll("email=:email", array(':email'=>$_POST['inpEmail']));
				if(count($email)){
					$check['valid'] = false;
					$check['status'] = 102;
				}
			}
			
			if($check['valid']) {
				$phone = ProAllegriaReg::model()->findAll("mobile=:phone", array(':phone'=>$_POST['inpPhone']));
				if(count($phone)){
					$check['valid'] = false;
					$check['status'] = 103;
				}
			}
			
			//validasi data di table pro_master_reg
			if($check['valid']) {
				$email = ProMasterReg::model()->findAll("email=:email", array(':email'=>$_POST['inpEmail']));
				$phone = ProMasterReg::model()->findAll("mobile=:phone", array(':phone'=>$_POST['inpPhone'])); 
				if(count($email) || count($phone)){
					$check['status'] = 105;
				}
			}
			
			if($check['valid']) {
				
				$registered = ProAllegriaReg::saveData($_POST);
				
				//save ke table pro_master_reg
				if($check['status'] != '105')
				{
				    ProMasterReg::saveData ($_POST);
				}
				
				$errors = $registered->getErrors();

				if(count($errors)){
					
					die(var_dump($errors));
					
				} else {
					
					$this->render('registered', array('register'=>$registered));
					
				}

			} else {

				$this->render('raywhite', array(
					'status'=>$check['status'],
				));

			}

		}
	}
	
	public function actionCentury21()
	{
		//$this->layout='//layouts/blank';
		//

		if($_SERVER["REQUEST_METHOD"] == "GET") {
			
			$this->render('century21');

		} elseif($_SERVER["REQUEST_METHOD"] == "POST") {
            
            //die(var_dump($_POST));
			$check = checkPostRequired($_POST);
			//$responeCaptcha = verifyCaptcha($_POST['g-recaptcha-response']);
			
			if($check['valid']) {
				$email = ProAllegriaReg::model()->findAll("email=:email", array(':email'=>$_POST['inpEmail']));
				if(count($email)){
					$check['valid'] = false;
					$check['status'] = 102;
				}
			}
			
			if($check['valid']) {
				$phone = ProAllegriaReg::model()->findAll("mobile=:phone", array(':phone'=>$_POST['inpPhone']));
				if(count($phone)){
					$check['valid'] = false;
					$check['status'] = 103;
				}
			}
			
			//validasi data di table pro_master_reg
			if($check['valid']) {
				$email = ProMasterReg::model()->findAll("email=:email", array(':email'=>$_POST['inpEmail']));
				$phone = ProMasterReg::model()->findAll("mobile=:phone", array(':phone'=>$_POST['inpPhone'])); 
				if(count($email) || count($phone)){
					$check['status'] = 105;
				}
			}
			
			if($check['valid']) {
				
				$registered = ProAllegriaReg::saveData($_POST);
				
				//save ke table pro_master_reg
				if($check['status'] != '105')
				{
				    ProMasterReg::saveData ($_POST);
				}
				
				$errors = $registered->getErrors();

				if(count($errors)){
					
					die(var_dump($errors));
					
				} else {
					
					$this->render('registered', array('register'=>$registered));
					
				}

			} else {

				$this->render('century21', array(
					'status'=>$check['status'],
				));

			}

		}
	}
	
	public function actionLjhooker()
	{
		//$this->layout='//layouts/blank';
		//

		if($_SERVER["REQUEST_METHOD"] == "GET") {
			
			$this->render('ljhooker');

		} elseif($_SERVER["REQUEST_METHOD"] == "POST") {
            
            //die(var_dump($_POST));
			$check = checkPostRequired($_POST);
			//$responeCaptcha = verifyCaptcha($_POST['g-recaptcha-response']);
			
			if($check['valid']) {
				$email = ProAllegriaReg::model()->findAll("email=:email", array(':email'=>$_POST['inpEmail']));
				if(count($email)){
					$check['valid'] = false;
					$check['status'] = 102;
				}
			}
			
			if($check['valid']) {
				$phone = ProAllegriaReg::model()->findAll("mobile=:phone", array(':phone'=>$_POST['inpPhone']));
				if(count($phone)){
					$check['valid'] = false;
					$check['status'] = 103;
				}
			}
			
			//validasi data di table pro_master_reg
			if($check['valid']) {
				$email = ProMasterReg::model()->findAll("email=:email", array(':email'=>$_POST['inpEmail']));
				$phone = ProMasterReg::model()->findAll("mobile=:phone", array(':phone'=>$_POST['inpPhone'])); 
				if(count($email) || count($phone)){
					$check['status'] = 105;
				}
			}
			
			if($check['valid']) {
				
				$registered = ProAllegriaReg::saveData($_POST);
				
                //save ke table pro_master_reg
				if($check['status'] != '105')
				{
				    ProMasterReg::saveData ($_POST);
				}
				
				$errors = $registered->getErrors();

				if(count($errors)){
					
					die(var_dump($errors));
					
				} else {
					
					$this->render('registered', array('register'=>$registered));
					
				}

			} else {

				$this->render('ljhooker', array(
					'status'=>$check['status'],
				));

			}

		}
	}
	
	public function actionHarcourts()
	{
		//$this->layout='//layouts/blank';
		//

		if($_SERVER["REQUEST_METHOD"] == "GET") {
			
			$this->render('harcourts');

		} elseif($_SERVER["REQUEST_METHOD"] == "POST") {
            
            //die(var_dump($_POST));
			$check = checkPostRequired($_POST);
			//$responeCaptcha = verifyCaptcha($_POST['g-recaptcha-response']);
			
			if($check['valid']) {
				$email = ProAllegriaReg::model()->findAll("email=:email", array(':email'=>$_POST['inpEmail']));
				if(count($email)){
					$check['valid'] = false;
					$check['status'] = 102;
				}
			}
			
			if($check['valid']) {
				$phone = ProAllegriaReg::model()->findAll("mobile=:phone", array(':phone'=>$_POST['inpPhone']));
				if(count($phone)){
					$check['valid'] = false;
					$check['status'] = 103;
				}
			}
			
			//validasi data di table pro_master_reg
			if($check['valid']) {
				$email = ProMasterReg::model()->findAll("email=:email", array(':email'=>$_POST['inpEmail']));
				$phone = ProMasterReg::model()->findAll("mobile=:phone", array(':phone'=>$_POST['inpPhone'])); 
				if(count($email) || count($phone)){
					$check['status'] = 105;
				}
			}
			
			if($check['valid']) {
				
				$registered = ProAllegriaReg::saveData($_POST);
				
				//save ke table pro_master_reg
				if($check['status'] != '105')
				{
				    ProMasterReg::saveData ($_POST);
				}
				
				$errors = $registered->getErrors();

				if(count($errors)){
					
					die(var_dump($errors));
					
				} else {
					
					$this->render('registered', array('register'=>$registered));
					
				}

			} else {

				$this->render('harcourts', array(
					'status'=>$check['status'],
				));

			}

		}
	}
	
	public function actionRemax()
	{
		//$this->layout='//layouts/blank';
		//

		if($_SERVER["REQUEST_METHOD"] == "GET") {
			
			$this->render('remax');

		} elseif($_SERVER["REQUEST_METHOD"] == "POST") {
            
            //die(var_dump($_POST));
			$check = checkPostRequired($_POST);
			//$responeCaptcha = verifyCaptcha($_POST['g-recaptcha-response']);
			
			if($check['valid']) {
				$email = ProAllegriaReg::model()->findAll("email=:email", array(':email'=>$_POST['inpEmail']));
				if(count($email)){
					$check['valid'] = false;
					$check['status'] = 102;
				}
			}
			
			if($check['valid']) {
				$phone = ProAllegriaReg::model()->findAll("mobile=:phone", array(':phone'=>$_POST['inpPhone']));
				if(count($phone)){
					$check['valid'] = false;
					$check['status'] = 103;
				}
			}
			
			//validasi data di table pro_master_reg
			if($check['valid']) {
				$email = ProMasterReg::model()->findAll("email=:email", array(':email'=>$_POST['inpEmail']));
				$phone = ProMasterReg::model()->findAll("mobile=:phone", array(':phone'=>$_POST['inpPhone'])); 
				if(count($email) || count($phone)){
					$check['status'] = 105;
				}
			}
			
			if($check['valid']) {
				
				$registered = ProAllegriaReg::saveData($_POST);
				
				//save ke table pro_master_reg
				if($check['status'] != '105')
				{
				    ProMasterReg::saveData ($_POST);
				}
				
				$errors = $registered->getErrors();

				if(count($errors)){
					
					die(var_dump($errors));
					
				} else {
					
					$this->render('registered', array('register'=>$registered));
					
				}

			} else {

				$this->render('remax', array(
					'status'=>$check['status'],
				));

			}

		}
	}
	
}
<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		//$this->render('index');
		$this->redirect('/allegria/registration');
	}
}
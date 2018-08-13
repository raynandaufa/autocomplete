<?php

/**
 * This is the model class for table "pro_allegria_reg".
 *
 * The followings are the available columns in table 'pro_allegria_reg':
 * @property integer $reg_id
 * @property string $fname
 * @property string $lname
 * @property string $ktp
 * @property string $birthdate
 * @property string $address
 * @property string $master_franchise
 * @property string $office
 * @property string $mobile
 * @property string $email
 * @property string $register_date
 * @property string $qrcode
 * @property integer $is_attend
 */
class ProAllegriaReg extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pro_allegria_reg';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fname, ktp, birthdate, address, master_franchise, office, mobile, email', 'required'),
			array('fname, lname', 'length', 'max'=>25),
			array('ktp', 'length', 'max'=>20),
			array('master_franchise, email', 'length', 'max'=>50),
			array('office', 'length', 'max'=>100),
			array('mobile', 'length', 'max'=>15),
			array('qrcode', 'length', 'max'=>150),
			array('register_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('reg_id, fname, lname, ktp, bithdate, address, master_franchise, office, mobile, email, register_date, qrcode', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'reg_id' => 'Reg',
			'fname' => 'Fname',
			'lname' => 'Lname',
			'ktp' => 'Ktp',
			'birthdate' => 'Birthdate',
			'address' => 'Address',
			'master_franchise' => 'Master Franchise',
			'office' => 'Office',
			'mobile' => 'Mobile',
			'email' => 'Email',
			'register_date' => 'Register Date',
			'qrcode' => 'Qrcode',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('reg_id',$this->reg_id);
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('lname',$this->lname,true);
		$criteria->compare('ktp',$this->ktp,true);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('master_franchise',$this->master_franchise,true);
		$criteria->compare('office',$this->office,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('register_date',$this->register_date,true);
		$criteria->compare('qrcode',$this->qrcode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProOpusparkReg the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function saveData($param)
	{
		$table = new ProAllegriaReg;
		$table->fname = $param['inpFname'];
		$table->lname = $param['inpLname'];
		$table->ktp = $param['inpKTP'];
		$table->birthdate = $param['inpBirthdate'];
		$table->master_franchise = $param['inpFranchise'];
		$table->office = $param['inpOffice'];
		$table->mobile = $param['inpPhone'];
		$table->email = $param['inpEmail'];
		$table->address = $param['inpAddress'];
		//$table->pickup = $param['inpPickup'];
		$table->save();
		
		$header = array(
				    "Authorization: Basic T25saW5lUmVnaXN0cmF0aW9uOlByb2pla0FLTi0yMDE4ISE=",
				    "Content-Type: application/x-www-form-urlencoded",
				  );
				  
        $data = "FirstName=".$param['inpFname'];
        $data .= "&LastName=".$param['inpLname'];
        $data .= "&Email=".$param['inpEmail'];
        $data .= "&RegionCode=%2B62";
        $data .= "&Phone=".$param['inpPhone'];
        $data .= "&KTP=".$param['inpKTP'];
        $data .= "&Birthdate=".$param['inpBirthdate'];
        $data .= "&Address=".$param['inpAddress'];
		
		
		if(!count($table->getErrors())){
			//$output = app()->curl->setOption(CURLOPT_HTTPHEADER, $header)->post('http://128.199.189.220:11111/api/agent/registrasionline',$data);
			
    		$curl = curl_init();
    
            curl_setopt_array($curl, array(
              //CURLOPT_PORT => "11111",
              CURLOPT_URL => "http://128.199.189.220/api/agent/registrasionline",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_USERAGENT => '',
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => $data,
              CURLOPT_HTTPHEADER => array(
                "Authorization: Basic T25saW5lUmVnaXN0cmF0aW9uOlByb2pla0FLTi0yMDE4ISE=",
                "Cache-Control: no-cache",
                "Content-Type: application/x-www-form-urlencoded",
              ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            if ($err) {
              die("cURL Error #:" . $err);
            } else {
                
              //die(var_dump(json_decode($response)));
              $data = json_decode($response);
              
              $table->qrcode = $data->data;
              $table->update(array('qrcode'));
            }
            
            curl_close($curl);
		}
        
        
		return $table;
	}
	
	public static function getQRCode($table)
	{
		
		$header = array(
				    "Authorization: Basic T25saW5lUmVnaXN0cmF0aW9uOlByb2pla0FLTi0yMDE4ISE=",
				    "Content-Type: application/x-www-form-urlencoded",
				  );
				  
        $data = "FirstName=".$table->fname;
        $data .= "&LastName=".$table->lname;
        $data .= "&Email=".$table->email;
        $data .= "&RegionCode=%2B62";
        $data .= "&Phone=".$table->mobile;
        $data .= "&KTP=".$table->ktp;
        $data .= "&Birthdate=".$table->birthdate;
        $data .= "&Address=".$table->address;
		
		
		if(!count($table->getErrors())){
			//$output = app()->curl->setOption(CURLOPT_HTTPHEADER, $header)->post('http://128.199.189.220:11111/api/agent/registrasionline',$data);
			
    		$curl = curl_init();
    
            curl_setopt_array($curl, array(
              //CURLOPT_PORT => "11111",
              CURLOPT_URL => "http://128.199.189.220/api/agent/registrasionline",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_USERAGENT => '',
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => $data,
              CURLOPT_HTTPHEADER => array(
                "Authorization: Basic T25saW5lUmVnaXN0cmF0aW9uOlByb2pla0FLTi0yMDE4ISE=",
                "Cache-Control: no-cache",
                "Content-Type: application/x-www-form-urlencoded",
              ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            if ($err) {
              die("cURL Error #:" . $err);
            } else {
                
              $data = json_decode($response);
              
              $table->qrcode = $data->data;
              $table->update(array('qrcode'));
            }
            
            curl_close($curl);
		}
        
        
		return $table;
	}
	
	
	public static function getAllDraw()
	{
	    $data = dbCommand()
				->select('reg_id,
						fname,
						lname,
						master_franchise,
						office')
				->from('pro_puri8_reg A')
				->where('is_attend = 1')
				->order('reg_id')
				->queryAll();
	    
	    return $data;
	}
	
}

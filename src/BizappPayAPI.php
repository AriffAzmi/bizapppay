<?php

namespace BizzAppPay;

/**
 * 
 */
class BizappPayAPI
{
	protected $apiKey;
	protected $useSandbox;

	/**
	 * BILL SECTION
	 */
	protected $categoryCode;
	protected $billName;
	protected $billDescription;
	protected $billAmount;
	protected $billTo;
	protected $billEmail;
	protected $billPhone;
	protected $billReturnUrl;
	protected $billCallbackUrl;
	protected $billExternalReferenceNo;
	/**
	 * BILL SECTION
	 */

	/**
	 * CATEGORY SECTION
	 */
	protected $categoryName;
	protected $categoryDescription;
	/**
	 * CATEGORY SECTION
	 */

	function __construct($apiKey,$useSandbox=true)
	{
		$this->setApiKey($apiKey);
		$this->setUseSandbox($useSandbox);
	}

	public function pay()
	{
		$params = [
			'apiKey' => $this->getApiKey(),
			'categoryCode' => $this->getCategoryCode(),
			'billName' => $this->getBillName(),
			'billAmount' => $this->getBillAmount(),
			'billTo' => $this->getBillTo(),
			'billEmail' =>  $this->getBillEmail(),
			'billPhone' =>  $this->getBillPhone(),
			'billReturnUrl' => $this->getBillReturnUrl(),
			'billCallbackUrl' => $this->getBillCallbackUrl(),
			'billExternalReferenceNo' => $this->getBillExternalReferenceNo()
		];

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_URL, $this->getApiEndpoint()."createNewBill");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
		$result = json_decode(curl_exec($curl));
		curl_close($curl);

		return $result;
	}

	public function getApiEndpoint()
	{
		if ($this->getUseSandbox()) {
			
			return 'https://bizappay.com/staging/api/';
		}

		return 'https://bizappay.com/api/';
	}

	public function makePhoneNum($phone)
	{
		$phone = str_replace("+", "", $phone);

	    if(substr($phone,0,3)=='660') {
	    
	        $phone= substr($phone,1);
	    }
	  
	    if(substr($phone,0,2)!='60') {
	        
	        if(substr($phone,0,2)=='00') $phone= substr($phone,1);
	            
	        if(substr($phone,0,1)=='0') {
	        
	            $phone='6'.$phone;
	        }
	        else {
	        
	            $phone='60'.$phone;
	        }
	    }
	    
	    return $phone;
	}

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param mixed $apiKey
     *
     * @return self
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoryCode()
    {
        return $this->categoryCode;
    }

    /**
     * @param mixed $categoryCode
     *
     * @return self
     */
    public function setCategoryCode($categoryCode)
    {
        $this->categoryCode = $categoryCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillName()
    {
        return $this->billName;
    }

    /**
     * @param mixed $billName
     *
     * @return self
     */
    public function setBillName($billName)
    {
        $this->billName = $billName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillDescription()
    {
        return $this->billDescription;
    }

    /**
     * @param mixed $billDescription
     *
     * @return self
     */
    public function setBillDescription($billDescription)
    {
        $this->billDescription = $billDescription;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillAmount()
    {
        return $this->billAmount;
    }

    /**
     * @param mixed $billAmount
     *
     * @return self
     */
    public function setBillAmount($billAmount)
    {
        $this->billAmount = $billAmount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillTo()
    {
        return $this->billTo;
    }

    /**
     * @param mixed $billTo
     *
     * @return self
     */
    public function setBillTo($billTo)
    {
        $this->billTo = $billTo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillEmail()
    {
        return $this->billEmail;
    }

    /**
     * @param mixed $billEmail
     *
     * @return self
     */
    public function setBillEmail($billEmail)
    {
        $this->billEmail = $billEmail;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillPhone()
    {
        return $this->billPhone;
    }

    /**
     * @param mixed $billPhone
     *
     * @return self
     */
    public function setBillPhone($billPhone)
    {
        $this->billPhone = $this->makePhoneNum($billPhone);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillReturnUrl()
    {
        return $this->billReturnUrl;
    }

    /**
     * @param mixed $billReturnUrl
     *
     * @return self
     */
    public function setBillReturnUrl($billReturnUrl)
    {
        $this->billReturnUrl = $billReturnUrl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillCallbackUrl()
    {
        return $this->billCallbackUrl;
    }

    /**
     * @param mixed $billCallbackUrl
     *
     * @return self
     */
    public function setBillCallbackUrl($billCallbackUrl)
    {
        $this->billCallbackUrl = $billCallbackUrl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillExternalReferenceNo()
    {
        return $this->billExternalReferenceNo;
    }

    /**
     * @param mixed $billExternalReferenceNo
     *
     * @return self
     */
    public function setBillExternalReferenceNo($billExternalReferenceNo)
    {
        $this->billExternalReferenceNo = $billExternalReferenceNo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * @param mixed $categoryName
     *
     * @return self
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoryDescription()
    {
        return $this->categoryDescription;
    }

    /**
     * @param mixed $categoryDescription
     *
     * @return self
     */
    public function setCategoryDescription($categoryDescription)
    {
        $this->categoryDescription = $categoryDescription;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUseSandbox()
    {
        return $this->useSandbox;
    }

    /**
     * @param mixed $useSandbox
     *
     * @return self
     */
    public function setUseSandbox($useSandbox)
    {
        $this->useSandbox = $useSandbox;

        return $this;
    }
}
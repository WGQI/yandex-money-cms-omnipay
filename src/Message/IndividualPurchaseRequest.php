<?php

namespace yandexmoney\YandexMoney\Message;

/**
 * YandexMoney Purchase Request
 */
class IndividualPurchaseRequest extends IndividualAuthorizeRequest
{
  

	public function getAccount()
    {
        return $this->getParameter('account');
    }

    public function setAccount($value)
    {
        return $this->setParameter('account', $value);
    }

    public function getPassword()
    {
        return $this->getParameter('password');
    }

    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

    public function getMethod()
    {
        return $this->getParameter('method');
    }

	public function setMethod($value)
    {
        return $this->setParameter('method', $value);
    }
	
	public function getCustomerNumber()
    {
        return $this->getParameter('customerNumber');
    }

	public function setCustomerNumber($value)
    {
        return $this->setParameter('customerNumber', $value);
    }
	
    public function getOrderNumber()
    {
        return $this->getParameter('orderNumber');
    }

	public function setOrderNumber($value)
    {
        return $this->setParameter('orderNumber', $value);
    }
	
	public function getCustomerEmail()
    {
        return $this->getParameter('customerEmail');
    }

	public function setCustomerEmail($value)
    {
        return $this->setParameter('customerEmail', $value);
    }

	public function getOrderId()
    {
        return $this->getParameter('orderId');
    }

	public function setOrderId($value)
    {
        return $this->setParameter('orderId', $value);
    }


	public function getCurrencyNum()
    {
        return $this->getParameter('currencyNum');
    }

    public function setCurrencyNum($value)
    {
        return $this->setParameter('currencyNum', $value);
    }

	public function getAction()
	{
		 return $this->getParameter('action');
	}
	public function setLabel($value)
	{
		 return $this->setParameter('label', $value);
	}
	public function getLabel()
	{
		 return $this->getParameter('label');
	}
	public function setFormComment($value)
	{
		  return $this->setParameter('form_comment', $value);
	}

	public function getFormComment()
	{
		 return $this->getParameter('form_comment');
	}

	
	public function setComment($value)
	{
		  return $this->setParameter('comment', $value);
	}

	public function getComment()
	{
		 return $this->getParameter('comment');
	}
	
	public function setMessage($value)
	{
		  return $this->setParameter('message', $value);
	}

	public function getMessage()
	{
		 return $this->getParameter('message');
	}

    	public function setShortDest($value)
    	{
		return $this->setParameter('short-dest', $value);
    	}
	public function getShortDest()
	{
		 return $this->getParameter('short-dest');
	}

	
	
    public function getData()
    {
		$this->validate('account', 'form_comment', 'orderId', 'amount', 'method', 'returnUrl', 'cancelUrl');		
		
        $data = array();
		$data['receiver'] = $this->getAccount();
		$data['formcomment'] = $this->getFormComment(); // Имя магазина
		$data['short-dest'] = $this->getShortDest(); // Описание покупки
		$data['writable-targets'] = 'false';
	    	$data['customerEmail'] = $this->getCustomerEmail();
		$data['comment-needed'] = 'true';
	    	$data['message'] = $this->getMessage();
		$data['label'] = $this->getOrderId();
		$data['quickpay-form'] = 'shop';
		$data['targets'] = 'Транзакция ' . $this->getOrderId();
		$data['sum'] = $this->getAmount();
		$data['comment'] = $this->getComment();
		$data['need-fio'] = 'false';
		$data['need-email'] = 'false';
		$data['need-phone'] = 'false';
		$data['need-address'] = 'false';
		
		$data['paymentType'] = $this->getMethod();	

		$data['successURL'] = $this->getReturnUrl();
		$data['failURL'] = $this->getCancelUrl();
		
		return $data;
    }

    public function sendData($data)
    {
        return $this->response = new IndividualPurchaseResponse($this, $data);
    }
}

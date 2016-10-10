<?php

/**
 * Created by PhpStorm.
 * User: milos.pejanovic
 * Date: 10/7/2016
 * Time: 4:42 PM
 */
namespace OpenId;

class Consumer extends \LightOpenID implements IConsumer {

	const AUTH_NOW = 'AUTH_NOW';
	const AUTH_CANCELLED = 'AUTH_CANCELLED';
	const AUTHENTICATED = 'AUTHENTICATED';
	const NOT_AUTHENTICATED = 'NOT_AUTHENTICATED';

	/**
	 * @var string
	 */
	protected $id;

	/**
	 * Consumer constructor.
	 * @param string $host
	 * @param string $identity
	 */
	public function __construct(string $host, string $identity)	{
		$this->id = $identity;
		parent::__construct($host);
	}

	/**
	 * @return string
	 */
	public function getAuthState() {
		switch($this->__get('mode')) {
			case null:
				$this->__set('identity', $this->id);
				$result = self::AUTH_NOW;
				break;
			case 'cancel':
				$result = self::AUTH_CANCELLED;
				break;
			default:
				$result = self::NOT_AUTHENTICATED;
				if($this->validate()) {
					$result = self::AUTHENTICATED;
				}
		}

		return $result;
	}

	/**
	 * @return string
	 */
	public function getAuthURL() {
		return $this->authUrl();
	}
}
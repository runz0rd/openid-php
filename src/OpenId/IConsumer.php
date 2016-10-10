<?php
/**
 * Created by PhpStorm.
 * User: milos.pejanovic
 * Date: 10/10/2016
 * Time: 11:04 AM
 */

namespace OpenId;

interface IConsumer {

	/**
	 * @return string
	 */
	function getAuthState();

	/**
	 * @return string
	 */
	function getAuthURL();

}
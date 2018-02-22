<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	session_start();
	define('URL', 'http://ec2-13-58-214-158.us-east-2.compute.amazonaws.com/');
	define('KEY', '&6831IlYmK33d');

	if(isset($_POST['action']) && $_POST['action'] != ''){
		$action = $_POST['action'];

		$curl = curl_init();
		
		$headers = array(
		    "x-api-key: ".KEY
		);

		$url = URL.$action;

		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($curl, CURLOPT_POST, true);

		switch($action){
			case 'system':
				$actionLabel = trim($_POST['actionLabel']);

				if($actionLabel == ''){
					$_SESSION['msg'] = 'Error occurred!';
					header('location:/');
					exit();
				}

				$data = array(
					'action' => $actionLabel
				);

				curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
			break;
			case 'userTokenBalance':
			case 'wallet':
				$userId = trim($_POST['userId']);

				if($userId == ''){
					$_SESSION['msg'] = 'Error occurred!';
					header('location:/');
					exit();
				}

				$data = array(
					'userId' => $userId
				);

				curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
			break;
			case 'transferTokens':
				$userId = trim($_POST['userId']);
				$tokenAmount = (float)($_POST['tokenAmount']);

				if($userId == '' || $tokenAmount == 0){
					$_SESSION['msg'] = 'Error occurred!';
					header('location:/');
					exit();
				}

				$data = array(
					'userId' => $userId,
					'tokenAmount' => $tokenAmount
				);

				curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
			break;
			case 'transferTokensInternally':
				$fromUserId = trim($_POST['fromUserId']);
				$toUserId = trim($_POST['toUserId']);
				$tokenAmount = (float)($_POST['tokenAmount']);

				if($fromUserId == '' || $toUserId == '' || $tokenAmount == 0){
					$_SESSION['msg'] = 'Error occurred!';
					header('location:/');
					exit();
				}

				$data = array(
					'fromUserId' => $fromUserId,
					'toUserId' => $toUserId,
					'tokenAmount' => $tokenAmount
				);

				curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
			break;
			case 'withdraw':
				$userId = trim($_POST['userId']);
				$address = trim($_POST['address']);

				if($userId == '' || $address == ''){
					$_SESSION['msg'] = 'Error occurred!';
					header('location:/');
					exit();
				}

				$data = array(
					'userId' => $userId,
					'address' => $address
				);

				curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
			break;
		}

		$output = curl_exec($curl);
		curl_close($curl);

		$_SESSION['msg'] = $output;
		header('location:/');
		exit();
	}
?>
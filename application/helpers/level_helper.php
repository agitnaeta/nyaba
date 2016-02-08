<?php


	if ( ! function_exists('level'))
	{
			 function level($int)
			{
			switch ($int) {
				case '1':
					echo "Super Admin";
					break;
				case '2':
					echo "Bisnis Admin";
					break;
				case '3':
					echo "User";
					break;
				default:
					rediredt('login');
					break;
			}
	}
	
	}
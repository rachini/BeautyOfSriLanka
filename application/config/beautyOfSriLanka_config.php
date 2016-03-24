<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Custon configuration file.

// function userservices->getUsersswithdep() ->  // designation 23 -> is managing director   not get report

//This is to set the site title
$config['APPLICATION_MAIN_TITLE']	= "BEAUTYOFSRILANKA";
$config['LOGIN_OPTION']	= 1;


//User Types
$config['ADMIN']= 1;
$config['USER']=2;
$config['ALL']= 3;

$config['MAILBOX']             = "{203.143.14.246:143/notls}";
$config['MAILBOX2']            = "{203.143.14.229:143/notls}";




//system codes where even if the user has no privileges the system default view should be shown
$config['DEFAULT_VIEW_SYSTEMS'] = array(5,6,7,15);


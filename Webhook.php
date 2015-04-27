<?php

// Set Variables
$LOCAL_ROOT         = "/";
$LOCAL_REPO_NAME    = "Webhook";
$LOCAL_REPO         = "{$LOCAL_ROOT}/{$LOCAL_REPO_NAME}";
$REMOTE_REPO        = "git@github.com:WebRTB/Webhook.git";
$BRANCH             = "develop";

if ($_SERVER['HTTP_X_GITHUB_EVENT'] == 'ping')
{
	if( file_exists($LOCAL_REPO) )
	{
		die("Ping done " . time());
	}
}
elseif ($_SERVER['HTTP_X_GITHUB_EVENT'] == 'push')
{
	if( file_exists($LOCAL_REPO) )
	{
		shell_exec("cd {$LOCAL_REPO} && git pull");
		die("Push done " . time());
	}
	else
	{
		shell_exec("cd {$LOCAL_ROOT} && git clone {$REMOTE_REPO}");
		die("Clone done " . time());
	}
}
else
{
	die("Not a valid Github event " . time());
}

<?php

// Set Variables
$LOCAL_ROOT         = "/";
$LOCAL_REPO_NAME    = "Webhook";
$LOCAL_REPO         = "{$LOCAL_ROOT}/{$LOCAL_REPO_NAME}";
$REMOTE_REPO        = "git@github.com:WebRTB/Webhook.git";
$BRANCH             = "develop";

if ($_SERVER['HTTP_X_GITHUB_EVENT'] == 'push')
{
	if( file_exists($LOCAL_REPO) )
	{
		shell_exec("cd {$LOCAL_REPO} && git pull origin {$BRANCH}");
		die("done " . mktime());
	}
	else
	{
		shell_exec("cd {$LOCAL_ROOT} && git clone {$REMOTE_REPO}");
		die("done " . mktime());
	}
}

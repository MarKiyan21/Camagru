<?php

return array(
	'^photos/([0-9]+)' => 'photos/view/$1',
    '^photos' => 'photos/index',
    '^user/login$' => 'user/login',
    '^user/register$' => 'user/register',
    '^user/logout$' => 'user/logout',
    '^user/info/([A-Za-z]*$)' => 'user/info/$1',
    '' => 'site/index',
);
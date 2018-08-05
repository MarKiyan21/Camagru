<?php

return array(
	'^database/create$' => 'database/create',
	'^database/delete$' => 'database/delete',
	'^photos/([0-9]+$)' => 'photos/view/$1',
    '^photos$' => 'photos/index',
    '^user/login$' => 'user/login',
    '^user/register$' => 'user/register',
    '^user/activate/([A-Za-z0-9]*)/([-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}$)' => 'user/activate/$1/$2',
    '^user/logout$' => 'user/logout',
    '^user/info/([A-Za-z0-9]*$)' => 'user/info/$1',
    '^user/selfie$' => 'user/selfie',
    '^user/changeLogin$' => 'user/changeLogin',
    '^user/changeEmail$' => 'user/changeEmail',
    '^user/changePassword$' => 'user/changePassword',
    '^saveAsAvatar$' => 'activity/saveAsAvatar',
    '^uploadImage$' => 'activity/uploadImage',
    '^likeImage$' => 'activity/likeImage',
    '^postComment$' => 'activity/postComment',
    '' => 'site/index',
);
<?php

/**
 * Social Network Types
 */
define('SOCIAL_TYPE_UNKNOWN', 'Unknown');
define('SOCIAL_TYPE_FACEBOOK', 'Facebook');
define('SOCIAL_TYPE_TWITTER', 'Twitter');
define('SOCIAL_TYPE_GOOGLE', 'Google OpenID');
define('SOCIAL_TYPE_GITHUB', 'GitHub');
define('SOCIAL_TYPE_HATENA', 'Hatena');

//ERROR constants
define('OPENSOCIAL_ERR_UNKNOWN', 0);
define('OPENSOCIAL_ERR_CONFIGURATION', 1);
define('OPENSOCIAL_ERR_PROVIDER', 2);
define('OPENSOCIAL_ERR_UNKNOWN_PROVIDER', 3);
define('OPENSOCIAL_ERR_MISSING_CREDENTIALS', 4);
define('OPENSOCIAL_ERR_AUTH_FAILED', 5);
define('OPENSOCIAL_ERR_USER_IGNORED', 6);
define('OPENSOCIAL_ERR_CONNECTION', 7);
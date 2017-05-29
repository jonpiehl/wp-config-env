# USE THIS CODE TO REPLACE THE DB AND SITE CONFIG SETTINGS

## Set Environment Condition Rules ##
# parts of the domain that are unique to each enviornment.
# 'ENV NAME' => 'DOMAIN PART' (use array to catch multiple variations)
$environments = array(
	'local'		=> array('.local', 'local.'),
	'dev'		=> array('dev.', 'dev-'),
	'staging'		=> array('staging.', 'staging-'),
);

# Set Environment
$server_name = $_SERVER['SERVER_NAME'];
foreach($environments AS $key => $env){
	if(is_array($env)){
		foreach ($env as $option){
			if(stristr($server_name, $option)){
				define('ENVIRONMENT', $key);
				break 2;
			}
		}
	} else {
		if(stristr($server_name, $env)){
			define('ENVIRONMENT', $key);
			break;
		}
	}
}

// Define different config details depending on environment
switch(ENVIRONMENT) {
	case 'local':
		define('DB_NAME', '');
    define('DB_USER', '');
		define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
    
		define('WP_SITEURL', '');
		define('WP_HOME', '');
		define('WP_DEBUG', true);
		break;
    
  case 'dev':
		define('DB_NAME', '');
    define('DB_USER', '');
		define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
    
		define('WP_SITEURL', '');
		define('WP_HOME', '');
		define('WP_DEBUG', true);
		break;

	case 'staging':
    define('DB_NAME', '');
    define('DB_USER', '');
		define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
    
		define('WP_SITEURL', '');
		define('WP_HOME', '');
		define('WP_DEBUG', false);
		break;
  
  # PRODUCTION (if not enviornment is set then defaults to production)
	case default:
		define('DB_NAME', '');
    define('DB_USER', '');
		define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
    
		define('WP_SITEURL', '');
		define('WP_HOME', '');
		define('WP_DEBUG', false);
		break;
}

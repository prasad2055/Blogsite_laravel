<?php

if(!function_exists('config')) {

          /**
           * Returns configuration value.
           * 
           * @param string $key
           * @return false|string
           */
    
    function config(string $key): false|string {
        require BASEPATH . "/config/settings.php";

        if(key_exists($key, $config)) {
            return $config[$key];
        } else {
            return  false;
        }
    }
}
 
if(!function_exists('view')) {

    /**
     * Load the specified view file with
     * the given data.
     * 
     * @param string $view
     * @param null|array $data
     * @return void
     */

    function view(string $view, ?array $data = null) {
        new System\Core\View($view, $data);
    }
}

if(!function_exists('url')) {

    /**
     * Returns fully qualified url for 
     * the given uri.
     * 
     * @param string $uri
     * @return string
     */
    function url(string $uri = ''): string {
        return config('app_url').$uri;
    }
}

if(!function_exists('redirect')) {

    /**
     * Redirects to the given url.
     * 
     * @param string $url
     * @return void
     */
    function redirect(string $url) {
        header("Location: $url");
        die;
    }
}

if(!function_exists('set_message')) {

    /**
     *  Sets message in the session.
     * 
     *  @param string $content
     *  @param string $type
     *  @return void
     */
    function set_message(string $content, string $type = 'info') {
        $_SESSION['message'] = compact('content', 'type');
    }
}

if(!function_exists('get_message')) {

    /**
     *  Gets message from the session
     * 
     *  @return array|false
     */
    function get_message(): array|false {
        return !empty($_SESSION['message']) ? $_SESSION['message'] : false;
    }
}

if(!function_exists('clear_message')) {

    /**
     *  Removes message from the session.
     * 
     *  @return void
     */
    function clear_message() {
        unset($_SESSION['message']);
    }
}

if(!function_exists('authenticate')) {

    /**
     * Checks if user is authenticated.
     * 
     * @return bool
     */
    function authenticate(): bool {
        if(!empty($_SESSION['user_id'])) {
            return true;
        } elseif(!empty($_COOKIE['blogsite_user'])) {
            $_SESSION['user_id'] = $_COOKIE['blogsite_user'];

            return true;
        }

        return false;
    }
}

if(!function_exists('user')) {

    /**
     * Returns authenticated user model.
     * 
     * @return App\Models\User
     */
    function user() {
        return new App\Models\User($_SESSION['user_id']);
    }
}

if(!function_exists('now')) {

    /**
     * Returns current date-time.
     * 
     * @param string $format
     * 
     * @return string 
     */
    function now(string $format = 'Y-m-d H:i:s'): string {
        return date($format);
    }

    if(!function_exists('dt_format')) {

        /**
         * Returns given date-time in specified
         * format.
         * 
         * @param string $format
         * 
         * @return string 
         */
        function dt_format(string $dt, string $format = 'j M Y h:i A'): string {
            return date($format, strtotime($dt));
        }
    }
}
<?php

namespace System\Core;

abstract class Controller {

    protected function checkAuth() {
        if(!authenticate()) {
            set_message('please login to continue.', 'danger');
      
            redirect(url('login'));
          }
    }
    
}
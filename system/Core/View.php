<?php

namespace System\Core;

class View {
    
    public function __construct(string $view, ?array $data = null) {
        if(!empty($data)) {
            extract($data);
        }
        
        require BASEPATH. "/views/{$view}";
    }

}
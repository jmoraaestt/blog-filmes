<?php

class Core
{
    public function start($urlGet)
    {
        $acao = 'index';

        if (isset($urlGet['pagina'])) {
            $controller = ucfirst($urlGet['pagina'].'Controller');
        } else {
            $controller = 'HomeController';
        }

        


        // Verificando existência do controller
        if(!class_exists($controller)) {
            $controller = 'ErroController';
        }

        
        if(isset($urlGet['id']) && $urlGet['id'] != null) {
            $id = $urlGet['id'];
        } else {
            $id = null;
        }

        // Chamando métodos de forma dinânica
        call_user_func_array(array(new $controller, $acao), array($id));
    }
}
<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $form = new Application_Form_Frmlogin();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getAllParams())) {
                $user = $_POST["user"];
                $clave = $_POST["clave"];
                $model = new Application_Model_DbTable_TblUsuario();
                
                $row = $model->getRow($user, $clave);
                if ($row) {
                    if (count($row)) {
                        foreach ($row as $f):
                            echo $f->idusuario;
                            echo $f->nombre;
                            echo $f->direccion;
                        endforeach;
                    }else{
                        $this->view->errorlogin="¡ Usuario y/o Contraseña incorrecto(s) !";
                    }
                }
            }
        }else {
            echo "sin enviar datos";
        }

        $this->view->form = $form;
    }

}


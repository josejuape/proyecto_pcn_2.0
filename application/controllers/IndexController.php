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
                        $sesion=new Zend_Session_Namespace("sesion");
                        foreach ($row as $f):
                            $sesion->id=$f->idusuario;
                            $sesion->nombre=$f->nombre;
                            $sesion->dni=$f->dni;
                            $sesion->direccion=$f->direccion;
                            $sesion->email=$f->email;
                            $sesion->telefono=$f->telefono;
                            $sesion->user=$f->user;
                            $sesion->clave=$f->clave;
                            $sesion->tipo=$f->tipo;
                            $sesion->acceso=$f->acceso;
                        endforeach;
                        $this->redirect("compras/registro");
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


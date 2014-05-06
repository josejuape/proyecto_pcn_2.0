<?php

class Application_Form_Frmlogin extends Zend_Form
{
    public function init()
    {
        $this->setName("frmlogin");
        
        $usuario=$this->createElement("text", "user");
        $usuario->setAttribs(array(
            'id'=>'usuario',
            'class'=>'caja',
            'placeholder'=>'Usuario',
            'required'=>'required',
        ));
        $usuario->setRequired(true);
        
        $clave=$this->createElement("password", "clave");
        $clave->setAttribs(array(
            'id'=>'clave',
            'class'=>'caja',
            'placeholder'=>'Contraseña',
            'required'=>'required'
        ));
        $clave->setRequired(true);
        
        $boton=$this->createElement("submit", "btnentrar",array('id'=>'entrar',
            'class'=>'boton','label'=>'Entrar'));
        
        $usuario->removeDecorator("label");
        $usuario->removeDecorator("HtmlTag");
        
        $clave->removeDecorator("label");
        $clave->removeDecorator("HtmlTag");
        
        $boton->removeDecorator("DtDdWrapper");
        $this->addElements(array($usuario,$clave,$boton));
    }
}

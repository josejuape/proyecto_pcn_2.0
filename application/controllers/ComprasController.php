<?php
class ComprasController extends Zend_Controller_Action
{
    
    public function registroAction()
    {
        
    }    
    public function addcarritoAction(){
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        $carrito=new Zend_Session_Namespace("comprapollo");
        if(isset($carrito->lista)){
        $lista=$carrito->lista;
        }
        $subtotal=$_POST["cantidad"]*$_POST["kilaje"];
        $id=rand(0,100000)*137;
        $lista[]=array("codigo"=>$id,
                    "cantidad"=>$_POST["cantidad"],
                    "kilaje"=>$_POST["kilaje"],        
                    "subtotal"=>$subtotal);
        $carrito->lista=$lista;
        
        echo '' . json_encode($lista) . '';
    }
    
    public function guardarcarritoAction(){
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        $carrito=new Zend_Session_Namespace("comprapollo");
        unset($carrito->lista);
    }
}
?>

<?php
class Vendas
{
    private $id;

    private $email;

    private $data_venda;
    
    private $status_venda;

    private $pagamento;

    private $entrega;

    public function getId()
    {
        return $this->id;
    }
    public function setId($valor)
    {
        $this->id = $valor;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($valor)
    {
        $this->email = $valor;
    }

    public function getData_venda()
    {
        return $this->data_venda;
    }
    public function setData_venda($valor)
    {
        $this->data_venda = $valor;
    }
    public function getStatus_venda()
    {
        return $this->status_venda;
    }
    public function setStatus_venda($valor)
    {
        $this->status_venda = $valor;
    }

    public function getPagamento()
    {
        return $this->pagamento;
    }
    public function setPagamento($valor)
    {
        $this->pagamento = $valor;
    }

    public function getEntrega()
    {
        return $this->entrega;
    }
    public function setEntrega($valor)
    {
        $this->entrega = $valor;
    }

}
?>
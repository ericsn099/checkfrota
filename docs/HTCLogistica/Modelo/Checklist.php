<?php
class Checklist
{
    private $id;
    private $id_frota;
    private $id_motorista;
    private $id_reboque;
    private $datahora;
    private $quilometragem;
    private $extintor;
    private $luz_de_freio;
    private $piscas_direita;
    private $piscas_esquerda;
    private $giroflex;
    private $piscas_alerta;
    private $limpador_de_parabrisas;
    private $higiene_interna;
    private $calibragem_dos_pneus;
    private $cartao_de_pedagio;
    private $lanternas_dianteiras_da_esquerda;
    private $lanternas_dianteiras_da_direita;
    private $lanternas_traseira_da_direita;
    private $lanternas_traseira_da_esquerda;
    private $habilitacao;
    private $estado_dos_pneus;
    private $batida_lateral_direita;
    private $batida_lateral_esquerda;
    private $batido_dianteiro;
    private $batido_traseiro;
    private $boleto;
    private $cracha;
    private $capacete;
    private $bota;
    private $colete;
    private $bicos;
    private $obs;
    private $image;
    private $foto;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId_frota()
    {
        return $this->id_frota;
    }

    public function setId_frota($id_frota)
    {
        $this->id_frota = $id_frota;
        return $this;
    }


    public function getId_motorista()
    {
        return $this->id_motorista;
    }

    public function setId_motorista($id_motorista)
    {
        $this->id_motorista = $id_motorista;
        return $this;
    }

    public function getId_reboque()
    {
        return $this->id_reboque;
    }

    public function setId_reboque($id_reboque)
    {
        $this->id_reboque = $id_reboque;
        return $this;
    }

    public function getDatahora()
    {
        return $this->datahora;
    }

    public function setDatahora($datahora)
    {
        $this->datahora = $datahora;
        return $this;
    }

    public function getQuilometragem()
    {
        return $this->quilometragem;
    }

    public function setQuilometragem($quilometragem)
    {
        $this->quilometragem = $quilometragem;
        return $this;
    }

    public function getExtintor()
    {
        return $this->extintor;
    }

    public function setExtintor($extintor)
    {
        $this->extintor = $extintor;
        return $this;
    }

    public function getLuz_de_freio()
    {
        return $this->luz_de_freio;
    }

    public function setLuz_de_freio($luz_de_freio)
    {
        $this->luz_de_freio = $luz_de_freio;
        return $this;
    }

    public function getPiscas_direita()
    {
        return $this->piscas_direita;
    }

    public function setPiscas_direita($piscas_direita)
    {
        $this->piscas_direita = $piscas_direita;
        return $this;
    }

    public function getPiscas_esquerda()
    {
        return $this->piscas_esquerda;
    }

    public function setPiscas_esquerda($piscas_esquerda)
    {
        $this->piscas_esquerda = $piscas_esquerda;
        return $this;
    }

    public function getGiroflex()
    {
        return $this->giroflex;
    }

    public function setGiroflex($giroflex)
    {
        $this->giroflex = $giroflex;
        return $this;
    }

    public function getPiscas_alerta()
    {
        return $this->piscas_alerta;
    }

    public function setPiscas_alerta($piscas_alerta)
    {
        $this->piscas_alerta = $piscas_alerta;
        return $this;
    }

    public function getLimpador_de_parabrisas()
    {
        return $this->limpador_de_parabrisas;
    }

    public function setLimpador_de_parabrisas($limpador_de_parabrisas)
    {
        $this->limpador_de_parabrisas = $limpador_de_parabrisas;
        return $this;
    }

    public function getHigiene_interna()
    {
        return $this->higiene_interna;
    }

    public function setHigiene_interna($higiene_interna)
    {
        $this->higiene_interna = $higiene_interna;
        return $this;
    }

    public function getCalibragem_dos_pneus()
    {
        return $this->calibragem_dos_pneus;
    }

    public function setCalibragem_dos_pneus($calibragem_dos_pneus)
    {
        $this->calibragem_dos_pneus = $calibragem_dos_pneus;
        return $this;
    }

    public function getCartao_de_pedagio()
    {
        return $this->cartao_de_pedagio;
    }

    public function setCartao_de_pedagio($cartao_de_pedagio)
    {
        $this->cartao_de_pedagio = $cartao_de_pedagio;
        return $this;
    }

    public function getLanternas_dianteiras_da_esquerda()
    {
        return $this->lanternas_dianteiras_da_esquerda;
    }

    public function setLanternas_dianteiras_da_esquerda($lanternas_dianteiras_da_esquerda)
    {
        $this->lanternas_dianteiras_da_esquerda = $lanternas_dianteiras_da_esquerda;
        return $this;
    }

    public function getLanternas_dianteiras_da_direita()
    {
        return $this->lanternas_dianteiras_da_direita;
    }

    public function setLanternas_dianteiras_da_direita($lanternas_dianteiras_da_direita)
    {
        $this->lanternas_dianteiras_da_direita = $lanternas_dianteiras_da_direita;
        return $this;
    }

    public function getLanternas_traseira_da_direita()
    {
        return $this->lanternas_traseira_da_direita;
    }

    public function setLanternas_traseira_da_direita($lanternas_traseira_da_direita)
    {
        $this->lanternas_traseira_da_direita = $lanternas_traseira_da_direita;
        return $this;
    }

    public function getLanternas_traseira_da_esquerda()
    {
        return $this->lanternas_traseira_da_esquerda;
    }

    public function setLanternas_traseira_da_esquerda($lanternas_traseira_da_esquerda)
    {
        $this->lanternas_traseira_da_esquerda = $lanternas_traseira_da_esquerda;
        return $this;
    }

    public function getHabilitacao()
    {
        return $this->habilitacao;
    }

    public function setHabilitacao($habilitacao)
    {
        $this->habilitacao = $habilitacao;
        return $this;
    }

    public function getEstado_dos_pneus()
    {
        return $this->estado_dos_pneus;
    }

    public function setEstado_dos_pneus($estado_dos_pneus)
    {
        $this->estado_dos_pneus = $estado_dos_pneus;
        return $this;
    }

    public function getBatida_lateral_direita()
    {
        return $this->batida_lateral_direita;
    }

    public function setBatida_lateral_direita($batida_lateral_direita)
    {
        $this->batida_lateral_direita = $batida_lateral_direita;
        return $this;
    }

    public function getBatida_lateral_esquerda()
    {
        return $this->batida_lateral_esquerda;
    }

    public function setBatida_lateral_esquerda($batida_lateral_esquerda)
    {
        $this->batida_lateral_esquerda = $batida_lateral_esquerda;
        return $this;
    }

    public function getBatido_dianteiro()
    {
        return $this->batido_dianteiro;
    }

    public function setBatido_dianteiro($batido_dianteiro)
    {
        $this->batido_dianteiro = $batido_dianteiro;
        return $this;
    }

    public function getBatido_traseiro()
    {
        return $this->batido_traseiro;
    }

    public function setBatido_traseiro($batido_traseiro)
    {
        $this->batido_traseiro = $batido_traseiro;
        return $this;
    }

    public function getBoleto()
    {
        return $this->boleto;
    }

    public function setBoleto($boleto)
    {
        $this->boleto = $boleto;
        return $this;
    }

    public function getCracha()
    {
        return $this->cracha;
    }

    public function setCracha($cracha)
    {
        $this->cracha = $cracha;
        return $this;
    }

    public function getCapacete()
    {
        return $this->capacete;
    }

    public function setCapacete($capacete)
    {
        $this->capacete = $capacete;
        return $this;
    }

    public function getBota()
    {
        return $this->bota;
    }

    public function setBota($bota)
    {
        $this->bota = $bota;
        return $this;
    }

    public function getColete()
    {
        return $this->colete;
    }

    public function setColete($colete)
    {
        $this->colete = $colete;
        return $this;
    }

    public function getBicos()
    {
        return $this->bicos;
    }

    public function setBicos($bicos)
    {
        $this->bicos = $bicos;
        return $this;
    }

    public function getObs()
    {
        return $this->obs;
    }

    public function setObs($obs)
    {
        $this->obs = $obs;
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
        return $this;
    }
}

<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mensagem
 *
 * @ORM\Table(name="mensagem", indexes={@ORM\Index(name="fk_mensagem_usuario_idx", columns={"usuario"})})
 * @ORM\Entity
 */
class Mensagem
{
    /**
     * @var int
     *
     * @ORM\Column(name="msg_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $msgId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_ts", type="datetime", nullable=false)
     */
    private $dataTs;

    /**
     * @var string
     *
     * @ORM\Column(name="conteudo", type="text", length=65535, nullable=false)
     */
    private $conteudo;

    /**
     * @var \Models\Usuario
     *
     * @ORM\ManyToOne(targetEntity="Models\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario", referencedColumnName="us_id")
     * })
     */
    private $usuario;



    /**
     * Get msgId
     *
     * @return int
     */
    public function getMsgId()
    {
        return $this->msgId;
    }

    /**
     * Set dataTs
     *
     * @param \DateTime $dataTs
     *
     * @return Mensagem
     */
    public function setDataTs($dataTs)
    {
        $this->dataTs = $dataTs;

        return $this;
    }

    /**
     * Get dataTs
     *
     * @return \DateTime
     */
    public function getDataTs()
    {
        return $this->dataTs;
    }

    /**
     * Set conteudo
     *
     * @param string $conteudo
     *
     * @return Mensagem
     */
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;

        return $this;
    }

    /**
     * Get conteudo
     *
     * @return string
     */
    public function getConteudo()
    {
        return $this->conteudo;
    }

    /**
     * Set usuario
     *
     * @param \Models\Usuario $usuario
     *
     * @return Mensagem
     */
    public function setUsuario(\Models\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Models\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}

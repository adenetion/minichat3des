<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", uniqueConstraints={@ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"})}, indexes={@ORM\Index(name="alias_fname_lname", columns={"apelido", "nome", "sobrenome"})})
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="us_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $usId;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=55, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="apelido", type="string", length=15, nullable=true)
     */
    private $apelido;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=30, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="sobrenome", type="string", length=20, nullable=false)
     */
    private $sobrenome;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=60, nullable=false)
     */
    private $senha;

    /**
     * @var bool
     *
     * @ORM\Column(name="verificado", type="boolean", nullable=false)
     */
    private $verificado = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="cadkey", type="string", length=24, nullable=false)
     */
    private $cadkey;

    /**
     * @var string
     *
     * @ORM\Column(name="cadiv", type="string", length=8, nullable=false)
     */
    private $cadiv;



    /**
     * Get usId
     *
     * @return int
     */
    public function getUsId()
    {
        return $this->usId;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set apelido
     *
     * @param string $apelido
     *
     * @return Usuario
     */
    public function setApelido($apelido)
    {
        $this->apelido = $apelido;

        return $this;
    }

    /**
     * Get apelido
     *
     * @return string
     */
    public function getApelido()
    {
        return $this->apelido;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Usuario
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set sobrenome
     *
     * @param string $sobrenome
     *
     * @return Usuario
     */
    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;

        return $this;
    }

    /**
     * Get sobrenome
     *
     * @return string
     */
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    /**
     * Set senha
     *
     * @param string $senha
     *
     * @return Usuario
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get senha
     *
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set verificado
     *
     * @param bool $verificado
     *
     * @return Usuario
     */
    public function setVerificado($verificado)
    {
        $this->verificado = $verificado;

        return $this;
    }

    /**
     * Get verificado
     *
     * @return bool
     */
    public function getVerificado()
    {
        return $this->verificado;
    }

    /**
     * Set cadkey
     *
     * @param string $cadkey
     *
     * @return Usuario
     */
    public function setCadkey($cadkey)
    {
        $this->cadkey = $cadkey;

        return $this;
    }

    /**
     * Get cadkey
     *
     * @return string
     */
    public function getCadkey()
    {
        return $this->cadkey;
    }

    /**
     * Set cadiv
     *
     * @param string $cadiv
     *
     * @return Usuario
     */
    public function setCadiv($cadiv)
    {
        $this->cadiv = $cadiv;

        return $this;
    }

    /**
     * Get cadiv
     *
     * @return string
     */
    public function getCadiv()
    {
        return $this->cadiv;
    }
}

<?php

namespace modeles\dashboard;

class Langue extends \modeles\AbstractModeles
{
    /**
     * {@inheritdoc}
     */
    protected $_name         = '####';

    /**
     * {@inheritdoc}
     */
    protected $_id           = '####';

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        parent::__construct();
        $this->_map = require(__DIR__.'/columns/Langue.php');
    }
    /*fonction: en paramètre le nom de la langue, en sortie son id*/
    public function getIdLangueForNom($nomLangue)
    {
        $req = $this->select('object')
            ->from($this->_name, $this->_id)
            ->where('####=:####', [':####' => $nomLangue]);

        $res = $this->verifReturn($req, 'fetchRow');
        if ($res === false) {
            return false;
        }
        return $res->{$this->_id};
    }
}

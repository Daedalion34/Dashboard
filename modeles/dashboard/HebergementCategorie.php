<?php

namespace modeles\dashboard;

class HebergementCategorie extends \modeles\AbstractModeles
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
        $this->_map = require(__DIR__.'/columns/HebergementCategorie.php');
    }

    /*fonction pour la modal hebergement*/
    public function getModalHebergement($idcategoriehebergement, $switchLangue2)
    {
        $req = $this->select()
            ->from($this->_name, array('####'))
            ->joinLeft(
                '####',
                '####.#### = ####.####
                AND ####.####= ' . $switchLangue2 . '',
                array('####', '####')
            )
            -> where ('####.####='.$idcategoriehebergement);


        return $this->verifReturn($req, 'fetchRow');

    }

    public function getIdHebergementForNom($nomHebergement)
    {
        $req = $this->select('object')
            ->from($this->_name, $this->_id)
            ->where('####=:####', [':####' => $nomHebergement]);

        $res = $this->verifReturn($req, 'fetchRow');
        if ($res === false) {
            return false;
        }
        return $res->{$this->_id};
    }
}

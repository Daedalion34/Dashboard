<?php

namespace datatable;

class DashMedia extends Datatable
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        //Définie les infos sur la table principale
        $this->sqlModele = new \modeles\dashboard\Etabs;
        $this->tableName = $this->sqlModele->getTableName();

        //Liste des colonnes dans la datatable
        $this->columns = array(
            array(
                'dt' => 0,
                'db' => '####'
            ),
            array(
                'dt' => 1,
                'db' => '####'
            ),
            array(
                'dt' => 2,
                'db' => '####'
            ),
            array(
                'dt' => 3,
                'db' => '####'
            ),
            array(
                'dt' => 4,
                'db' => '####'
            ),
            array(
                'dt' => 5,
                'db' => '####'
            ),
            array(
                'dt' => 6,
                'db' => '####'
            ),
            array(
                'dt' => 7,
                'db' => '####'
            )
        );
        return $this->generateDatas();
    }
}

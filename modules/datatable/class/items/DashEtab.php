<?php

namespace datatable;

class DashEtab extends Datatable
{
    protected $nomLangue;

    public function setNomLangue($nomLangue)
    {
        $this->nomLangue = $nomLangue;
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        //Définie les infos sur la table principale
        $this->sqlModele = new \modeles\dashboard\Etabs;
        $MLangue = new \modeles\dashboard\Langue;
        $MEtabsLangue = new \modeles\dashboard\EtabsLangue;

        $this->tableName = $this->sqlModele->getTableName();
        $switchLangue = $MLangue->getIdLangueForNom($this->nomLangue);

        $this->addJoin(
            ['el' => $MEtabsLangue->getTableName()],
            'el.####=' . $this->tableName . '.#### AND el.####= ' . $switchLangue . ''
        );

        //Liste des colonnes dans la datatable
        $this->columns = array(
            array(
                'dt' => 0,
                'db' => ['####' => $this->tableName . '.####']
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
                'formatter' => $this->calculSlide()
            ),
            array(
                'dt' => 7,
                'formatter' => $this->actionModal()
            ),
            array(
                'db' => '####'
            ),
            array(
                'db' => '####'
            )
        );

        return $this->generateDatas();
    }
    /*la fonction calculSlide calcul le taux de completion ainsi que
    la barre de progression et sa couleur */
    protected function calculSlide()
    {
        return function ($data, $dataRow) {

            if (($dataRow['champs_plein'] + $dataRow['champs_vide']) === 0) {
                $taux = NULL;
            } else {
                $taux = round((($dataRow['champs_plein'] / ($dataRow['champs_plein'] + $dataRow['champs_vide'])) * 100), 0);
            }

            /*c'est ici pour changer la couleur*/
            if ($taux <= 50) {
                $color = 'red-thunderbird';
            } elseif (($taux > 50) && ($taux < 65)) {
                $color = 'yellow-crusta';
            } else {
                $color = 'green-jungle';
            };

            $slide = '<div class="progress-info">
                        <div class="progress">
						    <span style= "width:' . $taux . '%;" class="progress-bar progress-bar-success ' . $color . '">' . $taux . '% </span>
                        </div>
                      </div>';
            return $slide;
        };
    }

    /*cette fonction donne un data attribut unique pour chaque
    bouton de modal*/
    protected function actionModal()
    {
        return function($data, $dataRow)
        {
            $textDisplay = '';
            $textDisplay .=
                '<div class="actions">
                    <span data-idetab="'.$dataRow['####'].'" class="btn btn-xxl default btn editable modal-dashboard">
                        <i class="fa fa-search"></i>
                    </span>
                </div>';
            return $textDisplay;
        };
    }
}

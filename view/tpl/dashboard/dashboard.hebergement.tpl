<!-- BEGIN PAGE CONTENT-->
<div class="tab-pane" id="hebergement">
    <div class="portlet box purple-seance">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-key"></i><?php echo $this->i18n->ucfirst('hebergementLangue')?>
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"></a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th><?php echo $this->i18n->ucfirst('hébergement') ?></th>
                        <th><?php echo $this->i18n->ucfirst('DE') ?></th>
                        <th><?php echo $this->i18n->ucfirst('ES') ?></th>
                        <th><?php echo $this->i18n->ucfirst('FR') ?></th>
                        <th><?php echo $this->i18n->ucfirst('GB') ?></th>
                        <th><?php echo $this->i18n->ucfirst('IT') ?></th>
                        <th><?php echo $this->i18n->ucfirst('NL') ?></th>
                    </tr>
                    </thead>
                    <?php foreach ($this->tauxHebCategorie as $id_hebergement_categorie => $list_langues ){  ?>
                        <tbody>
                        <tr>
                            <td><?php echo $this->i18n->ucfirst($id_hebergement_categorie) ?></td>
                            <?php
                            foreach ($list_langues as $label_langue => $taux) {
                                ?>
                                <td>
                                    <div class="actions">
                                        <!-- En fonction du taux color le bouton et
                                        deux data attribut pour la modal-->
                                    <span
                                            class="btn modal-dashboard2
                                                   <?php
                                                    if($taux == 0){
                                                        echo 'grey-cascade';
                                                    } elseif ($taux >0 && $taux <= 50 ) {
                                                        echo 'red-thunderbird';
                                                    } elseif (($taux > 50) && ($taux < 65)){
                                                        echo'yellow-crusta';
                                                    } else {
                                                        echo'green-jungle';
                                                    }
                                                    ?>
                                                  "
                                            data-langue2="<?= $label_langue; ?>"
                                        data-hebergement="<?= $id_hebergement_categorie; ?>">
                                        <i class="testdashboardtest"><?php echo $taux.' %' ?></i>
                                    </span>
                                    </div>
                                </td>
                                <?php
                            } ?>
                        </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN PAGE CONTENT-->
<div class="tab-pane" id="destination">
    <div class="portlet box green-jungle">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-map-o"></i><?php echo $this->i18n->ucfirst('destinationLangue')?>
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse">
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th><?php echo $this->i18n->ucfirst('destination') ?></th>
                        <th><?php echo $this->i18n->ucfirst('DE') ?></th>
                        <th><?php echo $this->i18n->ucfirst('ES') ?></th>
                        <th><?php echo $this->i18n->ucfirst('FR') ?></th>
                        <th><?php echo $this->i18n->ucfirst('GB') ?></th>
                        <th><?php echo $this->i18n->ucfirst('IT') ?></th>
                        <th><?php echo $this->i18n->ucfirst('NL') ?></th>
                    </tr>
                    </thead>

                    <?php foreach ($this->tauxParDestType as $id_dest_type => $list_langues ){  ?>
                        <tbody>
                        <tr>
                            <td><?php echo $this->i18n->ucfirst($id_dest_type) ?></td>
                            <?php
                            foreach ($list_langues as $label_langue => $taux) {
                                ?>
                                <td
                                    class="<?php
                                    if ($taux <= 50) {
                                        echo'danger';
                                    } elseif (($taux > 50) && ($taux < 70)) {
                                        echo'warning';
                                    } else {
                                        echo'success';
                                    }
                                    ?>"><?php echo $taux.' %' ?>
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

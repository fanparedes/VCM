                                            <label class="col-sm-3 control-label">Entidades Relacionadas</label>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="table-responsive">
                                                          
                                                        <table class="table-bordered table" style="width: 80%;">
                                                          <tr>
                                                          
                                                          <th>NÚMERO</th>
                                                            <th>ENTIDAD
                                                            </th>
                                                            <th>CONTACTO
                                                            </th>
                                                            <th>
                                                            CARGO
                                                            </th>
                                                            <th>
                                                            ELIMINAR
                                                            </th>

                                                          </tr>
                                                          <?php
                                                          $cont =1;
                                                          foreach($entities as $key => $entity) { ?>
                                                          <tr>
                                                            <td>
                                                            <?php echo $cont; ?>
                                                            </td>
                                                            <td>
                                                            <?php echo $entity['ActivityInstitution']['nombre']; ?>
                                                            </td>
                                                            <td>
                                                            <?php echo $entity['ActivityInstitution']['contacto']; ?>
                                                            </td>
                                                            <td>
                                                            <?php echo $entity['ActivityInstitution']['cargo']; ?>
                                                            </td>
                                                            <td> 
                                                            <a style="cursor: pointer;" onclick="elimina_entidad('<?php echo $entity['ActivityInstitution']['id']; ?>');"><i class="fa fa-trash-o"></i>&nbsp;</a>
                                                            </td>

                                                          </tr>

                                                          <?php 
                                                          $cont++;
                                                          } ?>
                                                        </table>



                                                        </div>
                                                    </div>
                                                </div>
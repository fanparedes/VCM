                                            <label class="col-sm-3 control-label">Hitos Agregados</label>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="table-responsive">
                                                          
                                                        <table class="table-bordered table" style="width: 80%;">
                                                          <tr>
                                                            <th style="width: 15%">NÚMERO
                                                            </th>
                                                            <th>HITO
                                                            </th>
                                                            <th style="width: 15%">
                                                            ELIMINAR
                                                            </th>

                                                          </tr>
                                                          <?php
                                                          $cont =1;
                                                          foreach($milestones as $key => $milestone) { ?>
                                                          <tr>
                                                            <td>
                                                            <?php echo $cont; ?>
                                                            </td>
                                                            <td>
                                                            <?php echo $milestone; ?>
                                                            </td>
                                                            <td> 
                                                            <a style="cursor: pointer;" onclick="elimina_hito('<?php echo $key; ?>');"><i class="fa fa-trash-o"></i>&nbsp;</a>
                                                            </td>

                                                          </tr>

                                                          <?php 
                                                          $cont++;
                                                          } ?>
														  
														  <input type="hidden" id="ctahitosadd" value="<?php echo $cont; ?>" />
                                                        </table>



                                                        </div>
                                                    </div>
                                                </div>
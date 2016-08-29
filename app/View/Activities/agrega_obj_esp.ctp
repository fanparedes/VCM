                                            <label class="col-sm-3 control-label">Objetivos Especificos Agregados</label>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="table-responsive">
                                                          
                                                        <table class="table-bordered table" style="width: 80%;">
                                                          <tr>
                                                            <th  style="width: 15%">NÚMERO
                                                            </th>
                                                            <th>OBJETIVO
                                                            </th>
                                                            <th  style="width: 15%">
                                                            ELIMINAR
                                                            </th>
                                                          </tr>
                                                          <?php
                                                          $cont =1;
                                                          foreach($objetives as $key => $objetive) { ?>
                                                          <tr>
                                                            <td>
                                                            <?php echo $cont; ?>
                                                            </td>
                                                            <td>
                                                            <?php echo $objetive; ?>
                                                            </td>
                                                            <td> 
                                                            <a style="cursor: pointer;" onclick="elimina_objetivo('<?php echo $key; ?>');"><i class="fa fa-trash-o"></i>&nbsp;</a>
                                                            </td>
                                                          </tr>

                                                          <?php 
                                                          $cont++;
                                                          } ?>
														  
														  <input type="hidden" id="ctaobjadd" value="<?php echo $cont; ?>" />
                                                        </table>



                                                        </div>
                                                    </div>
                                                </div>
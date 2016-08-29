                                            <?php 
                                            foreach($actividades_sin_enviar as $act_sin_env) { ?>



                                                    <div class="col-lg-3">
                                                        <div class="member-team">

                                                           <a href="<?php echo $abs_base.'activities/edit/'.$act_sin_env['Activity']['id']; ?>"><h3><?php echo $act_sin_env['Activity']['nombre']; ?>
                                                                <small></small>
                                                            </h3>
                                                            <p><?php echo $act_sin_env['Activity']['descripcion_actividad']; ?></p></a>
                                                             
                                                        </div>
                                                    </div>

                                            <?php } ?>
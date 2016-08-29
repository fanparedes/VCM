                                                        <table class="table-bordered table" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>USUARIO
                                                                    </th>
                                                                    <th>COMENTARIO
                                                                    </th>
                                                                    <th>FECHA
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                foreach($observations as $comment) { ?>
                                                                <tr>
                                                                    <td><?php echo $comment['Observation']['username']; ?>
                                                                    </td>
                                                                    <td><?php echo $comment['Observation']['comentario']; ?>
                                                                    </td>
                                                                    <td><?php echo $comment['Observation']['created']; ?>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>